<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\
{
    AuthController,
    AdviceController,
    CourtCaseController,
    DocumentVettigController,
    ComplaintsRedressalController,
    BlacklistingController,
    ViolationExaminationController,
    DocumentUploadingController,
    AccountController,
    TrainingController,
    ProcuringAgencyController,
    TenderFeeController,
    InspectionController,
};

Route::group(['middleware'=>'auth:sanctum'],function (){
    Route::post('/user',[AuthController::class,'user']);
    Route::post('/logout',[AuthController::class,'logout']);
    Route::apiResource('/advices', AdviceController::class);
    Route::apiResource('/court-cases', CourtCaseController::class);
    Route::apiResource('/document-vettings', DocumentVettigController::class);
    Route::apiResource('/complaints-redressals', ComplaintsRedressalController::class);
    Route::apiResource('/blacklistings', BlacklistingController::class);
    Route::apiResource('/violation-examinations', ViolationExaminationController::class);
    Route::apiResource('/documents-uploadings', DocumentUploadingController::class);
    Route::apiResource('/accounts', AccountController::class);
    Route::apiResource('/trainings', TrainingController::class);
    Route::apiResource('/procuring-agencies', ProcuringAgencyController::class);
    Route::apiResource('/tender-fees', TenderFeeController::class);
    Route::apiResource('/inspections', InspectionController::class);
});

Route::post('/login', [AuthController::class,'login']);
