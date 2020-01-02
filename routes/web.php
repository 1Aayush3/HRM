<?php
Auth::routes(['register' => false]);
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('employees', 'EmployeeController');
    Route::resource('users', 'UserController');
    Route::resource('settings', 'SettingController');
    Route::resource('dashboard', 'DashboardController');
    Route::resource('roles', 'RoleController');
    Route::post('/import', 'ImportController@import')->name('import');
});
