<?php

namespace App\Jobs;

use App\Voucher;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Gloudemans\Shoppingcart\Facades\Cart;

class UpdateVoucher implements ShouldQueue
{
    protected $voucher;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Voucher $voucher)
    {
        $this->voucher = $voucher;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        session()->put('voucher', [
            'name' => $this->voucher->code,
            'discount' => $this->voucher->discount(Cart::subtotal()),
        ]);
    }
}
