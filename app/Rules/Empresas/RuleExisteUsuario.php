<?php

namespace App\Rules\Empresas;

use App\Domain\Context\Usuarios\Repositories\UsuariosRepo;
use App\Domain\Context\Usuarios\Usuarios;
use Illuminate\Contracts\Validation\Rule;

class RuleExisteUsuario implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return Usuarios::where('id', $value)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Usuário (:input) não existe, cadastre o usuario e tente novamente.';
    }
}
