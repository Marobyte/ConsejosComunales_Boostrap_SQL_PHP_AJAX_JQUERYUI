<?php
session_start();
include("bd/conexion.php");
$conex=conectarse();

$usuario=$_POST['usuario'];
$clave = $_POST['clave'];
$consejo=$_POST['ccomunal'];

$sql = "exec SP_VERIFICAR_SESION '$usuario','$clave',$consejo";
$cn=odbc_exec($conex,$sql);

while (odbc_fetch_array($cn))  
{ 
	$_SESSION["CED_USUARIO"]=odbc_result($cn,"CED_USUARIO");
	$_SESSION["NOMBRE_USUARIO"]=odbc_result($cn,"NOMBRE_USUARIO");
	$_SESSION["ID_USUARIO"]=odbc_result($cn,"ID_USUARIO");
	$_SESSION["CONSEJO_COMUN"]=odbc_result($cn,"CCOMUNAL");;
	
							
}

$rs = odbc_result($cn,"resultado");
echo $rs;
//echo $sql;


	

?>