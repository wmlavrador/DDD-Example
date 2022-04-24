<?php

namespace App\Http\Controllers\Usuarios;

use App\Domain\Context\Usuarios\Repositories\UsuariosRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Usuarios\Requests\RequestCriarUsuarios;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    private $UsuariosRepo;

    public function __construct(UsuariosRepo $UsuariosRepo)
    {
        $this->UsuariosRepo = $UsuariosRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $usuarios = $this->UsuariosRepo->getAll();

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

        $novoUsuario = $this->UsuariosRepo->novo($validatedData);

        return response()->json(['usuario' => $novoUsuario]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
