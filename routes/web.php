<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
    
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

	Route::resource('instruments', 'App\Http\Controllers\InstrumentController')->names([
		'index' => 'instruments.index'
	]);

	Route::resource('genres', 'App\Http\Controllers\GenreController')->names([
		'index' => 'genres.index'
	]);

	Route::resource('rehearsalrooms', 'App\Http\Controllers\RehearsalroomController')->names([
		'index' => 'rehearsalrooms.index'
	]);

	Route::resource('users', 'App\Http\Controllers\UserController')->names([
		'index' => 'users.index'
	]);

	Route::resource('acts', 'App\Http\Controllers\ActController')->names([
		'index' => 'acts.index'
	]);
	
	Route::resource('vacancies', 'App\Http\Controllers\VacancyController')->names([
		'index' => 'vacancies.index'
	]);

	Route::resource('venues', 'App\Http\Controllers\VenueController')->names([
		'index' => 'venues.index'
	]);

	Route::resource('agencies', 'App\Http\Controllers\AgencyController')->names([
		'index' => 'agencies.index'
	]);

	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

