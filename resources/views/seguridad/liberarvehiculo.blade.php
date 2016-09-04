<?php session_start() ?> 
@extends('templates.tdspv')
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Consulta de Incidencias de Vialidad</a>
    </div>
  </div>
  
@stop
@section('content')

<section class="container">
	<div class="card-panel form-acceso">
	    <h3 class="center-align">LIBERAR UN VEHÍCULO</h3>
	    <form action ="/sp" method="POST" class="card-panel form-acceso">
	    	<div class="row">
				<div class="col s12 m4 l4">
	        		Placas:
	        		<textarea id="placa" type="text" class="validate" name ="placa" required></textarea>
	        	</div>
	        	<div class="col s12 m4 l4">
	        		Fecha:
		            <textarea id="fecha" type="text" class="validate" name ="fecha" required></textarea>
	        	</div>
		        <div class = "col s4 m4 l4">
		        	<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">Buscar</button>
		        </div>
		    </div>
	    </form>
	</div>
	<div class="card-panel form-acceso" v-form="existe">
	        <div class="row">
		        <div class = "col s4 m2">
		        	<table>
		        		<tr>
		        			<th>HECHO:</th>
		        		</tr>
		        	</table>
		        </div>
		        <div class = "col s8 m10">
		        	<table>
		        		<tr>
		        			<td class="center">DE TRÁNSITO</td>
		        		</tr>
		        	</table>
		        </div>
		    </div>
		    <div class="row">
		    	<div class = "col s2 m2 l2">
		        	<table>
		        		<tr>
		        			<th>TIPO:</th>
		        		</tr>
		        	</table>
		        </div>
		        <div class = "col s10 m10 l10">
		        	<table>
		        		<tr>
		        			<td class="center">
		        				<textarea type="materialize-textarea" id="incidenciavial" cols="52" class="validate" name="incidenciavial" readonly></textarea>
		        			</td>
		        		</tr>
		        	</table>
		        </div>
		    </div>
		    <div class="row">
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
				</div>
			</div>
			<div class="row">
				<div class = "col s12 m12">
					<table>
						<tr>
						    <th>LUGAR:</th>
						    <td><textarea type="materialize-textarea" cols="40" class="validate" name="lugar" readonly></textarea></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="row">
				<div class = "col s12 m12">
					<table>
						<tr>
						    <th>AGRAVIADO O VÍCTIMA:</th>
						    <td><textarea type="materialize-textarea" cols="52" class="validate" name="victima" readonly></textarea></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="row">
				<div class = "col s12 m12">
					<table>
						<tr>
						    <th>CONSIGNADOS:</th>
						    <td><textarea type="materialize-textarea" cols="35" class="validate" name="consignados" readonly></textarea></td>
						</tr>
					</table>
				</div>
			</div>
			<div class="row">
				<div class = "col s12 m12">
					<table>
						<tr>
						    <th>ASEGURAMIENTO:</th>
						    <td><textarea type="materialize-textarea" cols="40" class="validate" name="aseguramiento" readonly></textarea></td>
						</tr>
		            </table>
		    	</div>
	        </div>
	        <div class="row">
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
	        <div class="row card-panel form-acceso">
	        	<table>
		        		<tr>
		        			<th>Vehículo:</th>
		        		</tr>
		        	</table>
		        <div class="col s6 m4 l4">
		        	Tipo:
		        	<textarea id="tipovehiculo" type="materialize-textarea" cols="20" class="validate" name="tipovehiculo" readonly></textarea>
		        </div>
		        <div class="col s6 m4 l4">
		        	Marca:
		        	<textarea id="marcavehiculo" type="materialize-textarea" cols="20" class="validate" name="marcavehiculo" readonly></textarea>
		        </div>
		        <div class="col s6 m4 l4">
		        	Nombre:
		        	<textarea id="nombrevehiculo" type="materialize-textarea" cols="20" class="validate" name="nombrevehiculo" readonly></textarea>
		        </div>
		    	<div class="col s6 m2 l2">
		        	Modelo:
		        	<textarea id="modelovehiculo" type="materialize-textarea" cols="20" class="validate" name="modelovehiculo" readonly></textarea>
		        </div>
		    	<div class="col s6 m3 l3">
		        	Color:
		        	<textarea id="colorvehiculo" type="materialize-textarea" cols="20" class="validate" name="colorvehiculo" readonly></textarea>
		        </div>
		        <div class="col s6 m4 l4">
		        	Serie:
					<textarea id="serievehiculo" type="materialize-textarea" cols="5" class="validate" name="serievehiculo" readonly></textarea>
		        </div>
				<div class="col s6 m3 l3">
		        	Placas:
					<textarea id="placavehiculo" type="materialize-textarea" cols="5" class="validate" name="placavehiculo" readonly></textarea>
		        </div>


		        <div class="col s6 m5 l5">
		        	Estado/Nacionalidad:
		        	<textarea id="estadovehiculo" type="materialize-textarea" cols="5" class="validate" name="estadovehiculo" readonly></textarea>
		        </div>
		        <div class="col s6 m3 l3">
		        	Situación:
		        	<textarea id="estatus" type="materialize-textarea" cols="5" class="validate" name="estatus" readonly></textarea>
		        </div>
		        <div class="col s6 m4 l4">
		        	Destino:
		        	<textarea id="destino" type="materialize-textarea" cols="5" class="validate" name="destino" readonly></textarea>
		        </div>
		        <div class="col s9 m9 l9">
		        	Pendiente de pago:
					<textarea id="pagopendiente" type="materialize-textarea" cols="5" class="validate" name="pagopendiente" readonly></textarea>
		        </div>
		        <div class="col s3 m3 l3">
		        	Cantidad $:
					<textarea id="cantidadpago" type="materialize-textarea" cols="5" class="validate" name="cantidadpago" readonly></textarea>
		        </div>


				<div class="col s12 m6 l6">
		        	Propietario:
					<textarea id="propietariovehiculo" type="materialize-textarea" cols="5" class="validate" name="propietariovehiculo" readonly></textarea>
		        </div>
		    	<div class="col s12 m6 l6">
		        	Conductor:
					<textarea id="conductorvehiculo" type="materialize-textarea" cols="5" class="validate" name="conductorvehiculo" readonly></textarea>
		        </div>
		        <div class="col s12 m12 l12">
        		<button type="button" class="waves-effect waves-light btn-large cyan darken-3 right">Liberar Vehículo</button>
        	</div>
	        </div>
	        <div class="row">
	        	<table>
		        	<tr>
		        		<th>OBSERVACIONES:</th>
		        	</tr>
		        </table>
	        	<div class="col s12 m12 l12">
	        		<textarea id="observaciones" type="materialize-textarea" cols="40" class="validate" name="observaciones" readonly></textarea>
	        	</div>
	        </div>
	</div>
</section>
@stop
@section('script')
<script type="text/javascript">
</script>
@stop