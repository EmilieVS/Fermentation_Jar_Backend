<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogController;


Route::get('/post', [PostController::class,'getAllPosts']);
Route::post('/user', [UserController::class, 'register']);
Route::post('/login', [LogController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/user', [UserController::class, 'getUserData']);
    Route::put('/user',[UserController::class, 'editProfile']);
    Route::post('/logout', [LogController::class, 'logout']);
    Route::post('/post',[PostController::class,'createPost']);
    Route::get('/user/post', [PostController::class,'getUserPost']);
    Route::delete('/user', [UserController::class, 'deleteAccount']);
    // Route::post('/profile/upload', [UserController::class, 'upload']);
});



