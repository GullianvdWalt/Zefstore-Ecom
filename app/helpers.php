<?php

use phpDocumentor\Reflection\Types\Float_;
// Price
function presentPrice($price)
{
    return 'R' . number_format($price, 2);
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
