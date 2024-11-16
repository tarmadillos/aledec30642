<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Models\Task;

/*Route::get('/', function () {
    return view('welcome');
});  */

Route::get('/', function () {
    return view('inicio');
    });
    
Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::delete('/tasks/{id}', [TaskController::class, 'destroy'])->name('tasks.destroy');

/*Route::get('/tasks', function () {
    $tasks = task::all();
    return view('tasks.index', ['tasks' => $tasks]);
    });   */