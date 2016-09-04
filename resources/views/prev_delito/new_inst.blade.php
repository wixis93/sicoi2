<?php session_start() ?> 
@extends('templates.tpd')
@section('navegacion')
<br>
<div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/predel">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Registro de Intitución</a>
    </div>
  </div>
@stop

@section('content')
<center><h3>Nueva Institución</h3></center>
<hr>
@if(session()->has('exito'))
<p style="color: red;">Institución guardada</p>
@endif
<form action="/predel/instituto" class="col s12" method="POST" >
{{ csrf_field() }}
<div class="row">
	<div class="input-field col s1"></div>
	 <div class="input-field col s8">
		 <input type="text" name="nombre">
		 <label id="texto" for="usuario">Nombre</label>
	 </div>	 
 </div>

<div class="row">
	<div class="input-field col s1"></div>
	 <div class="input-field col s8">
		 <input type="text" name="domicilio">
		 <label id="texto" for="usuario">Domicilio</label>
	 </div>	 
 </div>

 <div class="row">
	<div class="input-field col s1"></div>
	 <div class="input-field col s3">
		 <input type="text" name="telefono">
		 <label id="texto" for="usuario">Telefono</label>
	 </div>	
	 <div class="input-field col s7">
		 <input type="text" name="contacto">
		 <label id="texto" for="usuario">Contacto</label>
	 </div>	  
 </div>

<hr>

<div class="row">
<div class="input-field col s7"></div>
	<div class="input-field col s4">
		<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">Registrar &nbsp<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
	</div>
</div>
</form>


@stop

