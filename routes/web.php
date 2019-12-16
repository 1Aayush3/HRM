<?php
Route::get('/', 'EmployeeController@create');
Route::resource('employees', 'EmployeeController');
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/details', function () {
    return view('Pages.front.profile');
});
