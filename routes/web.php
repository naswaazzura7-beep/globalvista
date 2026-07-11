<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\WeatherController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/countries', [CountriesController::class, 'index'])
        ->name('countries.index');

        Route::get('/currency', [CurrencyController::class, 'index'])
        ->name('currency');

        Route::get('/weather', [WeatherController::class, 'index'])
        ->name('weather');

    Route::get('/news', function () {
        return view('news');
    })->name('news');

    Route::get('/analytics', function () {
        return view('analytics');
    })->name('analytics');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';