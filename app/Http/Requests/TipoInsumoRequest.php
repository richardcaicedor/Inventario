<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TipoInsumoRequest extends Request
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
            'descripcion' => 'max:150|required|min:6|unique:tipos_insumos',
            'observacion' => 'min:10|required', 
        ];
    }
}
