<?php session_start() ?> 
@extends('templates.tdspv')
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Registro de Incidencias de Seguridad Pública</a>
    </div>
  </div>
  
@stop
@section('content')

<div class="container">
    <h3 class="center-align">REGISTRO DE INCIDENCIAS SP</h3>
    <form action ="/sp" method="POST" class="card-panel form-acceso">
        <div class="row">
	        <div class = "col s4 m2">
	        	<table>
	        		<tr>
	        			<th>HECHO:</th>
	        		</tr>
	        	</table>
	        </div>
	        <div class = "col s8 m10">

	        	<select id="nombre_emergencia" class="browser-default" name="nombre_emergencia" required>
	        		<option value="" disabled selected>Seleccione</option>
	        		@foreach ($emergencias as $emergencias)
                        <option value="{{$emergencias->id}}">{{$emergencias->Nombre}}</option>
                    @endforeach
	        	</select>
	        		
	        </div>
			<div class = "col s12 m12">
				<table>
					<tr>
					    <th>HORA</th>
					    <th>Y</th>
					    <th>FECHA:</th>
					    <td><input type="text" class="validate" name="hora" required></td>
					    <td><label>horas</label></td>
					    <td><label>del</label></td>
					    <td><label>día</label></td>
				    	<td><input type="text" class="validate" name="dia" required></td>
					    <td><label>de</label></td>
					    <td><input type="text" class="validate" name="mes" required></td>
					    <td><label>de</label></td>
					    <td><input type="text" class="validate" name="anio" required></td>
					</tr>
				</table>
				<table>
					<tr>
					    <th style="width:130px;">LUGAR:</th>
					    <td><input type="text" cols="40" class="validate" name="lugar" required></td>
					</tr>
				</table>
				<table>
					<tr>
					    <th style="width:130px;">AGRAVIADO O VÍCTIMA:</th>
					    <td><input type="text" cols="52" class="validate" name="victima" required></td>
					</tr>
				</table>
				<table>
					<tr>
					    <th style="width:130px;">CONSIGNADOS:</th>
					    <td><input type="text" cols="35" class="validate" name="consignados" required></td>
					</tr>
				</table>
				<table>
					<tr>
					    <th style="width:130px">ASEGURAMIENTO:</th>
					    <td><input type="text" cols="40" class="validate" name="aseguramiento" required></td>
					</tr>
	            </table>
	    	</div>
        </div>
        <div class="row">
        	<div class="col s12 m2">
				Unidad:
				<input id="unidad" type="text" cols="5" class="validate" name="unidad" required>
        	</div>
        	<div class="col s12 m6">
        		Policías:
				<input id="policias" type="text" cols="20" class="validate" name="policias" required>
        	</div>
        	<div class="col s12 m4">
        		Tipo de Atención:
        		<select id="tipoatencion" class="browser-default" required>
				    <option value="emergencias066">Llamada al 066</option>
				    <option value="llamadalocal">Llamada a Dirección</option>
				    <option value="patrullaje">Patrullaje</option>
				    <option value="apoyo">Apoyo</option>
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
        	<div class="col s12 m12">
        		<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">REGISTRAR&nbsp<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
        	</div>
        </div>
    </form>
</div>



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