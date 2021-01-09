<?php

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

Route::get('/','BlogController@index')->name('blogdev');

// route::get('/content_post',function(){
//     return View('blog_post.content_post');
// });
route::get('/content-post/{slug}','BlogController@content_post')->name('blog_post.content_post');
route::get('/list-post','BlogController@list_post')->name('blog_post.list_post');
route::get('/list-category/{category}','BlogController@list_category')->name('blog_post.category');


route::group(['middleware'=> 'auth'], function(){
    Route::get('/home', function () {return view('home');})->name('home');
    Route::resource('/category','CategoryController');
    Route::resource('/tag','TagController');
    route::get('/post/show_delete', 'PostController@show_delete')->name('post.show_delete');
    route::get('/post/restore/{id}','PostController@restore')->name('post.restore');
    route::delete('/post/kill/{id}','PostController@kill')->name('post.kill');
    Route::resource('/post','PostController');
    Route::resource('/users','UserController');
    Route::get('user/lock/{id}','UserController@lock')->name('user.lock');
    Route::get('user/userlock/{id}','UserController@userlock')->name('user.userlock');
    Route::get('users/viewuserlock', 'UserController@viewuserlock')->name('users.viewuserlock');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
