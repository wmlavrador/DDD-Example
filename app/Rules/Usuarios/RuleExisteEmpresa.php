<?php

namespace App\Rules\Usuarios;

use App\Domain\Context\Empresas\Empresas;
use Illuminate\Contracts\Validation\Rule;

class RuleExisteEmpresa implements Rule
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
        return Empresas::where('id', $value)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Verifique se a empresa código :input realmente existem.';
    }
}
