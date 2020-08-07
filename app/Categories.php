<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

    protected $guarded = [];

    protected $table = 'categories';

    public function products()
    {
        // Define relationship
        return $this->belongsToMany('App\Product');
    }
}
