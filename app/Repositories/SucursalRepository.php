<?php

namespace App\Repositories;

use App\Models\Sucursal;
use App\Repositories\Interfaces\SucursalRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SucursalRepository implements SucursalRepositoryInterface
{
    protected $model;

    public function __construct(Sucursal $sucursal)
    {
        $this->model = $sucursal;
    }

    public function all()
    {
        return $this->model->with('cliente')->get(); 
    }

    public function find(int $id)
    {
        return $this->model->with('cliente')->findOrFail($id);
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