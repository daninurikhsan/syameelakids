<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/tentang-kami', [App\Http\Controllers\HomeController::class, 'aboutUs'])->name('aboutUs');
Route::get('/kontak', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::get('route-cache', function(){
        \Artisan::call('route:cache');
        echo 'Run Success!';
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
    Route::resource('/package', App\Http\Controllers\PackageController::class);
});