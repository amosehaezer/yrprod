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
    // Route::get('/home', function() {
    //     if(Auth::user()->admin == 0) {
    //         return view('member.home');
    //     } else {
    //         $users['users'] = \App\User::all();
    //         return view('adminhome', $users);
    //     }
    // });
    Route::get('/home', 'HomeController@index');
    Route::get('reg-success', function() {
        return view('member.success');
    });
    // Route::resource('user', 'UserController');
    Route::get('/user/create', 'UserController@create');
    
    Route::match(['get', 'post'], 'user', 'UserController@index');
    
    Route::post('user', 'UserController@store');
    Route::get('/user/delete/{id}', 'UserController@destroy');
    Route::get('/user/total', 'UserController@totalUser');
    Route::get('/user/search', 'UserController@search');
    
});
Route::get('/user/json', 'UserController@fetchjson');
// Route::get('barcode/{id}', 'BarcodeController@show')->middleware('auth');

Route::get('/barcode{id}', function() {
    return abort(404);
});
