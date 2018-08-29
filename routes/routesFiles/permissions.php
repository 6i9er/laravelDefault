<?php

Route::get('permissions',[
    'as'=>'permissions',
    'uses'=> 'PermissionsController@index'
]);
Route::get('permissions/all',[
    'as'=>'getAllPermissions',
    'uses'=> 'PermissionsController@getAllPermissions'
]);

Route::post('permissions/add',[
    'as'=>'addPermission',
    'uses'=> 'PermissionsController@addPermission'
]);

Route::post('permissions/edit',[
    'as'=>'editPermission',
    'uses'=> 'PermissionsController@editPermission'
]);

Route::get('permissions/delete',[
    'as'=>'deletePermission',
    'uses'=> 'PermissionsController@deletePermission'
]);

Route::get('permissions/dublicate',[
    'as'=>'dublicatePermission',
    'uses'=> 'PermissionsController@dublicatePermission'
]);
