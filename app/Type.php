<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = [
        'name',
    ];
    
    public function makes($options = [])
    {
        $relation = $this->hasMany('App\Make');

        if (!empty($options['limit'])) {
            $relation = $relation->take($options['limit'])->get();
        }

        return $relation;
    }
}
