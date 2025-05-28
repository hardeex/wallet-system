<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


// unathenticated users
Route::get('/', [CustomerController::class, 'index'])->name('welcome');


// authenticated and verified users routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [CustomerController::class, 'dashboard'])->name('dashboard');
    Route::get('/create-customer', [CustomerController::class, 'showCreateForm'])->name('create-wallet');
    Route::post('/create-customer', [CustomerController::class, 'createCustomer'])->name('create-customer');
 });
   

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// authenticated but not verified routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// wallet operation for authenticated users
// Route::middleware('auth')->group(function () {
//     Route::get('/create-customer', [CustomerController::class, 'showCreateForm'])->name('create-wallet');
//     Route::post('/create-customer', [CustomerController::class, 'createCustomer'])->name('create-customer');
   
// });

require __DIR__.'/auth.php';
