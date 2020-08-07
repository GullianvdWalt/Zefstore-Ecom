<?php
// VoucherController File
namespace App\Http\Controllers;

use App\Voucher;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class VouchersController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voucher = Voucher::where('code', $request->voucher_code)->first();

        if (!$voucher) {
            return redirect()->route('cart.index')->withErrors('Invalid Voucher Code!');
        }

        session()->put('voucher', [
            'name' => $voucher->code,
            'discount' => $voucher->discount(Cart::subtotal())
        ]);
        return redirect()->route('cart.index')->with('success_message', 'Voucher Has Been Applied!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('voucher');
        return redirect()->route('cart.index')->with('success_message', 'Voucher Has Been Removed!');
    }
}
