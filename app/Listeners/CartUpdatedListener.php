<?php

namespace App\Listeners;

use App\Jobs\UpdateVoucher;
use App\Voucher;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CartUpdatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        $voucherName = session()->get('voucher')['name']  ?? null;

        if ($voucherName) {

            $voucher = Voucher::where('code', $voucherName)->first();

            dispatch_now(new UpdateVoucher($voucher));
        }
    }
}
