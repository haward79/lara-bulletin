<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BulletinController;

Route::get('/', [BulletinController::class, 'index']);
