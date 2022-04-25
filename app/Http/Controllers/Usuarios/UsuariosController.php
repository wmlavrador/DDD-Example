<?php

namespace App\Http\Controllers\Usuarios;

use App\Domain\Context\Empresas\Repositories\EmpresasRepo;
use App\Domain\Context\Usuarios\Repositories\UsuariosRepo;
use App\Domain\Context\Usuarios\Usuarios;
use App\Http\Controllers\Controller;
use App\Http\Requests\Usuarios\Requests\RequestCriarUsuarios;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    private $usuariosRepo;
    private $empresasRepo;

    public function __construct(
        UsuariosRepo $UsuariosRepo,
        EmpresasRepo $EmpresasRepo
    )
    {
        $this->usuariosRepo = $UsuariosRepo;
        $this->empresasRepo = $EmpresasRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $usuarios = $this->usuariosRepo->getAll();

        return response()->json(['usuarios' => $usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JsonResponse
     */
    public function store(RequestCriarUsuarios $request): JsonResponse
    {
        $validatedData = $request->validated();

        $novoUsuario = $this->usuariosRepo->novo($validatedData);

        if($novoUsuario && $request->has('empresas') ){
            $novoUsuario->empresas()->attach($validatedData['empresas']);
        }

        if($novoUsuario && $request->has('usuarioCriaEmpresa')){
            $criarEmpresas = $validatedData['usuarioCriaEmpresa'];

            foreach ($criarEmpresas as $empresa) {
                $novaEmpresa = $this->empresasRepo->novo($empresa);
                $novaEmpresa->usuarios()->attach($novoUsuario->id);
            }

        }

        $novoUsuario = $this->usuariosRepo->getUsuariosEmpresasById($novoUsuario->id);

        return response()->json(['usuario' => $novoUsuario]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $usuario = $this->usuariosRepo->find($id);
        return response()->json(['usuario' => $usuario]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
