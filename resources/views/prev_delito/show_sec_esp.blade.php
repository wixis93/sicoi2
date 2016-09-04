<?php session_start(); ?> 

@extends('templates.tpd')
@section('navegacion')
<br>
<div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/predel">Menú principal</a>
      <span class="space">|</span>
      <a href="/predel/show/pacientes">Listado de Pacientes</a>
      <span class="space">|</span>
      <a href="/predel/persona/sesiones/{{$PasNom}}">Sesiones del Paciente</a>
      <span class="space">|</span>
      <a class="nav-active">Ver sesion</a>
    </div>
  </div>
@stop

@section('content')
<center><h4>Dato de la Consulta</h4></center>
<div class="row">
  <div class="input-field col s8"></div>
    <div class="input-field col s3">
      <input  readonly="" name="fecha" value="{{$sesion->Fecha}}" id="disabled" type="text" class="validate">
      <label>Fecha:</label> 
    </div>
</div>

<div class="row">
	<div class="input-field col s1"></div>
	<div class="input-field col s8">
		<input readonly="" value="{{$sesion->Nombre}}" id="disabled" type="text" class="validate" name="nombre">
        <label for="disabled">Nombre</label>
	 </div>	 
</div>
<div class="row">
	<div class="input-field col s1"></div>
	<div class="input-field col s8">
		<textarea readonly="" class="materialize-textarea">{{$sesion->Observaciones}}</textarea>
      <label for="textarea1">Observaciones</label>
    </div>
</div>
<hr>
<div class="row">
<div class="input-field col s7"></div>
	<a href="" class="waves-effect waves-light btn">Genera PDF</a>
</div>
@stop