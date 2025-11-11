<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TareaFoto extends Model
{
    protected $table = 'tarea_fotos';
    protected $fillable = ['tarea_id', 'url_imagen'];
}