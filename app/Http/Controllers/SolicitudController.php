<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Solicitud;
use App\Insumo;   
use Laracasts\Flash\Flash;
<<<<<<< HEAD
    
=======

>>>>>>> Test
class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
<<<<<<< HEAD
    { 
=======
    {
>>>>>>> Test
        /* Se obtienen todas las solicitudes de la base de datos */
        $solicitudes = Solicitud::all();
        /* Se consulta todos los insumos  */
        $insumos = Insumo::orderBy('descripcion','ASC')->lists('descripcion','id');

        /* Se recorre la informacion para obtener la descripcion del tipo de Insumo */
        $solicitudes->each(function($solicitudes){
            $solicitudes->insumo;
            $solicitudes->usuario;
        });

        /* Se envia la informacion a la interfaz del usuario */
        return view('solicitudes.index')->with('solicitudes',$solicitudes)->with('insumos',$insumos);
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
        /* Se crea objeto con la informacion de formulario de creacion */
        $solicitud = new Solicitud($request->all());
        /* Se almacena la informacion */
        $solicitud->save();
        /* Se envia mensaje de confirmacion a la pantalla de administracion */
        Flash::success('La Solicitud fue creada Exitosamente! ');
        return redirect()->route('app.solicitud.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function validarCantidad($id)
    {
        $insumo = Insumo::find($id); 
        return response()->json($insumo);
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
