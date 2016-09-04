<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\emergencia;
use App\marcavehiculo;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Helpers\Filesystem;
use App\Asegurado;
use App\Reporte_barandilla;

class PoliController extends Controller
{
  public function index(){
        //dd("policon");
        return view('website.vdspv');
    }

    public function logout(){
        session()->forget('Policia');
        return redirect('/');
    }

    public function regbaran(){
    	return view('seguridad.registrobarandilla');
    }  

    public function reginci(){
        $eme=$eme=\DB::table('Emergencia')->where('tipo','=','P')->get();
        $data=array(
            'emergencias'=>$eme,
            );
    	return view('seguridad.registroincidenciasp',$data);
    } 

    public function regvial(){
        $eme=\DB::table('Emergencia')->where('tipo','=','T')->get();
        $marca=\DB::table('Marca_vehiculo')->get();
        $color=\DB::table('Color_vehiculo')->get();
        $lugar=\DB::table('lugar_procedencia')->get();
        $tipo=\DB::table('Tipo_vehiculo')->get();
        $modelo=\DB::table('Modelo_vehiculo')->orderby('Año','desc')->get();
    	$data=array(
            'emergencias'=>$eme,
            'marcas'=>$marca,
            'colores'=>$color,
            'lugares'=>$lugar,
            'tipos'=>$tipo,
            'modelos'=>$modelo,
        );
        //dd($data);
        return view('seguridad.registroincidenciavial',$data);
    }

    public function imgbar(){
    	return view('seguridad.consultabarimagen');
    }

    public function showAseg(){
    	return view('seguridad.consultaaseguramiento');
    }

    public function showdet(){
    	return view('seguridad.consultadetenido');
    }

    public function showgruas(){
        return view('seguridad.consultagruas');
    }

    public function showgruasfecha(){
        return view('seguridad.consultagruasfecha');
    }

    public function showplacasfecha(){
        return view('seguridad.consultaplacasfecha');
    }

    public function libdet(){
        return view('seguridad.liberardetenido');
    }

    public function libveh(){
        return view('seguridad.liberarvehiculo');
    }

    public function detDete(){
    	return view('seguridad.detalledetenido');
    }

    public function showllam(){
    	return view('seguridad.consultallamadas');
    }

    public function showhech(){
    	return view('seguridad.consultahechos');
    }

    public function showInci(){
    	return view('seguridad.consultaincidenciasp');
    }

    public function detinic(){
    	return view('seguridad.detalleincidenciasp');
    }

    /*public function showDet(Request $request){
	 	dd($request->all());
	}*/

    public function storeBaran(Request $request){
    	//fotodd($request->all());
    	$file = $request->file('image');
    	//dd($file);
    	if($request->hasFile('image')){
    		$filesystem = Filesystem::upload($file);
    		//dd($filesystem);
    		if (!$filesystem) {
    			return back()->with('error-file', true);
    		}
    	}
    	//dd($filesystem);
    	$existe = \DB::table('Asegurado')->where('Nombre', '=', $request->nombre)->where('Ap_paterno', '=', $request->apaterno)->where('Ap_materno', '=', $request->amaterno)->where('Fechanacimiento', '=', $request->fechanac)->count();
    	//dd($existe);
    	$id = \DB::table('Asegurado')->where('Nombre', '=', $request->nombre)->where('Ap_paterno', '=', $request->apaterno)->where('Ap_materno', '=', $request->amaterno)->where('Fechanacimiento', '=', $request->fechanac)->value('idAsegurado');
		//dd($id);
        if($existe > 0){

	    		$reporte = new Reporte_barandilla;
	    		$reporte ->id_asegurado = $id;
	    		$reporte ->fecha_ingreso = $request->horafechaingreso;
	    		$reporte ->fecha_salida = $request->horafechasalida;
	    		$reporte ->motivo_arresto = $request->motivoarresto;
	    		$reporte ->observaciones = $request->observaciones;
	    		$reporte ->pertenencias = $request->pertenencias;
	    		$reporte ->unidad = $request->unidadremite;
	    		$reporte ->lugar = $request->lugararresto;
	    		$reporte ->destino = $request->destino;
	    		$reporte ->aseguramiento = $request->aseguramiento;
	    		$reporte ->save();
	    		if (!$reporte ->save()) {
	    			return "Error en inserción de Reporte_barandilla";
	    		}
	    		return view('website.vdspv');
				//existe el asegurado
				//obtener id del asegurado para
				//solo insertar en reporte		
    	}else{
	    	$asegurado = new Asegurado;
	  		$asegurado ->Nombre = $request->nombre; 
	  		$asegurado ->Ap_paterno = $request->apaterno;
	  		$asegurado ->Ap_materno = $request->amaterno;
	  		$asegurado ->Fechanacimiento = $request->fechanac;
	  		$asegurado ->Alias = $request->apodo;
	  		$asegurado ->domicilio = $request->domicilio;
	  		$asegurado ->foto = $filesystem;
	  		$asegurado->save();	
	  		if ($asegurado->save()) {

	  			$id2 = \DB::table('Asegurado')->where('Nombre', '=', $request->nombre)->where('Ap_paterno', '=', $request->apaterno)->where('Ap_materno', '=', $request->amaterno)->where('Fechanacimiento', '=', $request->fechanac)->value('idAsegurado');

	  			$reporte = new Reporte_barandilla;
	    		$reporte ->id_asegurado = $id2;
	    		$reporte ->fecha_ingreso = $request->horafechaingreso;
	    		$reporte ->fecha_salida = $request->horafechasalida;
	    		$reporte ->motivo_arresto = $request->motivoarresto;
	    		$reporte ->observaciones = $request->observaciones;
	    		$reporte ->pertenencias = $request->pertenencias;
	    		$reporte ->unidad = $request->unidadremite;
	    		$reporte ->lugar = $request->lugararresto;
	    		$reporte ->destino = $request->destino;
	    		$reporte ->aseguramiento = $request->aseguramiento;
	    		$reporte ->save();
	    		if (!$asegurado->save()) {
	    			return "error en inserción Reporte_barandilla2";
	    		}
	    		return view('website.vdspv');
	  		}else{
	  			return "error en inserción de asegurado 2";
	  		}
    	}	
    }



}

 