<?php

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
    return view('index');
});

Auth::routes([
    'register' => false, // Register route disable
    'reset' => false, // Password Reset route disable
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// author routes

Route::get('/authors', [App\Http\Controllers\AuthorsController::class, 'index'])->name('authors');
Route::get('/create-author', [App\Http\Controllers\AuthorsController::class, 'create'])->name('author_create');
Route::post('/store-author', [App\Http\Controllers\AuthorsController::class, 'store'])->name('author_store');
Route::get('/show-author/{author}', [App\Http\Controllers\AuthorsController::class, 'edit'])->name('author_show');
Route::post('/update-author/{author}', [App\Http\Controllers\AuthorsController::class, 'update'])->name('author_update');
Route::get('/delete-author/{author}', [App\Http\Controllers\AuthorsController::class, 'destroy'])->name('author_delete');

// book routes

Route::get('/books', [App\Http\Controllers\BooksController::class, 'index'])->name('books');
Route::get('/create-book', [App\Http\Controllers\BooksController::class, 'create'])->name('book_create');
Route::post('/store-book', [App\Http\Controllers\BooksController::class, 'store'])->name('book_store');
Route::get('/show-book/{book}', [App\Http\Controllers\BooksController::class, 'edit'])->name('book_show');
Route::post('/update-book/{book}', [App\Http\Controllers\BooksController::class, 'update'])->name('book_update');
Route::get('/delete-book/{book}', [App\Http\Controllers\BooksController::class, 'destroy'])->name('book_delete');

