<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Documentos;
use Laracasts\Flash\Flash;
use App\Http\Requests\DocumentosRequest; 

class DocumentosController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documentos = Documentos::all();

        return view('catalogos.documentos.index')->with('documentos',$documentos); 
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
    public function store(DocumentosRequest $request) 
    {
        $documento = new Documentos($request->all());
        $documento->save();
        Flash::success('El tipo de Documento '.$documento->descripcion." se ha Creado Correctamente! ");
        return redirect()->route('app.documentos.index');
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
        $documento = Documentos::find($id);
        return response()->json($documento);
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
        $documento = Documentos::find($request->id);
        $documento->fill($request->all());
        $documento->save();
        Flash::warning('El Documento '.$documento->descripcion." Ha sido Modificado! ");
        return redirect()->route('app.documentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $documento = Documentos::find($id);
        $documento->delete();
        Flash::error('El tipo de documento '.$documento->descripcion.' se ha eliminado Correctamente! ');
        return redirect()->route('app.documentos.index');
    }
}
