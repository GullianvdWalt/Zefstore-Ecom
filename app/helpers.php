<?php

use phpDocumentor\Reflection\Types\Float_;
use Gloudemans\Shoppingcart\Facades\Cart;
// Price
function presentPrice($price)
{
    return 'R' . (number_format($price / 100));
}

// Set Category link active
function setActiveCategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

// Check for Product Image
function productImage($path)
{
    // If There is no image or broken image link
    return $path && file_exists('storage/' . $path) ? asset('storage/' . $path) : asset('img/no-image.jpeg');
}


function remove_utf8_bom($text)
{
    $bom = pack('H*', 'EFBBBF');
    $text = preg_replace("/^$bom/", '', $text);
    return $text;
}

function getNumbers()
{
    $tax = config('cart.tax') / 100;
    $discount = session()->get('voucher')['discount'] ?? 0;
    $code = session()->get('voucher')['name'] ?? null;
    $newSubtotal = ((Cart::subtotal()) - $discount);
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    $newTax = $newSubtotal * $tax;
    $newTotal = $newSubtotal * (1 + $tax);

    return collect([
        'tax' => $tax,
        'discount' => $discount,
        'code' => $code,
        'newSubtotal' => $newSubtotal,
        'newTax' => $newTax,
        'newTotal' => $newTotal
    ]);
}

function getStockLevel($quantity)
{
    if ($quantity > setting('site.stock_threshold')) {
        $stockLevel = '<div class="badge badge-success"> In Stock</div>';
    } elseif ($quantity <= setting('site.stock_threshold') && $quantity > 0) {
        $stockLevel = '<div class="badge badge-warning"> Low Stock</div>';
    } else {
        $stockLevel = '<div class="badge badge-danger"> Out of Stock</div>';
    }

    return $stockLevel;
}
