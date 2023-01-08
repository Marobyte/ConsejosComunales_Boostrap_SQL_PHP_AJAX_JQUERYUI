// JavaScript Document

function consultar_exp (){
	

	$("#consultar").css("display", "inline");
	$("#ocultar_consulta").css("display", "block");
	$("#guardar_2").css("display", "none");
							
	
	


}


function ocultar (){
	

	$("#consultar").css("display", "none");
	$("#ocultar_consulta").css("display", "none");
	$("#guardar_2").css("display", "block");
							
	
	


}

function buscar_get (ano,entidad,num){
	alert($("#ano").val());
	

}

//-- Buscar expediente
function buscar (){
	
	
	
	
	var vlc_entidad  = $("#entidad").val();
	
	

	$.ajax({
		type: "POST",
		dataType:"html",
		url: "query/buscar_id_exp.php",			
		data: "entidad="+ vlc_entidad,	
		beforeSend: function() {			
			$("#tabs-1 #num_exp #exp").remove();
			$("#tabs-2 #num_exp #exp").remove();
			$("#tabs-3 #num_exp #exp").remove();
			$("#tabs-4 #num_exp #exp").remove();
			$("#tabs-5 #num_exp #exp").remove();
			$("#tabs-6 #num_exp #exp").remove();
		},			
		cache: false,			
		success: function(result) {			
			id_expediente = result;
			$("#expe").val(result);
			$("#bs_exp").css("display", "block");
			$("#bs_exp1").css("display", "block");
			$("#bs_exp2").css("display", "block");
			$("#bs_exp3").css("display", "block");
			$("#bs_exp4").css("display", "block");
			$("#bs_exp5").css("display", "block");
			$("#bs_exp6").css("display", "block");
			pestana_1(result);			
		},			
		error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
			
		});	
	
	
}
//--

//Consulta de todo el expediente
function pestana_1 (id_expediente){
	
	
	$.ajax({
		type: "POST",
		dataType:"html",
		url: "query/buscar_exp.php",			
		data: "id_expediente="+id_expediente,	
		beforeSend: function() {			
			$("#tabs-1 #num_exp #exp").remove();
			$("#tabs-2 #num_exp #exp").remove();
			$("#tabs-3 #num_exp #exp").remove();
			$("#tabs-4 #num_exp #exp").remove();
			$("#tabs-5 #num_exp #exp").remove();
			$("#tabs-6 #num_exp #exp").remove();		//$('#exp').remove();
			},			
		cache: false,			
		success: function(result) {			
			
			var resultado = result.split(",");
			id_cerrado = resultado[9];
			$( "#titulo" ).val(resultado[0]);
			$("#clasificacion").val(resultado[2]);
			
			//
			$.ajax({
					type: "POST",
					dataType:"html",
					url: "query/carga_tipo_clasificacion.php",			
					data: "id_clasificacion="+$("#clasificacion").val(),			
					beforeSend: function() {			
						setTimeout ('', 1000);
						$("#tipo").html('');
						$("#cargando").show();	
					},			
					        			
					cache: false,			
					success: function(result) {	
						
						$("#cargando").hide();
						$('#tipo').append(result);
						$("#tipo").val(resultado[3]);
						return result;	
							
					},			
					error: function(error) {				
						alert("Some problems have occured. Please try again later: " + error);			
					}
			
					});	
			var fecha_hora = resultado[4].split(" ");
			var fecha1 = fecha_hora[0].split("-");
			$("#datepicker").val(fecha1[2]+"/"+fecha1[1]+"/"+fecha1[0]);
			$("#hora_ocurrencia").val(fecha_hora[1]);
			
			var fecha_hora1 = resultado[5].split(" ");
			var fecha2 = fecha_hora1[0].split("-");
			$("#datepicker2").val(fecha2[2]+"/"+fecha2[1]+"/"+fecha2[0]);
			$("#hora_reporte").val(fecha_hora1[1]);
			
			$("#motivo").val(resultado[6]);
			
			$("textarea#obs_exp").val(resultado[7]);
			
			$("#tabs-1 #num_exp").append('<div id="exp">'+$("#entidad").val()+' </div>' );
			$("#tabs-2 #num_exp").append('<div id="exp">'+$("#entidad").val()+' </div>' );
			$("#tabs-3 #num_exp").append('<div id="exp">'+$("#entidad").val()+' </div>' );
			$("#tabs-4 #num_exp").append('<div id="exp">'+$("#entidad").val()+' </div>' );
			$("#tabs-5 #num_exp").append('<div id="exp">'+$("#entidad").val()+' </div>' );
			$("#tabs-6 #num_exp").append('<div id="exp">'+$("#entidad").val()+' </div>' );
			$("#actualizar").css("display", "block");
			$("#guardar_1").css("display", "none");
			
			
			$("#ubic").val(resultado[11]);
			if (resultado[10]== 1){
				
				fecha_revision();
			}
			
						
		},			
		error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
			
		});	
	
	
	// Consultar daños del expediente
	
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
				
	//consulta combo
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
				
	
	// consultar descripcion de los hechos
	
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
	
	//consultar responsable
	
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
	
	// consulta documentos
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
		
	
	// consulta avance
	
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

function refrescar(){
	
// Consultar daños del expediente
	
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
				
	//consulta combo
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
				
	
	// consultar descripcion de los hechos
	
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
	
	//consultar responsable
	
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
	
	// consulta documentos
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
		
	
	// consulta avance
	
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
// fin