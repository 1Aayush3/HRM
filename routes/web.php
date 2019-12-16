<?php
Route::get('/', 'EmployeeController@create');
Route::resource('employees', 'EmployeeController');
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
