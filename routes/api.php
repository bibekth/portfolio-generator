<?php

use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::as('api.')->group(function(){
    Route::get('/get-data',[ApiController::class,'getData'])->name('get.data');
    Route::post('/store-data',[ApiController::class,'storeData'])->name('store.data');
    Route::delete('/delete-data',[ApiController::class,'deleteData'])->name('delete.data');
});
