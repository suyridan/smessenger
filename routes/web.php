<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('api')->group(function () {

    Route::get('conversations', 'ConversationC@index');

    Route::get('messages', 'MessageC@index');
    Route::post('messages/store','MessageC@store');
    
});

