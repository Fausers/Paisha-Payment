<?php

use App\Http\Controllers\Mwangaza\CategoryMGtControllrt;
use App\Http\Controllers\Mwangaza\PostController;
use App\Http\Controllers\Mwangaza\PostManagementController;
use App\Http\Controllers\Mwangaza\CategoryManagementContoller;

use App\Http\Controllers\Mwangaza\RegisterWithPhoneController;
use Illuminate\Support\Facades\Route;

// Homepage Route
Route::group(['middleware' => ['web']], function () {

    Route::get('/posts', [PostController::class,'posts'])->name('posts');

    Route::get('/posts/{category_name}', [PostController::class,'posts'])->name('category');

    Route::get('/post/{id}/{name}', [PostController::class,'post'])->name('single_post');

    Route::get('/about', [PostController::class,'about'])->name('about');
    Route::get('/archive', [PostController::class,'archive'])->name('archive');
    Route::get('/our_contacts', [PostController::class,'contacts'])->name('our_contacts');
    Route::get('/search', [PostManagementController::class, 'search'])->name('search');


    Route::post('/phone_register', [RegisterWithPhoneController::class, 'store'])->name('register_with_phone');


});


// Homepage Route
Route::group(['middleware' => ['auth']], function () {

    Route::get('/admin/posts', [PostManagementController::class,'index'])->name('admin_posts');
    Route::get('/admin/post/edit/{id}', [PostManagementController::class,'edit'])->name('admin_post');
    Route::post('/admin/posts/save', [PostManagementController::class,'store'])->name('save_post');
    Route::post('/admin/posts/update/{id}', [PostManagementController::class,'update'])->name('update_post');
    Route::get('/admin/posts/activate/{id}', [PostManagementController::class,'activatePost'])->name('activate_post');

    //category routes
    Route::get('/admin/categories', [CategoryMGtControllrt::class,'index'])->name('admin_categories');
    Route::post('/admin/save_category', [CategoryMGtControllrt::class,'create'])->name('save_category');
    Route::post('/admin/update_category/{id}', [CategoryMGtControllrt::class,'update'])->name('update_category');
    Route::get('/admin/category/{id}', [CategoryMGtControllrt::class,'destroy'])->name('delete_category');


    Route::get('/admin/posts/delete_image/{id}', [PostManagementController::class,'deleteImage'])->name('delete_image');

});
