<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\SupplierController;
use App\Models\Category;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function(){

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

});

Route::middleware('auth')->group(function(){

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('category' , CategoryController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('consumer', ConsumerController::class);

Route::get('/export-suppliers', [SupplierController::class, 'export'])->name('suppliers.export');

});


