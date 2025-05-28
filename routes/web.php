<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// unathenticated users
Route::get('/', [CustomerController::class, 'index'])->name('welcome');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/create-customer', [CustomerController::class, 'showCreateForm'])->name('create-wallet');
    Route::post('/create-customer', [CustomerController::class, 'createCustomer'])->name('create-customer');
    // Add routes for wallet management, e.g., /wallet, /wallet/fund
});

require __DIR__.'/auth.php';
