<?php


use App\Http\Controllers\Sms\SmsController;
use Illuminate\Support\Facades\Route;




// Homepage Route
Route::group(['middleware' => ['auth']], function () {
//    sms
//      Group
    Route::get('/manager/sms/groups', [SmsController::class,'group'])->name('groups');
    Route::post('/manager/sms/groups/save', [SmsController::class,'saveGroup'])->name('store_groups');
    Route::post('/manager/sms/groups/update/{id}', [SmsController::class,'updateGroup'])->name('update_group');
    Route::get('/manager/sms/groups/delete/{id}', [SmsController::class,'destroyGroup'])->name('destroy_group');

    //    Balance
    Route::get('/manager/sms/balance', [SmsController::class,'balance'])->name('balance');

    //    Contacts
    Route::get('/manager/sms/group/{id}/contacts', [SmsController::class,'contacts'])->name('contacts');
    Route::post('/manager/sms/group/store_contact', [SmsController::class,'storeContact'])->name('store_contact');
    Route::post('/manager/sms/group/update_contact/{id}', [SmsController::class,'updateContact'])->name('update_contact');
    Route::post('/manager/sms/group/store_excel_contact', [SmsController::class,'import'])->name('store_excel_contact');
    Route::get('/manager/sms/contact/delete/{id}', [SmsController::class,'destroyContact'])->name('destroy_contact');

    //    Contact Processing
    Route::get('/manager/sms/group/{id}/contacts/remove_space', [SmsController::class,'removeSpace'])->name('remove_space');
    Route::get('/manager/sms/group/{id}/contacts/remove_zero', [SmsController::class,'removeZero'])->name('remove_zero');
    Route::get('/manager/sms/group/{id}/contacts/remove_dead', [SmsController::class,'deleteDead'])->name('remove_dead');

    Route::get('/manager/sms/inbox', [SmsController::class,'inbox'])->name('inbox');
    Route::get('/manager/sms/outbox', [SmsController::class,'outbox'])->name('outbox');
    Route::post('/manager/sms/send_sms', [SmsController::class,'sendSMS'])->name('send_sms');
});

