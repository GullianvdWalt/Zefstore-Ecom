<?php
// Product Model
namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
    {

        // Define relationship
        return $this->belongsToMany('App\Category');
    }

    public function presentPrice()
    {

        return 'R' . number_format($this->price, 2);
    }

    // Query for You Might Also Like Products Section
    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(4);
    }
}
