<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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

Route::get('/', [BookController::class,'show'])->name('book_show');

Route::get('add_book', [BookController::class,'index'])->name('book_add');
Route::post('add_book', [BookController::class,'store'])->name('book_store');

Route::get('search_book', [BookController::class,'search'])->name('book_search');
Route::post('search_book', [BookController::class,'issue'])->name('book_issue');

Route::get('/edit/{id}', [BookController::class,'edit'])->name('edit');
Route::delete('/delete/{id}', [BookController::class,'delete'])->name('delete');
Route::post('/edit/{id}', [BookController::class,'update'])->name('update');
