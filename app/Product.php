<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'mileage', 'price', 'image', 'make_id', 'color', 'year', 'transmission', 'fuel_type'];

    public function make()
    {
        return $this->belongsTo('App\Make');
    }

    public function productImages()
    {
        return $this->hasMany('App\ProductImage');
    }
}
