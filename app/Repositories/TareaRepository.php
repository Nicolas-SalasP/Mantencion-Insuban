<?php
namespace App\Repositories;

use App\Models\Tarea;
use App\Models\TareaFoto;
use App\Repositories\Interfaces\TareaRepositoryInterface;

class TareaRepository implements TareaRepositoryInterface
{
    protected $model;

    public function __construct(Tarea $tarea)
    {
        $this->model = $tarea;
    }

    protected function getBaseQuery()
    {
        return $this->model->with([
            'status', 
            'cliente', 
            'sucursal', 
            'tecnico', 
            'activo', 
            'fotos', 
            'insumos'
        ]);
    }

    public function getAll()
    {
        return $this->getBaseQuery()->orderBy('fecha_creacion', 'desc')->get();
    }

    public function find(int $id)
    {
        return $this->getBaseQuery()->findOrFail($id);
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

    public function attachInsumos(int $tareaId, array $insumos)
    {
        $tarea = $this->find($tareaId);
        $syncData = [];
        foreach ($insumos as $insumo) {
            $syncData[$insumo['insumo_id']] = ['cantidad_usada' => $insumo['cantidad_usada']];
        }
        return $tarea->insumos()->sync($syncData);
    }

    public function storeFoto(int $tareaId, string $path)
    {
        return TareaFoto::create([
            'tarea_id' => $tareaId,
            'url_imagen' => $path
        ]);
    }
}