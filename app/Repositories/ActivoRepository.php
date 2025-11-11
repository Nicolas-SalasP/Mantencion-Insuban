<?php

namespace App\Repositories;

use App\Models\Activo;
use App\Repositories\Interfaces\ActivoRepositoryInterface;

class ActivoRepository implements ActivoRepositoryInterface
{
    protected $model;

    public function __construct(Activo $activo)
    {
        $this->model = $activo;
    }

    public function all()
    {
        return $this->model->with(['cliente', 'sucursal'])->get();
    }

    public function find(int $id)
    {
        return $this->model->with(['cliente', 'sucursal'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data)
    {
        $model = $this->find($id);
        $model->update($data);
        return $model;
    }

    public function delete(int $id)
    {
        $model = $this->find($id);
        return $model->delete();
    }
}