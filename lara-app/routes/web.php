<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BulletinController;

Route::get('/', [BulletinController::class, 'index']);
Route::get('/create', [BulletinController::class, 'create'])->middleware('auth');
Route::post('/create', [BulletinController::class, 'store'])->middleware('auth');
Route::get('/{id}', [BulletinController::class, 'show'])->whereNumber('id');
Route::get('/{id}/edit', [BulletinController::class, 'edit'])->middleware('auth')->whereNumber('id');
Route::post('/{id}/edit', [BulletinController::class, 'update'])->middleware('auth')->whereNumber('id');
Route::get('/{id}/delete', [BulletinController::class, 'delete_confirm'])->middleware('auth')->whereNumber('id');
Route::post('/{id}/delete', [BulletinController::class, 'delete'])->middleware('auth')->whereNumber('id');

Route::get('/dashboard', function () {
    return redirect('/');
    // return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
