<?php session_start() ?> 
@extends('templates.tdspv')
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Consulta de Incidencias SP</a>
    </div>
  </div>
  
@stop
@section('content')

<section class = "container">
	<h3 class="center-align">CONSULTA DE INCIDENCIAS POR FECHA</h3>
	<div class="card-panel form-acceso">
		<form class = "col-s12" action ="/consultaincidenciaspform" method="POST">
			<div class="row">
				<div class = "input-field col s3 m3 l3">
		            <input id="fecha" type="text" class="validate" name ="fecha" required>
		            <label for="fecha">Fecha</label>
		        </div>
		        <div class = "col s9 m9 l9">
		        	<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">Buscar</button>
		        </div>
		    </div>
		</form>
	</div>
	<div class="row card-panel form-acceso">
	  	<form action="/detalleincidenciasp" >
	        <div class = "col s4 m2">
	        	<table>
	        		<tr>
	        			<th>HECHO:</th>
	        		</tr>
	        	</table>
	        </div>
	        <div class = "col s8 m10">
	        	<textarea type="materialize-textarea" cols="40" class="validate" name="hecho" readonly></textarea>
	        </div>
			<div class = "col s12 m12">
				<table>
					<tr>
					    <th>HORA</th>
					    <th>Y</th>
					    <th>FECHA:</th>
					    <td><input type="text" class="validate" name="hora" readonly></td>
					    <td><label>horas</label></td>
					    <td><label>del</label></td>
					    <td><label>día</label></td>
				    	<td><input type="text" class="validate" name="dia" readonly></td>
					    <td><label>de</label></td>
					    <td><input type="text" class="validate" name="mes" readonly></td>
					    <td><label>de</label></td>
					    <td><input type="text" class="validate" name="anio" readonly></td>
					</tr>
				</table>
				<table>
					<tr>
					    <th>LUGAR:</th>
					    <td><textarea type="materialize-textarea" cols="40" class="validate" name="lugar" readonly></textarea></td>
					</tr>
				</table>
			</div>
			<div class = "col s8 m8 l8"> &nbsp</div>
			    <div class = "col s4 m4 l4">
			     	<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">Ver Detalles</button>
			    </div>
			</div>
		</form>
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