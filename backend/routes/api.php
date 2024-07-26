<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\CategoryController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('notes', NoteController::class);

Route::put('notes/{note}/archive', [NoteController::class, 'archive']);
Route::put('notes/{note}/unarchive', [NoteController::class, 'unarchive']);
Route::get('archived-notes', [NoteController::class, 'archived']);

Route::apiResource('categories', CategoryController::class);
Route::get('notes/filter/{category_id}', [NoteController::class, 'filterByCategory']);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
