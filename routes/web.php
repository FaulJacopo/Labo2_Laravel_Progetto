<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\AuthorController;
use \App\Http\Controllers\CategoryController;
use \App\Http\Controllers\BookController;

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

Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/books/show/{book}', [BookController::class, 'show'])->name('book.show');
Route::get('/books/add', [BookController::class, 'create'])->name('book.create');
Route::post('/books/store', [BookController::class, 'store'])->name('book.store');
Route::get('/books/edit/{book}', [BookController::class, 'edit'])->name('book.edit');
Route::put('/books/update/{book}', [BookController::class, 'update'])->name('book.update');

Route::get('/authors', [AuthorController::class, 'index'])->name('authors');
Route::get('/authors/add', [AuthorController::class, 'create'])->name('author.create');
Route::post('/authors/store', [AuthorController::class, 'store'])->name('author.store');
Route::get('/authors/edit/{author}', [AuthorController::class, 'edit'])->name('author.edit');
Route::put('/authors/update/{author}', [AuthorController::class, 'update'])->name('author.update');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/add', [CategoryController::class, 'create'])->name('category.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/categories/edit/{category}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/categories/update/{category}', [CategoryController::class, 'update'])->name('category.update');

Route::delete('/books/delete/{book}', [BookController::class, 'destroy'])->name('book.destroy');
Route::delete('/authors/delete/{author}', [AuthorController::class, 'destroy'])->name('author.destroy');
Route::delete('/categories/delete/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

