// JavaScript Document

function actualizar_1 (){
	
	if (id_cerrado == 2) {
		alert("Disculpe, este expediente no se puede actualizar debido a que esta cerrado.");
		return 
	}
	
	//--- Validacion del titulo del expediente
	var vlc_titulo = String($( "#titulo" ).val());
	if (vlc_titulo == ""){
		alert("Disculpe, debe ingresar un titulo al expediente");
		return 	
	}
	//----
				
	//-- Validacion de Clasificacion del suceso
	var $vln_clasificacion  = $("#clasificacion").val()
	if ($vln_clasificacion==0) {
		alert("Disculpe, debe elegir una clasificacion para el expediente");
		return 
	}
				
	//--- Validacion del tipo de expediente
	var $vlc_radio =$("input[name=radio]:checked");
	var vln_radio = $vlc_radio.val();
	if ($vlc_radio.val() == 1){
		//alert("Siniestro");
	}else{
		//alert("Reclamo");
	}
	//---
				
	//-- Validacion de Tipo de Clasificacion del suceso
	/*var $vln_tipo  = $("#tipo").val()
	if ($vln_tipo==0) {
		alert("Disculpe, debe elegir un tipo de clasificacion para el expediente");
		return 
	}*/
	//--
				
	//-- Validacion de hora de la ocurrencia
	var $vln_hora_ocurrencia  = $("#hora_ocurrencia").val();
	vln_msj = validar_hora($vln_hora_ocurrencia);
	if (vln_msj == 0)
		return 
				
	//-- Validacion de hora del reporte
	var $vln_hora_reporte  = $("#hora_reporte").val();
	vln_msj = validar_hora($vln_hora_reporte);
	if (vln_msj == 0)
		return 
	//--
					
	var $vln_fecha1  = $("#datepicker").val();
	var $vln_fecha2  = $("#datepicker2").val();
	var fecha1 = $vln_fecha1.split("/");
	var fecha2 = $vln_fecha2.split("/");
	if (compare_dates($vln_fecha1,$vln_fecha2)){  
	  alert("Disculpe, la fecha de Reporte es menor a la fecha de Ocurrencia"); 
	  return  
	}
				
	//-- Validacion de Tipo de Clasificacion del suceso
	var $vln_motivo  = $("#motivo").val()
	if ($vln_motivo==0) {
		alert("Disculpe, debe elegir un motivo para el expediente");
		return 
	}
				
	var $obs  = $("textarea#obs_exp").val();
	fecha_ocurrencia = fecha1[2]+"-"+fecha1[1]+"-"+fecha1[0]+" "+$vln_hora_ocurrencia;
	fecha_reporte = fecha2[2]+"-"+fecha2[1]+"-"+fecha2[0]+" "+$vln_hora_reporte;


	var update = "update ss_expedientes set Titulo_expediente='"+vlc_titulo+"',id_clasificacion="+$vln_clasificacion+",id_motivo="+$vln_motivo+",observacion='"+$obs+"',fecha_ocurrencia='"+fecha_ocurrencia+"',fecha_reporte='"+fecha_reporte+"'" ;
	
	$.ajax({
	type: "POST",
	dataType:"html",
	url: "actualizar_exp.php",			
	data: "update="+update+"&exp="+id_expediente,	
	beforeSend: function() {			
	//$('#exp').remove();
	},			
	cache: false,			
	success: function(result) {			
		alert("Datos Actualizados con Exito");
		
		
	},			
	error: function(error) {			
		$("img#busy").hide();			
		$("button#check").show();			
		alert("Some problems have occured. Please try again later: " + error);			
	}
						
	});

}

function eliminar_dano (eliminar,id_expediente,pestana,id){
	if (id_cerrado == 2) {
		alert("Disculpe, este expediente no se puede actualizar debido a que esta cerrado.");
		return 
	}
	$.ajax({
	type: "POST",
	dataType:"html",
	url: "actualizar.php",			
	data: "update="+eliminar,	
	beforeSend: function() {			
	//$('#exp').remove();
	},			
	cache: false,			
	success: function(result) {			
	
	vlc_empty = '';
		$( "#nb_afectado" ).val(vlc_empty);
		$( "#tipo_dano" ).val(vlc_empty);
		$( "#res_afect" ).val(vlc_empty);
		$("#ds_dano").val(vlc_empty);
		
		if (pestana == 1){
		var vlc_bitacora = "insert into ss_bitacora (fecha,id_accion,accion,entidad,id_tabla,descripcion,usuario) values (getdate(),3,'ANULO','SS_DANOS_EXP',213575799,'ANULO EL DANO CON ID: "+id.toString()+" AL EXPEDIENTE CON ID: "+id_expediente.toString()+"'";	
		}
		
		if (pestana == 2){
		var vlc_bitacora = "insert into ss_bitacora (fecha,id_accion,accion,entidad,id_tabla,descripcion,usuario) values (getdate(),3,'ANULO','SS_DS_HECHO',1170103209,'ANULO EL HECHO CON ID: "+id.toString()+" AL EXPEDIENTE CON ID: "+id_expediente.toString()+"'";	
		}
		
		if (pestana == 3){
		var vlc_bitacora = "insert into ss_bitacora (fecha,id_accion,accion,entidad,id_tabla,descripcion,usuario) values (getdate(),3,'ANULO','SS_RESPONSABLES_EXPEDIENTES',1621580815,'ANULO EL RESPONSABLE CON ID: "+id.toString()+" AL EXPEDIENTE CON ID: "+id_expediente.toString()+"'";	
		}
		
		if (pestana == 4){
		var vlc_bitacora = "insert into ss_bitacora (fecha,id_accion,accion,entidad,id_tabla,descripcion,usuario) values (getdate(),3,'ANULO','SS_DOC_EXPEDIENTES',1170103209,'ANULO EL DOCUMENTO CON ID: "+id.toString()+" AL EXPEDIENTE CON ID: "+id_expediente.toString()+"'";	
		}
		
		if (pestana == 5){
		var vlc_bitacora = "insert into ss_bitacora (fecha,id_accion,accion,entidad,id_tabla,descripcion,usuario) values (getdate(),3,'ANULO','SS_AVANCE',1266103551,'ANULO EL AVANCE CON ID: "+id.toString()+" AL EXPEDIENTE CON ID: "+id_expediente.toString()+"'";
		}
		
		$.ajax({
				type: "POST",
				dataType:"html",
				url: "bitacora.php",	
				data:"sql_bitacora="+vlc_bitacora,
				success: function(result) {	
				},			
				error: function(error) {			
				$("img#busy").hide();			
				$("button#check").show();			
				alert("Some problems have occured. Please try again later: " + error);			
				}					
			});	
		
		return result	
	},			
	error: function(error) {			
		$("img#busy").hide();			
		$("button#check").show();			
		alert("Some problems have occured. Please try again later: " + error);			
	}
						
	});
	
	if (pestana == 1){
		$.ajax({
		type: "POST",
		dataType:"html",
		url: "query/consulta_tipo_dano.php",			
		data: "id_expediente="+id_expediente,	
		beforeSend: function() {			
		$('#descrip_dano').remove();
		},			
		cache: false,			
		success: function(result) {			
			$("#tabla_dano").append(result); 
			vlc_empty = '';
			$( "#nb_afectado" ).val(vlc_empty);
			$( "#tipo_dano" ).val(vlc_empty);
			$( "#res_afect" ).val(vlc_empty);
			$("#ds_dano").val(vlc_empty);
			return result	
		},			
		error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
		});	
	}
	
	if (pestana == 2){
		
		$.ajax({
		type: "POST",
		dataType:"html",
		url: "query/consulta_des_hecho.php",			
		data: "id_expediente="+id_expediente,	
		beforeSend: function() {			
		$('#descrip_hecho').remove();
		},			
		cache: false,			
		success: function(result) {			
			
			$("#tabla_hecho").append(result); 
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

	if (pestana == 3){
		$.ajax({
			type: "POST",
			dataType:"html",
			url: "query/consulta_resp.php",			
			data: "id_expediente="+id_expediente,	
			beforeSend: function() {			
			$('#descrip_resp').remove();
			},			
			cache: false,			
			success: function(result) {			
				
				$("#tabla_resp").append(result); 
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

	
	
	if (pestana == 4){
		// consulta combo 2
		$.ajax({
			type: "POST",
			dataType:"html",
			url: "query/consulta_doc_exp.php",			
			data: "id_expediente="+id_expediente,	
			beforeSend: function() {			
				$("#tipo_docu").html('');
				$("#tipo_docu").html('<option value="0">Seleccionar ...</option>\n');
			},			
			cache: false,			
			success: function(result) {			
				$("#tipo_docu").append(result); 
				return result	
			},			
			error: function(error) {			
				$("img#busy").hide();			
				$("button#check").show();			
				alert("Some problems have occured. Please try again later: " + error);			
			}
						
		});
		
		// consulta combo 3
		$.ajax({
			type: "POST",
			dataType:"html",
			url: "query/consulta_doc_exp_tabla.php",			
			data: "id_expediente="+id_expediente,	
			beforeSend: function() {			
				$('#descrip_document').remove();
			},			
			cache: false,			
			success: function(result) {			
				$("#descrip_doc").append(result); 
				return result	
			},			
			error: function(error) {			
				$("img#busy").hide();			
				$("button#check").show();			
				alert("Some problems have occured. Please try again later: " + error);			
			}
						
		});	
	}
	
	if (pestana == 5){
		// campos!!
		$.ajax({
		type: "POST",
		dataType:"html",
		url: "query/consulta_avanc.php",			
		data: "id_expediente="+id_expediente,	
		beforeSend: function() {			
			$('#tabla_avanc').remove();	
		},			
		cache: false,			
		success: function(result) {			
			$("#descrip_avanc").append(result);
            return result	
		},			
		error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
					
		});
   }
		
}

function fecha_revision () {
	
	
	 
	var consulta = "update ss_expedientes set fecha_revision = getdate() ,id_status_exp = 2."+id_expediente;
	
	$.ajax({
					type: "POST",
					dataType:"html",
					url: "actualizar_revision.php",			
					data: "update="+consulta+"&expediente ="+id_expediente,			
					beforeSend: function() {			
							
					},			
					        			
					cache: false,			
					success: function(result) {	

						return result;	
							
					},			
					error: function(error) {				
						alert("Some problems have occured. Please try again later: " + error);			
					}
			
					});

}