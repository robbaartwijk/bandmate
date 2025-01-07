<?php

use Illuminate\Support\Facades\Route;

Route::resource('/', 'App\Http\Controllers\IndexController')->names([
    'index' => 'index.index',
]);

// Route::get('/genres/{genre}', 'App\Http\Controllers\GenreController@show')->name('genres.show');
// Route::get('/acts/{act}', 'App\Http\Controllers\ActController@show')->name('acts.show');

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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

    Route::resource('instruments', 'App\Http\Controllers\InstrumentController')->names([
        'index' => 'instruments.index',
    ]);

    Route::resource('genres', 'App\Http\Controllers\GenreController')->names([
        'index' => 'genres.index',
    ]);

    Route::resource('rehearsalrooms', 'App\Http\Controllers\RehearsalroomController')->names([
        'index' => 'rehearsalrooms.index',
    ]);

    Route::resource('users', 'App\Http\Controllers\UserController')->names([
        'index' => 'users.index',
    ]);

    Route::resource('acts', 'App\Http\Controllers\ActController')->names([
        'index' => 'acts.index',
    ]);

    Route::resource('vacancies', 'App\Http\Controllers\VacancyController')->names([
        'index' => 'vacancies.index',
    ]);

    Route::resource('venues', 'App\Http\Controllers\VenueController')->names([
        'index' => 'venues.index',
    ]);

    Route::resource('agencies', 'App\Http\Controllers\AgencyController')->names([
        'index' => 'agencies.index',
    ]);

    Route::resource('availablemusicians', 'App\Http\Controllers\AvailablemusicianController')->names([
        'index' => 'availablemusicians.index',
    ]);

    Route::get('statistics/chart1', 'App\Http\Controllers\StatisticController@chart1')->name('statistics.chart1');
    Route::get('statistics/chart2', 'App\Http\Controllers\StatisticController@chart2')->name('statistics.chart2');
    Route::get('statistics/chart3', 'App\Http\Controllers\StatisticController@chart3')->name('statistics.chart3');
    Route::get('statistics/chart4', 'App\Http\Controllers\StatisticController@chart4')->name('statistics.chart4');
    Route::get('statistics/chart5', 'App\Http\Controllers\StatisticController@chart5')->name('statistics.chart5');

    Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
    Route::get('editpassword', ['as' => 'profile.editPassword', 'uses' => 'App\Http\Controllers\ProfileController@editPassword']);
    Route::get('updatepassword', ['as' => 'profile.updatePassword', 'uses' => 'App\Http\Controllers\ProfileController@updatePassword']);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
    Route::get('userdata', ['as' => 'profile.userdata', 'uses' => 'App\Http\Controllers\ProfileController@userdata']);


});
