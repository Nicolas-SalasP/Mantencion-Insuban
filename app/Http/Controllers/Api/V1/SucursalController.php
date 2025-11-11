<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\SucursalService;
use App\Http\Requests\StoreSucursalRequest;
use App\Http\Requests\UpdateSucursalRequest;
use Illuminate\Http\Response;

class SucursalController extends Controller
{
    protected $sucursalService;

    public function __construct(SucursalService $sucursalService)
    {
        $this->sucursalService = $sucursalService;
    }

    public function index()
    {
        $sucursales = $this->sucursalService->getAllSucursales();
        return response()->json($sucursales);
    }

    public function store(StoreSucursalRequest $request)
    {
        $sucursal = $this->sucursalService->crearSucursal($request->validated());
        return response()->json($sucursal, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $sucursal = $this->sucursalService->getSucursalById($id);
        return response()->json($sucursal);
    }

    public function update(UpdateSucursalRequest $request, $id)
    {
        $sucursal = $this->sucursalService->actualizarSucursal($id, $request->validated());
        return response()->json($sucursal);
    }

    public function destroy($id)
    {
        $this->sucursalService->eliminarSucursal($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}