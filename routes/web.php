<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoaController;
use App\Http\Controllers\CategoryController;
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
    return view('layouts.master');
});

Route::get('/categories',[CategoryController::class,'index']);
Route::post('/categories/store',[CategoryController::class,'store']);
Route::put('/categories/update/{id_category}',[CategoryController::class,'update']);
Route::delete('/categories/delete/{id_category}',[CategoryController::class,'destroy']);

Route::get('/chartofaccounts',[CoaController::class,'index']);
Route::get('/chartofaccounts/create',[CoaController::class,'create']);
Route::post('/chartofaccounts/store',[CoaController::class,'store']);
Route::get('/chartofaccounts/edit/{id_coa}',[CoaController::class,'edit']);
Route::put('/chartofaccounts/update/{id_coa}',[CoaController::class,'update']);
Route::delete('/chartofaccounts/delete/{id_coa}',[CoaController::class,'destroy']);

Route::get('/transactions',[TransactionController::class,'index']);
Route::get('/transactions/create',[TransactionController::class,'create']);
Route::post('/transactions/store',[TransactionController::class,'store']);
Route::get('/transactions/edit/{id_transaction}',[TransactionController::class,'edit']);
Route::put('/transactions/update/{id_transaction}',[TransactionController::class,'update']);

