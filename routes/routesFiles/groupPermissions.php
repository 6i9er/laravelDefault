<?php

Route::get('groups',[
    'as'=>'groupPermissions',
    'uses'=> 'GroupPermissionsController@index'
]);
Route::get('groups/all',[
    'as'=>'getAllGroups',
    'uses'=> 'GroupPermissionsController@getAllGroups'
]);

Route::post('groups/add',[
    'as'=>'addGroupPermission',
    'uses'=> 'GroupPermissionsController@addgroupPermission'
]);

Route::post('groups/edit',[
    'as'=>'editGroupPermission',
    'uses'=> 'GroupPermissionsController@editgroupPermission'
]);

Route::get('groups/delete',[
    'as'=>'deleteGroupPermission',
    'uses'=> 'GroupPermissionsController@deleteGroupPermission'
]);

Route::get('groups/dublicate',[
    'as'=>'dublicateGroupPermission',
    'uses'=> 'GroupPermissionsController@dublicateGroupPermission'
]);
