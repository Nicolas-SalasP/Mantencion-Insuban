<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\InsumoService;
use App\Http\Requests\StoreInsumoRequest;
use App\Http\Requests\UpdateInsumoRequest;
use Illuminate\Http\Response;

class InsumoController extends Controller
{
    protected $insumoService;

    public function __construct(InsumoService $insumoService)
    {
        $this->insumoService = $insumoService;
    }

    public function index()
    {
        $insumos = $this->insumoService->getAllInsumos();
        return response()->json($insumos);
    }

    public function store(StoreInsumoRequest $request)
    {
        $insumo = $this->insumoService->crearInsumo($request->validated());
        return response()->json($insumo, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $insumo = $this->insumoService->getInsumoById($id);
        return response()->json($insumo);
    }

    public function update(UpdateInsumoRequest $request, $id)
    {
        $insumo = $this->insumoService->actualizarInsumo($id, $request->validated());
        return response()->json($insumo);
    }

    public function destroy($id)
    {
        $this->insumoService->eliminarInsumo($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}