<?php
namespace App\Repositories\Interfaces;

interface TareaRepositoryInterface
{
    public function getAll();
    public function find(int $id);
    public function create(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
    public function attachInsumos(int $tareaId, array $insumos);
    public function storeFoto(int $tareaId, string $path);
}