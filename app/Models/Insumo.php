<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insumo extends Model
{
    use HasFactory;

    protected $table = 'insumos';

    protected $fillable = [
        'producto',
        'sku',
        'descripcion',
        'marca',
        'stock',
        'unidad',
    ];

    public function tareas()
    {
        return $this->belongsToMany(Tarea::class, 'tarea_insumos')
                    ->withPivot('cantidad_usada')
                    ->withTimestamps();
    }
}