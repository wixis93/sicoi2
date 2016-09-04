<?php session_start() ?> 
@extends('templates.tdspv')
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Detalle de Incidencias de Seguridad Pública</a>
    </div>
  </div>
  
@stop
@section('content')

<section class="container">
	<div class="card-panel form-acceso center">
    	<h3 class="center-align">DETALLE DE INCIDENCIAS SP</h3>
        <div class="row center">
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
				<table>
					<tr>
					    <th>AGRAVIADO O VÍCTIMA:</th>
					    <td><textarea type="materialize-textarea" cols="52" class="validate" name="victima" readonly></textarea></td>
					</tr>
				</table>
				<table>
					<tr>
					    <th>CONSIGNADOS:</th>
					    <td><textarea type="materialize-textarea" cols="35" class="validate" name="consignados" readonly></textarea></td>
					</tr>
				</table>
				<table>
					<tr>
					    <th>ASEGURAMIENTO:</th>
					    <td><textarea type="materialize-textarea" cols="40" class="validate" name="aseguramiento" readonly></textarea></td>
					</tr>
	            </table>
	    	</div>
        </div>
        <div class="row center">
        	<div class="col s12 m2">
				Unidad:
				<textarea id="unidad" type="materialize-textarea" cols="5" class="validate" name="unidad" readonly></textarea>
        	</div>
        	<div class="col s12 m6">
        		Policías:
				<textarea id="policias" type="materialize-textarea" cols="20" class="validate" name="policias" readonly></textarea>
        	</div>
        	<div class="col s12 m4">
        		Tipo de Atención:
        		<textarea id="tipoatencion" type="materialize-textarea" cols="20" class="validate" name="tipoatencion" readonly></textarea>
        	</div>
        </div>
        <div class="row center">
        	<table>
	        	<tr>
	        		<th>OBSERVACIONES:</th>
	        	</tr>
	        </table>
        	<div class="col s12 m12">
        		<textarea id="observaciones" type="materialize-textarea" cols="40" class="validate" name="observaciones" readonly></textarea>
        	</div>
        </div>
        <div class="row center">
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
<script type="text/javascript">
	$(function(){
		$('#auto').on('keyup',function(){
			$('[name="nombre_emergencia"]').html('');
			nombre = $(this).val().trim();
			if(nombre.length > 2){
				$.ajax({
					type:'POST',
					url:"{{url('/getemergencia.html')}}",
					data:{
						_token:"{{csrf_token()}}",
						_method:"PATCH",
						nombre:nombre
					},
					success:function(data){
						if(data.trim() != ""){
							data = JSON.parse(data);
							$.each(data,function(i,v){
								$('[name="nombre_emergencia"]').append('<option value="' + v.idEmergencia + '">' + v.Nombre + '</option>');
							});
						}
					},
				});
			}
		});
	});
</script>
@stop