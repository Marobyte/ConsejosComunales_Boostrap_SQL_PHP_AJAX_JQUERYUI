<?php
session_start();
include"../bd/conexion.php";
$conex=conectarse();
$rif=$_POST['rif'];
$sql="EXEC SP_VERIFICAR_RIF '$rif'";
$cn=odbc_exec($conex,$sql);

$rs=odbc_result($cn,"RESULTADO");

echo $rs;
?>