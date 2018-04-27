<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about'; //otherwise it wants the table to be named 'abouts' which sounds silly
    protected $fillable = ['owner_name', 'shop_name', 'description', 'hours', 'phone', 'address', 'email', 'fax', 'gmap', 'shop_img' ];

}
