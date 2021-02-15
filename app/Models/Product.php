<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function categories()
    {
        //withTimestamps with belongsToMany not hasMany
        return $this->belongsToMany(Category::class)
            ->withTimestamps()
            ->withPivot('product_id');
    }
}
