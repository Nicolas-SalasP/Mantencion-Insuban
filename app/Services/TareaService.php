<?php
namespace App\Services;

use App\Repositories\Interfaces\TareaRepositoryInterface;
use App\Repositories\Interfaces\InsumoRepositoryInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class TareaService
{
    protected $tareaRepository;
    protected $insumoRepository;

    public function __construct(
        TareaRepositoryInterface $tareaRepository,
        InsumoRepositoryInterface $insumoRepository
    ) {
        $this->tareaRepository = $tareaRepository;
        $this->insumoRepository = $insumoRepository;
    }

    public function getAllTareas()
    {
        return $this->tareaRepository->getAll();
    }

    public function getTareaById(int $id)
    {
        return $this->tareaRepository->find($id);
    }

    public function crearTarea(array $data)
    {
        $tareaData = $data;
        $insumosData = $data['insumos'] ?? [];
        $fotosData = $data['fotos'] ?? [];
        unset($tareaData['insumos'], $tareaData['fotos']);

        return DB::transaction(function () use ($tareaData, $insumosData, $fotosData) {
            
            $tarea = $this->tareaRepository->create($tareaData);
            Log::info("Tarea creada con ID: {$tarea->id}");

            if (!empty($insumosData)) {
                $this->tareaRepository->attachInsumos($tarea->id, $insumosData);
                foreach ($insumosData as $insumo) {
                    $insumoModel = $this->insumoRepository->find($insumo['insumo_id']);
                    $nuevoStock = $insumoModel->stock - $insumo['cantidad_usada'];
                    $this->insumoRepository->update($insumoModel->id, ['stock' => $nuevoStock]);
                }
            }

            if (!empty($fotosData)) {
                foreach ($fotosData as $foto) {
                    $path = $foto->store('tareas', 'public'); 
                    $this->tareaRepository->storeFoto($tarea->id, $path);
                }
            }

            return $this->tareaRepository->find($tarea->id);
        });
    }

}