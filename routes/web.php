<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('blank');
    });

    Route::get('profile', 'ProfileController@show')->name('profile.show');
    Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
    Route::patch('profile', 'ProfileController@update')->name('profile.update');
    Route::get('password', 'ProfileController@editpassword')->name('password.show');
    Route::patch('password', 'ProfileController@storepassword')->name('password.store');
    Route::patch('profile/picture', 'ProfileController@profilePicture')->name('profile.picture');
    Route::post('users/deactivate/{id}', 'UserController@deactivate')->name('users.deactivate');
    Route::post('users/activate/{id}', 'UserController@activate')->name('users.activate');
    Route::resource('users', 'UserController');
    Route::get('dosen', 'DosenController@index')->name('dosen.index');
    Route::get('dosen/show/{id}', 'DosenController@show')->name('dosen.show');
    Route::get('dosen/edit/{id}', 'DosenController@edit')->name('dosen.edit');
    Route::patch('dosen/{id}', 'DosenController@update')->name('dosen.update');
    Route::delete('dosen/{id}', 'DosenController@destroy')->name('dosen.destroy');
    Route::get('dosen/create', 'DosenController@create')->name('dosen.create');
    Route::post('dosen/create', 'DosenController@store')->name('dosen.store');
    

});

Route::get('image/{type}/{id}', 'FileController@image')->name('get.image');
