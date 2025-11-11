<?php

namespace App\Services;

use App\Repositories\Interfaces\SucursalRepositoryInterface;
use Illuminate\Support\Facades\Log;

class SucursalService
{
    protected $sucursalRepository;

    public function __construct(SucursalRepositoryInterface $sucursalRepository)
    {
        $this->sucursalRepository = $sucursalRepository;
    }

    public function getAllSucursales()
    {
        return $this->sucursalRepository->all();
    }

    public function getSucursalById(int $id)
    {
        return $this->sucursalRepository->find($id);
    }

    public function crearSucursal(array $data)
    {
        Log::info('Creando nueva sucursal para el cliente ' . $data['cliente_id']);
        return $this->sucursalRepository->create($data);
    }

    public function actualizarSucursal(int $id, array $data)
    {
        return $this->sucursalRepository->update($id, $data);
    }

    public function eliminarSucursal(int $id)
    {
        return $this->sucursalRepository->delete($id);
    }
}