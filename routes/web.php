<?php
Route::get('/','UserController@index');
Route::resources(['users' => 'UserController',]);