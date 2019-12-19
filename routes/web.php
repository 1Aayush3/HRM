<?php

// Route::get('/', 'HomeController@index')->name('home');
Route::resource('employees', 'EmployeeController');\
Route::get('/', 'EmployeeController@create');

Auth::routes(['register' => false]);
Route::get('/index', function () {
    return view('pages.front.profile');
});
