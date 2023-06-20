<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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



Route::post('get-account',[TransactionController::class, 'get_account_details']);
Route::get('get-banks',[TransactionController::class, 'get_banks']);

Route::post('resolve-bank',[TransactionController::class, 'resolve_bank']);


Route::post('verify-woo',[TransactionController::class, 'verify_woo']);



Route::post('create-dynamic-account',[VirtualController::class, 'create_dynamic_account']);











