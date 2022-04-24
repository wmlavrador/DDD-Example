<?php

namespace App\Rules\Usuarios;

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
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Verifique se as empresas informadas realmente existem, você deve passar um array com os ID\'s das empresas';
    }
}
