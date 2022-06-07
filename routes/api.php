<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\
{
    RoleController,
    UserController,
    AuthController,
    UnitController,
    ColorController,
    CategoryController,
    SubCategoryController,
};

Route::group(['middleware'=>'auth:sanctum'],function (){
    Route::post('/user',[AuthController::class,'user']);
    Route::post('/logout',[AuthController::class,'logout']);
    Route::apiResource('/roles', RoleController::class);
    Route::apiResource('/users', UserController::class);
    Route::post('/load-roles',[RoleController::class,'roles']);
    Route::apiResource('/units', UnitController::class);
    Route::apiResource('/colors', ColorController::class);
    Route::apiResource('/categories', CategoryController::class);
    Route::apiResource('/sub-categories', SubCategoryController::class);
    Route::post('/load-categories',[CategoryController::class,'categories']);

});

Route::post('/login', [AuthController::class,'login']);
