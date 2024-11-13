<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('bands', App\Http\Controllers\BandController::class);
Route::resource('instruments', App\Http\Controllers\InstrumentController::class);
Route::resource('artists', App\Http\Controllers\ArtistController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
    