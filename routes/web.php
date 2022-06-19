<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){

return redirect('post');

});



Route::get('/test',function(){

    return view('blog.post');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/post','App\Http\Controllers\PostController');

Route::get('/post/user/{id}','App\Http\Controllers\PostController@myPosts');
Route::get('/post/profile/{id}','App\Http\Controllers\PostController@userProfile');
Route::get('/post/user/edit/{id}','App\Http\Controllers\PostController@editUser');


Route::match(array('PUT', 'PATCH'), "/post/user/update/{id}", array(
    'uses' => 'App\Http\Controllers\PostController@updateUser',
    'as' => 'user.update'
));
Route::get('/post/admin/users','App\Http\Controllers\PostController@users');
Route::delete('/post/user/delete/{id}','App\Http\Controllers\PostController@userDelete');