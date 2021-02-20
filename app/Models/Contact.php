<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{

    /*
        BY DEFAULT ELOQUENT LOADS RELATIONSHIPS USING `LAZY LOADING`, THIS MEANS WHEN YOU FIRST LOADS A MODEL INSTANCE IT'S RELATIONSHIPS WILL NOT BE LOADED UNTIL YOU CALL THEM LIKE THIS...

        $contacts = \App\Models\Contact::get();
        foreach ($Contact as $contacts) {
            foreach ($Contact->phoneNumbers() as $phone_number) {
                //do something here
            }
        }

        SO IF YOU ARE LOADING THE MODEL INSTANCE AND YOU KNOW THAT YOU WILL WORKING WITH IT'S RELATIONSHIP, IT WILL BE RECOMMENDED TO WORK WITH `eager-load` LIKE THIS...

        $data = \App\Models\Contact::with('phoneNumber')->get();
    */
    protected $guarded = [''];

    public function users()
    {
        return $this->hasMany(User::class, 'contact_id');
    }

    public function phoneNumber()
    {
        return $this->hasOne(PhoneNumber::class, 'contact_id');
    }
}
