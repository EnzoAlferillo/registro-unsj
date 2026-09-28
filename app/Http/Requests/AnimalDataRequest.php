<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class AnimalDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    // Permite que cualquier usuario pueda utilizar este formulario
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    // Define las reglas de validación del formulario
    public function rules(): array
    {
        return [

            'name' => [
                'required',
                'string',
                'min:2',
                'max:50'
            ],

            'species' => [
                'required',
                'string',
                'min:2',
                'max:50'
            ],

            'age' => [
                'required',
                'integer',
                'min:0',
                'max:100'
            ]
        ];
    }
    // Limpia y normaliza los datos antes de validarlos
    protected function prepareForValidation(): void
    {
        $this->merge([

            'name' => Str::title(trim($this->name)),

            'species' => Str::title(trim($this->species)),

        ]);
    }
    // Personaliza los mensajes de error
    public function messages(): array
    {
        return [

            'name.required' => 'El nombre del animal es obligatorio.',

            'name.min' => 'El nombre debe tener al menos 2 caracteres.',

            'species.required' => 'La especie es obligatoria.',

            'age.required' => 'La edad es obligatoria.',

            'age.integer' => 'La edad debe ser un número entero.'

        ];
    }
    // Cambia los nombres técnicos por nombres más amigables
    public function attributes(): array
    {
        return [

            'name' => 'nombre',

            'species' => 'especie',

            'age' => 'edad'

        ];
    }
}
