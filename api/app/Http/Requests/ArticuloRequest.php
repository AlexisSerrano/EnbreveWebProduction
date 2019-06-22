<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticuloRequest extends FormRequest
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
            'titulo' => 'required|max:100',
            'autor' => 'required',
            'resumen' => 'required',
            'contenido' => 'required',
            'file' => 'required|mimes:jpg,jpeg,png'
        ];
    }

    public function messages()
    {
        return [
            'titulo.max'=> 'El campo Título no debe ser mayor a 100 caracteres',
            'titulo.required' => 'El campo Título es obligatorio',
            'autor.required' => 'El campo Autor es obligatorio',
            'resumen.required' => 'El campo Resumen es obligatorio',
            'contenido.required' => 'El campo Contenido es obligatorio',
            'file.required'=> 'El campo Imagen es obligatorio',
            'file.mimes' => 'El campo Imagen debe ser un tipo de archivo válido',
        ];
    }
}
