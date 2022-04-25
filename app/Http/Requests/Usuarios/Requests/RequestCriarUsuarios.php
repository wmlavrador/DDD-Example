<?php

namespace App\Http\Requests\Usuarios\Requests;

use App\Http\Requests\BaseApiRequest;
use App\Http\Requests\Empresas\Requests\RequestCriarEmpresa;
use App\Rules\Usuarios\RuleExisteEmpresa;

class RequestCriarUsuarios extends BaseApiRequest
{
    public function rules(): array
    {
        $rulesUsuario = [
            'nome' => 'required|max:250',
            'email' => 'required|email|max:250',
            'empresas' => 'requiredIf:usuarioCriaEmpresa,null|array',
            'empresas.*' => ['integer', new RuleExisteEmpresa],
            'usuarioCriaEmpresa' => 'array',
            'usuarioCriaEmpresa.*' => 'requiredIf:empresas,null',
            'data_de_nascimento' => 'sometimes|date',
            'naturalidade' => 'string|max:250',
        ];

        $empresaRulesNested = $this->getNestedArray('usuarioCriaEmpresa.*.', $this->rulesEmpresa());

        return array_merge($rulesUsuario, $empresaRulesNested);
    }

    public function messages(): array
    {
        $messagesUsuario = [
          'nome.required' => 'Informe o nome',
          'nome.max' => 'Tamanho máximo atingido (250)',
          'empresas.required_if' => "Informe as empresas que deseja associar, ou crie uma empresa associada.",
          'usuarioCriaEmpresa.required_if' => 'Informe os dados para criar a empresa, ou informe uma/mais empresa(s) já existente(s) no campo \'empresas\' ',
          'dataNascimento.date' => 'Formato de data inválido.'
        ];

        $messageEmpresa = $this->getNestedArray('criarEmpresa.', $this->messagesEmpresa());

        return array_merge($messagesUsuario, $messageEmpresa);
    }

    public function authorize(): bool
    {
        return true;
    }

    private function rulesEmpresa(): array
    {
        $requestCriarEmpresa = new RequestCriarEmpresa;
        return $requestCriarEmpresa->rules();
    }

    private function messagesEmpresa(): array
    {
        $requestCriarEmpresa = new RequestCriarEmpresa;
        return $requestCriarEmpresa->messages();
    }

}
