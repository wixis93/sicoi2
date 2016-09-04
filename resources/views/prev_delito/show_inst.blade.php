<?php session_start(); ?> 

@extends('templates.tpd')
@section('navegacion')
<br>
<div class="row">
    <div id="navegacion" class="col s12">
      <a href="/"></a>
      <a href="/predel">Menú principal</a>
      <span class="space">|</span>
      <a class="nav-active">Instituciones guardadas</a>
    </div>
  </div>
@stop

@section('content')
<table class="striped"><thead><tr><th>Nombre</th><th>Domicilio</th><th>Telefono</th><th>Representante</th><th>Opciones</th></thead>
<tbody v-for="institucion in instituciones">
	<tr>
		<td>
			@{{institucion.Nombre}}
		</td>
		<td>
			@{{institucion.Domicilio}}
		</td>
		<td>
			@{{institucion.telefono}}
		</td>
		<td>
			@{{institucion.nombreContacto}}
		</td>
		<td>
		&nbsp
		<a  href="/predel/show/updinst/@{{institucion.idInstitucion}}" class="waves-effect waves-light btn"><i class="fa fa-pencil" aria-hidden="true"></i></a>
		&nbsp&nbsp
		<a v-on:click="borrar(institucion.idInstitucion, paciente)" class="waves-effect waves-light btn"><i class="fa fa-trash" aria-hidden="true"></i>
		</a> 
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
	data:{
		instituciones:[],
	},
	ready: function(){
		this.getInstitucion();
	},
	methods:{
		getInstitucion: function(){
			this.$http.get('/predel/show/instituciones').then(function(response){
				this.$set('instituciones', response.data);
			});
		},

		borrar: function(id, institucion){
			var confirmar = confirm("¿Seguro quiere eliminar la Institución?");
			if (confirmar) {
				this.$http.post('/predel/del/inst', {'id_ins':id}).then(function(response){
					this.instituciones.$remove(institucion);
					Materialize.toast('La institucion a sido borrada', 3500)
			});
			}else{}
		}
	}

});
</script>
@stop


