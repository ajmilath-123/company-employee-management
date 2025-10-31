<?php

    use App\Http\Controllers\Api\AuthenticationController;
    use App\Http\Controllers\Api\CompanyController;
    use App\Http\Controllers\Api\EmployeeController;
    use Illuminate\Support\Facades\Route;

    Route::post('/login', [AuthenticationController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/companies', [CompanyController::class, 'index']);  
        Route::post('/companies', [CompanyController::class, 'store']);  
        Route::get('/companies/{id}', [CompanyController::class, 'show']);
        Route::put('/companies/{company}', [CompanyController::class, 'update']);
        Route::delete('/companies/{company}', [CompanyController::class, 'destroy']);  
        Route::get('/employees', [EmployeeController::class, 'index']);
        Route::post('/employees', [EmployeeController::class, 'store']);
        Route::get('/employees/{id}', [EmployeeController::class, 'show']);
        Route::put('/employees/{employee}', [EmployeeController::class, 'update']);
        Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy']); 
        Route::post('/logout', [AuthenticationController::class, 'logout']); 
});
