<?php
include("../bd/conexion.php");
$conex=conectarse();
$municipio=$_POST['municipio'];
$vlc_consulta = "";
				
				$sql = "select * from PARROQUIAS where ID_MPPO = $municipio";
				$rs=odbc_exec($conex,$sql);
				$vlc_consulta .= "<option value=\"0\">Seleccione...</option>\n";
				while (odbc_fetch_row($rs))  
				{ 
					$ID_PARROQUIA=odbc_result($rs,"ID_PARROQUIA");
					$PARROQUIA=utf8_encode(odbc_result($rs,"PARROQUIA"));
					 $vlc_consulta .= "<option value=\"$ID_PARROQUIA\">$PARROQUIA</option>\n";	
				}
	echo $vlc_consulta;
?>