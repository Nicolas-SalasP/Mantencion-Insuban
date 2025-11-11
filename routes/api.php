<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ClienteController;
use App\Http\Controllers\Api\V1\SucursalController;

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {
    
    Route::apiResource('clientes', ClienteController::class);
    Route::apiResource('sucursales', SucursalController::class);


});