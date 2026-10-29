<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\books;

Route::get('/', function () {
    return view('welcome');
});

Route::get('books', [books::class, 'index']);
Route::post('books/store', [books::class, 'store']);
Route::put('books/{id}', [books::class, 'update']);
Route::delete('books/destroy/{id}', [books::class, 'destroy']);
Route::get('books/edit/{id}', [books::class, 'edit']);