<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mightAlsoLike = Product::mightAlsoLike()->get();


        return view('cart')->with([
            'mightAlsoLike' => $mightAlsoLike,
            'discount' => getNumbers()->get('discount'),
            'newSubtotal' =>  getNumbers()->get('newSubtotal'),
            'newTax' =>  getNumbers()->get('newTax'),
            'newTotal' =>  getNumbers()->get('newTotal'),

        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product)
    {
        $duplicates = Cart::search(function ($cartItem, $rowId) use ($product) {
            return $cartItem->id === $product->id;
        });
        // Check if item is already in cart
        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'The item is already in your cart!');
        }

        // Default of 1 item add to cart
        Cart::add($product->id, $product->name, 1, $product->price)
            ->associate('App\Product');

        return redirect()->route('cart.index')->with('success_message', 'Item was added to your cart!');
    }

    // Quantity
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), ['quantity' => 'required|numeric|between:1,5']);
        // Handle Quantity
        // Quantity cannot be more than 5 per item
        if ($validator->fails()) {
            session()->flash('errors', collect(['Quantity can only be between 1 and 5']));
            return response()->json(['success' => false], 400);
        }

        // AJAX request
        Cart::update($id, $request->quantity);

        // Flash Message and refresh page to update quantity
        session()->flash('success_message', 'Quantity Updated!');

        // JSON Response
        return response()->json(['success' => true]);
    }

    public function empty()
    {

        Cart::destroy();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('success_message', 'The item was removed from the cart!');
    }

    /**
     * Switch item for shopping cart to wishlist.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addToWishlist($id)
    {
        // Get Item by ID
        $item = Cart::get($id);
        // Remove Item by ID
        Cart::remove($id);

        // Handle duplicate items in wishlist
        $duplicates = Cart::instance('wishlist')->search(function ($cartItem, $rowId) use ($id) {
            return $rowId === $id;
        });

        if ($duplicates->isNotEmpty()) {
            return redirect()->route('cart.index')->with('success_message', 'Item is already Saved For Later!');
        }

        Cart::instance('wishlist')->add($item->id, $item->name, 1, $item->price)
            ->associate('App\Product');

        return redirect()->route('cart.index')->with('success_message', 'Item has been Saved For Later!');
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
