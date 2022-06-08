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
    AttributeController,
    AttributeValueController,
};

Route::group(['middleware'=>'auth:sanctum'],function (){
    Route::post('/user',[AuthController::class,'user']);
    Route::post('/logout',[AuthController::class,'logout']);

    /* Start: load definitions */
    Route::post('/load-roles',[RoleController::class,'roles']);
    Route::post('/load-categories',[CategoryController::class,'categories']);
    /* End: load definitions */

    Route::apiResource('/roles', RoleController::class);
    Route::apiResource('/users', UserController::class);
    Route::apiResource('/units', UnitController::class);
    Route::apiResource('/colors', ColorController::class);
    Route::apiResource('/categories', CategoryController::class);
    Route::apiResource('/sub-categories', SubCategoryController::class);
    Route::apiResource('/attributes', AttributeController::class);
    Route::apiResource('/attributes.attribute-values', AttributeValueController::class);

});

Route::post('/login', [AuthController::class,'login']);
