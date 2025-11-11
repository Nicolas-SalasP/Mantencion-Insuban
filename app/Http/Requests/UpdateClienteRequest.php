<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClienteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $clienteId = $this->route('cliente'); 

        return [
            'nombre' => 'sometimes|required|string|max:255',
            'correo' => [
                'sometimes',
                'nullable',
                'email',
                Rule::unique('clientes')->ignore($clienteId),
            ],
            'telefono_contacto' => 'sometimes|nullable|string|max:50',
        ];
    }
}