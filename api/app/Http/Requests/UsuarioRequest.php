<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'nombre' => 'string|max:70|required',
            'usuario' => 'string|max:40|required',
            'contraseña' => 'string|max:60|required',
        ];
    }

    public function messages()
    {
        return [
            'nombre.max'=> 'El campo Nombre no debe ser mayor a 70 caracteres',
            'nombre.required' => 'El campo Nombre es obligatorio',
            'usuario.max'=> 'El campo Usuario no debe ser mayor a 40 caracteres',
            'usuario.required' => 'El campo Usuario es obligatorio',
            'contraseña.max'=> 'El campo Contraseña no debe ser mayor a 60 caracteres',
            'contraseña.required' => 'El campo Contraseña es obligatorio',
        ];
    }
}
