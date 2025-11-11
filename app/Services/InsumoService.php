<?php

namespace App\Services;

use App\Repositories\Interfaces\InsumoRepositoryInterface;
use Illuminate\Support\Facades\Log;

class InsumoService
{
    protected $insumoRepository;

    public function __construct(InsumoRepositoryInterface $insumoRepository)
    {
        $this->insumoRepository = $insumoRepository;
    }

    public function getAllInsumos()
    {
        return $this->insumoRepository->all();
    }

    public function getInsumoById(int $id)
    {
        return $this->insumoRepository->find($id);
    }

    public function crearInsumo(array $data)
    {
        Log::info('Creando nuevo insumo: ' . $data['producto']);

        $data['stock'] = $data['stock'] ?? 0;
        $data['unidad'] = $data['unidad'] ?? 'unidad';

        return $this->insumoRepository->create($data);
    }

    public function actualizarInsumo(int $id, array $data)
    {
        return $this->insumoRepository->update($id, $data);
    }

    public function eliminarInsumo(int $id)
    {
        return $this->insumoRepository->delete($id);
    }

}