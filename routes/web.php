<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\User;

Auth::routes();

Route::view('/', 'welcome')->name('welcome');

Route::view('home', 'home');

Route::group(['prefix' => 'user/login'], function () {
    Route::get('/', 'LoginController@loginForm');
    Route::post('/', 'LoginController@login')->name('user.login');
});

Route::get('alert', [UserController::class, 'returnAlert']);

Route::middleware('auth')->group(function () {
    Route::resource('users', 'UserController');
});

Route::get('trashed', 'UserController@trashedUser');

Route::get('scope', 'CommentsController@index');

Route::view('view', 'config');

Route::get('auth', function () {
    $user = User::first();

    return $user->getAuthIdentifierName();
    return $user->getAuthIdentifier();
    return $user->getAuthPassword();
});
