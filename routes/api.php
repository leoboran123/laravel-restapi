<?php

use App\Http\Controllers\Api\v1\CustomerController;
use App\Http\Controllers\Api\v1\InvoiceController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// api/v1
Route::group(['prefix' => 'v1', ], function() {
    Route::apiResource('customer', CustomerController::class);
    Route::apiResource('invoice', InvoiceController::class);


    Route::post('invoices/bulk', [InvoiceController::class, 'bulkStore']);
});

