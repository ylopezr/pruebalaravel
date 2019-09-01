<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuarios;
class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('usuarios');
    }

   
    public function create(Request $request)
    {
       $nombres = $request->input('nombres');
        $apellidos = $request->input('apellidos');
        $cedula = $request->input('cedula');
        $correo = $request->input('correo');
        $telefono = $request->input('telefono');

         
        $data = Usuarios::where('cedula', '=', $cedula)->orWhere('correo', '=', $correo)->get();
        if (count($data) != 0) {
            $respuesta = "este correo o cedula ya estan registrados ";
        } else {



            $usuarios = new Usuarios;

            $usuarios->nombres = $nombres;
            $usuarios->apellidos = $apellidos;
            $usuarios->cedula = $cedula;
            $usuarios->correo = $correo;
            $usuarios->telefono = $telefono;
            if ($usuarios->save()) {

                $respuesta = "usuario registrado exitosamente";
            }
        }
        return $respuesta;

    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show()
    {
       $usuarios = Usuarios::all();
        return $usuarios;
    }

    
    public function edit(Request $request)
    {
           $id = $request->input('id');
        $Usuarios = Usuarios::find($id);
        return view('editusuarios', compact('Usuarios'));
            }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $nombres = $request->input('nombres');
        $apellidos = $request->input('apellidos');
        $cedula = $request->input('cedula');
        $correo = $request->input('correo');
        $telefono = $request->input('telefono');

        $Usuarios = Usuarios::find($id);
        $Usuarios->nombres = $nombres;
        $Usuarios->apellidos = $apellidos;
        $Usuarios->cedula = $cedula;
        $Usuarios->correo = $correo;
        $Usuarios->telefono = $telefono;
        if ($Usuarios->save()) {

            $respuesta = "usuario actualizado correctamente";
        }
        return $respuesta;
  
    }

  public  function destroy(Request $request)
    { 
      $id= $request->input('id');
      $usuarios = Usuarios::findOrFail($id);
      
      if($usuarios->delete()){
        $respuesta = " usuario eliminado con exito";
      }
       return $respuesta;
    }
}
