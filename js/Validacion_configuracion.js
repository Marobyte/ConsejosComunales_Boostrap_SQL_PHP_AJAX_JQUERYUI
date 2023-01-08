// JavaScript Document
///////////////////////////////////////GUARDAR DATOS CONFIGURACION

function Validacion_tipo_usuario (){
	
	
	var Vlc_Tipo_Usuario = $("#Tipo_Usuario").val();
	if (Vlc_Tipo_Usuario == ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
	Vlc_Tipo_Usuario=Vlc_Tipo_Usuario.toUpperCase();
	
	
	campos_1 = 'DS_tipo_usuario';
	$.ajax({
		type: "POST",
		dataType:"html",
		url: "Guardar_configuracion.php",			
		data: "nb_tabla= SS_TIPO_USUARIO&campos="+campos_1+"&valores='"+Vlc_Tipo_Usuario+"'&id=id_tipo_usuario",	
		beforeSend: function() {			
					//$('#exp').remove();
			},			
		cache: false,			
		success: function(result) {			
			alert('Registro Guardado Correctamente')
			$("#Tipo_Usuario").val('');
			return result;			
		},			
		error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
			
		});					
}

//////PERMISOLOGIA USUARIOS
function Validacion_permisologia_usuario (){
	
	
	
	var Vlc_cedula_permisologia = $("#cedula_permisologia").val();
	if (Vlc_cedula_permisologia == ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
	
	
	
	var Vln_p_reportes;
	$("#p_reportes").attr('checked');
		 if  ($("#p_reportes").attr('checked')=='checked')
		Vln_p_reportes=1;		 
	else 
	 	Vln_p_reportes=0;
	
	
	var Vln_p_configuracion;
	$("#p_configuracion").attr('checked');
		 if  ($("#p_configuracion").attr('checked')=='checked')
		Vln_p_configuracion=1;		 
	else 
	 	Vln_p_configuracion=0;
		
	var Vln_p_usuarios;
	$("#p_usuarios").attr('checked');
		 if  ($("#p_usuarios").attr('checked')=='checked')
		Vln_p_usuarios=1;			 
	else 
	 	Vln_p_usuarios=0;
	
	
	var Vln_p_auditor;
	$("#p_auditor").attr('checked');
		 if  ($("#p_auditor").attr('checked')=='checked')
		Vln_p_auditor=1;		 
	else 
	 	Vln_p_auditor=0;
	
	
	var Vln_p_nuevo_exp;
	$("#p_nuevo_exp").attr('checked');
		 if  ($("#p_nuevo_exp").attr('checked')=='checked')
		Vln_p_nuevo_exp=1;		 
	else 
	 	Vln_p_nuevo_exp=0;
	
	
	var Vln_p_cerrar_exp;
	$("#p_cerrar_exp").attr('checked');
		 if  ($("#p_cerrar_exp").attr('checked')=='checked')
		Vln_p_cerrar_exp=1;		 
	else 
	 	Vln_p_cerrar_exp=0;
	
	
	var Vln_p_reabrir_exp;
	$("#p_reabrir_exp").attr('checked');
		 if  ($("#p_reabrir_exp").attr('checked')=='checked')
		Vln_p_reabrir_exp=1;		 
	else 
	 	Vln_p_reabrir_exp=0;
	
	
	var Vln_p_reportar_exp;
	$("#p_reportar_exp").attr('checked');
		 if  ($("#p_reportar_exp").attr('checked')=='checked')
		Vln_p_reportar_exp=1;		 
	else 
	 	Vln_p_reportar_exp=0;
		
	var Vln_p_modificar_exp;
	$("#p_modificar_exp").attr('checked');
		 if  ($("#p_modificar_exp").attr('checked')=='checked')
		Vln_p_modificar_exp=1;		 
	else 
	 	Vln_p_modificar_exp=0;
		
	var Vln_p_registrar_datos_exp;
	$("#p_registrar_datos_exp").attr('checked');
		 if  ($("#p_registrar_datos_exp").attr('checked')=='checked')
		Vln_p_registrar_datos_exp=1;		 
	else 
	 	Vln_p_registrar_datos_exp=0;
		
	
	
	
		 
	campos_1 = 'CI_USUARIO,REPORTE,CONFIGURACION,USUARIOS,AUDITOR,NUEVO_EXP,CERRAR_EXP,REABRIR_EXP,REPORTAR_EXP,MODIFICAR_EXP,REGISTRAR_DATOS_EXP';
	$.ajax({
		type: "POST",
		dataType:"html",
		url: "Guardar_configuracion.php",			
		data: "nb_tabla= SS_PERMISOS&campos="+campos_1+"&valores='"+Vlc_cedula_permisologia+"',"+Vln_p_reportes+","+Vln_p_configuracion+","+Vln_p_usuarios+","+Vln_p_auditor+","+Vln_p_nuevo_exp+","+Vln_p_cerrar_exp+","+Vln_p_reabrir_exp+","+Vln_p_reportar_exp+","+Vln_p_modificar_exp+","+Vln_p_registrar_datos_exp+"&id=ID_PERMISO&user=Vlc_cedula_permisologia",	
		beforeSend: function() {			
					//$('#exp').remove();
			},			
		cache: false,			
		success: function(result) {				
			alert('Registro Guardado Correctamente')			
			$("#busqueda_usuarios_permisologia").val('');
			$("#cedula_permisologia").val('');
			$("#Nombre_permisologia").val('');
			$("#login_permisologia").val('');
			$("#Tipo_permisologia").val('');
			$("#localidad_permisologia").val('');
			$("#p_reportes").removeAttr("checked");
			$("#p_configuracion").removeAttr("checked");
			$("#p_usuarios").removeAttr("checked");
			$("#p_auditor").removeAttr("checked");
			$("#p_nuevo_exp").removeAttr("checked");
			$("#p_cerrar_exp").removeAttr("checked");
			$("#p_reabrir_exp").removeAttr("checked");
			$("#p_reportar_exp").removeAttr("checked");	
			$("#p_modificar_exp").removeAttr("checked");	
			$("#p_registrar_datos_exp").removeAttr("checked");	
			return result;			
		},			
		error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
			
		});					
}
//////FIN PERMISOLOGIA USUARIOS

////////////////////////////////////////////////////FIN DATOS CONFIGURACION



//consultas tipo usuarios
function consulta_tipo_usuario(){	
	
	var Vlc_Busqueda_tipo_usuario = $("#Busqueda_tipo_usuario").val();	
	if (Vlc_Busqueda_tipo_usuario== ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
	Vlc_Busqueda_tipo_usuario=Vlc_Busqueda_tipo_usuario.toUpperCase();
	
	$.ajax({
		type: "POST",
		dataType:"html",
		url:"query/consulta_tipo_usuario.php",			
		data:"Busqueda_tipo_usuario="+Vlc_Busqueda_tipo_usuario,	
		beforeSend: function() {			
		$('#consulta8').remove();
		},			
		cache: false,			
		success: function(result) {			
			
			$("#consulta_tipo_usuario").append(result); 
        	vlc_empty = '';
			
			return result	
		},			
		error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
						
	});		
}

////////////////////////////////////////////////////////////////fin consultar DATOS CONFIGURACION

//consultas tipo usuarios
function consulta_tipo_usuario2(){	
	
	var Vlc_Busqueda_tipo_usuario2 = $("#Busqueda_tipo_usuario2").val();	
	if (Vlc_Busqueda_tipo_usuario2== ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
	Vlc_Busqueda_tipo_usuario2=Vlc_Busqueda_tipo_usuario2.toUpperCase();
	
	$.ajax({
		type: "POST",
		dataType:"html",
		url:"query/consulta_tipo_usuario2.php",			
		data:"Busqueda_tipo_usuario2="+Vlc_Busqueda_tipo_usuario2,	
		beforeSend: function() {			
		$('#consulta16').remove();
		},			
		cache: false,			
		success: function(result) {			
			
			$("#consulta_tipo_usuario2").append(result); 
        	vlc_empty = '';
			
			return result	
		},			
		error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
						
	});		
}

//////////////////////////////////////////////////////////////////fin modificar DATOS CONFIGURACION



//consultas tipo usuarios
function consulta_tipo_usuario3(){	
	
	var Vlc_Busqueda_tipo_usuario3 = $("#Busqueda_tipo_usuario3").val();	
	if (Vlc_Busqueda_tipo_usuario3== ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
	Vlc_Busqueda_tipo_usuario3=Vlc_Busqueda_tipo_usuario3.toUpperCase();
	
	$.ajax({
		type: "POST",
		dataType:"html",
		url:"query/consulta_tipo_usuario3.php",			
		data:"Busqueda_tipo_usuario3="+Vlc_Busqueda_tipo_usuario3,	
		beforeSend: function() {			
		$('#consulta24').remove();
		},			
		cache: false,			
		success: function(result) {			
			
			$("#consulta_tipo_usuario3").append(result); 
        	vlc_empty = '';
			
			return result	
		},			
		error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
						
	});		
}

//////////////////////////////////////////////////////////////fin ANULAR DATOS CONFIGURACION

////////////////////////////////////////GUARDAR USUARIOS 
function Validacion_usuario(){	
	
	var Vlc_cedula = $("#cedula").val();
	alert(Vlc_cedula);
	if (Vlc_cedula == ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
	Vlc_cedula=Vlc_cedula.toUpperCase();
	
	
	var Vlc_Nombre = $("#Nombre").val();
	if (Vlc_Nombre == ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
	Vlc_Nombre=Vlc_Nombre.toUpperCase();
	
	var Vlc_login = $("#login").val();
	if (Vlc_login == ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
	Vlc_login=Vlc_login.toUpperCase();
	
	
	var Vlc_correo = $("#correo").val();
	if (Vlc_correo== ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
	Vlc_correo=Vlc_correo.toUpperCase();
	
		
	var Vlc_Clave = $("#Clave").val();
	if (Vlc_Clave == ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
	
	var Vlc_Confirmar = $("#Confirmar").val();
	if (Vlc_Confirmar == ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
	
	
	if (Vlc_Clave != Vlc_Confirmar){
		alert("Disculpe, la claves no coinciden");
		return 
	}	
	
	
	var Vln_tipo = $("#Tipo_USUARIO").val();
	if (Vln_tipo == 0){
		alert("Disculpe, existen campos vacios");
		return 
	}
	
	var Vln_puerto = $("#usu_puerto").val();
	if (Vln_puerto == 0){
		alert("Disculpe, existen campos vacios");
		return 
	}
	
	
	
	campos_1 = 'CEDULA,NB_USUARIO,LOGIN_USUARIO,CORREO,PASS,ID_TIPO_USUARIO,ID_LOCALIDAD';
	$.ajax({
		type: "POST",
		dataType:"html",
		url: "query/Guardar_configuracion.php",			
		data: "nb_tabla= CONJ_USUARIOS&campos="+campos_1+"&valores='"+Vlc_cedula+"','"+Vlc_Nombre+"','"+Vlc_login+"','"+Vlc_correo+"','"+Vlc_Confirmar+"',"+Vln_tipo+","+Vln_puerto,			
		beforeSend: function() {			
		//$('#exp').remove();
			},			
		cache: false,			
		success: function(result) {	
			alert('Registro Guardado Correctamente')
			$("#cedula").val('');
			$("#Nombre").val('');
			$("#login").val('');
			$("#correo").val('');
			$("#Clave").val('');
			$("#Confirmar").val('');
			$("#Tipo_USUARIO").val(0);
			$("#localidad").val(0);
			return result;			
		},			
		error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
			
		});					
}
///////////////////////////////////////////FIN GUARDAR USUARIOS


////////////////////////////////////////////////consultas USUARIOS

//consulta usuarios
function consulta_usuario(){	
	
	var Vlc_busqueda_usuario = $("#busqueda_usuario").val();	
	if (Vlc_busqueda_usuario== ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
	Vlc_busqueda_usuario=Vlc_busqueda_usuario.toUpperCase();
	
	$.ajax({
		type: "POST",
		dataType:"html",
		url:"query/consulta_usuarios.php",			
		data:"busqueda_usuario="+Vlc_busqueda_usuario,	
		beforeSend: function() {			
		//$('#consulta5').remove();
		},			
		cache: false,			
		success: function(result) {			
			var resultado = result.split(",");
			
			$("#cedula_consulta").val(resultado[0]);
			$("#Nombre_consulta").val(resultado[1]);
			$("#login_consulta").val(resultado[2]);
			$("#correo_consulta").val(resultado[4]);
			$("#Clave_consulta").val(resultado[3]);
			$("#Confirmar_consulta").val(resultado[3]);
			$("#Tipo_consulta").val(resultado[6]);
			$("#localidad_consulta").val(resultado[5]);
        	vlc_empty = '';
			
			return result	
		},			
		error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
						
	});		
}
//fin consulta usuarios


//consulta-modificar usuarios
function consulta_modificar_usuario(){	
	
	var Vlc_busqueda_usuario_modificar = $("#busqueda_usuario_modificar").val();	
	if (Vlc_busqueda_usuario_modificar== ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
	Vlc_busqueda_usuario_modificar=Vlc_busqueda_usuario_modificar.toUpperCase();
	
	$.ajax({
		type: "POST",
		dataType:"html",
		url:"query/consulta_usuarios_modificar.php",			
		data:"busqueda_usuario_modificar="+Vlc_busqueda_usuario_modificar,	
		beforeSend: function() {			
		//$('#consulta5').remove();
		},			
		cache: false,			
		success: function(result) {			
			var resultado = result.split(",");
			
			$("#cedula_modificar").val(resultado[0]);
			$("#Nombre_modificar").val(resultado[1]);
			$("#login_modificar").val(resultado[2]);
			$("#correo_modificar").val(resultado[4]);
			$("#Clave_modificar").val(resultado[3]);
			$("#Confirmar_modificar").val(resultado[3]);
			$("#Tipo_modificar").val(resultado[6]);
			$("#localidad_modificar").val(resultado[5]);
        	vlc_empty = '';
			
			return result	
		},			
		error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
						
	});		
}
//fin consulta-modificar usuarios

//consulta-anular usuarios
function consulta_desactivar_usuario(){	
	
	var Vlc_busqueda_usuarios_desactivar = $("#busqueda_usuarios_desactivar").val();	
	if (Vlc_busqueda_usuarios_desactivar== ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
	Vlc_busqueda_usuarios_desactivar=Vlc_busqueda_usuarios_desactivar.toUpperCase();
	
	$.ajax({
		type: "POST",
		dataType:"html",
		url:"query/consulta_usuarios_desactivar.php",			
		data:"busqueda_usuarios_desactivar="+Vlc_busqueda_usuarios_desactivar,	
		beforeSend: function() {			
		//$('#consulta5').remove();
		},			
		cache: false,			
		success: function(result) {			
			var resultado = result.split(",");
			
			$("#cedula_desactivar").val(resultado[0]);
			$("#Nombre_desactivar").val(resultado[1]);
			$("#login_desactivar").val(resultado[2]);
			$("#correo_desactivar").val(resultado[4]);
			$("#Clave_desactivar").val(resultado[3]);
			$("#Confirmar_desactivar").val(resultado[3]);
			$("#Tipo_desactivar").val(resultado[6]);
			$("#localidad_desactivar").val(resultado[5]);
        	vlc_empty = '';
			
			return result	
		},			
		error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
						
	});		
}
//fin consulta-anular usuarios

//consulta-permisologia usuarios
function consulta_permisologia_usuario(){	
	
	var Vlc_busqueda_usuarios_permisologia = $("#busqueda_usuarios_permisologia").val();	
	if (Vlc_busqueda_usuarios_permisologia== ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
	Vlc_busqueda_usuarios_permisologia=Vlc_busqueda_usuarios_permisologia.toUpperCase();
	
	$.ajax({
		type: "POST",
		dataType:"html",
		url:"query/consulta_usuarios_permisologia.php",			
		data:"busqueda_usuarios_permisologia="+Vlc_busqueda_usuarios_permisologia,	
		beforeSend: function() {			
		//$('#consulta5').remove();
		},			
		cache: false,			
		success: function(result) {			
			var resultado = result.split(",");
			
			$("#cedula_permisologia").val(resultado[0]);
			$("#Nombre_permisologia").val(resultado[1]);
			$("#login_permisologia").val(resultado[2]);			
			$("#Tipo_permisologia").val(resultado[6]);
			$("#localidad_permisologia").val(resultado[5]);
        	vlc_empty = '';
			
			return result	
		},			
		error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
						
	});		
}
//fin consulta-anular usuarios


///////////////////////////////////////////////////FIN CONSULTA USUARIOS



//limpiar tipo usuario
function limpiar_tipo_usuario_consulta(){
$("#Busqueda_tipo_usuario").val('');
$("#COD_Tipo_Usuario").val('');
$("#Tipo_Usuario2").val('');
}
//fin limpiar tipo usuario
//////////////////////////////fin limpiar consulta configuracion

//limpiar tipo usuario
function limpiar_tipo_usuario_consulta(){
$("#Busqueda_tipo_usuario").val('');
$("#COD_Tipo_Usuario").val('');
$("#Tipo_Usuario2").val('');
}
//fin limpiar tipo usuario
//////////////////////////////fin limpiar consulta configuracion

//limpiar tipo usuario
function limpiar_tipo_usuario_modificar(){
$("#Busqueda_tipo_usuario2").val('');
$("#COD_Tipo_Usuario2").val('');
$("#Tipo_Usuario3").val('');
}
//fin limpiar tipo usuario
//////////////////////////////fin limpiar modificacion configuracion


//limpiar tipo usuario
function limpiar_tipo_usuario_anular(){
$("#Busqueda_tipo_usuario3").val('');
$("#COD_Tipo_Usuario3").val('');
$("#Tipo_Usuario4").val('');
}
//fin limpiar tipo usuario
//////////////////////////////fin limpiar anular configuracion

//////////////////////limpiar REGISTRAR usuario
function limpiar_registro_usuario(){
$("#cedula").val('');
$("#Nombre").val('');
$("#login").val('');
$("#correo").val('');
$("#Clave").val('');
$("#Confirmar").val('');
$("#Tipo_USUARIO").val(0);
$("#localidad").val(0);
}
//////////////////////////////fin limpiar REGISTRAR usuario

//////////////////////limpiar consultar usuario
function limpiar_consulta_usuario(){
$("#busqueda_usuario").val('');
$("#cedula_consulta").val('');
$("#Nombre_consulta").val('');
$("#login_consulta").val('');
$("#correo_consulta").val('');
$("#Clave_consulta").val('');
$("#Confirmar_consulta").val('');
$("#Tipo_consulta").val(0);
$("#localidad_consulta").val(0);
}
//////////////////////////////fin limpiar consultar usuario

//////////////////////limpiar modificar usuario
function limpiar_modificar_usuario(){
$("#busqueda_usuario_modificar").val('');
$("#cedula_modificar").val('');
$("#Nombre_modificar").val('');
$("#login_modificar").val('');
$("#correo_modificar").val('');
$("#Clave_modificar").val('');
$("#Confirmar_modificar").val('');
$("#Tipo_modificar").val(0);
$("#localidad_modificar").val(0);
}
//////////////////////////////fin limpiar modificar usuario


//////////////////////limpiar desactivar usuario
function limpiar_desactivar_usuario(){
$("#busqueda_usuarios_desactivar").val('');
$("#cedula_desactivar").val('');
$("#Nombre_desactivar").val('');
$("#login_desactivar").val('');
$("#correo_desactivar").val('');
$("#Clave_desactivar").val('');
$("#Confirmar_desactivar").val('');
$("#Tipo_desactivar").val(0);
$("#localidad_desactivar").val(0);
}
//////////////////////////////fin limpiar modificar usuario


//////////////////////limpiar permisologia usuario
function limpiar_permisologia_usuario(){
$("#busqueda_usuarios_permisologia").val('');
$("#cedula_permisologia").val('');
$("#Nombre_permisologia").val('');
$("#login_permisologia").val('');
$("#Tipo_permisologia").val('');
$("#localidad_permisologia").val('');
$("#p_reportes").removeAttr("checked");
$("#p_configuracion").removeAttr("checked");
$("#p_usuarios").removeAttr("checked");
$("#p_auditor").removeAttr("checked");
$("#p_nuevo_exp").removeAttr("checked");
$("#p_cerrar_exp").removeAttr("checked");
$("#p_reabrir_exp").removeAttr("checked");
$("#p_reportar_exp").removeAttr("checked");

}
//////////////////////////////fin limpiar modificar usuario


////////////////////// actualizar tipo usuario
function actualizar_tipo_usuario(){

var Vln_COD_Tipo_Usuario2 = $("#COD_Tipo_Usuario2").val();
	if (COD_Tipo_Usuario2 == ''){
		alert("Disculpe, existen campos vacios");
		return 
	}


var Vlc_Tipo_Usuario3 = $("#Tipo_Usuario3").val();
	if (Vlc_Tipo_Usuario3 == ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
Vlc_Tipo_Usuario3=Vlc_Tipo_Usuario3.toUpperCase();	


var update_tipo_usuario = "UPDATE SS_TIPO_USUARIO SET DS_TIPO_USUARIO = '"+Vlc_Tipo_Usuario3+"' WHERE ID_TIPO_USUARIO ='"+Vln_COD_Tipo_Usuario2+"'";


$.ajax({
	type: "POST",
	dataType:"html",
	url: "actualizar.php",			
	data: "update="+update_tipo_usuario,
	beforeSend: function() {			
	//$('#exp').remove();
	},			
	cache: false,			
	success: function(result) {				
		alert("Datos Actualizados con Exito");
		$("#Busqueda_tipo_usuario2").val('');
		$("#COD_Tipo_Usuario2").val('');
		$("#Tipo_Usuario3").val('');		
		
	},			
	error: function(error) {			
		$("img#busy").hide();			
		$("button#check").show();			
		alert("Some problems have occured. Please try again later: " + error);			
	}
						
	});

}
//////////////////////////////fin actualizar afectados






////////////////////// anular tipo usuario
function anular_tipo_usuario(){

var Vln_COD_Tipo_Usuario3 = $("#COD_Tipo_Usuario3").val();
	if (COD_Tipo_Usuario3 == ''){
		alert("Disculpe, existen campos vacios");
		return 
	}


var Vlc_Tipo_Usuario4 = $("#Tipo_Usuario4").val();
	if (Vlc_Tipo_Usuario4 == ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
Vlc_Tipo_Usuario4=Vlc_Tipo_Usuario4.toUpperCase();	


var anular_tipo_usuario = "UPDATE SS_TIPO_USUARIO SET FG_ACTIVO = 0 WHERE ID_TIPO_USUARIO ='"+Vln_COD_Tipo_Usuario3+"'";


$.ajax({
	type: "POST",
	dataType:"html",
	url: "actualizar.php",			
	data: "update="+anular_tipo_usuario,
	beforeSend: function() {			
	//$('#exp').remove();
	},			
	cache: false,			
	success: function(result) {				
		alert("Datos Actualizados con Exito");
		$("#Busqueda_tipo_usuario3").val('');
		$("#COD_Tipo_Usuario3").val('');
		$("#Tipo_Usuario4").val('');		
		
	},			
	error: function(error) {			
		$("img#busy").hide();			
		$("button#check").show();			
		alert("Some problems have occured. Please try again later: " + error);			
	}
						
	});

}
//////////////////////////////fin ANULAR afectados





//////////////////////actualizar usuarios
////////////////////// actualizar modificar usuario
function modificar_usuario(){

var Vlc_cedula_modificar = $("#cedula_modificar").val();
	if (Vlc_cedula_modificar == ''){
		alert("Disculpe, existen campos vacios");
		return 
	}

var Vlc_Nombre_modificar = $("#Nombre_modificar").val();
	if (Vlc_Nombre_modificar== ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
Vlc_Nombre_modificar=Vlc_Nombre_modificar.toUpperCase();	


var Vlc_login_modificar= $("#login_modificar").val();
	if (Vlc_login_modificar== ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
Vlc_login_modificar=Vlc_login_modificar.toUpperCase();	

var Vlc_correo_modificar= $("#correo_modificar").val();
	if (Vlc_correo_modificar== ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
Vlc_correo_modificar=Vlc_correo_modificar.toUpperCase();


var Vlc_Clave_modificar= $("#Clave_modificar").val();
	if (Vlc_Clave_modificar== ''){
		alert("Disculpe, existen campos vacios");
		return 
	}


var Vlc_Confirmar_modificar= $("#Confirmar_modificar").val();
	if (Vlc_Confirmar_modificar== ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
Vlc_Confirmar_modificar=Vlc_Confirmar_modificar.toUpperCase();	
var Vln_Tipo_modificar=$("#Tipo_modificar").val();




var update_usuario = "UPDATE CONJ_USUARIOS SET NB_USUARIO = '"+Vlc_Nombre_modificar+"',CORREO='"+Vlc_correo_modificar+"',PASS='"+Vlc_Clave_modificar+"',ID_TIPO_USUARIO="+Vln_Tipo_modificar+" WHERE CEDULA ='"+Vlc_cedula_modificar+"'";
alert(update_usuario);
$.ajax({
	type: "POST",
	dataType:"html",
	url: "query/actualizar.php",			
	data: "update="+update_usuario,
	beforeSend: function() {			
	//$('#exp').remove();
	},			
	cache: false,			
	success: function(result) {			
		alert("Datos Actualizados con Exito");
		$("#busqueda_usuario_modificar").val('');
		$("#cedula_modificar").val('');
		$("#Nombre_modificar").val('');	
		$("#login_modificar").val('');		
		$("#correo_modificar").val('');		
		$("#Clave_modificar").val('');		
		$("#Confirmar_modificar").val('');	
		$("#Tipo_modificar").val('');			
	},			
	error: function(error) {			
		$("img#busy").hide();			
		$("button#check").show();			
		alert("Some problems have occured. Please try again later: " + error);			
	}
						
	});

}
//////////////////////////////fin actualizar usuarios


////////////////////// desactivar usuario
function desactivar_usuario(){

var Vlc_cedula_desactivar = $("#cedula_desactivar").val();
	if (Vlc_cedula_desactivar == ''){
		alert("Disculpe, existen campos vacios");
		return 
	}

var Vlc_Nombre_desactivar = $("#Nombre_desactivar").val();
	if (Vlc_Nombre_desactivar== ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
Vlc_Nombre_desactivar=Vlc_Nombre_desactivar.toUpperCase();	


var Vlc_login_desactivar= $("#login_desactivar").val();
	if (Vlc_login_desactivar== ''){
		alert("Disculpe, existen campos vacios");
		return 
	}

var Vlc_correo_desactivar= $("#correo_desactivar").val();
	if (Vlc_correo_desactivar== ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
Vlc_correo_desactivar=Vlc_correo_desactivar.toUpperCase();


var Vlc_Clave_desactivar= $("#Clave_desactivar").val();
	if (Vlc_Clave_desactivar== ''){
		alert("Disculpe, existen campos vacios");
		return 
	}


var Vlc_Confirmar_desactivar= $("#Confirmar_desactivar").val();
	if (Vlc_Confirmar_desactivar== ''){
		alert("Disculpe, existen campos vacios");
		return 
	}
Vlc_Confirmar_desactivar=Vlc_Confirmar_desactivar.toUpperCase();	


var Vln_Tipo_desactivar= $("#Tipo_desactivar").val();
	if (Vln_Tipo_desactivar== 0){
		alert("Disculpe, existen campos vacios");
		return 
	}

	


var desactivar_usuario = "UPDATE CONJ_USUARIOS SET FG_ACTIVO = 0 WHERE CEDULA ='"+Vlc_cedula_desactivar+"'";
$.ajax({
	type: "POST",
	dataType:"html",
	url: "query/actualizar.php",			
	data: "update="+desactivar_usuario,
	beforeSend: function() {			
	//$('#exp').remove();
	},			
	cache: false,			
	success: function(result) {			
		alert("Datos Actualizados con Exito");
		$("#busqueda_usuario_desactivar").val('');
		$("#cedula_desactivar").val('');
		$("#Nombre_desactivar").val('');	
		$("#login_desactivar").val('');		
		$("#correo_desactivar").val('');		
		$("#Clave_desactivar").val('');		
		$("#Confirmar_desactivar").val('');	
		$("#Tipo_desactivar").val('');	
		$("#localidad_desactivar").val('');			
	},			
	error: function(error) {			
		$("img#busy").hide();			
		$("button#check").show();			
		alert("Some problems have occured. Please try again later: " + error);			
	}
						
	});
}
//////////////////////////////fin desactivar usuario




