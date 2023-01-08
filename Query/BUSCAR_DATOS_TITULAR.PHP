<?php
session_start();
include"../bd/conexion.php";
$conex=conectarse();
$ced_jefe=$_POST['ced_jefe'];
$sql="SELECT 1 AS FLAG FROM VIEW_DATOS_TITULAR WHERE CEDULA_IDENTIDAD='$ced_jefe'";
$cn=odbc_exec($conex,$sql);
$rs=odbc_result($cn,"FLAG");

$sql2="SELECT * FROM VIEW_DATOS_TITULAR WHERE CEDULA_IDENTIDAD='$ced_jefe'";
$cn2=odbc_exec($conex,$sql2);
$apellido=odbc_result($cn2,"APELLIDOS");
$nombre=odbc_result($cn2,"NOMBRES");
$num_casa=odbc_result($cn2,"TEL_HABITACION");
$num_cel=odbc_result($cn2,"TEL_CELULAR");

echo $rs."&".$apellido."&".$nombre."&".odbc_result($cn2,"ID_ESTADO")."&".odbc_result($cn2,"ID_CIUDAD")."&".odbc_result($cn2,"ID_MCPIO")."&".odbc_result($cn2,"ID_PARROQUIA")."&".odbc_result($cn2,"CALLE_AV")."&".odbc_result($cn2,"CASA")."&".odbc_result($cn2,"DIRECCION_HAB")."&".odbc_result($cn2,"ID_PAIS_ORIGEN")."&".odbc_result($cn2,"NACIONALIDAD")."&".odbc_result($cn2,"SEXO")."&".odbc_result($cn2,"ROL")."&".odbc_result($cn2,"EDAD")."&".date("d/m/Y",strtotime(odbc_result($cn2,"FECHA_NAC")))."&".$num_casa."&".$num_cel."&".odbc_result($cn2,"CORREO_PRINCIPAL")."&".odbc_result($cn2,"CORREO_ALTERNATIVO")."&".odbc_result($cn2,"TIENE_CARNET_PATRIA")."&".odbc_result($cn2,"NUM_CARNET")."&".odbc_result($cn2,"ID_CNE")."&".odbc_result($cn2,"CEDULA_IDENTIDAD")."&".odbc_result($cn2,"NOMBRE_FAMILIA")."&".odbc_result($cn2,"VIVEN_EN_CASA")."&".odbc_result($cn2,"CANT_FAMILIA");
?>