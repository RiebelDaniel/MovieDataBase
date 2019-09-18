<?php

Route::middleware(['auth'])->group(function () {

    Route::resource('/movie','MovieController')->except([
        'destroy', 'edit'
    ]);

    Route::post('/movieInterest','MovieController@showInterest');
    Route::post('/movie/search','MovieController@search');

    Route::resource('/user','UserController')->except([
        'edit','destroy'
    ]);

    Route::get('/',function (){
        return redirect('/movie');
    });

    Route::get('/archiv','MovieController@indexArchiv');

    Route::post('/user/password','UserController@passwordChange');

});




Route::get('/login','UserController@Login')->name('login');
Route::post('/login','UserController@LoginCheck');
Route::get('/logout','UserController@Logout');


