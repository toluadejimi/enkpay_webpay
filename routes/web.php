<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('pay', [TransactionController::class, 'webpay_view']);
Route::get('invalid', [TransactionController::class, 'invalid']);


Route::get('success', [TransactionController::class, 'success']);



Route::get('verify', [TransactionController::class, 'check_status']);
Route::get('decline', [TransactionController::class, 'decline']);


Route::get('processing', [TransactionController::class, 'processing']);






