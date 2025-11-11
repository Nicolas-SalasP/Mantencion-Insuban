<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSucursalRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'sometimes|required|string|max:255',
            'cliente_id' => 'sometimes|required|integer|exists:clientes,id',
            'direccion' => 'sometimes|nullable|string|max:255',
        ];
    }
}