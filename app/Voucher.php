<?php

namespace App;
// Voucher Model Class
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    // Get Voucher Code
    public static function findByCode($code)
    {
        return self::where('code', $code)->first();
    }

    // Discount Method
    public function discount($total)
    {
        // Get Type of Voucher
        if ($this->type == 'fixed') {
            return $this->value / 100;
        } elseif ($this->type = 'percent') {
            return round(($this->percentage_off / 100) * $total);
        } else {
            return 0;
        }
    }
}
