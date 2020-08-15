<?php

use phpDocumentor\Reflection\Types\Float_;
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
