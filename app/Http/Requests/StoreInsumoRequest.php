<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInsumoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'producto' => 'required|string|max:255',
            'sku' => 'nullable|string|max:100|unique:insumos,sku',
            'descripcion' => 'nullable|string',
            'marca' => 'nullable|string|max:100',
            'stock' => 'required|integer|min:0',
            'unidad' => 'nullable|string|max:50',
        ];
    }
}