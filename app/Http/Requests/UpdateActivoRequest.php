<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateActivoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $activoId = $this->route('activo');

        return [
            'nombre' => 'sometimes|required|string|max:255',
            'cliente_id' => 'sometimes|required|integer|exists:clientes,id',
            'sucursal_id' => 'sometimes|required|integer|exists:sucursales,id',
            'marca' => 'sometimes|nullable|string|max:100',
            'modelo' => 'sometimes|nullable|string|max:100',
            'numero_serie' => [
                'sometimes',
                'nullable',
                'string',
                'max:100',
                Rule::unique('activos')->ignore($activoId),
            ],
        ];
    }
}