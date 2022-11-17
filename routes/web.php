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
Route::get('/privat/{slug}', [App\Http\Controllers\HomeController::class, 'programDetail'])->name('program.detail');

Auth::routes();

Route::get('route-cache', function(){
    \Artisan::call('route:cache');
    echo 'Run Success!';
});

Route::get('key-generate', function(){
    \Artisan::call('key:generate');
    echo 'Run Success!';
});

Route::get('db-migrate', function(){
    \Artisan::call('migrate');
    echo 'Run Success!';
});

Route::middleware(['auth'])->group(function(){
    Route::get('/access-storage-link', function(){
        $process = new Process('chmod -R 775 storage/');
        $process->run();
    });
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
    Route::resource('/program', App\Http\Controllers\ProgramController::class);
    Route::resource('/teacher', App\Http\Controllers\TeacherController::class);
    Route::resource('/testimonial', App\Http\Controllers\TestimonialController::class);
});