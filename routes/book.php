<?php

use Illuminate\Support\Facades\Route;

Route::apiResource('userApi', 'UserApiController');

//invokable controller
Route::get('userI', 'UserInvokableController');

//redirect route(uri) to other exist route
Route::redirect('redirectHome', '/home');

Route::get('convert', function () {
    return htmlentities('<h1>welcome</h1>');
});

Route::get('hasMany', 'HasManyController@index');

Route::get('template', function () {
    return view('book', [
        'normalEcho' => 'Normal',
        'directiveEcho' => 'Directive',
        'lettersArray' =>  [
            'a',
            'b',
            'c',
        ]
    ]);
});

Route::get('component', function () {
    return view('includes.passedData');
});

Route::get('collection', 'CollectionController@index');

//BEFORE EMBARKING STORING CONTACT THE boot METHOD INSIDE AppServiceProvider WILL TRIGGERED AND THE eventName METHOD WILL CALLED
Route::get('storeContact', 'ContactController@store');

//laravel will resolve this function if your url not match any route
Route::fallback(function () {
    return [
        'success' => true,
        'msg' => 'no matchs route'
    ];
});
