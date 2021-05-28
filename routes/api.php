<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('posts')->group(function(){
    Route::get('/', 'PostController@index')->name('post.index');
    Route::post('/store', 'PostController@store')->name('post.store');
    Route::get('/{id?}', 'PostController@show')->name('post.show');
    Route::post('/update/{id?}', 'PostController@update')->name('post.update');
    Route::delete('/{id?}', 'PostController@destroy')->name('post.delete');
});
