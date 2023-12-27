<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\FormEngine;
use App\Http\Controllers\HRController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::controller(HRController::class)->group(function () {
    Route::get('GetDepartments', 'getDepartments');
    Route::get('GetPositions', 'getPositions');
    Route::get('GetEmployees', 'getEmployees');
});


Route::controller(FormEngine::class)->group(function () {

    Route::any('getColumnDetails', 'getColumnDetails');

});

Route::controller(CrudController::class)->group(function () {

    Route::post('MassDelete', 'MassDelete')->name('MassDelete');

    Route::post('MassUpdate', 'MassUpdate')->name('MassUpdate');

    Route::post('MassInsert', 'MassInsert')->name('MassInsert');
});
