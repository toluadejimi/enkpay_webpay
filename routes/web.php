<?php

use App\Http\Controllers\VerifyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProxyController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\CryptopayController;



use App\Http\Controllers\CardPaymentController;
use App\Http\Controllers\TransactionController;

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





Route::get('response', [TransactionController::class, 'card_webhook']);
Route::post('notify', [TransactionController::class, 'notify_webhook']);

Route::get('change-state', [TransactionController::class, 'change_state']);




Route::get('receipt', [TransactionController::class, 'receipt']);

Route::get('pending-pay', [TransactionController::class, 'pending_pay']);

Route::get('continue-pay', [TransactionController::class, 'continue_pay']);

Route::get('prepay', [CardPaymentController::class, 'pre_pay']);


Route::get('crypto-pay', [CryptopayController::class, 'crypto_pay']);
Route::get('crypto-price', [CryptopayController::class, 'crypto_pay_price']);



Route::get('cpay', [CryptopayController::class, 'crypto_pay_view']);





Route::get('/proxy', [ProxyController::class, 'proxy']);




//Route::match(['get', 'post'], '/botman', 'BotManController@handle');

Route::get('custom-pay', [TransactionController::class, 'custom_pay']);
Route::post('custom-pay-now', [TransactionController::class, 'custom_pay_now']);


Route::get('payment', [VerifyController::class, 'verify_view']);
Route::get('login', [VerifyController::class, 'login']);

Route::post('login-now', [VerifyController::class, 'login_now']);


Route::get('payment', [VerifyController::class, 'verify_view']);
Route::get('complete-transaction', [VerifyController::class, 'complete_transaction']);







Route::get('pay', [TransactionController::class, 'webpay_view']);
Route::get('invalid', [TransactionController::class, 'invalid']);


Route::get('success', [TransactionController::class, 'success']);



Route::get('verify', [TransactionController::class, 'check_status']);
Route::get('verifyopay', [TransactionController::class, 'opay_check_status']);
Route::get('verifypalmpay', [TransactionController::class, 'palmpay_check_status']);
Route::get('verifykuda', [TransactionController::class, 'kuda_check_status']);







Route::get('decline', [TransactionController::class, 'decline']);


Route::get('processing', [TransactionController::class, 'processing']);









