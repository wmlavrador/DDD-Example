<?php

namespace App\Domain\Context\Usuarios\Repositories;

use App\Domain\Context\Usuarios\Interfaces\UsuariosInterface;
use App\Domain\Context\Usuarios\Usuarios;
use Illuminate\Database\Eloquent\Collection;

class UsuariosRepo implements UsuariosInterface
{

    public function getAll(): Collection
    {
        return Usuarios::with('empresas')->get();
    }

    public function novo(array $data): Usuarios
    {
        $newUsuario = Usuarios::create($data);

        $newUsuario->save();

        return $newUsuario;
    }

    public function find(int $id): Usuarios
    {
        // TODO: Implement get() method.
    }

    public function atualizar(array $data): Usuarios
    {
        // TODO: Implement atualizar() method.
    }

    public function apagar(int $id): bool
    {
        // TODO: Implement apagar() method.
    }
}
