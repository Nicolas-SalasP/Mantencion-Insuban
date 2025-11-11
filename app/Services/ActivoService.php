<?php

namespace App\Services;

use App\Repositories\Interfaces\ActivoRepositoryInterface;
use Illuminate\Support\Facades\Log;

class ActivoService
{
    protected $activoRepository;

    public function __construct(ActivoRepositoryInterface $activoRepository)
    {
        $this->activoRepository = $activoRepository;
    }

    public function getAllActivos()
    {
        return $this->activoRepository->all();
    }

    public function getActivoById(int $id)
    {
        return $this->activoRepository->find($id);
    }

    public function crearActivo(array $data)
    {
        Log::info('Creando nuevo activo: ' . $data['nombre']);
        return $this->activoRepository->create($data);
    }

    public function actualizarActivo(int $id, array $data)
    {
        return $this->activoRepository->update($id, $data);
    }

    public function eliminarActivo(int $id)
    {
        return $this->activoRepository->delete($id);
    }
}