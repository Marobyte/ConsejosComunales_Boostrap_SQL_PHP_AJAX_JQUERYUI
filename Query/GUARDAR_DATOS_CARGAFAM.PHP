<?php
session_start();
include"../bd/conexion.php";
$conex=conectarse();

$ced_carga=$_POST['ced_carga'];
$nombre_carga=$_POST['nombre_carga'];
$sexo_carga_fam=$_POST['sexo_carga_fam'];
$parentesco_carga_fam=$_POST['parentesco_carga_fam'];
$edad_carga=$_POST['edad_carga'];
$fecha_nac_carga=$_POST['fecha_nac_carga'];
$carnet_P_carga=$_POST['carnet_P_carga'];
$num_canrnet_P_carga=$_POST['num_canrnet_P_carga'];
$ced_jefe_familia=$_POST['ced_jefe_familia'];
$cne=$_POST['cne'];

$sql="EXEC SP_GUARDA_CARGA_FAMILIAR '$ced_carga','$nombre_carga','$sexo_carga_fam',$parentesco_carga_fam,$edad_carga,'$fecha_nac_carga',$carnet_P_carga,'$num_canrnet_P_carga','$ced_jefe_familia'";
$cn=odbc_exec($conex,$sql);

$rs=odbc_result($cn,"RESULTADO");

echo $rs;
?>