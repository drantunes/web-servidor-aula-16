<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::get('/{tag?}', [JobController::class, 'index']);
Route::get('/job/create', [JobController::class, 'create']);
Route::get('/job/{id}', [JobController::class, 'show']);
Route::post('/job/store', [JobController::class, 'store']);
