<?php

use App\Http\Controllers\callbackController;
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
// Route::get('/', function (){
//     return view('batiklanding');
// })->name('home');

Route::get('karyas/{type}', [KaryaController::class, 'index'])->name('karyas');
Route::get('karya/{karya}', [KaryaController::class, 'show'])->name('karya.show');
Route::get('karya/{karya}/checkout', [KaryaController::class, 'checkout'])->name('karya.checkout');
Route::get('transaction/{reference}', [TransactionController::class, 'show'])->name('transaction.show');
Route::post('transaction/store', [TransactionController::class, 'store'])->name('transaction.store');
Route::get('redirect/{message}', [TransactionController::class, 'redirect'])->name('redirect');
Route::post('callback', [callbackController::class, 'handle'])->name('callback');
Route::get('cek/{id}', [callbackController::class, 'cekPayment']);











Route::group(['middleware' => 'auth'], function () {

    Route::get('/karya/{id}/edit', [KaryaController::class, 'edit'])->name('karya.edit');
    Route::put('/karya/{id}', [KaryaController::class, 'update'])->name('karya.update');
    Route::delete('/karya/{id}', [KaryaController::class, 'destroy'])->name('karya.destroy');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('upload', [KaryaController::class, 'upload'])->name('upload');
    Route::post('storeKarya', [KaryaController::class, 'storeKarya'])->name('stores.karya');
});

require __DIR__ . '/auth.php';