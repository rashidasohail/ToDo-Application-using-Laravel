<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', [TodoController::class, 'index'])->name('todos.index');
// Route::get('create', [TodoController::class, 'create']);
// Route::post('store', [TodoController::class, 'store'])->name('todos.store');

Route::controller(TodoController::class)->group(function () {
    Route::get('/', 'index')->name('todos.index');
    Route::get('create', 'create')->name('todos.create');
    Route::post('store', 'store')->name('todos.store');
    Route::get('show/{id}', 'show')->name('todos.show');
    Route::get('edit/{id}', 'edit')->name('todos.edit');
    Route::put('update/{id}', 'update')->name('todos.update');
    Route::delete('destroy/{id}', 'destroy')->name('todos.destroy');



});
