<?php session_start(); ?> 

@extends('templates.tpd')
@section('head')

@stop
@section('navegacion')
<br>
<div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/predel">Menú principal</a>
      <span class="space">|</span>
      <a href="/predel/show/pacientes">Listado de Pacientes</a>
      <span class="space">|</span>
      <a class="nav-active">Sesiones del Paciente</a>
    </div>
  </div>
@stop

@section('content')
<center><h4>Datos del paciente</h4></center>
<div class="row">
	<div class="input-field col s1"></div>
	<div class="input-field col s8">
		<input disabled value="{{$pasiente->Nombre}}" id="disabled" type="text" class="validate">
        <label for="disabled">Nombre</label>
	 </div>	 
</div>

<div class="row">
	<div class="input-field col s1"></div>
	<div class="input-field col s4t">
		<input disabled value="{{$pasiente->Ocupacion}}" id="disabled" type="text" class="validate">
        <label for="disabled">Ocupación</label>
	</div>
	<div class="input-field col s3">
		<input disabled value="{{$pasiente->sexo}}" id="disabled" type="text" class="validate">
        <label for="disabled">Sexo</label>
	</div>
	<div class="input-field col s2">
		<input disabled value="{{$pasiente->edad}}" id="disabled" type="text" class="validate">
        <label for="disabled">Edad</label>
	</div>
</div>

<div class="row">
	<div class="input-field col s1"></div>
	<div class="input-field col s5">
		<input disabled value="{{$pasiente->padre}}" id="disabled" type="text" class="validate">
        <label for="disabled">Padre</label>
	</div>
	<div class="input-field col s5">
		<input disabled value="{{$pasiente->madre}}" id="disabled" type="text" class="validate">
        <label for="disabled">Madre</label>
	</div>
</div>

<hr>
<h5>Domicilio</h5>

<div class="row">
	<div class="input-field col s1"></div>
	<div class="input-field col s3">
		<input disabled value="{{$pasiente->Colonia}}" id="disabled" type="text" class="validate">
        <label for="disabled">Colonia</label>
	</div>
	<div class="input-field col s5">
		<input disabled value="{{$pasiente->Calle}}" id="disabled" type="text" class="validate">
        <label for="disabled">Calle</label>
	</div>
	<div class="input-field col s2">
		<input disabled value="{{$pasiente->num_ext}}" id="disabled" type="text" class="validate">
        <label for="disabled">Numero</label>
	</div>
</div>
<hr>
<br>
<br>
<h5>Sesiones</h5>
<div class="row">
<div class="input-field col s12">
<table class="striped" id="app"><thead><tr><th>Nombre</th><th>Fecha</th><th>Observaciones</th></thead>
<tbody v-for="sesion in sesiones">
	<tr>
		<td>
			@{{sesion.Nombre}}
		</td>
		<td>
			@{{sesion.Fecha}}
		</td>
		<td>
			<a href="/predel/personas/sesion/@{{sesion.Id}}" class="waves-effect waves-light btn">Ver</a>
		</td>
		<td>
			<a href="" class="waves-effect waves-light btn">PDF</a>
		</td>
	</tr>
</tbody>
</table>
</div>
</div>
<hr>
<div class="row">
	<div class="input-field col s7"></div>
	<div class="input-field col s4">
		<a href="/predel/sesiones/{{$pasiente->idPaciente}}" class="waves-effect waves-light btn">Nueva Consulta</a>
	</div>
</div>
@stop
@section('script')
<script type="text/javascript">
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("#token").getAttribute('value');	
	new Vue({
		el: 'body',
		data: {
			sesiones:[],
		},
		ready: function(){
			this.getSesiones();
		},
		methods:{
			getSesiones: function(){
				
				this.$http.get('/predel/show/sesiones/{{$pasiente->idPaciente}}').then(function(response){
					this.$set('sesiones', response.data);
				});
			}
		},
	});
</script>
@stop