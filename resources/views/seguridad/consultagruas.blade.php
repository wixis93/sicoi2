<?php session_start() ?> 
@extends('templates.tdspv')
@section('navegacion')
  <div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/poli">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Consulta de Vehículos Asegurados</a>
    </div>
  </div>
  
@stop
@section('content')

<section class = "container">
	<h3 class="center-align">CONSULTA DE VEHÍCULOS ASEGURADOS</h3>
	<div class="card-panel form-acceso">
		<form class = "col-s12" action ="/consultaaseguramientoform" method="POST">
			<div class="row">
				<div class="col s12 m4 l4">
	        		Destino:
	        		<select id="destino" class="browser-default" required>
					    <option value="1">Grúas Raf</option>
					    <option value="2">Grúas El Mezquite</option>
					</select>
	        	</div>
	        	<div class="col s12 m4 l4"> &nbsp</div>
		        <div class = "col s4 m4 l4">
		        	<button type="submit" class="waves-effect waves-light btn-large cyan darken-3 right">Buscar</button>
		        </div>
		    </div>
		</form>
	</div>
	    <div class = "card-panel form-acceso" v-show="existe">
	            <div class="row">
	            	<div class = "col s12 m12 l12" v-show="raf">
	            		<center> <h5> Vehículos asegurados por Grúas Raf </h5></center>
	            	</div>
	            	<div class = "col s12 m12 l12" v-show="mezquite">
	            		<center> <h5> Vehículos asegurados por Grúas El Mezquite </h5></center>
	            	</div>

	            	<div class="col s6 m3 l3">
			        	Marca:
			        	<textarea id="marcavehiculo" type="materialize-textarea" cols="5" class="validate" name="marcavehiculo" readonly></textarea>
			        </div>
			        <div class="col s6 m4 l4">
			        	Nombre:
			        	<textarea id="nombrevehiculo" type="materialize-textarea" cols="5" class="validate" name="nombrevehiculo" readonly></textarea>
			        </div>
			    	<div class="col s6 m2 l2">
			        	Modelo:
			        	<textarea id="modelovehiculo" type="materialize-textarea" cols="5" class="validate" name="modelovehiculo" readonly></textarea>
			        </div>
			    	<div class="col s6 m3 l3">
			        	Color:
			        	<textarea id="colorvehiculo" type="materialize-textarea" cols="5" class="validate" name="colorvehiculo" readonly></textarea>
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

			        <div class="col s9 m9 l9">
			        	Pendiente de pago:
						<textarea id="pagopendiente" type="materialize-textarea" cols="5" class="validate" name="pagopendiente" readonly></textarea>
			        </div>
			        <div class="col s3 m3 l3">
			        	Cantidad $:
						<textarea id="cantidadpago" type="materialize-textarea" cols="5" class="validate" name="cantidadpago" readonly></textarea>
			        </div>

					<div class="col s12 m12 l12">
			        	Propietario:
						<textarea id="propietariovehiculo" type="materialize-textarea" cols="5" class="validate" name="propietariovehiculo" readonly></textarea>
			        </div>


	            </div>
	    </div>

</section>

@stop
@section('script')
<script>
console.log("sds");
	new Vue({
		el: "body",
		data: {
			hfi:"",
			hfs:"",
			apat:"",
			amat:"",
			nombre:"",
			fecnac:"",
			apodo:"",
			dom:"",
			unrem:"",
			lugarr:"",
			pertenencias:"",
			motivo:"",
			obs:"",
			registrar:false,
			btnpdf:false,
		},
		methods: {
			show_reg:function(){
				console.log(nombre);
				if (nombre.lenght==5){
					console.log("entra aqui");
				},
			}

		}
	});
</script>
@stop