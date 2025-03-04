<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/tasks', [TodoController::class,'index'])
->name('todolist.index');

Route::get('/home', function(){
    return view('home');
})->name('home');

Route::get('/goals', function(){
    return view('goals');
})->name('todolist.goals');

Route::get('/notes', function(){
    return view('notes');
})->name('todolist.notes');

Route::get('/todo/create',[TodoController::class, 'create'])
->name('todolist.create');

Route::post('/todo', [TodoController::class, 'store'])
->name('todolist.store');

require __DIR__.'/auth.php';
