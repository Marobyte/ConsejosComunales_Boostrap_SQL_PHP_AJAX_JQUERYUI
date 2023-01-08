<?php
include("../bd/conexion.php");
$conex=conectarse();
$estado=$_POST['estado'];
$vlc_consulta = "";
				
				$sql = "select * from MUNICIPIOS where ID_ESTADO = $estado";
				$rs=odbc_exec($conex,$sql);
				$vlc_consulta .= "<option value=\"0\">Seleccione...</option>\n";
				while (odbc_fetch_row($rs))  
				{ 
					$ID_MPPIO=odbc_result($rs,"ID_MPPIO");
					$MUNICIPIO=utf8_encode(odbc_result($rs,"MUNICIPIO"));
					
					 $vlc_consulta .= "<option value=\"$ID_MPPIO\">$MUNICIPIO</option>\n";	
				}
	echo $vlc_consulta;
?>