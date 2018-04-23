<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Insumo;
use App\TipoInsumo;
use Laracasts\Flash\Flash;
use App\Http\Requests\InsumoRequest; 
 
class InsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Se consulta todos los insumos en la base de datos */
        $insumos = Insumo::all();
        /* Se obtienen todos los tipos de insumos */
        $tipoInsumos = TipoInsumo::orderBy('descripcion','ASC')->lists('descripcion','id');
        /* Se recorre la informacion para obtener la descripcion del tipo de Insumo */
        $insumos->each(function($insumos){
            $insumos->tipoInsumo;
        });
        /* Se muestra la plataforma de administracion de Insumos */
        return view('insumos.index')->with('insumos',$insumos)->with('tipoInsumos',$tipoInsumos); 
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
    public function store(InsumoRequest $request)
    {
        /* Se crea objeto para almacenar la informacion del Insumo */
        $insumo = new Insumo($request->all());
        /* Se almacena la informacion */
        $insumo->save(); 
        /* Se envia mensaje de confirmacion a la pantalla de administracion */
        Flash::success('El Insumo '.$insumo->descripcion.' se ha creado Exitosamente! ');
        return redirect()->route('app.insumos.index');
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
        $insumo = Insumo::find($id); 
        return response()->json($insumo);
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
        $insumo = Insumo::find($request->id);
        $insumo->fill($request->all());
        $insumo->save();
        Flash::warning('El insumos '.$insumo->descripcion.' se actualizo Correctamente! ');
        return redirect()->route('app.insumos.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $insumo = Insumo::find($id); 
        $insumo->delete();
        Flash::error('El insumo '.$insumo->descripcion.' Ha sido Eliminado Exitosamente! ');
        return redirect()->route('app.insumos.index');
    }
}
