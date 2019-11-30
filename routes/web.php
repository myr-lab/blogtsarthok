<?php

Route::get('/', function () {
    return view('user.home');
});

Route::get('/post', function () {
    return view('user.post');
})->name('post');



Route::resource('/admin/post','Admin\postController');

Route::resource('/admin/tag','Admin\tagController');

Route::resource('/admin/category','Admin\categoryController');



Route::namespace('user')->group(function () {

    Route::get('/','postController@getAllPostContent');
    Route::get('/post/{post?}','postController@post')->name('post');

    Route::get('/post/tag/{tag?}','postController@tag')->name('tag');
    Route::get('/post/category/{category?}','postController@category')->name('category');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//AdminRoute

Route::group(['namespace' => 'Admin'] , function(){

  /****Admin Login Route*****/
  Route::get('/backend', 'HomeController@index')->name('backend')->middleware('auth:admin');
  Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
  Route::post('admin/login', 'Auth\LoginController@login');
  Route::post('admin/logout', 'Auth\LoginController@logout')->name('logout');
  Route::get('admin/profile', 'Auth\LoginController@profile')->name('profile')->middleware('auth:admin');

});