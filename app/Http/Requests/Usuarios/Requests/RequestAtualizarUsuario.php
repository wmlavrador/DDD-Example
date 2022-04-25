<?php

namespace App\Http\Requests\Usuarios\Requests;

use App\Rules\Usuarios\RuleExisteEmpresa;
use Illuminate\Foundation\Http\FormRequest;

class RequestAtualizarUsuario extends FormRequest
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
            'email' => 'required|email|max:250',
            'data_de_nascimento' => 'sometimes|date',
            'naturalidade' => 'string|max:250'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Informe o nome.',
            'nome.max' => 'Tamanho máximo atingido (250)',
            'email.email' => 'Formato de email incorreto',
            'dataNascimento.date' => 'Formato de data inválido.'
        ];
    }
}
