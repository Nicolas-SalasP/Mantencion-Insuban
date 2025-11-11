<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    use HasFactory;

    protected $table = 'tareas';

    protected $fillable = [
        'titulo',
        'descripcion',
        'informe_tecnico',
        'status_id',
        'cliente_id',
        'sucursal_id',
        'tecnico_id',
        'activo_id',
        'fecha_creacion',
        'fecha_programada',
        'fecha_culminacion',
    ];

    protected $dates = [
        'fecha_creacion',
        'fecha_programada',
        'fecha_culminacion',
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class);
    }

    public function tecnico()
    {
        return $this->belongsTo(User::class, 'tecnico_id');
    }

    public function activo()
    {
        return $this->belongsTo(Activo::class);
    }

    public function fotos()
    {
        return $this->hasMany(TareaFoto::class);
    }

    public function insumos()
    {
        return $this->belongsToMany(Insumo::class, 'tarea_insumos')
                    ->withPivot('cantidad_usada')
                    ->withTimestamps();
    }
}