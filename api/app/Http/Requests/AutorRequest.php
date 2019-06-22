<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AutorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'string|max:30|required',
            'primer_ap' => 'string|max:20|required',
            'segundo_ap' => 'nullable|string|max:20',
            'facebook' => 'nullable|string|max:100',
            'instagram' => 'nullable|string|max:100',
            'twitter' => 'nullable|string|max:100',
        ];
    }

    public function messages()
    {
        return [
            'nombre.max'=> 'El campo Nombre no debe ser mayor a 30 caracteres',
            'nombre.required' => 'El campo Nombre es obligatorio',
            'primer_ap.max'=> 'El campo Apellido Paterno no debe ser mayor a 20 caracteres',
            'primer_ap.required' => 'El campo Apellido Paterno es obligatorio',
            'segundo_ap.max'=> 'El campo Apellido Materno no debe ser mayor a 20 caracteres',
            'facebook.max'=> 'El campo Facebook no debe ser mayor a 100 caracteres',
            'instagram.max'=> 'El campo Instagram no debe ser mayor a 100 caracteres',
            'twitter.max'=> 'El campo Twitter no debe ser mayor a 100 caracteres',
        ];
    }
}
