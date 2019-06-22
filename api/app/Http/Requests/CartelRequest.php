<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartelRequest extends FormRequest
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
            'titulo' => 'required|max:255',
            'fecha_fin' => 'required|date',
            'file' => 'required|mimes:jpg,jpeg,png'
        ];
    }

    public function messages()
    {
        return [
            'titulo.max'=> 'El campo Título no debe ser mayor a 255 caracteres',
            'titulo.required' => 'El campo Título es obligatorio',
            'fecha_fin.date'=> 'El campo Fecha de termino no tiene un formato valido',
            'fecha_fin.required' => 'El campo Fecha de termino es obligatorio',
            'file.required'=> 'El campo Imagen es obligatorio',
            'file.mimes' => 'El campo Imagen debe ser un tipo de archivo válido',
        ];
    }
}
