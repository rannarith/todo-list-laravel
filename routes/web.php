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

Route::middleware(['auth'])->group(function () {
    Route::get('/', 'TodoController@index');     
    Route::post('/store', 'TodoController@store')->name('store');
    Route::get('/edit/{id}', 'TodoController@edit')->name('edit');
    Route::post('/update/{id}', 'TodoController@update')->name('update');
    Route::get('/destroy/{id}', 'TodoController@destroy')->name('destroy');
    Route::get('/updateStatus/{id}', 'TodoController@updateStatus')->name('updateStatus');

    Route::post('/sendInvitation', 'TodoController@sendInvitation')->name('sendInvitation');
    Route::get('/acceptInvitation/{id}', 'TodoController@acceptInvitation')->name('acceptInvitation');
    Route::get('/denyInvitation/{id}', 'TodoController@denyInvitation')->name('denyInvitation');
    // Route::get('/deleteCoworker/{id}', 'TodoController@deleteCoworker')->name('deleteCoworker');
    
});



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
