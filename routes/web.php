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
    Route::get('ruangan', 'RuanganController@index')->name('ruangan.index');
    Route::get('ruangan/create', 'RuanganController@create')->name('ruangan.create');
    Route::post('ruangan/create', 'RuanganController@store')->name('ruangan.store');
    Route::get('ruangan/edit/{id}', 'RuanganController@edit')->name('ruangan.edit');
    Route::patch('ruangan/{id}', 'RuanganController@update')->name('ruangan.update');
    Route::get('ruangan/{id}', 'RuanganController@show')->name('ruangan.show');
    Route::delete('ruangan/{id}', 'RuanganController@destroy')->name('ruangan.destroy'); 
});

Route::get('image/{type}/{id}', 'FileController@image')->name('get.image');
