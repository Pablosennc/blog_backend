<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\NoteController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get(
    '/posts',
    [PostController::class, 'index']
);

Route::post(
    '/posts',
    [PostController::class, 'store']
);

Route::get(
    '/posts/{id}',
    [PostController::class, 'show']
);

Route::put(
    '/posts/{id}',
    [PostController::class, 'update']
);


Route::delete(
    '/posts/{id}',
    [PostController::class, 'destroy']
);



Route::get('/notes', [NoteController::class, 'index']);
Route::post('/notes', [NoteController::class, 'store']);
Route::delete('/notes/{id}', [NoteController::class, 'destroy']);