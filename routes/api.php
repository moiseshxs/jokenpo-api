<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/clienteIndex', [ApiController::class,'index']);
Route::get('/clienteShow/{id}', [ApiController::class,'show']);
Route::post('/clienteStore', [ApiController::class,'store']);
Route::put('/clienteUpdate/{id}', [ApiController::class,'update']);
Route::delete('/clienteDestroy/{id}', [ApiController::class,'destroy']);
Route::post('/clienteLogin', [ApiController::class,'login']);
