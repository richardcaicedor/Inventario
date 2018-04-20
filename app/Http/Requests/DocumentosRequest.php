<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DocumentosRequest extends Request
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
            'descripcion' => 'max:120|required|min:4',
            'abreviado' => 'max:3|required|unique:documentos' 
        ];
    }
}
