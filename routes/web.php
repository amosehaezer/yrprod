<?php

use App\Http\BarcodeController;
use App\Http\UserController;

Route::get('/', function () {
    return view('landing');
});
// Auth::routes();

// Verify email
Auth::routes(['verify' => true]);

// Admin Page
Route::group(['middleware' => ['web', 'auth']], function() {
    Route::get('/home', 'HomeController@index');
    Route::get('reg-success', function() {
        return view('member.success');
    });
    // Route::resource('user', 'UserController');
    Route::get('/user/create', 'UserController@create');
    
    Route::match(['get', 'post'], 'user', 'UserController@index');
    // Route::get('search-user', 'UserController@searchUser');
    // Route::get('search-category', 'UserController@searchCategory');
    
    Route::post('user', 'UserController@store');
    Route::get('/user/delete/{id}', 'UserController@destroy');
    Route::get('/user/edit/{id}', 'UserController@edit');
    Route::put('/user/edit/{id}', 'UserController@update');
    Route::get('/user/total', 'UserController@totalUser');
    
});
Route::get('/user/json', 'UserController@fetchjson');
Route::get('barcode/{id}', 'BarcodeController@show')->middleware('auth');
Route::get('/doorprize', 'UserController@doorprize')->middleware('cors', 'auth');

Route::get('/regis/menu', 'RegistrationController@menu');
Route::get('/regis/onsite', 'RegistrationController@viewOnsite');
Route::post('/onsite', 'RegistrationController@storeOnsite');

// Route::get('/barcode{id}', function() {
//     return abort(404);
// });
