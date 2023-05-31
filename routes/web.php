<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SzavakController;
use App\Http\Controllers\TemaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [SzavakController::class, "mainView"]);
Route::get('/{temaId}', [SzavakController::class, "mainView"]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get("/szavak", [SzavakController::class, "index"]);
Route::get("/szavak/tema/{temaId}", [SzavakController::class, "showTema"]);
Route::get("/tema", [TemaController::class, "index"]);


require __DIR__.'/auth.php';
