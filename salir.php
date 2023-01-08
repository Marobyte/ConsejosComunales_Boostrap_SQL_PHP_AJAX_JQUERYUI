<?php 
session_start();
//include('bd/conexion.php');
//$conex=conectarse();
//$ID_EMPRESA=$_SESSION["NOMBRE_USUARIO"]
if ($_SESSION["NOMBRE_USUARIO"])
{	
	session_destroy();
	echo '<script language = javascript>
	alert("Su Sesion Ha Terminado Correctamente")
	self.location = "inicio_sesion.php"
	</script>';
	//$sql="UPDATE EMPRE_CONEXION SET FECHA_DESCONEXION=GETDATE() WHERE ID_EMPRESA=$ID_EMPRESA AND FECHA_DESCONEXION IS NULL";
	//$cn=odbc_exec($conex,$sql);
	
}
else
{
	echo '<script language = javascript>
	alert("No ha iniciado Ninguna Sesión, Por Favor Ingrese Usuario y Constraseña Personal")
	self.location = "inicio_sesion.php"
	</script>';}
?>
