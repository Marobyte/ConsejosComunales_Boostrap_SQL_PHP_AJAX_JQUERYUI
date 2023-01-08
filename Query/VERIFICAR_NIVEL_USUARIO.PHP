<?php
session_start();
include"../bd/conexion.php";
$conex=conectarse();
$id_usuario=$_SESSION['ID_USUARIO'];


$sql="SELECT ID_ROL FROM USUARIOS WHERE ID_USUARIO=$id_usuario and FG_ACTIVO=1";
$cn=odbc_exec($conex,$sql);
//echo $sql;
echo odbc_result($cn,"ID_ROL");

?>