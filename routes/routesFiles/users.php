<?php

Route::get('users',[
    'as'=>'users',
    'uses'=> 'UserController@index'
]);
Route::get('users/all',[
    'as'=>'getAllUsers',
    'uses'=> 'UserController@getAllUsers'
]);

Route::post('users/add',[
    'as'=>'saveUser',
    'uses'=> 'UserController@saveUser'
]);

Route::post('users/edit',[
    'as'=>'editUser',
    'uses'=> 'UserController@editUser'
]);

Route::post('login',[
    'as'=>'login',
    'uses'=> 'LoginController@login'
]);

Route::get('first-login',[
    'as'=>'firstLogin',
    'uses'=> 'UserController@firstLogin'
]);

Route::post('submit-first-login',[
    'as'=>'submitFirstLogin',
    'uses'=> 'UserController@submitFirstLogin'
]);

Route::get('user-logout',[
    'as'=>'userLogout',
    'uses'=> 'Auth\LoginController@Logout'
]);

Route::get('user-reset-password/{uuid}',[
    'as'=>'resetPassword',
    'uses'=> 'UserController@resetPassword'
]);

Route::post('get-user-data',[
    'as'=>'getUserData',
    'uses'=> 'UserController@getUserData'
]);


