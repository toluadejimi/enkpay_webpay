<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\AirtimeController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VirtualAccount\VirtualController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('notify', [TransactionController::class, 'notify_webhook']);

Route::post('card-transaction', [TransactionController::class, 'card_transaction']);





Route::group(['middleware' => ['auth:api', 'acess']], function () {


    Route::post('buy-airtime',[AirtimeController::class, 'buy_airtime']);


});


Route::post('auth',[AuthController::class, 'get_token']);


Route::post('get-account',[TransactionController::class, 'get_account_details']);
Route::get('get-banks',[TransactionController::class, 'get_banks']);


Route::get('get-service',[AirtimeController::class, 'get_service']);
Route::get('get-country',[AirtimeController::class, 'get_country']);
Route::get('get-service-cost',[AirtimeController::class, 'get_service_cost']);


Route::get('get-data',[DataController::class, 'get_data']);
Route::post('buy-data',[DataController::class, 'buy_data']);




Route::get('resolve-bank',[TransactionController::class, 'resolve_bank']);
Route::post('verify',[TransactionController::class, 'verify_woo']);
Route::post('pay',[TransactionController::class, 'initialize_payment']);
Route::post('resolve',[TransactionController::class, 'resolve_deposit']);
Route::post('resolve-complete',[TransactionController::class, 'resolve_complete']);












Route::post('create-dynamic-account',[VirtualController::class, 'create_dynamic_account']);











