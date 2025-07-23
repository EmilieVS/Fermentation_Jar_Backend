<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogController;



Route::post('/users/register', [UserController::class, 'register']);
Route::post('/login', [LogController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/users', [UserController::class, 'getUserData']);
    Route::put('/users/{id}',[UserController::class, 'editProfile']);
    Route::post('/logout', [LogController::class, 'logout']);
});



// });

