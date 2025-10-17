<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // User subscription management
    Route::get('/my-subscription', [App\Http\Controllers\User\UserSubscriptionController::class, 'index'])->name('user.subscription.index');
    Route::post('/my-subscription/change-plan', [App\Http\Controllers\User\UserSubscriptionController::class, 'changePlan'])->name('user.subscription.change');
    Route::post('/my-subscription/cancel', [App\Http\Controllers\User\UserSubscriptionController::class, 'cancel'])->name('user.subscription.cancel');

    // Payment routes
    Route::post('/payment/create-preference', [PaymentController::class, 'createPreference'])->name('payment.create');
    Route::get('/payment/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/payment/failure', [PaymentController::class, 'failure'])->name('payment.failure');
    Route::get('/payment/pending', [PaymentController::class, 'pending'])->name('payment.pending');
    Route::get('/payment/sync', [PaymentController::class, 'syncPendingPayments'])->name('payment.sync');
    Route::get('/payment/force-approve', [PaymentController::class, 'forceApprovePending'])->name('payment.force-approve');
});

// MercadoPago webhook (no auth required)
Route::post('/payment/webhook', [PaymentController::class, 'webhook'])->name('payment.webhook');

// Admin routes - protected by custom 'admin' middleware
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('posts', App\Http\Controllers\Admin\AdminPostController::class);
    Route::get('/users', [App\Http\Controllers\Admin\AdminUserController::class, 'index'])->name('users.index');
});

require __DIR__.'/auth.php';
