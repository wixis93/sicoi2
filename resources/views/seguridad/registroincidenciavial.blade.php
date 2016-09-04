<?php session_start() ?> 
@extends('templates.tdspv')
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Registro de Incidencias de Vialidad</a>
    </div>
  </div>
  
@stop
@section('content')

<div class="container">
    <h3 class="center-align">REGISTRO DE INCIDENCIAS VIALIDAD</h3>
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
	        				<select id="incidenciavial" class="browser-default" name="incidenciavial">
	        					<option value="" disabled selected>Seleccione</option>
	        					@foreach ($emergencias as $emergencias)
                                <option value="{{$emergencias->id}}">{{$emergencias->Nombre}}</option>
                            	@endforeach
	        				</select>
	        				
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
					    <td><input type="text"  value="{{DATE('H:i:s')}}"class="validate" name="hora"></td>
					    <td><label>horas</label></td>
					    <td><label>del</label></td>
					    <td><label>día</label></td>
				    	<td><input type="text"  readonly="" value="{{DATE('d')}}" class="validate" name="dia"></td>
					    <td><label>de</label></td>
					    <td><input type="text" readonly="" value="{{DATE('m')}}" class="validate" name="mes"></td>
					    <td><label>de</label></td>
					    <td><input type="text" readonly="" value="{{DATE('Y')}}" class="validate" name="anio"></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class = "col s12 m12">
				<table>
					<tr>
					    <th style="width:140px;">LUGAR:</th>
					    <td>	<input type="text" cols="40" class="validate" name="lugar"></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class = "col s12 m12">
				<table>
					<tr>
					    <th style="width:140px;">AGRAVIADO O VÍCTIMA:</th>
					    <td><input type="text" cols="52" class="validate" name="victima"></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class = "col s12 m12">
				<table>
					<tr>
					    <th style="width:140px;">CONSIGNADOS:</th>
					    <td><input type="text" cols="35" class="validate" name="consignados"></td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class = "col s12 m12">
				<table>
					<tr>
					    <th style="width:140px;">ASEGURAMIENTO:</th>
					    <td><input type="text" cols="40" class="validate" name="aseguramiento"></td>
					</tr>
	            </table>
	    	</div>
        </div>
        <div class="row">
        	<div class="col s12 m2">
				Unidad:
				<input id="unidad" type="text" cols="5" class="validate" name="unidad">
        	</div>
        	<div class="col s12 m6">
        		Policías:
				<input id="policias" type="text" cols="20" class="validate" name="policias">
        	</div>
        	<div class="col s12 m4">
        		Tipo de Atención:
        		<select id="tipoatencion" class="browser-default" name="tipoatencion">
				    <option value="emergencias066">Llamada al 066</option>
				    <option value="llamadalocal">Llamada a Dirección</option>
				    <option value="patrullaje">Patrullaje</option>
				    <option value="apoyo">Apoyo</option>
				</select>
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
	        	<select id="tipovehiculo" class="browser-default" name="tipovehiculo">
	        		<option value="" disabled selected>Seleccione</option>
					@foreach ($tipos as $tipos)
                                <option value="{{$tipos->idTipo_vehiculo}}">{{$tipos->Tipo_carro}}</option>
                    @endforeach
	        	</select>
	        </div>
	        <div class="col s6 m4 l4">
	        	Marca:
				<select id="marcavehiculo" class="browser-default" name="marcavehiculo" v-model="marca">
					<option value="" disabled selected>Seleccione</option>
					@foreach ($marcas as $marcas)
                                <option value="{{$marcas->id}}">{{$marcas->nombre_marca}}</option>
                    @endforeach
				</select>
	        </div>
	        <div class="col s6 m4 l4">
	        	Nombre:
				<select id="nombrevehiculo" class="browser-default" name="nombrevehiculo"></select>
	        </div>
	    	<div class="col s6 m2 l2">
	        	Modelo:
				<select id="modelovehiculo" class="browser-default" name="modelovehiculo">
				<option value="" disabled selected>Seleccione</option>
					@foreach($modelos as $modelos)
						<option value="{{$modelos->idModelo_vehiculo}}">{{$modelos->Año}}</option>
					@endforeach
				</select>
	        </div>
	    	<div class="col s6 m3 l3">
	        	Color:
				<select id="colorvehiculo" class="browser-default" name="colorvehiculo">
					<option value="" disabled selected>Seleccione</option>
					@foreach ($colores as $colores)
                                <option value="{{$colores->idColor_vehiculo}}">{{$colores->Nombre}}</option>
                    @endforeach
				</select>
	        </div>
	        <div class="col s6 m4 l4">
	        	Serie:
				<input id="serievehiculo" type="text" cols="5" class="validate" name="serievehiculo">
	        </div>
			<div class="col s6 m3 l3">
	        	Placas:
				<input id="placavehiculo" type="text" cols="5" class="validate" name="placavehiculo">
	        </div>


	        <div class="col s6 m5 l5">
	        	Estado/Nacionalidad:
				<select id="estadovehiculo" class="browser-default" name="estadovehiculo">
					<option value="" disabled selected>Seleccione</option>
					@foreach ($lugares as $lugares)
                                <option value="{{$lugares->id}}">{{$lugares->estado}}</option>
                    @endforeach
				</select>
	        </div>
	        <div class="col s6 m3 l3">
	        	Situación:
				<select id="estatus" class="browser-default" name="estatus">
					<option value="1">Asegurado</option>
				    <option value="2">Liberado</option>
				</select>
	        </div>
	        <div class="col s6 m4 l4">
	        	Destino:
				<select id="destino" class="browser-default" name="destino">
					<option value="1">Grúas Raf</option>
				    <option value="2">Grúas El Mezquite</option>
				    <option value="3">Complejo SSP</option>
				</select>
	        </div>
	        <div class="col s9 m9 l9">
	        	Pendiente de pago:
				<input id="pagopendiente" type="text" cols="5" class="validate" name="pagopendiente">
	        </div>
	        <div class="col s3 m3 l3">
	        	Cantidad $:
				<input id="cantidadpago" type="number" step="any" cols="5" class="validate" name="cantidadpago">
	        </div>


			<div class="col s12 m6 l6">
	        	Propietario:
				<input id="propietariovehiculo" type="text" cols="5" class="validate" name="propietariovehiculo">
	        </div>
	    	<div class="col s12 m6 l6">
	        	Conductor:
				<input id="conductorvehiculo" type="text" cols="5" class="validate" name="conductorvehiculo">
	        </div>
	        <div class="col s12 m12 l12">
        		<button type="button" class="waves-effect waves-light btn-large cyan darken-3 right">Agregar vehículo</button>
        	</div>
        </div>
        <div class="row">
        	<table>
	        	<tr>
	        		<th>OBSERVACIONES:</th>
	        	</tr>
	        </table>
        	<div class="col s12 m12 l12">
        		<textarea id="observaciones" type="materialize-textarea" cols="40" class="validate" name="observaciones"></textarea>
        	</div>
        </div>
        <div class="row">
        	<div class="col s12 m12">
        		<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">REGISTRAR &nbsp<i class="fa fa-floppy-o" aria-hidden="true"></i></button>
        	</div>
        </div>
    </form>
</div>
@stop
@section('script')
<script type="text/javascript">

new Vue({
	el:body,
	data:{

	},
	methods:{

	},
});

</script>
@stop