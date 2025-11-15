<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/tasks', [TaskController::class, 'fetchTasks']);
Route::get('/tasks/{id}', [TaskController::class, 'fetchTaskItem']);
Route::post('/tasks', [TaskController::class, 'storeTask']);
Route::put('/tasks/{id}', [TaskController::class, 'updateTask']);
Route::delete('/tasks/{id}', [TaskController::class, 'deleteTask']);