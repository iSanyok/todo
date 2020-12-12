<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::post('/dashboard/add', [PostController::class, 'create'])->middleware(['auth'])->name('add');
Route::post('/dashboard/complete/{id}', [PostController::class, 'complete'])->middleware(['auth'])->name('complete');
Route::put('/dashboard/update/{id}', [PostController::class, 'update'])->middleware(['auth'])->name('update');
Route::delete('/dashboard/delete/{id}', [PostController::class, 'destroy'])->middleware(['auth'])->name('destroy');

require __DIR__.'/auth.php';