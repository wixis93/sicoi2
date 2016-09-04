<?php session_start() ?> 
@extends('templates.tpd')
@section('navegacion')
<br>
 <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/predel">Menú principal</a>
      <span class="space">|</span>
      <a href="/predel/show/institucion">Instituciones guardadas</a>
       <span class="space">|</span>
       <a class="nav-active">Modificar Institución</a>
    </div>
  </div>
@stop

@section('content')
<center><h3>Modificar Institución</h3></center>
<hr>
<form action="/predel/upd/inst/" class="col s12" method="POST" >
{{ csrf_field() }}
<div class="row">
	<input type="hidden" name="id" value="{{$inst->idInstitucion}}">
	<div class="input-field col s1"></div>
	 <div class="input-field col s8">
		 <input type="text" name="nombre" value="{{$inst->Nombre}}">
		 <label id="texto" for="usuario">Nombre</label>
	 </div>	 
 </div>

<div class="row">
	<div class="input-field col s1"></div>
	 <div class="input-field col s8">
		 <input type="text" name="domicilio" value="{{$inst->Domicilio}}">
		 <label id="texto" for="usuario">Domicilio</label>
	 </div>	 
 </div>

 <div class="row">
	<div class="input-field col s1"></div>
	 <div class="input-field col s3">
		 <input type="text" name="telefono" value="{{$inst->telefono}}">
		 <label id="texto" for="usuario">Telefono</label>
	 </div>	
	 <div class="input-field col s7">
		 <input type="text" name="contacto" value="{{$inst->nombreContacto}}"> 
		 <label id="texto" for="usuario">Contacto</label>
	 </div>	  
 </div>

<hr>

<div class="row">
<div class="input-field col s7"></div>
	<div class="input-field col s4">
		<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">Modificar</button>
	</div>
</div>
</form>


@stop

