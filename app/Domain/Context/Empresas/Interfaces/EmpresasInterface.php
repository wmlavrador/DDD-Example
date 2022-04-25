<?php

namespace App\Domain\Context\Empresas\Interfaces;

use App\Domain\Context\Empresas\Empresas;
use Illuminate\Database\Eloquent\Collection;

interface EmpresasInterface
{
    public function getAll(): Collection;
    public function novo(array $data): Empresas;
    public function find(int $id): Empresas;
    public function atualizar(array $data): bool;
    public function apagar(int $id): bool;
    public function getEmpresasUsuariosById(int $id): Collection;
}
