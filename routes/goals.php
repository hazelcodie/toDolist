<?php
use App\Http\Controllers\GoalsController;
use Illuminate\Support\Facades\Route;

Route::get('/goals',[GoalsController::class, 'index'])
->name('goals.index');