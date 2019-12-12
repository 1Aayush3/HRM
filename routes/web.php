<?php

// Route::get('/', 'HomeController@index')->name('home');
Route::resource('employees', 'EmployeeController');\
Route::get('/', 'EmployeeController@create');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/cr', 'EmployeeController@create');

Route::get('/index', function () {
    return view('pages.front.profile');
});
Route::resource('employees', 'EmployeeController');
Route::get('/', 'EmployeeController@create');
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
