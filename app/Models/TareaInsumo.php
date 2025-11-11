<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TareaInsumo extends Model
{
    protected $table = 'tarea_insumos';
    protected $fillable = ['tarea_id', 'insumo_id', 'cantidad_usada'];
}