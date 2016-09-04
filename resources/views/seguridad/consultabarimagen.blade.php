<?php session_start() ?> 
@extends('templates.tdspv')
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Consulta de Detenidos</a>
    </div>
  </div>
  
@stop
@section('content')

<section class = "container">
	<h3 class="center-align">CONSULTA DE INGRESO A BARANDILLA CON IMAGEN</h3>
	<div class="card-panel form-acceso">
		<form class = "col-s12" action ="/consultabarimagenform" method="POST">
			<div class="row">
		        <div class = "input-field col s4">
		            <input id="apaterno" type="text" class="validate" name ="apaterno" required>
		            <label for="apaterno">Apellido Paterno</label>
		        </div>
		        <div class = "input-field col s4">
		            <input id="amaterno" type="text" class="validate" name ="amaterno" required>
		            <label for="amaterno">Apellido Materno</label>
		        </div>
		        <div class = "input-field col s4">
		            <input id="nombre" type="text" class="validate" name ="nombre" required>
		            <label for="apaterno" v-model="nombre">Nombre(s)</label>
		        </div>
		        <div class = "col s9 m9 l9"> &nbsp</div>
		        <div class = "col s3 m3 l3">
		        	<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">Buscar</button>
		        </div>
		    </div>
		</form>
	</div>
	    <div class = "card-panel form-acceso" v-show="existe">
	            <div class="row">
	            	<div class="col s4 m4 l4"> &nbsp</div>
	            	<div class="center col s4 m4 l4">
	            		<img src="897" alt="imagen" style="width:120px;height:140px;" readonly>
	            	</div>
	            	<div class="col s4 m4 l4"></div>
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