<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'mileage', 'price', 'image', 'category_id', 'color', 'year', 'transmission', 'fuel_type'];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function productImages()
    {
        return $this->hasMany('App\ProductImage');
    }
}
