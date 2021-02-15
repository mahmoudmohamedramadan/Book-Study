<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    public function users()
    {
        return $this->hasMany(User::class, 'contact_id');
    }

    public function phoneNumber()
    {
        return $this->hasOne(PhoneNumber::class, 'contact_id');
    }
}
