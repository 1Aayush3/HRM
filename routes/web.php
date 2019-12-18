<?php
Route::get('/','EmployeeController@create');
Route::resource('employees', 'EmployeeController');
Route::resource('dashboard', 'DashboardController');
Auth::routes(['register' => false]);
Route::get('/home', 'HomeController@index')->name('home');
Route:: get('/profile',function(){
    $user = Designation::Find(1);
    return View('Pages.front.index',compact('user'));
});
?>
