<?php


use App\Http\Controllers\Gateway\PaymentController;
use App\Http\Controllers\Gateway\PayReferenceController;
use App\Http\Controllers\Gateway\RedisController;
use App\Http\Controllers\Gateway\VodacomController;
use Illuminate\Support\Facades\Route;


// Homepage Route
Route::group(['middleware' => ['web', 'checkblocked']], function () {
    // Tigo Payment Link
    Route::get('/tigopesa', [PaymentController::class,'generateID'])->name('tigo_pay');
    Route::post('/vodacom', [VodacomController::class,'vodacom'])->name('vodacom_pay');
    Route::get('/redis_test', [RedisController::class,'show'])->name('redis_test');

    Route::get('/payment_refs', [PayReferenceController::class,'index'])->name('payment_refs');
    Route::post('/add_payment_ref', [PayReferenceController::class,'create'])->name('add_payment_ref');
    Route::delete('/remove_payment_ref', [PayReferenceController::class,'destroy'])->name('remove_payment_ref');
});

