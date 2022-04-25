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
        try {
            $newUsuario = Usuarios::create($data);
            $newUsuario->save();
        } catch (\Exception $e){
            throw new \Exception('Não foi possível cadastrar o novo usuario.');
        }

        return $newUsuario;
    }

    public function find(int $id): Usuarios
    {
        return Usuarios::find($id);
    }

    public function atualizar(array $data): bool
    {
        $Usuario = Usuarios::where('id', $data['id']);
        if($Usuario->exists()){
            return $Usuario->update($data);
        }
        return false;
    }

    public function apagar(int $id): bool
    {
        try {
            $Usuario = Usuarios::findOrFail($id);
            $empresas = $Usuario->empresas();
            if(!empty($empresas)){
                $empresas->detach();
            }
            return $Usuario->delete();
        } catch (\Exception $e) {
            return false;
        }
    }

    public function getUsuariosEmpresasById($id): Collection
    {
        return Usuarios::where('id', $id)->with('empresas')->get();
    }
}
