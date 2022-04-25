<?php

namespace App\Domain\Context\Empresas\Repositories;

use App\Domain\Context\Empresas\Empresas;
use App\Domain\Context\Empresas\Interfaces\EmpresasInterface;
use Illuminate\Database\Eloquent\Collection;

class EmpresasRepo implements EmpresasInterface
{

    public function getAll(): Collection
    {
        return Empresas::with('usuarios')->get();
    }

    public function novo(array $data): Empresas
    {
        try {
            $newEmpresa = Empresas::create($data);
            $newEmpresa->save();
        } catch (\Exception $exception){
            throw new \Exception('Não foi possível criar a nova empresa.');
        }

        return $newEmpresa;
    }

    public function find(int $id): Empresas
    {
        // TODO: Implement find() method.
    }

    public function atualizar(array $data): Empresas
    {
        // TODO: Implement atualizar() method.
    }

    public function apagar(int $id): bool
    {
        // TODO: Implement apagar() method.
    }

    public function getEmpresasUsuariosById(int $id): Collection
    {
        return Empresas::where('id', $id)->with('usuarios')->get();
    }
}
