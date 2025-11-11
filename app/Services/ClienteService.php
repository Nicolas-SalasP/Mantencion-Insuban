<?php

namespace App\Services;

use App\Repositories\Interfaces\ClienteRepositoryInterface;
use Illuminate\Support\Facades\Log;

class ClienteService
{
    protected $clienteRepository;

    public function __construct(ClienteRepositoryInterface $clienteRepository)
    {
        $this->clienteRepository = $clienteRepository;
    }

    public function getAllClientes()
    {
        return $this->clienteRepository->all();
    }

    public function getClienteById(int $id)
    {
        return $this->clienteRepository->find($id);
    }

    public function crearCliente(array $data)
    {
        Log::info('Creando un nuevo cliente...');
        
        return $this->clienteRepository->create($data);
    }

    public function actualizarCliente(int $id, array $data)
    {
        return $this->clienteRepository->update($id, $data);
    }

    public function eliminarCliente(int $id)
    {
        return $this->clienteRepository->delete($id);
    }
}