<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TipoEquipo;
use Laracasts\Flash\Flash;
use App\Http\Requests\tipoInventarioRequest; 

class TipoEquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Se obtienen todos los tipos de equipos creados en la base de datos */
        $tipoEquipos = TipoEquipo::all();
        /* Se muestra la vista de administracion de tipos de equipos */
        return view('catalogos.tipoequipo.index')->with('tipoEquipos',$tipoEquipos);
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
    public function store(tipoInventarioRequest $request)
    {
        /* Se crea objeto para almacenar la informacion del tipo de inventario */
        $tipoInventario = new TipoEquipo($request->all());
        $tipoInventario->save(); // Se almacena la informacion 
        /* Se envia confirmacion de la accion a la vista */
        Flash::success(' Se ha Creado el tipo de Inventario '. $tipoInventario->descripcion ." Exitosamente! ");
        return redirect()->route('app.tipoequipo.index');
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
        /* Se obtiene toda la informacion del tipo de inventario */
        $tipoInventario = TipoEquipo::find($id);
        /* Se envia la informacion tipo JSON al formulario de modificacion */
        return response()->json($tipoInventario);
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
        /* Se crea objeto para realiza la modificacion del tipo de inventario */
        $tipoInventario = TipoEquipo::find($request->id);
        $tipoInventario->fill($request->all());
        $tipoInventario->save();
        /* Se muestra confirmacion en la plataforma de administracion */
        Flash::warning('El tipo de Inventario '.$tipoInventario->descripcion.' Fue modificado Exitosamente! ');
        /* Se redirecciona a la plataforma de administracion */
        return redirect()->route('app.tipoequipo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoInventario = TipoEquipo::find($id);
        $tipoInventario->delete();
        Flash::error('El tipo de Inventario '.$tipoInventario->descripcion.' se ha eliminado Correctamente! ');
        return redirect()->route('app.tipoequipo.index');
    }
}
