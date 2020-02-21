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
Auth::routes([

    'register' => false, // Register Routes...
    'login' => false, // Login Routes...
    'reset' => false, // Reset Password Routes...
    'verify' => false, // Email Verification Routes...
  
  ]);


Route::get('/admin/login', 'AdminAuthController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'AdminAuthController@submit')->name('admin.submit');

Route::group(['prefix' => 'admin','middleware'=>'auth:admin'], function () {
    
    Route::get('/dashboard', 'AdminController@index')->name('admin.dashboard');
    Route::any('/logout', 'AdminController@adminLogout')->name('admin.logout');
    
    Route::get('/post', 'PostController@index')->name('post.index');
    

    // Routes for fonts
    Route::get('/fontss', 'FontsController@index')->name('fonts');
    Route::get('/font/create','FontsController@create')->name('create.font');
    Route::post('/font/store','FontsController@store')->name('store.font');
    Route::get('/font/edit/{id}','FontsController@edit')->name('edit.font');
    Route::post('/font/update/{id}','FontsController@update')->name('update.font');
    Route::post('/font/search','FontsController@search')->name('search.font');
    Route::get('/font/delete/{id}','FontsController@destroy')->name('delete.font');


    // Routes for colors
    Route::get('/colors', 'ColorsController@index')->name('colors');
    Route::get('/color/create','ColorsController@create')->name('create.color');
    Route::post('/color/store','ColorsController@store')->name('store.color');
    Route::get('/color/edit/{id}','ColorsController@edit')->name('edit.color');
    Route::post('/color/update/{id}','ColorsController@update')->name('update.color');
    Route::post('/color/search','ColorsController@search')->name('search.color');
    Route::get('/color/delete/{id}','ColorsController@destroy')->name('delete.color');


    // Routes for photos
    Route::get('/photos', 'PhotosController@index')->name('photos');
    Route::get('/photo/create','PhotosController@create')->name('create.photo');
    Route::post('/photo/store','PhotosController@store')->name('store.photo');
    Route::get('/photo/edit/{id}','PhotosController@edit')->name('edit.photo');
    Route::post('/photo/update/{id}','PhotosController@update')->name('update.photo');
    Route::post('/photo/search','PhotosController@search')->name('search.photo');
    Route::get('/photo/delete/{id}','PhotosController@destroy')->name('delete.photo');


    // Routes for icons
    Route::get('/icons', 'IconsController@index')->name('icons');
    Route::get('/icon/create','IconsController@create')->name('create.icon');
    Route::post('/icon/store','IconsController@store')->name('store.icon');
    Route::get('/icon/edit/{id}','IconsController@edit')->name('edit.icon');
    Route::post('/icon/update/{id}','IconsController@update')->name('update.icon');
    Route::post('/icon/search','IconsController@search')->name('search.icon');
    Route::get('/icon/delete/{id}','IconsController@destroy')->name('delete.icon');

    // Routes for inspirations
    Route::get('/inspirations', 'InspirationsController@index')->name('inspirations');
    Route::get('/inspiration/create','InspirationsController@create')->name('create.inspiration');
    Route::post('/inspiration/store','InspirationsController@store')->name('store.inspiration');
    Route::get('/inspiration/edit/{id}','InspirationsController@edit')->name('edit.inspiration');
    Route::post('/inspiration/update/{id}','InspirationsController@update')->name('update.inspiration');
    Route::post('/inspiration/search','InspirationsController@search')->name('search.inspiration');
    Route::get('/inspiration/delete/{id}','InspirationsController@destroy')->name('delete.inspiration');

    // Routes for illustrations
    Route::get('/illustrations', 'IllustrationsController@index')->name('illustrations');
    Route::get('/illustration/create','IllustrationsController@create')->name('create.illustration');
    Route::post('/illustration/store','IllustrationsController@store')->name('store.illustration');
    Route::get('/illustration/edit/{id}','IllustrationsController@edit')->name('edit.illustration');
    Route::post('/illustration/update/{id}','IllustrationsController@update')->name('update.illustration');
    Route::post('/illustration/search','IllustrationsController@search')->name('search.illustration');
    Route::get('/illustration/delete/{id}','IllustrationsController@destroy')->name('delete.illustration');

    // Routes for youtube channels
    Route::get('/channels', 'ChannelsController@index')->name('channels');
    Route::get('/channel/create','ChannelsController@create')->name('create.channel');
    Route::post('/channel/store','ChannelsController@store')->name('store.channel');
    Route::get('/channel/edit/{id}','ChannelsController@edit')->name('edit.channel');
    Route::post('/channel/update/{id}','ChannelsController@update')->name('update.channel');
    Route::post('/channel/search','ChannelsController@search')->name('search.channel');
    Route::get('/channel/delete/{id}','ChannelsController@destroy')->name('delete.channel');

    // Routes for programs
    Route::get('/programs', 'ProgramsController@index')->name('programs');
    Route::get('/program/create','ProgramsController@create')->name('create.program');
    Route::post('/program/store','ProgramsController@store')->name('store.program');
    Route::get('/program/edit/{id}','ProgramsController@edit')->name('edit.program');
    Route::post('/program/update/{id}','ProgramsController@update')->name('update.program');
    Route::post('/program/search','ProgramsController@search')->name('search.program');
    Route::get('/program/delete/{id}','ProgramsController@destroy')->name('delete.program');

    // Routes for instagrams
    Route::get('/instagrams', 'InstagramsController@index')->name('instagrams');
    Route::get('/instagram/create','InstagramsController@create')->name('create.instagram');
    Route::post('/instagram/store','InstagramsController@store')->name('store.instagram');
    Route::get('/instagram/edit/{id}','InstagramsController@edit')->name('edit.instagram');
    Route::post('/instagram/update/{id}','InstagramsController@update')->name('update.instagram');
    Route::post('/instagram/search','InstagramsController@search')->name('search.instagram');
    Route::get('/instagram/delete/{id}','InstagramsController@destroy')->name('delete.instagram');

    // Routes for about
    Route::get('/abouts', 'AboutController@index')->name('abouts');
    Route::get('/about/delete/{id}','AboutController@destroy')->name('delete.about');

});

//index
Route::get('/', 'UIController@index')->name('index');

//Resources
Route::get('/resources', 'UIController@services')->name('resources');

//Fonts
Route::get('/resources/fonts', 'UIController@fonts')->name('resources.fonts');

//Icons
Route::get('/resources/icons', 'UIController@icons')->name('resources.icons');

//Illustrations
Route::get('/resources/illustrations', 'UIController@illustrations')->name('resources.illustrations');

//Inspirations
Route::get('/resources/inspirations', 'UIController@inspirations')->name('resources.inspirations');

//Colors
Route::get('/resources/colors', 'UIController@colors')->name('resources.colors');

//Programs
Route::get('/resources/programs', 'UIController@programs')->name('resources.programs');

//Instagrams
Route::get('/resources/instagrams', 'UIController@instagrams')->name('resources.instagrams');

//Photos
Route::get('/resources/photos', 'UIController@photos')->name('resources.photos');

//Channels
Route::get('/resources/channels', 'UIController@channels')->name('resources.channels');


// Routes for about create
Route::get('/about', 'AboutController@create')->name('about');
Route::post('/about/store','AboutController@store')->name('store.about');

// Route for UI search
Route::post('/resources/search','UIController@searchContent')->name('search.resources.ui');

// Error Page
Route::get('login', 'UIController@errorPage')->name('error');
Route::get('home', 'UIController@errorPage')->name('error');