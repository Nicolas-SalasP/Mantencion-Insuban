<?php
namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\TareaService;
use App\Http\Requests\StoreTareaRequest;
use App\Http\Requests\UpdateTareaRequest;
use Illuminate\Http\Response;

class TareaController extends Controller
{
    protected $tareaService;

    public function __construct(TareaService $tareaService)
    {
        $this->tareaService = $tareaService;
    }

    public function index()
    {
        $tareas = $this->tareaService->getAllTareas();
        return response()->json($tareas);
    }

    public function store(StoreTareaRequest $request)
    {
        try {
            $tarea = $this->tareaService->crearTarea($request->validated());
            return response()->json($tarea, Response::HTTP_CREATED);
        } catch (\Exception $e) {
            // Si la transacción falla
            return response()->json(['message' => 'Error al crear la tarea: ' . $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $tarea = $this->tareaService->getTareaById($id);
        return response()->json($tarea);
    }

}