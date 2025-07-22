<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;


Route::post('/users',[UserController::class, 'register']);
Route::middleware('auth:sanctum')->get('/check-user', [AuthController::class, 'checkUser']); //LogController

