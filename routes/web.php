<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.register');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->controller(TaskController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/task/create', 'create')->name('create.task');
    Route::post('/task/create', 'store')->name('store.task');
    Route::get('/task/{id}/edit', 'edit')->name('edit.task');
    Route::post('/task/{id}/update', 'update')->name('update.task');
    Route::get('/task/{id}/delete', 'destroy')->name('delete.task');
});

require __DIR__.'/auth.php';
