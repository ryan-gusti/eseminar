<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
//ADMIN CONTROLLER
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\Admin\ManageUsersController as AdminManageUsers;
use App\Http\Controllers\Admin\ManageEventsController as AdminManageEvents;
use App\Http\Controllers\Admin\ManageCategoriesController as AdminManageCategories;
use App\Http\Controllers\Admin\ManageAnnouncementsController as AdminManageAnnouncements;
//PARTNER CONTROLLER
use App\Http\Controllers\Partner\DashboardPartnerController;
use App\Http\Controllers\Partner\ManageEventsController as PartnerManageEvents;
use App\Http\Controllers\Partner\ManageEventCertificateController as PartnerManageCertificate;
use App\Http\Controllers\Partner\TransactionController;
//USER CONTROLLER
use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\User\CheckoutController;
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

// Route::view('/success', 'user.success-checkout');
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/event/{slug}', [EventController::class, 'show'])->name('event');

Route::get('/category/{slug}', [EventController::class, 'category'])->name('event_category');

//socialite route
Route::get('sign-in-google', [UserController::class,'google'])->name('user.login.google');
Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::view('/user/home', 'user.dashboard')->name('user.dashboard');
    Route::get('/user/home', [DashboardUserController::class, 'index'])->name('user.dashboard');
    Route::view('/user/profile', 'pages.profile')->name('user.profile');
    Route::get('/user/ticket', [UserController::class, 'my_tickets'])->name('user.tickets');
    Route::get('/user/ticket/{event}/certificate', [UserController::class, 'my_certificate'])->name('user.certificate');
    Route::get('/profile/edit', [UserController::class, 'edit_profile'])->name('user.profile.edit');
    Route::put('/profile/update', [UserController::class, 'update_profile'])->name('user.profile.update');
    Route::get('/profile/password/edit', [UserController::class, 'edit_password'])->name('user.password.edit');
    Route::put('/profile/password/update', [UserController::class, 'update_password'])->name('user.password.update');
    Route::get('/checkout/{event:slug}', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('/checkout/{event}', [CheckoutController::class, 'store'])->name('checkout.store');
});

Route::middleware(['auth', 'verified', 'is_partner'])->name('partner.')->prefix('partner')->group(function () {
    Route::get('/home', [DashboardPartnerController::class, 'index'])->name('dashboard');
    Route::get('/events/checkSlug', [PartnerManageEvents::class, 'checkSlug'])->name('checkslug');
    Route::resource('events', PartnerManageEvents::class);
    Route::resource('events.certificate', PartnerManageCertificate::class)->shallow();
    Route::resource('events.transaction', TransactionController::class)->shallow();
});

Route::middleware(['auth', 'verified', 'is_admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/home', [DashboardAdminController::class, 'index'])->name('dashboard');
    Route::get('/events/checkSlug', [AdminManageEvents::class, 'checkSlug'])->name('checkslug');
    Route::resource('users', AdminManageUsers::class);
    Route::resource('events', AdminManageEvents::class);
    Route::get('/categories/checkSlug', [AdminManageCategories::class, 'checkSlug'])->name('checkslug');
    Route::resource('categories', AdminManageCategories::class);
    Route::resource('announcements', AdminManageAnnouncements::class);
});


require __DIR__.'/auth.php';
