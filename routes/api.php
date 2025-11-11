<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ClienteController;
use App\Http\Controllers\Api\V1\SucursalController;
use App\Http\Controllers\Api\V1\InsumoController;
use App\Http\Controllers\Api\V1\ActivoController;

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {
    
    Route::apiResource('clientes', ClienteController::class);
    Route::apiResource('sucursales', SucursalController::class);
    Route::apiResource('insumos', InsumoController::class);
    Route::apiResource('activos', ActivoController::class);

});