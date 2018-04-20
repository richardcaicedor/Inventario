<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Documentos;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserRequest; 

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Se obtienen todos los usuarios de la base de datos */
        $users = User::all();

        $users->each(function($users){
            $users->documentos;
        });

        /* Se obtienen los documentos de la BD */
        $documentos = Documentos::orderBy('descripcion','ASC')->lists('descripcion','id');
        /* Se muestra el index del catalogo y se envia la informacion */
        return view('usuarios.index')->with('users',$users)->with('documentos',$documentos);
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
    public function store(UserRequest $request)
    {
        $user = new User($request->all());
        $user->password = bcrypt($request['password']);
        $user->save();
        Flash::success('El usuario '.$user->nombre.' Fue creado Exitosamente! ');
        return redirect()->route('app.usuarios.index');
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
        $user = User::find($id);
        return response()->json($user);
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
        $user = User::find($request->id);
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        Flash::warning('El usuario '.$user->nombre." se actualizo Correctamente! ");
        return redirect()->route('app.usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Flash::error('El Usuario '.$user->nombre." Ha sido Eliminado Exitosamente! ");
        return redirect()->route('app.usuarios.index');
    }
}
