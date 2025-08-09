<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NavigationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\MidtransWebhookController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

// ==============================
// GUEST ROUTES
// ==============================

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// ==============================
// AUTHENTICATED USER ROUTES
// ==============================

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::post('/delete-account', [AuthController::class, 'deleteAccount'])->name('delete-account');

    // Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Booking & Payment
    Route::get('/booking/{id}', [BookingController::class, 'bookingDetail'])->name('booking.show');
    Route::post('/booking/store', [BookingController::class, 'store'])->name('booking.store');
    Route::get('/payment/{vet}', [BookingController::class, 'show'])->name('payment.page');

    // Transaction History
    Route::get('/history', [BookingController::class, 'history'])->name('history');
    Route::get('/my-orders', [NavigationController::class, 'myorder'])->name('myorder.index');

    // Article
    Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');

    // Review Routes
    Route::middleware(['review'])->group(function () {
        Route::get('/review/create/{booking}', [ReviewController::class, 'create'])->name('review.create');
    });
    Route::post('/review/store', [ReviewController::class, 'store'])->name('review.store');


});

// ==============================
// GENERAL PUBLIC PAGES
// ==============================

Route::get('/', [NavigationController::class, 'home'])->name('home');
Route::get('/doctor', [NavigationController::class, 'doctors'])->name('doctor');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/aplication', [NavigationController::class, 'aplication'])->name('aplication');
Route::get('/detailArticle', [NavigationController::class, 'detailArticle'])->name('detailArticle');
Route::get('/booking/get-times/{vetDateId}', [BookingController::class, 'getTimes'])->name('booking.getTimes');
Route::post('/midtrans/webhook', [MidtransWebhookController::class, 'handle'])->name('midtrans.webhook');
Route::get('/payment/finish/{booking}', [BookingController::class, 'paymentFinish'])->name('payment.finish');


Route::any('/midtrans/test', function(HttpRequest $request) {
    Log::info('Midtrans test endpoint hit', [
        'method' => $request->method(),
        'headers' => $request->headers->all(),
        'body' => $request->all()
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'Endpoint accessible',
        'method' => $request->method(),
        'timestamp' => now()
    ], 200);
});
