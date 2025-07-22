<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\UserController;


// Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/users/register', [UserController::class, 'register']);
    Route::get('/users/{id}', [UserController::class, 'getUserData']);

// });

