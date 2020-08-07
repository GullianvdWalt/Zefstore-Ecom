<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriesProduct extends Model
{
    protected $table = 'categories_product';

    protected $fillable = ['product_id', 'category_id'];
}
