<?php

namespace App\Repositories;

use App\Models\Insumo;
use App\Repositories\Interfaces\InsumoRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class InsumoRepository implements InsumoRepositoryInterface
{
    protected $model;

    public function __construct(Insumo $insumo)
    {
        $this->model = $insumo;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find(int $id)
    {
        return $this->model->findOrFail($id);
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