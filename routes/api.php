<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\
{
    AuthController,
    AdviceController,
    CourtCaseController
};

Route::group(['middleware'=>'auth:sanctum'],function (){
    Route::post('/user',[AuthController::class,'user']);
    Route::get('/logout',[AuthController::class,'logout']);
    Route::apiResource('/advices', AdviceController::class);
    Route::apiResource('/court-case', CourtCaseController::class);
});

Route::post('/login', [AuthController::class,'login']);
