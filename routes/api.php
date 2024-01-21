<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\FormEngine;
use App\Http\Controllers\HRController;
use Illuminate\Support\Facades\Route;

Route::controller(DataController::class)->group(function () {
    Route::any('fetchRecordById', 'fetchRecordById');
    Route::any('GlobalDataFetcher', 'GlobalDataFetcher');
    Route::any('VueFormfetchRecordById', 'VueFormfetchRecordById');
    Route::any('FetchClusters', 'FetchClusters');

});

Route::controller(HRController::class)->group(function () {
    Route::get('getOneEmployee', 'getOneEmployee');
    Route::get('GetDepartments', 'getDepartments');
    Route::get('GetPositions', 'getPositions');
    Route::get('GetEmployees', 'getEmployees');
    Route::get('getEmployees', 'getEmployees');
});

Route::controller(FormEngine::class)->group(function () {

    Route::any('getColumnDetails', 'getColumnDetails');

});

Route::controller(CrudController::class)->group(function () {

    Route::get('getTableColumns', 'getTableColumns')->name('getTableColumns');

    Route::post('MassDelete', 'MassDelete')->name('MassDelete');

    Route::post('MassUpdate', 'MassUpdate')->name('MassUpdate');

    Route::post('MassInsert', 'MassInsert')->name('MassInsert');
});
