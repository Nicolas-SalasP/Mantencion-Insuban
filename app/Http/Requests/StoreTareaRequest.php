<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTareaRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'status_id' => 'required|integer|exists:statuses,id',
            'cliente_id' => 'required|integer|exists:clientes,id',
            'sucursal_id' => 'required|integer|exists:sucursales,id',
            'tecnico_id' => 'nullable|integer|exists:users,id',
            'activo_id' => 'nullable|integer|exists:activos,id',
            'fecha_creacion' => 'required|date',
            'fecha_programada' => 'nullable|date',

            'insumos' => 'nullable|array',
            'insumos.*.insumo_id' => 'required|integer|exists:insumos,id',
            'insumos.*.cantidad_usada' => 'required|integer|min:1',

            'fotos' => 'nullable|array',
            'fotos.*' => 'image|mimes:jpeg,png,jpg|max:2048', 
        ];
    }
}