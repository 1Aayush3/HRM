<?php
Route::get('/', 'EmployeeController@create');
Route::resource('employees', 'EmployeeController');
Route::resource('dashboard', 'DashboardController');
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
Route:: get('/profile', function () {
    return View('Pages.front.profile');
});
