<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\MusicaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//ROTAS DE CLIENTE
Route::get('/clienteIndex', [ApiController::class, 'index']);
Route::get('/clienteShow/{id}', [ApiController::class, 'show']);
Route::post('/clienteStore', [ApiController::class, 'store']);
Route::put('/clienteUpdate/{id}', [ApiController::class, 'update']);
Route::delete('/clienteDestroy/{id}', [ApiController::class, 'destroy']);
Route::post('/clienteLogin', [ApiController::class, 'login']);

//ROTA DE ALBUM
Route::get('/albumIndex', [AlbumController::class, 'index']);
Route::get('/albumShow/{id}', [AlbumController::class, 'show']);
Route::post('/albumStore', [AlbumController::class, 'store']);
Route::put('/albumUpdate/{id}', [AlbumController::class, 'update']);
Route::delete('/albumDestroy/{id}', [AlbumController::class, 'destroy']);

//ROTAS DE ARTISTA
Route::get('/artistaIndex', [ArtistaController::class, 'index']);
Route::get('/artistaShow/{id}', [ArtistaController::class, 'show']);
Route::post('/artistaStore', [ArtistaController::class, 'store']);
Route::put('/artistaUpdate/{id}', [ArtistaController::class, 'update']);
Route::delete('/artistaDestroy/{id}', [ArtistaController::class, 'destroy']);

//ROTAS DA MUSICA
Route::get('/musicaIndex', [MusicaController::class, 'index']);
Route::get('/musicaShow/{id}', [MusicaController::class, 'show']);
Route::post('/musicaStore', [MusicaController::class, 'store']);
Route::put('/musicaUpdate/{id}', [MusicaController::class, 'update']);
Route::delete('/musicaDestroy/{id}', [MusicaController::class, 'destroy']);
