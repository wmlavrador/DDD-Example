<?php

namespace App\Domain\Context\Empresas;

use App\Domain\Context\Usuarios\Usuarios;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    use HasFactory;

    public function usuarios()
    {
        return $this->belongsToMany(Usuarios::class, 'empresas_usuarios', 'id_empresas', 'id_usuarios');
    }
}
