<?php


use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;


// Homepage Route
Route::group(['middleware' => ['web', 'checkblocked']], function () {
    // Tigo Payment Link
    Route::get('/tigopesa', [PaymentController::class,'generateID'])->name('tigo_pay');
    Route::post('/vodacom', [PaymentController::class,'vodacom'])->name('vodacom_pay');
});

