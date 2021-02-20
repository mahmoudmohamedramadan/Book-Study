<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneNumber extends Model
{
    protected $fillable = [
        'contact_id',
        'phone_number'
    ];

    //touches PROPERTY WHEN YOU UPDATE ANY RECORD FROM CHILD MODEL(PhoneNumner) THE updated_at COLUMN IN PARENT MODEL(CONTACT) WILL UPDATED ALSO
    protected  $touches = ['contact'];

    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }
}
