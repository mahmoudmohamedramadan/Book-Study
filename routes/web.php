<?php

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\UserCommentsController;

Auth::routes();

Route::view('home', 'home');

Route::view('/', 'welcome')->name('welcome');

Route::group(['prefix' => 'user/login'], function () {
    Route::get('/', 'LoginController@loginForm');
    Route::post('/', 'LoginController@login')->name('user.login');
});

Route::group(['prefix' => 'posts/{post}/comments'], function () {
    //route model binding
    Route::post('/', [CommentsController::class, 'store'])->name('comments.store');
    Route::get('{comment}/edit', [CommentsController::class, 'edit'])->name('comments.edit');
    Route::patch('{comment}', [CommentsController::class, 'update'])->name('comments.update');
    Route::delete('{comment}', [CommentsController::class, 'destroy'])->name('comments.destroy');
});

Route::resource('posts', 'PostController');

Route::name('user.')->prefix('user')->group(function () {
    Route::name('comments.')->prefix('{user}/comments')->group(function () {
        Route::get('{comment}', [UserCommentsController::class, 'show'])->name('show');
    });
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
