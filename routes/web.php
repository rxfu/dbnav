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

Route::get('/', function() {
    return redirect()->route('database.search');
});

Route::get('/admin', function () {
    return redirect()->route('home.index');
});

Route::get('/search', 'DatabaseController@search')->name('database.search');
Route::get('/{database}', 'DatabaseController@show')->name('database.show');

Route::prefix('admin')->group(function () {
    Auth::routes();

    Route::middleware(['auth'])->group(function () {
        Route::get('/home', 'HomeController@index')->name('home.index');
        Route::resource('database', 'DatabaseController')->except('show');
        Route::resource('user', 'UserController');
        Route::resource('subject', 'SubjectController');
        Route::resource('type', 'TypeController');
        Route::resource('language', 'LanguageController');
        Route::get('password/edit', 'PasswordController@edit')->name('password.edit');
        Route::put('password/change', 'PasswordController@change')->name('password.change');
    });
});
