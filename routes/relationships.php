<?php

use App\Models\Contact;
use Illuminate\Support\Facades\Route;

Route::get('relationships', function () {
    // $contact = Contact::find(10);
    /*
        NOTICE THAT WE CALLED phoneNumber AS A PROPERTY NOT A METHOD, IF WE CALLED IT AS A PROPERTY IT WILL RETURN A FULL ELOQUENT INSTANCE AND THE METHOD WILL RETURN COLLECTION INSTEAD OF MODEL INSTANCE...
        SO WHEN WE CALLIED AS A METHOD INSTEAD OF PROCESSING RELATIONSHIP, IT WILL RETURN A PRE-SCOPED QUERY BUILDER
    */
    // return $contact->phoneNumber;

    // $phone = new PhoneNumber();
    // $phone->phone_number = '01094954333';

    // $contact->phoneNumber()->save($phone);

    ////////OR
    // $contact->phoneNumber()->saveMany([
    //     PhoneNumber::find(1),
    //     PhoneNumber::find(2),
    // ]);

    ////////OR
    // $contact->phoneNumber()->create([
    //     'contact_id' => $contact->id,
    //     'phone_number' => '01000000000'
    // ]);

    ////////OR
    // $contact->phoneNumber()->createMany([
    //     [
    //         'contact_id' => $contact->id,
    //         'phone_number' => '01000000600'
    //     ],

    //     [
    //         'contact_id' => $contact->id,
    //         'phone_number' => '01000000050'
    //     ],
    // ]);

    // return $contact->users;

    ///////////////////////

    //NOTICE ALL PREVIOUS SAVING DATA WAS SAVE DATA FROM CHILD TABLE TO PARENT TABLE, BUT WHAT IF WE WHAT TO SAVE DATA FROM PARENT TO CHILD...LET'S LOOK AT THE NEXT EXAMPLE

    // $phone = PhoneNumber::find(3);
    // $phone->contact()->associate($contact);
    // $phone->save();
    ////////AND LATER
    //  $phone->contact()->dissociate($contact);
    //  $phone->save();

    //SO IF WE CALL RELATIONSIP WE CALL USE IT AS A QUERY BUILDER...
    // dd($phone->contact()->where('user_id', 10)->get());

    ///////////////////////

    //YOU CAN CHOOSE TO SELECT ONLY RECORDS TO MEET PARTICULAR CRITERIA...WRITE IN THE HAS PARAMETER THE NAME OF RELATIONSHIP
    // $contact = Contact::has('phoneNumber')->get();

    // $contact = Contact::has('phoneNumber', '>', 1)->get();

    //ALSO YOU CAN NEST THE CRITERIA
    // $contact = Contact::has('phoneNumber.id', 1)->get();

    //HERE WILL CHECK IF THE CONTACT HAS phoneNumber ALSO WHERE THE contact_id EQULAS TO 5
    // $contact = Contact::whereHas('phoneNumber', function($query) {
    //     return $query->where('contact_id', 5);
    // })->get();

    // return $contact;

    ///////////////////////
    //SO WE NOW HAVE A RELATIONSHIP BETWEEN CONTACTS AND NUMBERPHONES, SO WHAT IF WE WANT A NEW RELATIONSHIP BETWEEN USERS AND NUMBERPHONES SO HERE WE TALK ABOUT hasManyThrough

    // $user = User::whereHas('phoneNumbers')->get();

    //HERE AFTER GETTING ALL USERS WHICH HAVE phoneNumbers WILL FIND BETWEEN THEM WHICH USER HAS A ID EQUALS 6
    // $user = User::whereHas('phoneNumbers')->get();

    // $user = User::whereHas('phoneNumbers', function ($query) {
    //     return $query->where('contact_id', 5);
    // })->get();

    // $contacts = Contact::get();

    //THIS TYPE CALLED LAZY EAGER LOADING
    // return $contacts->load('phoneNumber');

    // return $contacts->loadMissing('phoneNumber');
    //VISIT THIS LINK FOR MORE INFO: https://laravel.com/docs/5.2/eloquent-relationships#eager-loading

    //GET COUNT OF ITEMS IN EACH RELATIONSHIPS, THE NAME OF RELATIONSHIP SUFFIXED WITH COUNT IN SNAKE CASE
    return Contact::withCount('phoneNumber')->get();
});
