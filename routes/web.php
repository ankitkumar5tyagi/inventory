<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GodownController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PartyController;
use App\Http\Controllers\PartyGroupController;
use App\Http\Controllers\UomController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\VoucherEntryController;
use App\Models\Category;
use App\Models\Party;
use App\Models\VoucherEntry;
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
Route::resource('group', GroupController::class);
Route::resource('godown', GodownController::class);
Route::resource('party', PartyController::class);
Route::resource('item', ItemController::class);
Route::resource('uom', UomController::class);
Route::resource('transaction', TransactionController::class);
Route::resource('voucher', VoucherController::class);
Route::resource('voucherEntry', VoucherEntryController::class);
Route::get("addVoucherEntry", [VoucherEntryController::class, 'addVoucherEntry']);
Route::resource('partyGroup', PartyGroupController::class);
Route::get("addParty",[PartyController::class, 'addParty']);

Route::get('/export-parties', [PartyController::class, 'export'])->name('parties.export');
});


