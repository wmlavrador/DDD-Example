<?php

namespace App\Domain\Context\Usuarios;

use App\Domain\Context\Empresas\Empresas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'data_de_nascimento',
        'naturalidade'
    ];

    public function empresas(){
        return $this->belongsToMany(Empresas::class, 'empresas_usuarios', 'id_usuario', 'id_empresa');
    }
}
