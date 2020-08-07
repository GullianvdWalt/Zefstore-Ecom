<?php

use App\Voucher;
use Illuminate\Database\Seeder;
// Voucher Seeder to insert values in vouchers table
class VouchersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert Values
        // Fixed Value voucher
        Voucher::create([
            'code' => 'ABC123',
            'type' => 'fixed',
            'value' => 5000
        ]);
        // Percentage voucher
        Voucher::create([
            'code' => 'ABC124',
            'type' => 'percent',
            'percentage_off' => 20
        ]);
    }
}
