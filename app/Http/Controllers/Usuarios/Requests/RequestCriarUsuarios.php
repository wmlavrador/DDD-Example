<?php

namespace App\Http\Controllers\Usuarios\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCriarUsuarios extends FormRequest
{
    public function rules()
    {
        return [
            'nome' => 'required',
            'email' => 'required',
            'empresas' => 'required'
        ];
    }
}
