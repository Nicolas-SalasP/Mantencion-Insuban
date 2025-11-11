<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\ClienteService;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use Illuminate\Http\Response;

class ClienteController extends Controller
{
    protected $clienteService;

    public function __construct(ClienteService $clienteService)
    {
        $this->clienteService = $clienteService;
    }

    public function index()
    {
        $clientes = $this->clienteService->getAllClientes();
        return response()->json($clientes);
    }

    public function store(StoreClienteRequest $request)
    {
        $cliente = $this->clienteService->crearCliente($request->validated());
        return response()->json($cliente, Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $cliente = $this->clienteService->getClienteById($id);
        return response()->json($cliente);
    }

    public function update(UpdateClienteRequest $request, $id)
    {
        $cliente = $this->clienteService->actualizarCliente($id, $request->validated());
        return response()->json($cliente);
    }

    public function destroy($id)
    {
        $this->clienteService->eliminarCliente($id);
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}