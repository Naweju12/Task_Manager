<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\TaskController;

Route::get('/tasks', [TaskController::class, 'index']);
Route::get('/tasks/create', [TaskController::class, 'create']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit']);
Route::post('/tasks/{id}/update', [TaskController::class, 'update']);
Route::get('/tasks/{id}/delete', [TaskController::class, 'destroy']);
Route::get('/tasks/{id}/complete',[TaskController::class,'complete']);