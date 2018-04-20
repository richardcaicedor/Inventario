<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TipoInsumo;
use Laracasts\Flash\Flash;
use App\Http\Requests\TipoInsumoRequest; 

class TipoInsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Se realiza la consulta de todos los tipos de insumos */
        $tipoInsumos = TipoInsumo::all();
        return view('catalogos.tipoinsumo.index')->with('tipoInsumos',$tipoInsumos);
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
     * @return \Illuminate\Http\Response
     */
    public function store(TipoInsumoRequest $request)  
    {
        /* Se ontiene la informacion del formulario */
        $tipoInsumo = new TipoInsumo($request->all());
        /* Se almacena la informacion en la base de datos */
        $tipoInsumo->save();
        Flash::success('El tipo de Insumo '.$tipoInsumo->descripcion.' Se ha almacenado exitosamente!');
        return redirect()->route('app.tipoInsumo.index');
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
        /* Consulta el ID del tipo de Insumo */
        $tipoInsumo = TipoInsumo::find($id);
        /* Se retorna la informacion como JSON */
        return response()->json($tipoInsumo);
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
        /* Consultar el insumo que se quiere modificar */
        $tipoInsumo = TipoInsumo::find($request->id);
        $tipoInsumo->fill($request->all()); // Se actualiza la informacion 
        $tipoInsumo->save(); // Se almacena la informacion 
        Flash::warning('El tipo de insumo '.$tipoInsumo->descripcion." Ha sido Modificado! ");
        return redirect()->route('app.tipoInsumo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoInsumo = TipoInsumo::find($id);
        $tipoInsumo->delete();
        Flash::error('El tipo de Insumo '.$tipoInsumo->descripcion.' se ha eliminado Correctamente! ');
        return redirect()->route('app.tipoInsumo.index');
    }
}
