<?php
//&function conectarse(){
		//$dsn = "Driver={SQL Server};Server=PC-BSINF-009;Database=CCOMUNAL;Integrated Security=SSPI;Persist Security Info=False;";//

		//$usuario="sa";
		//$clave="1234567";
		
		//realizamos la conexion mediante odbc
		//$cid=odbc_connect($dsn, $usuario, $clave);
		
			//if (!$cid)
			//{
				//exit("<strong>Ha ocurrido un error tratando de conectarse con el origen de datos.</strong>");
			//}
			//else
			//{
			
				//return $cid;
			//}
	//}
	
	function limpiar_caracteres_especiales($s) {
	$s = str_replace("�","&aacute;",$s);
	$s = str_replace("�","&Aacute;",$s);
	$s = str_replace("�","&eacute;",$s);
	$s = str_replace("�","&Eacute;",$s);
	$s = str_replace("�","&iacute;",$s);
	$s = str_replace("�","&Iacute;",$s);
	$s = str_replace("�","&oacute;",$s);
	$s = str_replace("�","&Oacute;",$s);
	$s = str_replace("�","&uacute;",$s);
	$s = str_replace("�","&Uacute;",$s);
	$s = str_replace("�","&ntilde;",$s);
	$s = str_replace("�","&Ntilde;",$s);
	$s = str_replace("\"","&quot;",$s);
/*	$s = str_replace(" ","-",$s);
	$s = str_replace("�","n",$s);
	$s = str_replace("�","N",$s);*/
	//para ampliar los caracteres a reemplazar agregar lineas de este tipo:
	//$s = str_replace("caracter-que-queremos-cambiar","caracter-por-el-cual-lo-vamos-a-cambiar",$s);
	
	//SI NO FUNCIONA EL ST_REPLAE USAR ereg_replace
	return $s;
	}
					
?>