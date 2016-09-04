<?php session_start() ?> 
@extends('templates.tdspv')
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Detalle de Detenido</a>
    </div>
  </div>
  
@stop
@section('content')

<section class = "container">
	<h3 class="center-align">DETALLE DE INGRESO A BARANDILLA</h3>
	    <div class = "card-panel form-acceso">
	    		<div class="row">
	                <div class = "input-field col s6">
	                    <input id="horafechaingreso" type="text" class="validate" name ="horafechaingreso" readonly>
	                    <label for="horafechaingreso">Hora y Fecha de ingreso</label>
	                </div>
	                <div class = "input-field col s6">
	                    <input id="horafechasalida" type="text" class="validate" name ="horafechasalida" readonly>
	                    <label for="horafechasalida">Hora y Fecha de salida</label>
	                </div>
	            </div>
	    		<div class="row">
	                <div class = "input-field col s4">
	                    <input id="apaterno" type="text" class="validate" name ="apaterno" readonly>
	                    <label for="apaterno">Apellido Paterno</label>
	                </div>
	                <div class = "input-field col s4">
	                    <input id="amaterno" type="text" class="validate" name ="amaterno" readonly>
	                    <label for="amaterno">Apellido Materno</label>
	                </div>
	                <div class = "input-field col s4">
	                    <input id="nombre" type="text" class="validate" name ="nombre" readonly>
	                    <label for="apaterno" v-model="nombre">Nombre(s)</label>
	                </div>
	            </div>
	            <div class="row">
	                <div class = "input-field col s6">
	                    <input id="fechanac" type="text" class="validate" name ="fechanac" readonly>
	                    <label for="fechanac">Fecha de nacimiento</label>
	                </div>
	                <div class = "input-field col s6">
	                    <input id="apodo" type="text" class="validate" name ="apodo" readonly>
	                    <label for="apodo">Apodo</label>
	                </div>
	            </div>
	            <div class="row">
	                <div class = "input-field col s12">
	                    <input id="domicilio" type="text" class="validate" name ="domicilio" readonly>
	                    <label for="domicilio">Domicilio</label>
	                </div>
	            </div>
	            <div class="row">
	                <div class = "input-field col s3">
	                    <input id="unidadremite" type="text" class="validate" name ="unidadremite" readonly>
	                    <label for="unidadremite">Unidad que remite</label>
	                </div>
	                <div class = "input-field col s9">
	                    <input id="lugararresto" type="text" class="validate" name ="lugararresto" readonly>
	                    <label for="lugararresto">Lugar del arresto</label>
	                </div>
	            </div>
	            <div class="row">
	                <div class = "input-field col s6 m6 l6">
	                    <input id="pertenencias" type="text" class="validate" name ="pertenencias" readonly>
	                    <label for="pertenencias">Pertenencias al momento del arresto</label>
	                </div>
	                <div class = "input-field col s6 m6 l6">
	                    <input id="aseguramiento" type="text" class="validate" name ="aseguramiento" readonly>
	                    <label for="aseguramiento">Aseguramiento</label>
	                </div>
	            </div>
	            <div class="row">
	                <div class = "input-field col s6 m6 l6">
	                    <input id="motivoarresto" type="text" class="validate" name ="motivoarresto" readonly>
	                    <label for="motivoarresto">Motivo del arresto</label>
	                </div>
	                <div class = "input-field col s6 m6 l6">
	                	<input id="destino" type="text" class="validate" name ="destino" readonly>
	                    <label for="destino">Destino</label>
	                </div>
	            </div>
	            <div class="row">
	                <table>
			        	<tr>
			        		<th>OBSERVACIONES:</th>
			        	</tr>
			        </table>
		        	<div class="col s12 m12">
		        		<textarea id="observaciones" type="materialize-textarea" cols="40" class="validate" name="observaciones" readonly></textarea>
		        	</div>
	            </div>
	            <div class="row">
            		<table>
            			<tr>
            				<td>
            					<button class="waves-effect waves-light btn-large cyan darken-3 right"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp Regresar </button>
            				</td>
            			</tr>
            		</table>
            	</div>
	    </div>

</section>

@stop
@section('script')
<script>
console.log("sds");
	new Vue({
		el: "body",
		data: {
			hfi:"",
			hfs:"",
			apat:"",
			amat:"",
			nombre:"",
			fecnac:"",
			apodo:"",
			dom:"",
			unrem:"",
			lugarr:"",
			pertenencias:"",
			motivo:"",
			obs:"",
			registrar:false,
			btnpdf:false,
		},
		methods: {
			show_reg:function(){
				console.log(nombre);
				if (nombre.lenght==5){
					console.log("entra aqui");
				},
			}

		}
	});
</script>
@stop