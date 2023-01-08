<?php
session_start();
include"../bd/conexion.php";
$conex=conectarse();
$ced_jefe_familia=$_POST['ced_jefefam'];
$sql="SELECT * FROM VIEW_CARGAR_TABLA_CARGAFAM WHERE CEDULA_IDENTIDAD='$ced_jefe_familia'";
$cn=odbc_exec($conex,$sql);
$cn2=odbc_exec($conex,$sql);
//echo $sql;


while(odbc_fetch_array($cn2))
{

$id_carga=odbc_result($cn2,"ID_CARGA_FAMILIAR");
$genero=odbc_result($cn2,"SEXO_CARGA_FAMILIAR");
	echo "<tr id=\"rpl_".$id_carga."\">";
	echo "<td style=\"font-size:12px;\"><div align='center'>".$id_carga."</div></td>";
	echo "<td style=\"font-size:12px;\"><div align='center'>".odbc_result($cn2,"CEDULA_CARGA_FAMILIAR")."</div></td>";
    echo "<td style=\"font-size:12px;\"><div align='center'>".odbc_result($cn2,"NOMBRE_CARGA_FAMILIAR")."</div></td>";
    if($genero==1)
    {
    	echo "<td style=\"font-size:12px;\"><div align='center'>FEMENINO</div></td>";	
    }
	else
	{
		echo "<td style=\"font-size:12px;\"><div align='center'>MASCULINO</div></td>";
	}
	echo "<td style=\"font-size:12px;\"><div align='center'>".odbc_result($cn2,"DS_PARENTESCO")."</div></td>";
	 echo "<td><div align=\"center\"><img src=\"image/buscar.png\" width=\"18\" height=\"18\" style=\"cursor:pointer\" title=\"Devolver\" ></div></td>";
	   		 
	echo "</tr>"; 
}

?>
