<?php


use App\Http\Controllers\Gateway\PaymentController;
use App\Http\Controllers\Gateway\RedisController;
use Illuminate\Support\Facades\Route;


// Homepage Route
Route::group(['middleware' => ['web', 'checkblocked']], function () {
    // Tigo Payment Link
    Route::get('/tigopesa', [PaymentController::class,'generateID'])->name('tigo_pay');
    Route::post('/vodacom', [PaymentController::class,'vodacom'])->name('vodacom_pay');
    Route::get('/redis_test', [RedisController::class,'show'])->name('redis_test');
});

