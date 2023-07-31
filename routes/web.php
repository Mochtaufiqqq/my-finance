<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
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

// Route::get('/', function () {
//     return view('layouts.master');
// });

// Route::get('/',[HomeController::class,'index']);

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index']);
    Route::post('/store', [CategoryController::class, 'store']);
    Route::put('/update/{id_category}', [CategoryController::class, 'update']);
    Route::delete('/delete/{id_category}', [CategoryController::class, 'destroy']);
});

Route::prefix('chartofaccounts')->group(function () {
    Route::get('/', [CoaController::class, 'index']);
    Route::get('/create', [CoaController::class, 'create']);
    Route::post('/store', [CoaController::class, 'store']);
    Route::get('/edit/{id_coa}', [CoaController::class, 'edit']);
    Route::put('/update/{id_coa}', [CoaController::class, 'update']);
    Route::delete('/delete/{id_coa}', [CoaController::class, 'destroy']);
});

Route::prefix('transactions')->group(function () {
    Route::get('/', [TransactionController::class, 'index']);
    Route::get('/create', [TransactionController::class, 'create']);
    Route::post('/store', [TransactionController::class, 'store']);
    Route::get('/edit/{id_transaction}', [TransactionController::class, 'edit']);
    Route::put('/update/{id_transaction}', [TransactionController::class, 'update']);
    Route::delete('/delete/{id_transaction}', [TransactionController::class, 'destroy']);
    Route::get('/trash', [TransactionController::class, 'trash']);
    Route::delete('/trash/delete/{id_transaction}', [TransactionController::class, 'forceDelete']);
    Route::put('/trash/restore/{id_transaction}',[TransactionController::class,'restore']);

});


Route::get('/reports',[ReportController::class,'index']);
Route::post('/reports/getreports',[ReportController::class,'getReport']);