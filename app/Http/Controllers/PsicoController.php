<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\institucion;
use App\Paciente;
use App\Sesiones;

class PsicoController extends Controller
{
   public function index(){
        //dd("admincon");
        return view('website.vpd');
    }
   

    public function logout(){
        session()->forget('Psicologo');
        return redirect('/');
    }   

	public function regInst(){
		return view('prev_delito.new_inst');
	}

    public function storeIns(Request $request){
    	//dd($request->all());
    	$institucion = \DB::table('Institucion')->insert([
    		'Nombre' => $request->nombre,
    		'Domicilio' => $request->domicilio,
    		'telefono' => $request->telefono,
    		'nombreContacto' => $request->contacto
    	]);
    
    	 return redirect()->back()->with('exito',true);
    }

    public function visIns(){
        return view('prev_delito.show_inst');
    }
  
    public function mostrar(){
    	$data = \DB::table('Institucion')->orderBy('Nombre', 'asc')->get();
        return $data;
    }

    public function mostrarPac(){ 
        return view('prev_delito.show_pac');
    }

    public function showPas(){
        $ordenado = \DB::table('Paciente')->orderBy('Nombre', 'asc')->get();
        return $ordenado;
    }

    public function showSec($id){
        //dd($id);
        $sesiones = \DB::table('Sesiones')->where('id_pas', '=', $id )->get();
        //dd($sesiones);
        return $sesiones;
    }
     
    public function storePac(Request $request){
        //Udd($request->input());
        $paciente = new Paciente;
        $paciente->Nombre = $request->nombre;
        $paciente->sexo = $request->sexo;
        $paciente->edad = $request->edad;
        $paciente->Ocupacion = $request->ocupacion;
        $paciente->madre = $request->nmadre;
        $paciente->padre = $request->npadre;
        $paciente->Colonia = $request->colonia;
        $paciente->Calle = $request->calle;
        $paciente->num_ext = $request->num_ext;
        $paciente->save();
        
        /*if ($paciente->save()) {
            
            $sesion = new Sesiones;
            $sesion->Nombre =$request->nombre;
            $sesion->Fecha = DATE('Y-m-d H:i:s');
            $sesion->Observaciones = $request->observ;
            $sesion->save();
        }*/
         return view('website.vpd');
        //dd($sesion);
    }

    public function mostrarSes($id){
        //dd($request->all());
        $persona = \DB::table('Paciente')->where('idPaciente','=', $id)->first();
        if ($persona->sexo == 1) {
            $persona->sexo= 'Masculino';
        }else{
            $persona->sexo = 'Femenino';
        }
       //dd($persona);
        $consultado = array('pasiente' => $persona, );
        return view('prev_delito.show_ses', $consultado);
    }

    public function newSes($id){
        
        $persona = \DB::table('Paciente')->where('idPaciente','=', $id)->first();
        $pasiente = array('PasNom' => $persona,);
        return view('prev_delito.new_consulta', $pasiente);
    }

    public function deleteIns(Request $request){
        $institucion = \DB::table('Institucion')->where('idInstitucion', '=', $request->id_ins)->delete();
        return $institucion;
    }

    public function deletePac(Request $request){
        //dd($request->all());
        $sesiones = \DB::table('Sesiones')->where('id_pas', '=', $request->id_pas)->delete();
        $pasiente = \DB::table('Paciente')->where('idPaciente', '=', $request->id_pas)->delete();

    }
    public function showupdInst($id){
         $inst = \DB::table('Institucion')->where('idInstitucion', '=', $id)->first();
         $datap = array('inst' => $inst, );
         //dd($datap);
         return view('prev_delito.upd_Inst', $datap);
    }

    public function updInst(Request $request){
        //dd($request->all());
        \DB::table('Institucion')
            ->where('idInstitucion', '=', $request->id)
            ->update([
                'Nombre' => $request->nombre,
                'Domicilio' => $request->domicilio,
                'telefono' => $request->telefono,
                'nombreContacto' => $request->contacto
                ]);
            return view('prev_delito.show_inst');
    }

    public function storeSes($id ,Request $request){
        //dd($request->all(), $id);
        $persona = \DB::table('Paciente')->where('idPaciente','=', $id)->first();  
        $sesiones = \DB::table('Sesiones')->where('Nombre', '=', $persona->Nombre)->get();
        $consultado = array('pasiente' => $persona, );

        $data = array('sesiones' => $sesiones,);
        $sesion = new Sesiones;
            $sesion->id_pas = $id;
            $sesion->Nombre =$request->nombre;
            $sesion->Fecha = DATE('Y-m-d H:i:s');
            $sesion->Observaciones = $request->observ;
            $sesion->save();
            return view('prev_delito.show_ses', $consultado, $data);
    }
    
    public function ses_esp($id){
        //dd($id);
        $sesiones = \DB::table('Sesiones')->where('Id', '=', $id)->first();
        //dd($sesiones);
        $persona = \DB::table('Paciente')->where('Nombre','=', $sesiones->Nombre)->first();
        //dd($persona);
        $data = array('sesion' => $sesiones,);
        //dd($data);
        $pasiente = array('PasNom' => $persona->idPaciente,);
        //dd($pasiente);
        return view('prev_delito.show_sec_esp', $data, $pasiente);
    }

}
