<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ClienteController;

// Agrupamos bajo un prefijo V1 (Versión 1) y un namespace
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {
    
    // Esto crea automáticamente las rutas:
    // GET /api/v1/clientes
    // POST /api/v1/clientes
    // GET /api/v1/clientes/{id}
    // PUT/PATCH /api/v1/clientes/{id}
    // DELETE /api/v1/clientes/{id}
    Route::apiResource('clientes', ClienteController::class);

    // ... aquí irán las demás rutas (tareas, insumos, etc.)
});