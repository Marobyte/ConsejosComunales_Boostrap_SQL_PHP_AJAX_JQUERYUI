<?php
include("../bd/conexion.php");
$conex=conectarse();
$estado=$_POST['estado'];
$vlc_consulta = "";
				
				$sql = "select * from CIUDADES where ID_ESTADO = $estado";
				$rs=odbc_exec($conex,$sql);
				$vlc_consulta .= "<option value=\"0\">Seleccione...</option>\n";
				while (odbc_fetch_row($rs))  
				{ 
					$ID_CIUDAD=odbc_result($rs,"ID_CIUDAD");
					$CIUDADES=utf8_encode(odbc_result($rs,"CIUDAD"));
					 
					 $vlc_consulta .= "<option value=\"$ID_CIUDAD\">$CIUDADES</option>\n";	
				}
	echo $vlc_consulta;
?>