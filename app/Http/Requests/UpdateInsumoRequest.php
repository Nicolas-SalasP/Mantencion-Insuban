<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateInsumoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $insumoId = $this->route('insumo');

        return [
            'producto' => 'sometimes|required|string|max:255',
            'sku' => [
                'sometimes',
                'nullable',
                'string',
                'max:100',
                Rule::unique('insumos')->ignore($insumoId),
            ],
            'descripcion' => 'sometimes|nullable|string',
            'marca' => 'sometimes|nullable|string|max:100',
            'stock' => 'sometimes|required|integer|min:0',
            'unidad' => 'sometimes|nullable|string|max:50',
        ];
    }
}