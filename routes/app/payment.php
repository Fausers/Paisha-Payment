<?php


use App\Http\Controllers\Gateway\CallHomeController;
use App\Http\Controllers\Gateway\CellIdController;
use App\Http\Controllers\Gateway\PaymentController;
use App\Http\Controllers\Gateway\PayReferenceController;
use App\Http\Controllers\Gateway\PesapalController;
use App\Http\Controllers\Gateway\RedisController;
use App\Http\Controllers\Gateway\VodacomController;
use App\Http\Controllers\Gateway\AirtelController;
use Illuminate\Support\Facades\Route;


// Homepage Route
Route::group(['middleware' => ['web', 'checkblocked']], function () {
    //  Tigo Payment Link
    Route::get('/tigopesa', [PaymentController::class,'generateID'])->name('tigo_pay');
    
    Route::post('/airtel', [AirtelController::class,'index'])->name('aitel');

    Route::post('/pesapal', [PesapalController::class,'index'])->name('pesapal');
    Route::post('/pesapal_save', [PesapalController::class,'save'])->name('pesapal_save');

    Route::post('/vodacom', [VodacomController::class,'vodacom'])->name('vodacom_pay');
    Route::get('/redis_test', [RedisController::class,'show'])->name('redis_test');

    Route::get('/payment_refs', [PayReferenceController::class,'index'])->name('payment_refs');
    Route::post('/add_payment_ref', [PayReferenceController::class,'create'])->name('add_payment_ref');
    Route::delete('/remove_payment_ref', [PayReferenceController::class,'destroy'])->name('remove_payment_ref');

    //  Call Home
    Route::post('/call_home', [CallHomeController::class,'index'])->name('call_home');
    Route::post('/add_ip', [CallHomeController::class,'updateIP'])->name('add_ip');
    Route::post('/add_cellId', [CellIdController::class,'addCellID'])->name('add_cellId');
});

