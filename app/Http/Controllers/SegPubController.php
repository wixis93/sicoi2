<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\privilegios;

class SegPubController extends Controller
{
    public function index()
    {
        $data=array(
            'privilegios'=> \App\privilegios::get(),
        );
        return view('/website/nuser',$data);

    }

    public function show(Request $request)
    {
        return $request->all();
        //return $request->nombre;
        //return $request->email;
    }

    public function store(Request $request)
    {
        //return $request->all();
        //encriptar contraseña
        $tipo = $request->privilegio;
        $contrasena = \Hash::make($request->Contraseña);
        $usuario = \DB::table('Usuario')->insert([
                'nombre' => $request->nombre,
                'password' => $contrasena,
                'idprivilegio' => $tipo
            ]);
        return view('website.index');
    }



    //metodo para volver los nombres de los asegurados......ajax o regreso de la vista con el parametro???
    public function showAseg(){
        $ordenado = \DB::table('Asegurado')->orderBy('Ap_paterno', 'asc')->get();
        return $ordenado;
    }
}
