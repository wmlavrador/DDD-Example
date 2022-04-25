<?php

namespace App\Http\Requests\Empresas\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestAtualizarEmpresa extends FormRequest
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
            'nome' => 'required|max:250',
            'cnpj' => 'required|integer',
            'endereco' => 'required|max:250'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Informe o nome da empresa.',
            'nome.max' => 'Tamanho máximo ::attribute',
            'cnpj.required' => 'Informe um CNPJ Válido para continuar.'
        ];
    }
}
