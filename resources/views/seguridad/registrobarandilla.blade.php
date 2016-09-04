<?php session_start() ?> 
@extends('templates.tdspv')
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Registro de Detenidos</a>
    </div>
  </div>
  
@stop
@section('content')

<section class = "container">
	<h3 class="center-align">REGISTRO DE INGRESO A BARANDILLA</h3>
	    <div class = "card-panel form-acceso">
	    	<form class = "col-s12" action ="/new/barandilla" method="POST" enctype="multipart/form-data">
	    	{{ csrf_field() }}
	    		<div class="row">
	                <div class = "input-field col s6">

	                    <input id="horafechaingreso" type="text" class="validate" name ="horafechaingreso" value="{{DATE('Y-m-d')}}" readonly="">
	                    <label for="horafechaingreso">Fecha de ingreso</label>
	                </div>
	                <div class = "input-field col s6">
	                    <input id="horafechasalida" type="text" class="validate" name ="horafechasalida">
	                    <label for="horafechasalida">Fecha de salida</label>
	                </div>
	            </div>
	            <div class="row">
	            <!--img src="@{{img}}" v-if="img"-->
	            <div class="input-field col s1"></div>
	            <div class="input-field col s10">
	            	<div class="file-field input-field">
				      <div class="btn">
				        <span>Imagen</span>
				        <input type="file" name="image">
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate" type="text" v-model="img">
				      </div>
    				</div>
	            </div>
	            </div>
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

	                    <input id="nombre" type="text" class="validate" name ="nombre">
	                    <label for="apaterno">Nombre(s)</label>
	                </div>
	            </div>
	            <div class="row">
	                <div class = "input-field col s6">

	                    <input id="fechanac" type="text" class="validate" name ="fechanac" placeholder="ej: 1984-08-24">

	                    <label for="fechanac">Fecha de nacimiento</label>
	                </div>
	                <div class = "input-field col s6">
	                    <input id="apodo" type="text" class="validate" name ="apodo" required>
	                    <label for="apodo">Apodo</label>
	                </div>
	            </div>
	            <div class="row">
	                <div class = "input-field col s12">
	                    <input id="domicilio" type="text" class="validate" name ="domicilio" required>
	                    <label for="domicilio">Domicilio</label>
	                </div>
	            </div>
	            <div class="row">
	                <div class = "input-field col s3">
	                    <input id="unidadremite" type="text" class="validate" name ="unidadremite" required>
	                    <label for="unidadremite">Unidad que remite</label>
	                </div>
	                <div class = "input-field col s9">
	                    <input id="lugararresto" type="text" class="validate" name ="lugararresto" required>
	                    <label for="lugararresto">Lugar del arresto</label>
	                </div>
	            </div>
	            <div class="row">
	                <div class = "input-field col s6 m6 l6">
	                    <input id="pertenencias" type="text" class="validate" name ="pertenencias" required>
	                    <label for="pertenencias">Pertenencias al momento del arresto</label>
	                </div>
	                <div class = "input-field col s6 m6 l6">
	                    <input id="aseguramiento" type="text" class="validate" name ="aseguramiento" required>
	                    <label for="aseguramiento">Aseguramiento</label>
	                </div>
	            </div>
	            <div class="row">
	                <div class = "input-field col s6 m6 l6">
	                    <input id="motivoarresto" type="text" class="validate" name ="motivoarresto" required>
	                    <label for="motivoarresto">Motivo del arresto</label>
	                </div>
	                <div class = "input-field col s6 m6 l6">
	                	Destino

	                	<select id="destino" class="browser-default" name="destino">
	                		<option value="Ministerio Público">Ministerio Público</option>
						    <option value="Separos Preventivos">Separos Preventivos</option>
	                	</select>
	                </div>
	            </div>
	            <div class="row">
	                <table>
			        	<tr>
			        		<th>OBSERVACIONES:</th>
			        	</tr>
			        </table>
		        	<div class="col s12 m12">
		        		<textarea id="observaciones" type="materialize-textarea" cols="40" class="validate" name="observaciones" required></textarea>
		        	</div>
	            </div>
	           <div class="row">
            		<table>
            			<tr>
            				<td>
            					<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">Registrar Ingreso &nbsp<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
            				</td>
            			</tr>
            		</table>
            	</div>
	            

	    	</form>
	    </div>

</section>

@stop
@section('script')
<script type="text/javascript">
	new Vue({
	el: 'body',
	data: {
		img: "",
	}
});
</script>
@stop