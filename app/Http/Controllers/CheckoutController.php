<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use Cartalyst\Stripe\Exception\CardErrorException;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::instance('default')->count() == 0) {
            return redirect()->route('shop.index');
        }
        // If the user is logged in or continue as guest, redirect to checout
        if (auth()->user() && request()->this('guestCheckout')) {
            return redirect()->route('checkout.index');
        }

        return view('checkout')->with([
            'discount' => $this->getNumbers()->get('discount'),
            'newSubtotal' =>  $this->getNumbers()->get('newSubtotal'),
            'newTax' =>  $this->getNumbers()->get('newTax'),
            'newTotal' =>  $this->getNumbers()->get('newTotal'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CheckoutRequest $request)
    {

        try {
            $contents = Cart::content()->map(function ($item) {
                return $item->model->slug . ',' . $item->qty;
            })->values()->toJson();


            \Stripe\Stripe::setApiKey("sk_test_51HCQ8hG8ox0ZkhTA9IewxdJs3iX3gRAFbfRqxUWbe8OtlC0yE8FWhO3OVE208vgmAttTUZGuumBk47ygeLqs8d2V00xxeuxgiV");
            $token = $_POST['stripeToken'];
            $charge = Stripe::charges()->create([
                'amount' =>  $this->getNumbers()->get('newTotal') / 100, // Amount to charge card
                'currency' => 'usd',
                'source' => $token,
                'description' => 'Order',
                'receipt_email' => $request->email,
                'metadata' => [
                    'contents' => $contents,
                    'quantity' => Cart::instance('default')->count(),
                    'discount' => collect(session()->get('voucher'))->toJson(),
                ],
            ]);

            // Successfull
            // Destroy Cart Items
            Cart::instance('default')->destroy();
            // Destroy Voucher
            session()->forget('voucher');
            return redirect()->route('confirmation.index')->with('success_message', 'Thank you! Your pament has been received!');
        } catch (CardErrorException $e) {
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }

    private function getNumbers()
    {
        $tax = config('cart.tax') / 100;
        $discount = session()->get('voucher')['discount'] ?? 0;
        $newSubtotal = ((Cart::subtotal()) - $discount);
        $newTax = $newSubtotal * $tax;
        $newTotal = $newSubtotal * (1 + $tax);

        return collect([
            'tax' => $tax,
            'discount' => $discount,
            'newSubtotal' => $newSubtotal,
            'newTax' => $newTax,
            'newTotal' => $newTotal
        ]);
    }
}
