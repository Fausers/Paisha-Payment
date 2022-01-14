<?php

use App\Http\Controllers\Mwangaza\PostManagementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 Route::middleware('auth:api')->get('/user', function (Request $request) {
     return $request->user();
 });


Route::post('/manager/products/desc/{id}', [PostManagementController::class,'desc'])->name('post_desc');

Route::post('/manager/products/store_image/{id}', [PostManagementController::class,'uploadImage'])->name('upload_post_image');
