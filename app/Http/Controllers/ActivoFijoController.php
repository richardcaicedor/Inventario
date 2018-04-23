<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ActivoFijo;
use App\TipoEquipo;
use Laracasts\Flash\Flash;

class ActivoFijoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Se obtienen todos lo equipos que estan creados en la base de datos 
        $equipos = ActivoFijo::all(); 
        /* Se obtienen los tipos de equipos */ 
        $tipoEquipos = TipoEquipo::orderBy('descripcion','ASC')->lists('descripcion','id');
        /* Se recorre la informacion para obtener la descripcion del tipo del equipo */
        $equipos->each(function($equipos){
            $equipos->tipoEquipo();
        });
        /* se envia la informacion a la vista */
        return view('equipos.index')->with('equipos',$equipos)->with('tipoEquipos',$tipoEquipos);
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
    public function store(Request $request)
    {
        /* Se crea objeto para almacenar la informacion del equipo */
        $equipo = new ActivoFijo($request->all());
        /* Se almacena la informacion */
        $equipo->save();
        /* Se envia mensaje de confirmacion a la pantalla de administracion */
        Flash::success('El Equipo se ha creado Exitosamente! ');
        return redirect()->route('app.equipos.index');
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
        $equipo = ActivoFijo::find($id);
        return response()->json($equipo);
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
        $equipo = ActivoFijo::find($request->id);
        $equipo->fill($request->all());
        $equipo->save();
        Flash::warning('El equipo se actualizo Correctamente! ');
        return redirect()->route('app.equipos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipo = ActivoFijo::find($id);
        $equipo->delete();
        Flash::error('El Equipo Ha sido Eliminado Exitosamente! ');
        return redirect()->route('app.equipos.index');
    }
}
