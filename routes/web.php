<?php

use App\Http\Controllers\KaryaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use App\Models\Karya;
use App\Models\Transaction;
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

Route::get('karyas/{type}', [KaryaController::class, 'index'])->name('karyas');
Route::get('karya/{karya}', [KaryaController::class, 'show'])->name('karya.show');
Route::get('karya/{karya}/checkout', [KaryaController::class, 'checkout'])->name('karya.checkout');
Route::get('transaction/{reference}', [TransactionController::class, 'show'])->name('transaction.show');
Route::post('transaction/store', [TransactionController::class, 'store'])->name('transaction.store');
Route::get('redirect', [TransactionController::class, 'redirect'])->name('redirect');




Route::group(['middleware' => 'auth'], function () {



    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

require __DIR__ . '/auth.php';