<?php
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Route;

Route::get('/notes',[NotesController::class, 'index'])
->name('notes.index');

Route::get('/notes/create',[NotesController::class, 'create'])
->name('notes.create');

Route::post('/notes',[NotesController::class, 'store'])
->name('notes.store');

Route::get('/notes/{id}/edit',[NotesController::class, 'edit'])
->name('notes.edit');

Route::put('/notes/{id}',[NotesController::class, 'update'])
->name('notes.update');

Route::delete('/notes/{id}',[NotesController::class, 'destroy'])
->name('notes.destroy');