// JavaScript Document

function Validacion_acordeon_1 (){
	
	
	var vlc_cod_categoria = $("#cod_categoria").val();
	var vlc_nom_categoria = $("#reg_categoria").val();
	
	if (vlc_cod_categoria   == '') {
		alert("Disculpe, debe ingresar un codigo a la categoria");
		return 
	}	
	
	if (vlc_nom_categoria == '') {
		alert("Disculpe, debe ingresar un nombre a la categoria");
		return 
	}	
	
	var campos = "codigo_regimen,categoria,status,fecha_reg,usuario";
	var tabla ="conj_categorias";
						
	$.ajax({
			type: "POST",
			dataType:"html",
			url: "Guardar.php",			
			data: "nb_tabla="+tabla+"&campos="+campos+"&valores='"+vlc_cod_categoria.toUpperCase()+"','"+vlc_nom_categoria.toUpperCase() +"',"+1+","+"getdate()",	
		beforeSend: function() {			
			
									
		},			
			cache: false,			
			success: function(result) {			
			id_categoria=result;
			alert("Datos Guardados con Exito");
			$("#reg_categoria").val('');
			$("#cod_categoria").val('');
			
		},			
			error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
			
	});		
	limpiar_campos();

}

function Validacion_acordeon_2 (){
	//var vln_id_estatus_documento = $("#id_estatus_documento").val();
	var vln_bus_categoria  = $("#id_bus_categoria").val();
	var vln_fg_juridico	   = $("#id_tipo_empresa").val();
	var vln_fg_acta_contrato  = $("#actas_contratos").val();
	
	if (vln_bus_categoria   == 0) {
		alert("Disculpe, debe Seleccionar una categoria");
		return 
	}	
	
	
		
						
	var vlc_bus_cod_categoria = $("#bus_cod_categoria").val();
	var vlc_sub_bus_cod_categoria = vlc_bus_cod_categoria+$("#bus_sub_cod_categoria").val();
	var vlc_sub_bus_nom_categoria = $("#bus_sub_reg_categoria").val();

	if (vlc_sub_bus_cod_categoria  == '') {
		alert("Disculpe, debe ingresar un codigo a la categoria");
		return 
	}	
	
	if (vlc_sub_bus_nom_categoria == '') {
		alert("Disculpe, debe ingresar un nombre a la categoria");
		return 
	}	
	
	if (vln_fg_juridico == '') {
		alert("Disculpe, debe Seleccionar El Tipo de Empresa");
		return 
	}	
	if (vln_fg_acta_contrato == '') {
		alert("Disculpe, debe Seleccionar si la Sub Categoria Amerita Acta o Contrato");
		return 
	}	

	var campos = "codigo_regimen,categoria,status,fecha_reg,id_padre_cat,FG_JURIDICO,FG_ACTAS_CONTRATOS,usuario";
	var tabla ="conj_categorias";
						
	$.ajax({
			type: "POST",
			dataType:"html",
			url: "Guardar.php",			
			data: "nb_tabla="+tabla+"&campos="+campos+"&valores='"+vlc_sub_bus_cod_categoria.toUpperCase()+"','"+vlc_sub_bus_nom_categoria.toUpperCase() +"',"+1+","+"getdate(),"+vln_bus_categoria+","+vln_fg_juridico+","+vln_fg_acta_contrato+"",	
		beforeSend: function() {			
						
		},			
			cache: false,			
			success: function(result) {			
			id_categoria=result;
			alert("Datos Guardados con Exito");
			$("#bus_cod_categoria").val('');
			$("#bus_nom_categoria").val('');
			$("#bus_sub_cod_categoria").val('');
			$("#bus_sub_reg_categoria").val('');
			$("#id_tipo_empresa").val('');
			$("#acta_contratos").val('');
			$("#id_bus_categoria").val(0);
			
		},			
			error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
			
	});		
	limpiar_campos();

}

function Validacion_acordeon_3 (){
	
	var vln_id_bus_categoria_tari = $("#id_bus_categoria_tari").val();
	var vln_id_sub_bus_categoria_tari  = $("#id_sub_bus_categoria_tari").val();
	var vln_monto_tari  = $("#monto_tari").val();
	var vln_id_moneda_tari  = $("#id_moneda_tari").val();
	
	
	if (vln_id_bus_categoria_tari  == 0) {
		alert("Disculpe, debe Seleccionar una categoria");
		return 
	}
	
	if (vln_id_sub_bus_categoria_tari  == 0) {
		alert("Disculpe, debe Seleccionar una Sub-categoria");
		return 
	}
	
	if (vln_monto_tari  == 0) {
		alert("Disculpe, debe ingresar un monto a la tarifa");
		return 
	}
	
	if (vln_id_moneda_tari  == 0) {
		alert("Disculpe, debe seleccionar el tipo de moneda de la tarifa");
		return 
	}
	


	var campos = "id_moneda,id_categoria,id_sub_categoria,monto,fecha_cre,fg_activo,usuario";
	var tabla ="conj_tarifa";
						
	$.ajax({
			type: "POST",
			dataType:"html",
			url: "Guardar.php",			
			data: "nb_tabla="+tabla+"&campos="+campos+"&valores="+vln_id_moneda_tari+","+vln_id_bus_categoria_tari+","+vln_id_sub_bus_categoria_tari+","+vln_monto_tari+","+"getdate(),"+1,	
		beforeSend: function() {			
			
									
		},			
			cache: false,			
			success: function(result) {			
			id_categoria=result;
			alert("Datos Guardados con Exito");
			$("#bus_cod_categoria").val('');
			$("#bus_nom_categoria").val('');
			$("#bus_sub_cod_categoria").val('');
			$("#bus_sub_reg_categoria").val('');
			$("#id_bus_categoria").val(0);
			
		},			
			error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
			
	});	
	limpiar_campos();

}

function Validacion_acordeon_4(){
	
	var vln_id_bus_categoria_doc = $("#id_bus_categoria_doc").val();
	var vln_id_sub_bus_categoria_doc  = $("#id_sub_bus_categoria_doc").val();
	var vlc_documento = $("#documento").val();
	
	alert(vlc_documento);
	if (vln_id_bus_categoria_doc  == 0) {
		alert("Disculpe, debe Seleccionar una categoria");
		return 
	}
	
	if (vln_id_sub_bus_categoria_doc  == 0) {
		alert("Disculpe, debe Seleccionar una Sub-categoria");
		return 
	}
	
	if (vlc_documento == '') {
		alert("Disculpe, debe ingresar un documento");
		return 
	}
	
	var campos = "parametro,status,fecha_creacion,id_categoria,usuario";
	var tabla ="CONJ_PARAMETROS_DERECHOS";
						
	$.ajax({
			type: "POST",
			dataType:"html",
			url: "Guardar.php",			
			data: "nb_tabla="+tabla+"&campos="+campos+"&valores='"+vlc_documento.toUpperCase()+"',"+1+",getdate(),"+vln_id_sub_bus_categoria_doc,	
		beforeSend: function() {			
			
									
		},			
			cache: false,			
			success: function(result) {			
			id_categoria=result;
			alert("Datos Guardados con exito");
			$("#bus_cod_categoria").val('');
			$("#bus_nom_categoria").val('');
			$("#bus_sub_cod_categoria").val('');
			$("#bus_sub_reg_categoria").val('');
			$("#id_bus_categoria").val(0);
			
		},			
			error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
			
	});		
	limpiar_campos();

}

function Validacion_acordeon_5(){
	
	
	var vln_d_prorroga  = $("#d_prorroga").val();
	var vln_d_vigencia = $("#d_vigencia").val();
	var vln_d_documento  = $("#d_documento").val();
	var vln_d_facturas = $("#d_facturas").val();   
	var vln_d_vehiculo_n = $("#d_vehiculo_nat").val();
	
	

	if (vln_d_prorroga < 0) {
		alert("Disculpe, debe ingresar un dia valido para la Prorroga");
		return 
	}
	
	if (vln_d_vigencia < 0) {
		alert("Disculpe, debe ingresar un dia valido para la Vigencia de los carnet Provisionales");
		return 
	}
	
	if (vln_d_documento < 0) {
		alert("Disculpe, debe ingresar un dia valido para los Documentos");
		return 
	}
	
	if (vln_d_facturas < 0) {
		alert("Disculpe, debe ingresar un dia valido para el pago de la Factura");
		return 
	}
	
	if (vln_d_vehiculo_n < 0) {
		alert("Disculpe, debe ingresar una cantidad valida");
		return 
	}
	
	var campos = "DIAS_PRORROGA,VIGENCIA_CARNET_PRO,DIAS_ENTREGA_DOCUMENTOS,DIAS_PAGO,FECHA_CRE,FG_ACTIVO,CANT_VEHICULO_NATURAL,USUARIO";
	var tabla ="CONJ_CONFIGURACION";
						
	$.ajax({
			type: "GET",
			dataType:"html",
			url: "query/Guardar_configuracion_general.php",			
			data: "nb_tabla="+tabla+"&campos="+campos+"&valores="+vln_d_prorroga+","+vln_d_vigencia+","+vln_d_documento+","+vln_d_facturas+",getdate(),"+1+","+vln_d_vehiculo_n,	
		beforeSend: function() {			
			
								
		},			
			cache: false,			
			success: function(result) {			
			id_categoria=result;
			alert('Datos Guardados Satisfactoriamente')
			
			$("#bus_cod_categoria").val('');
			$("#bus_nom_categoria").val('');
			$("#bus_sub_cod_categoria").val('');
			$("#bus_sub_reg_categoria").val('');
			$("#id_bus_categoria").val(0);
			
			
		},			
			error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
			
	});	
	
	var tabla = '';
	var UPDATE = 'UPDATE CONJ_LOCALIDADES SET FG_CONFIGURADO = 1 WHERE ID_LOCALIDAD ='+vln_id_localidad;
	$.ajax({
			type: "POST",
			dataType:"html",
			url: "query/ejecutar.php",			
			data: "nb_tabla="+tabla+"&campos="+UPDATE,	
		beforeSend: function() {			
			
									
		},			
			cache: false,			
			success: function(result) {	
			alert("Datos Guardados con exito");
		
		},			
			error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
			
	});
	
	limpiar_campos();
	limpiar_campos();
	
}


function limpiar_campos (){
	

	<!-- Tabs 1 -->
	$("#reg_categoria").val('');
	$("#cod_categoria").val('');
	
	<!-- tabs 2 -->
	$("#id_bus_categoria").val(0);
	$("#bus_sub_cod_categoria").val('');
	$("#bus_sub_reg_categoria").val('');
	$("#bus_cod_categoria").val('');
	$("#bus_nom_categoria").val('');
	
	<!-- tabs 3 -->
	$("#id_bus_categoria_tari").val(0);
	$("#id_sub_bus_categoria_tari").html('');
	$("#id_sub_bus_categoria_tari").html('<option value="0">Seleccionar ...</option>\n');
	$("#bus_cod_categoria_tari").val('');
	$("#bus_nom_categoria_tari").val('');
	$("#monto_tari").val('');
	$("#id_moneda_tari").val(0);
	
	<!-- tabs 4 -->
	$("#id_bus_categoria_doc").val(0);
	$("#id_sub_bus_categoria_doc").html('');
	$("#id_sub_bus_categoria_doc").html('<option value="0">Seleccionar ...</option>\n');
	$("#bus_cod_categoria_doc").val('');
	$("#bus_nom_categoria_doc").val('');
	$("#documento").val('');
	
	<!-- tabs 5 -->
	$("#id_localidad").val('');
	$("#nb_director").val('');
	$("#nb_asesor").val('');
	$("#d_prorroga").val('');
	$("#d_vigencia").val('');
	$("#d_documento").val('');
	$("#d_facturas").val('');
	
	<!-- Tabs 2 Combo categoria -->
	var tabla = 'tabs2';
	var tabs2 = 'EXEC SP_CATEGORIAS';
	$.ajax({
			type: "POST",
			dataType:"html",
			url: "query/ejecutar.php",			
			data: "nb_tabla="+tabla+"&campos="+tabs2,	
		beforeSend: function() {			
			
									
		},			
			cache: false,			
			success: function(result) {	
			$("#id_bus_categoria").html('');	
			$("#id_bus_categoria").html(result);
			
		
					
		},			
			error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
			
	});
	
	<!-- Tabs 3 y 4 combo de categoria para tarifa y documentos -->
	var tabla = 'tabs3';
	var tabs2 = 'SELECT * FROM CONJ_CATEGORIAS where CONJ_CATEGORIAS.idcategoria = any (select a.id_padre_cat from conj_categorias a) and status = 1';
	$.ajax({
			type: "POST",
			dataType:"html",
			url: "query/ejecutar.php",			
			data: "nb_tabla="+tabla+"&campos="+tabs2,	
		beforeSend: function() {			
			
									
		},			
			cache: false,			
			success: function(result) {	
			$("#id_bus_categoria_tari").html('');	
			$("#id_bus_categoria_tari").html(result);
			$("#id_bus_categoria_doc").html('');	
			$("#id_bus_categoria_doc").html(result);					
		},			
			error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
			
	});
	
	
	
	
	
	
}




function Validacion_empresa (){
	
	
	
	//
		
	var vln_bus_categoria_emp  = $("#id_bus_categoria_emp").val();
	
	if (vln_bus_categoria_emp   == 0) {
		alert("Disculpe, debe Seleccionar una categoria");
		return 
	}
	
	var vln_bus_sub_categoria_emp  = $("#id_sub_bus_categoria_emp").val();
	if (vln_bus_sub_categoria_emp   == 0) {
		alert("Disculpe, debe Seleccionar una sub categoria");
		return 
	}

	
	
	$.ajax({
			type: "POST",
			dataType:"html",
			url: "query/validar_categoria_empresa.php",			
			data: "id_empresa="+id_empresa+"&id_categoria="+vln_bus_sub_categoria_emp,		
		beforeSend: function() {			
			
									
		},			
			cache: false,			
			success: function(result) {			
			
			 
			if (result == 1){	
				alert("Disculpe,la empresa ya se encuentra registrado en esa categoria, intente nuevamente.");
				return 
			}else{
				
				var tabla ="";
				var sql = "insert into conj_categoria_empresa (iddeempresa,idcategoria,facturado) values ("+id_empresa+","+vln_bus_sub_categoria_emp+",0)";					
				$.ajax({
						type: "POST",
						dataType:"html",
						url: "query/ejecutar.php",			
						data: "nb_tabla="+tabla+"&campos="+sql,		
					beforeSend: function() {			
						
												
					},			
						cache: false,			
						success: function(result) {			
						id_categoria=result;
						
						alert("Datos Guardados con Exito");
						window.open("rep-doc.php?rif="+$("#RIF_emp").val()+"&id="+id_categoria,"Reportes");
						$("#id_bus_categoria_emp").val(0);
						$("#bus_cod_categoria_emp").val('');
						$("#bus_nom_categoria_emp").val('');
						$("#tabla_documentos").remove();
						$("#id_sub_bus_categoria_emp").html('');
						$("#id_sub_bus_categoria_emp").html('<option value="0">SELECCIONAR ...</option>\n');
						
					},			
						error: function(error) {			
						$("img#busy").hide();			
						$("button#check").show();			
						alert("Some problems have occured. Please try again later: " + error);			
					}
						
				});
				
				
			}
			
		},			
			error: function(error) {			
			$("img#busy").hide();			
			$("button#check").show();			
			alert("Some problems have occured. Please try again later: " + error);			
		}
			
	});
	
	
	
	
	limpiar_campos();

}

