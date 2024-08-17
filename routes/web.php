<?php

use App\Http\Controllers\CableController;
use App\Http\Controllers\VerifyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProxyController;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\CryptopayController;



use App\Http\Controllers\CardPaymentController;
use App\Http\Controllers\TransactionController;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

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

Route::get('get-cable-plan',[CableController::class, 'get_cable_plan']);


Route::get('payment-search', [TransactionController::class, 'payment_search']);





Route::group(['middleware' => ['auth']], function () {
    Route::get('log-viewer', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
});


Route::get('/custom-log-viewer', [LogViewerController::class, 'index']);


Route::post('session-check', [TransactionController::class, 'session_check']);



Route::post('verifypsb', [TransactionController::class, 'verifypsb']);
Route::post('verifywema', [TransactionController::class, 'verifywema']);




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
Route::get('pend-transaction', [VerifyController::class, 'pend_transaction']);
Route::get('delete-transaction', [VerifyController::class, 'delete_transaction']);


Route::get('offpalmpay', [VerifyController::class, 'offpalmpay_account']);
Route::get('onpalmpay', [VerifyController::class, 'onpalmpay_account']);
Route::get('offopay', [VerifyController::class, 'offopay_account']);
Route::get('onopay', [VerifyController::class, 'onopay_account']);
Route::get('offkuda', [VerifyController::class, 'offkuda_account']);
Route::get('onkuda', [VerifyController::class, 'onkuda_account']);

Route::get('offpro', [VerifyController::class, 'offpro_account']);
Route::get('onpro', [VerifyController::class, 'onpro_account']);


Route::post('change-support', [VerifyController::class, 'change_support']);









Route::get('pay', [TransactionController::class, 'webpay_view']);


Route::get('invalid', [TransactionController::class, 'invalid']);


Route::get('success', [TransactionController::class, 'success']);
Route::get('paid-success', [TransactionController::class, 'paid_success']);
Route::get('paid-success-boomzy', [TransactionController::class, 'paid_success_boomzy']);



Route::get('pend', [VerifyController::class, 'pending_transaction']);
Route::get('approve', [VerifyController::class, 'approve_transaction']);


Route::get('resolve', [VerifyController::class, 'resolve']);
Route::get('resolve-wema', [VerifyController::class, 'reslove_wema_view']);
Route::get('resolve-psb', [VerifyController::class, 'reslove_psb_view']);




Route::any('deposit-approve', [VerifyController::class, 'deposit_approve']);
Route::any('deposit-decline', [VerifyController::class, 'decline_approve']);
Route::any('deposit-funded', [VerifyController::class, 'deposit_funded']);
Route::any('deposit-delete', [VerifyController::class, 'deposit_delete']);
Route::any('hold-ticket', [VerifyController::class, 'hold_ticket']);
Route::any('edit-ticket', [VerifyController::class, 'edit_ticket']);
Route::any('edit-ticket', [VerifyController::class, 'edit_ticket']);
Route::any('edit-now', [VerifyController::class, 'edit_now']);











Route::get('all-issues', [VerifyController::class, 'all_request_view']);
Route::get('hold', [VerifyController::class, 'hold']);
Route::get('no-ref', [VerifyController::class, 'noref_request_view']);
Route::get('ninepsbticket', [VerifyController::class, 'ninepsb_ticket_view']);
Route::get('opayticket', [VerifyController::class, 'opay_ticket_view']);
Route::get('palmpayticket', [VerifyController::class, 'palmpay_ticket_view']);





Route::get('ref-no-credit', [VerifyController::class, 'no_credit_view']);
Route::get('wrong-amount', [VerifyController::class, 'wrong_amount_view']);
Route::get('approved', [VerifyController::class, 'approved']);
Route::post('search', [VerifyController::class, 'search']);







Route::get('open-ticket', [VerifyController::class, 'open_ticket']);






Route::any('submit-resolve', [VerifyController::class, 'submit_resolve']);


Route::any('resolve-psb-transaction', [VerifyController::class, 'reslove_psb']);
Route::any('resolve-wema-transaction', [VerifyController::class, 'reslove_wema']);





Route::any('track-request', [VerifyController::class, 'track_request_view']);
Route::any('request-order', [VerifyController::class, 'request_order']);

Route::any('payments', [TransactionController::class, 'payment_view']);
















Route::get('verify', [TransactionController::class, 'check_status']);
Route::get('verifyopay', [TransactionController::class, 'opay_check_status']);
Route::get('verifypalmpay', [TransactionController::class, 'palmpay_check_status']);
Route::get('verifykuda', [TransactionController::class, 'kuda_check_status']);
Route::get('verifyninepsb', [TransactionController::class, 'ninepsb_check_status']);
Route::get('verifywema', [TransactionController::class, 'wema_check_status']);


Route::get('validate-cable',[CableController::class, 'validate_cable']);












Route::get('decline', [TransactionController::class, 'decline']);


Route::get('processing', [TransactionController::class, 'processing']);









