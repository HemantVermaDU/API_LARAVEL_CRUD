<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('product/add',[ProductController::class, 'add']);
Route::get('product/{id}/show',[ProductController::class, 'show']);
Route::get('products',[ProductController::class, 'showall']);
Route::put('product/{id}/update',[ProductController::class, 'update']);
Route::delete('product/{id}/delete',[ProductController::class, 'delete']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
