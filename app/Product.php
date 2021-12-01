<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'title', 'slug', 'subtitle', 'description', 'price', 'stock', 'image1', 'image2', 'image3', 'image4'
    ];
    public function getPrice(){
       $price = $this->price / 100;

       return number_format($price, 2, ', ', ' '). ' $';
    }

    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }
}
