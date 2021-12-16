<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
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


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/event/{slug}', [EventController::class, 'show'])->name('event');

Route::get('/category/{slug}', [EventController::class, 'category'])->name('event_category');

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::get('register', function() {
    return view('auth.register');
})->name('register');
