<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'statuses';
    protected $fillable = ['nombre', 'color'];
    
    public function tareas()
    {
        return $this->hasMany(Tarea::class);
    }
}