<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->get('/books',[App\Http\Controllers\BooksController::class, 'books'])->name('api_books');

Route::middleware('auth:api')->get('/authors',[App\Http\Controllers\AuthorsController::class, 'apiAuthors'])->name('api_authors');
Route::middleware('auth:api')->get('/author/{author}',[App\Http\Controllers\AuthorsController::class, 'apiGetAuthor'])->name('api_get_author');