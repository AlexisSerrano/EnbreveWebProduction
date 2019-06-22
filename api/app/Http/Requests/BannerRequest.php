<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
            'empresa' => 'required|max:255',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date',
            'posicion' => 'required|numeric',
            'estatus' => 'required|numeric',
            'file' => 'required|mimes:jpg,jpeg,png'
        ];
    }

    public function messages()
    {
        return [
            'empresa.max'=> 'El campo Empresa no debe ser mayor a 255 caracteres',
            'empresa.required' => 'El campo Empresa es obligatorio',
            'fecha_inicio.date'=> 'El campo Fecha de inicio no tiene un formato valido',
            'fecha_inicio.required' => 'El campo Fecha de inicio es obligatorio',
            'fecha_fin.date'=> 'El campo Fecha de termino no tiene un formato valido',
            'fecha_fin.required' => 'El campo Fecha de termino es obligatorio',
            'posicion.numeric'=> 'El campo Posición debe ser numérico',
            'posicion.required' => 'El campo Posición es obligatorio',
            'estatus.numeric'=> 'El campo Estatus debe ser numérico',
            'estatus.required' => 'El campo Estatus es obligatorio',
            'file.required'=> 'El campo Imagen es obligatorio',
            'file.mimes' => 'El campo Imagen debe ser un tipo de archivo válido',
        ];
    }
}
