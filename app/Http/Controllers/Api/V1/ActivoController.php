<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\ActivoService;
use App\Http\Requests\StoreActivoRequest;
use App\Http\Requests\UpdateActivoRequest;
use Illuminate\Http\Response;

class ActivoController extends Controller
{
    protected $activoService;

    public function __construct(ActivoService $activoService)
    {
        $this->activoService = $activoService;
    }

    public function index()
    {
        $activos = $this->activoService->getAllActivos();
        return response()->json($activos);
    }

    public function store(StoreActivoRequest $request)
    {
        $activo = $this->activoService->crearActivo($request->validated());
        return response()->json($activo, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $activo = $this->activoService->getActivoById($id);
        return response()->json($activo);
    }

    public function update(UpdateActivoRequest $request, $id)
    {
        $activo = $this->activoService->actualizarActivo($id, $request->validated());
        return response()->json($activo);
    }

    public function destroy($id)
    {
        $this.activoService->eliminarActivo($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}