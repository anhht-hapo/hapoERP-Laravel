<?php
Route::get('/','UserController@index');
Route::resources(['users' => 'UserController',]);
Route::prefix('ajax')->group(function () {
    Route::get('paginate', 'UserController@ajaxPaginate');
});
Route::post( '/editUser', 'BlogController@editItem' );
Route::post( '/addUser', 'BlogController@addItem' );
Route::post( '/deleteUser', 'BlogController@deleteItem' );