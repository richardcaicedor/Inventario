<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'numero' => 'max:50|required|min:4|unique:users',
            'nombre' => 'max:150|required|min:10',
            'email' =>'min:4|max:250|required|unique:users',
            'password' => 'min:4|max:120|required',
            'direccion' => 'max:150|required|min:4',
            'telefono' => 'required|min:7',
            'celular' => 'required|min:10',
        ];
    }
}
