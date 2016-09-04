<?php session_start(); ?> 

@extends('templates.tpd')
@section('navegacion')
<br>
<div class="row">
    <div id="navegacion" class="col s12">
      <a href="/predel">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Listado de Pacientes</a>
    </div>
  </div>
@stop
 
@section('content')
<table class="striped" id="app"><thead><tr><th>Nombre</th><th>Edad</th><th>Ocupación</th></thead>
<tbody v-for="paciente in pacientes">
	<tr>
		<td>
			@{{paciente.Nombre}}
		</td>
		<td>
			@{{paciente.edad}}
		</td>
		<td>
			@{{paciente.Ocupacion}}
		</td>
		<td>
			<a  href="/predel/persona/sesiones/@{{paciente.idPaciente}}" class="waves-effect waves-light btn">Consultar</a>
		</td>
		<td>
			<a  v-on:click="borrar(paciente.idPaciente, paciente)" class="waves-effect waves-light btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
		</td>
	</tr>

</tbody>
</table>

@stop

@section('script')
<script type="text/javascript">
Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector("#token").getAttribute('value');
	new Vue({
		el: 'body',
		data: {
			pacientes:[],
		},
		ready: function(){	
			this.getPaciente();
		},
		methods:{
			getPaciente: function(){
				this.$http.get('/predel/show/personas').then(function(response){
					this.$set('pacientes', response.data);	
				});
			},

			borrar: function(id, pasiente){
				var confirmar = confirm("Seguro desea eliminar a este paciente?");
				if (confirmar) {
					var conf2 = confirm("Muy seguro?");
					if(conf2){
					this.$http.post('/predel/del/pasiente', {'id_pas':id}).then(function(response){
						this.pacientes.$remove(pasiente);
						Materialize.toast('El Paciente a sido borrado', 3500);
					});
				}else{}
				}else{
					console.log("cuidado!!");
				}	
				
			}
		},
	});
</script>
@stop