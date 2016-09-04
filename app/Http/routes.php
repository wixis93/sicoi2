<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
get('/', function () {
    return view('website.index');
});

//prueba para pdf
Route::get('/pdf', 'PdfController@invoice');


get('/registro','SegPubController@index' );
get('/segpub', function () {
    return view('website.vdspv');
});
get('/prevdel', function () {
    return view('website.vpd');
});
get('/hola','LoginController@obtener');






//get('/ingresar', 'LoginController@index');
post('/login', 'LoginController@login');
post('/controller', 'SegPubController@store');
 
Route::group(['middleware' => 'admin'], function(){
	get('/admin', 'AdminController@index');
	get('/logouta', 'AdminController@logout');
});
Route::group(['middleware' => 'policia'], function(){
	get('/poli', 'PoliController@index');
	get('/logoutp', 'PoliController@logout');
	get('/regsegpub',function(){
		return view('/website/registroincidenciasp');

	});
	/*get('/regvial',function(){
		return view('/website/registroincidenciavial');
	});
	get('/regbarandilla',function(){
		return view('/website/registrobarandilla');
	});
	Route::patch('/getemergencia.html','emergenciaController@show');*/
	//rutas echas por cande
	get('/registrobarandilla', 'PoliController@regbaran');
	get('/registroincidenciasp', 'PoliController@reginci');
	get('/registroincidenciavial', 'PoliController@regvial');
    get('/consultabarimagen', 'PoliController@imgbar');
	get('/consultaaseguramiento', 'PoliController@showAseg');
	get('/consultadetenido', 'PoliController@showdet');
	get('/consultagruas', 'PoliController@showgruas');
	get('/consultagruasfecha', 'PoliController@showgruasfecha');
	get('/consultaplacasfecha', 'PoliController@showplacasfecha');
	get('/detalledetenido', 'PoliController@detDete');
	get('/consultallamadas', 'PoliController@showllam');
	get('/consultahechos', 'PoliController@showhech');
	get('/consultaincidenciasp', 'PoliController@showInci');
	get('/detalleincidenciasp', 'PoliController@detinic');
	get('/liberardetenido', 'PoliController@libdet');
	get('/liberarvehiculo', 'PoliController@libveh');
	post('/new/barandilla', 'PoliController@storeBaran');
	post('/poli/show/detenido', 'PoliController@showDet');
});


Route::group(['middleware' => 'psicologo'], function(){
	get('/predel', 'PsicoController@index');
	get('/logoutpd', 'PsicoController@logout');
	get('/predel/new/persona', function(){
		return view('prev_delito.new_persona');
	});
	get('/predel/new/institucion','PsicoController@regInst');
	get('/predel/show/institucion','PsicoController@visIns');
	get('/predel/show/instituciones', 'PsicoController@mostrar');
	get('/predel/show/pacientes', 'PsicoController@mostrarPac');
	get('/predel/show/personas', 'PsicoController@showPas');
	get('/predel/show/sesiones/{id}', 'PsicoController@showSec');
	post('/predel/instituto', 'PsicoController@storeIns');
	post('/predel/persona', 'PsicoController@storePac');
	post('/predel/sesion/{id}', 'PsicoController@storeSes');
	get('/predel/show/updinst/{id}', 'PsicoController@showupdInst');
	post('/predel/upd/inst/', 'PsicoController@updInst');
	//ruta eliminar pasiente
	post('/predel/del/pasiente/', 'PsicoController@deletePac');
	post('/predel/del/inst', 'PsicoController@deleteIns');
	get('/predel/sesiones/{id}', 'PsicoController@newSes');
	get('/predel/persona/sesiones/{id}', 'PsicoController@mostrarSes');
	get('/predel/personas/sesion/{id}', 'PsicoController@ses_esp');
});
get('/users', function(){
	return App\User::all();
});