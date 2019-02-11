<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('api')->group(function () {

    Route::resource('conversations', 'ConversationC', [
        'only' => ['index']
    ]);

    Route::resource('messages', 'MessageC', [
        'only' => ['index']
    ]);
    
});

