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
