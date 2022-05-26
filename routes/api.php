<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\
{
    RoleController,
    UserController,
    AuthController,
};

Route::group(['middleware'=>'auth:sanctum'],function (){
    Route::post('/user',[AuthController::class,'user']);
    Route::post('/logout',[AuthController::class,'logout']);
    Route::apiResource('/roles', RoleController::class);
    Route::apiResource('/users', UserController::class);
    Route::post('/load-roles',[RoleController::class,'roles']);
});

Route::post('/login', [AuthController::class,'login']);
