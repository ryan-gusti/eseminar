<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthPartnerController;
use App\Http\Controllers\PartnerController;
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

//socialite route
Route::get('sign-in-google', [UserController::class,'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/user/home', 'user.dashboard')->name('user.dashboard');
    Route::view('/user/profile', 'menu.profile')->name('user.profile');
    Route::get('/profile/edit', [UserController::class, 'edit_profile'])->name('user.profile.edit');
    Route::put('/profile/update', [UserController::class, 'update_profile'])->name('user.profile.update');
    Route::get('/profile/password/edit', [UserController::class, 'edit_password'])->name('user.password.edit');
    Route::put('/profile/password/update', [UserController::class, 'update_password'])->name('user.password.update');
});

Route::middleware(['auth', 'verified', 'is_partner'])->group(function () {
    // Route::get('partner/dashboard', function () {
    //     return 'ini dashboard';
    // });
    Route::view('/partner/home', 'partner.dashboard')->name('partner.dashboard');
    Route::get('/partner/create-event', [EventController::class, 'create_event'])->name('partner.create-event');
        Route::get('/partner/list-event', [EventController::class, 'list_event'])->name('partner.list-event');
    Route::post('/partner/create-event', [EventController::class, 'store_event'])->name('partner.store-event');
    Route::get('/partner/event/checkSlug', [EventController::class, 'checkSlug']);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
