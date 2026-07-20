<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\PortController;
use App\Http\Controllers\EconomyController;
use App\Http\Controllers\AdminCountryController;
use App\Http\Controllers\AdminPortController;
use App\Http\Controllers\AdminUserController;


Route::get('/', function () {
    return redirect()->route('dashboard');
});
Route::resource('/admin/ports', AdminPortController::class);


Route::middleware(['auth'])->group(function () {
    Route::resource('/admin/users', AdminUserController::class);
 
    Route::resource('/admin/countries', AdminCountryController::class);

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');


    // COUNTRIES
    Route::get('/countries', 
        [CountriesController::class, 'index']
    )->name('countries.index');


    // CURRENCY
    Route::get('/currency', 
        [CurrencyController::class, 'index']
    )->name('currency');


    // WEATHER
    Route::get('/weather', 
        [WeatherController::class, 'index']
    )->name('weather');


    // NEWS
    Route::get('/news', 
        [NewsController::class, 'index']
    )->name('news');


    // PORTS
    Route::get('/ports', 
        [PortController::class, 'index']
    )->name('ports');


    // ECONOMY
    Route::get('/economy', 
        [EconomyController::class, 'index']
    )->name('economy');

    Route::get('/economy/update', [EconomyController::class, 'updateGDP'])
    ->name('economy.update');


    // ANALYTICS
    Route::get('/analytics', 
        [AnalyticsController::class, 'index']
    )->name('analytics');

// ==========================
// ADMIN DASHBOARD
// ==========================

Route::get('/admin/dashboard', function () {

    return view('admin.dashboard');

})->name('admin.dashboard');

    // PROFILE
    Route::get('/profile', 
        [ProfileController::class, 'edit']
    )->name('profile.edit');


    Route::patch('/profile', 
        [ProfileController::class, 'update']
    )->name('profile.update');


    Route::delete('/profile', 
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');

    Route::resource(
        '/admin/countries',
        App\Http\Controllers\AdminCountryController::class
    )->middleware('auth');

    Route::get('/admin/countries',
[\App\Http\Controllers\AdminCountryController::class,'index'])
->name('countries.admin');


});


require __DIR__.'/auth.php';