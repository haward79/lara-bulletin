<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BulletinController;

Route::get('/', [BulletinController::class, 'index']);
Route::get('/create', [BulletinController::class, 'create']);
Route::post('/create', [BulletinController::class, 'store']);
Route::get('/{id}', [BulletinController::class, 'show']);
Route::get('/{id}/edit', [BulletinController::class, 'edit']);
Route::post('/{id}/edit', [BulletinController::class, 'update']);
Route::get('/{id}/delete', [BulletinController::class, 'delete_confirm']);
Route::post('/{id}/delete', [BulletinController::class, 'delete']);
