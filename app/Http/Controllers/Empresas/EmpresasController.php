<?php

namespace App\Http\Controllers\Empresas;

use App\Domain\Context\Empresas\Repositories\EmpresasRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Empresas\Requests\RequestCriarEmpresa;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Psy\Util\Json;

class EmpresasController extends Controller
{
    protected $empresasRepo;

    public function __construct(EmpresasRepo $empresasRepo)
    {
        $this->empresasRepo = $empresasRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(): JsonResponse
    {
        $empresas = $this->empresasRepo->getAll();

        return response()->json(['empresas' => $empresas]);
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
    public function store(RequestCriarEmpresa $request): JsonResponse
    {
        $empresa = $this->empresasRepo->novo($request->validated());

        if($empresa){
            $empresa->usuarios()->attach($request->usuarios);
        }

        $novaEmpresa = $this->empresasRepo->getEmpresasUsuariosById($empresa->id);

        return response()->json(['empresa' => $novaEmpresa]);
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
