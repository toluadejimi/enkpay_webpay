<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\CardPaymentController;


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





Route::get('receipt', [TransactionController::class, 'receipt']);

Route::get('pending-pay', [TransactionController::class, 'pending_pay']);

Route::get('continue-pay', [TransactionController::class, 'continue_pay']);

Route::get('prepay', [CardPaymentController::class, 'pre_pay']);







//Route::match(['get', 'post'], '/botman', 'BotManController@handle');

Route::get('custom-pay', [TransactionController::class, 'custom_pay']);
Route::post('custom-pay-now', [TransactionController::class, 'custom_pay_now']);


Route::get('pay', [TransactionController::class, 'webpay_view']);
Route::get('invalid', [TransactionController::class, 'invalid']);


Route::get('success', [TransactionController::class, 'success']);



Route::get('verify', [TransactionController::class, 'check_status']);
Route::get('decline', [TransactionController::class, 'decline']);


Route::get('processing', [TransactionController::class, 'processing']);









