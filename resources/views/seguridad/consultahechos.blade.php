<?php session_start() ?> 
@extends('templates.tdspv')
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Consulta de Hechos</a>
    </div>
  </div>
  
@stop
@section('content')

<section class = "container">
	<h3 class="center-align">CONSULTA DE HECHOS</h3>
	<div class="card-panel form-acceso">
		<form class = "col-s12" action ="/consultaaseguramientoform" method="POST">
			<div class="row">


				<div class = "input-field col s5 m5 l5">
	                <input id="hecho" type="text" class="validate" name ="hecho" required>
	                <label for="hecho">Hecho</label>
	            </div>
		        <div class = "input-field col s2 m2 l2">
		            <input id="fechainicio" type="text" class="validate" name ="fechainicio" required>
		            <label for="fechainicio">Fecha Inicio</label>
		        </div>
		        <div class = "input-field col s2 m2 l2">
		            <input id="fechafin" type="text" class="validate" name ="fechafin" required>
		            <label for="fechafin">Fecha Fin</label>
		        </div>
		        <div class = "col s3 m3 l3">
		        	<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">Buscar</button>
		        </div>
		    </div>
		</form>
	</div>
	    <div class = "card-panel form-acceso" v-show="existe">
	            <div class="row">
	            	<div class="col s5 m5 l5"> &nbsp</div>
	            	<div class="center col s2 m2 l2">
	            		<label for="registros">Hechos Registrados</label>
	            		<input id="registros" type="text" class="validate" name ="registros" readonly>
	            	</div>
	            	<div class="col s5 m5 l5"> &nbsp</div>
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