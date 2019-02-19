<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profile','ProfileC@edit')->name('profile');
Route::post('/profile','ProfileC@update')->name('profile.update');


Route::prefix('api')->group(function () {

    Route::get('conversations', 'ConversationC@index');

    Route::get('messages', 'MessageC@index');
    Route::post('messages/store','MessageC@store');
    
});

