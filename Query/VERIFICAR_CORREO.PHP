<?php
session_start();
include("../bd/conexion.php");
$conex=conectarse();

$correo_prin=$_POST['correo_prin'];

$sql = "exec SP_VERIFICAR_CORREO '$correo_prin'";
$cn=odbc_exec($conex,$sql);

$rs = odbc_result($cn,"resultado");
echo $rs;
//echo $sql;


	

?>