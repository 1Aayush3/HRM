<?php
Route::get('/', 'EmployeeController@create');
Route::resource('employees', 'EmployeeController');
Route::resource('users', 'UserController');
Route::resource('settings', 'SettingController');
Route::resource('dashboard', 'DashboardController');
Route::resource('roles', 'RoleController');
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/import', 'ImportController@import')->name('import');
// Route::get('/send/email/{id}', [ 'as' => 'mail', 'uses' => 'MailController@mail']);
