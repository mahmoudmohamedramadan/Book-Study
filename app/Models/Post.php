<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //WHEN YOU ARE READING DATA, YOU CAN CHANGE HOW PARTICULAR COLUMN OUTPUT
    public function getBodyAttribute($value)
    {
        return 'Accessor ' . $value;
    }

    //ALSO YOU CAN USE ACCESSOR WHEN A COLUMN NOT EXIST IN DATABASE
    public function getUserWithBodyAttribute()
    {
        return $this->name . ' ' . $this->email;
    }
}
