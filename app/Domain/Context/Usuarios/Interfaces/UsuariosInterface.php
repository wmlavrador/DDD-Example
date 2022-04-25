<?php

namespace App\Domain\Context\Usuarios\Interfaces;

use App\Domain\Context\Usuarios\Usuarios;
use Illuminate\Database\Eloquent\Collection;

interface UsuariosInterface
{
    public function getAll(): Collection;
    public function novo(array $data): Usuarios;
    public function find(int $id): Usuarios;
    public function atualizar(array $data): bool;
    public function apagar(int $id): bool;
    public function getUsuariosEmpresasById(int $id): Collection;
}
