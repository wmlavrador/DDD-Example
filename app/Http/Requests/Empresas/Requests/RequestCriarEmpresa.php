<?php

namespace App\Http\Requests\Empresas\Requests;

use App\Http\Requests\BaseApiRequest;
use App\Rules\Empresas\RuleExisteUsuario;

class RequestCriarEmpresa extends BaseApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:250',
            'cnpj' => 'required|integer',
            'endereco' => 'required|max:250',
            'usuarios' => ['required_without:usuarioCriaEmpresa', 'array'],
            'usuarios.*' => [new RuleExisteUsuario]
        ];
    }

    public function messages(): array
    {
        return [
            'nome.required' => 'Informe o nome da empresa.',
            'nome.max' => 'Tamanho máximo ::attribute',
            'cnpj.required' => 'Informe um CNPJ Válido para continuar.'
        ];
    }
}
