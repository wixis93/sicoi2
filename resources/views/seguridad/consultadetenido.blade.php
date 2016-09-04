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
	<h3 class="center-align">CONSULTA DE INGRESOS A BARANDILLA</h3>
	<div class="card-panel form-acceso">
		<form class = "col-s12" action ="/poli/show/detenido" method="POST">
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
		        	<!--button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">Buscar</button-->
		        </div>
		    </div>
		</form>
	</div>
	<div class = "card-panel form-acceso">
	<table class="striped"><thead><tr><th>Nombre</th><th>Fecha de Ingreso</th><th>Motivo</th></thead>
	<tbody>

</tbody>
</table>
	    </div>

</section>

@stop
@section('script')
<script>

</script>
@stop