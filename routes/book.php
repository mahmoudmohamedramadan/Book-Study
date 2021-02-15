<?php

use App\Http\Controllers\UserCommentsController;
use App\Http\Controllers\CommentsController;
use Illuminate\Support\Facades\Route;

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

//laravel will resolve this function if your url not match any route
Route::fallback(function () {
    return [
        'success' => true,
        'msg' => 'no matchs route'
    ];
});
