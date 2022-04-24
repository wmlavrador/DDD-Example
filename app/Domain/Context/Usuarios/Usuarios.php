<?php

namespace App\Domain\Context\Usuarios;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    public function empresas(){
        return $this->belongsToMany(Empresas::class, 'empresas_usuarios', 'id_usuarios', 'id_empresas');
    }
}
