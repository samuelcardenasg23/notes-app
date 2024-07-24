<?php

use App\Http\Controllers\NoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('notes', NoteController::class);

Route::put('notes/{note}/archive', [NoteController::class, 'archive']);
Route::put('notes/{note}/unarchive', [NoteController::class, 'unarchive']);
Route::get('archived-notes', [NoteController::class, 'archived']);
