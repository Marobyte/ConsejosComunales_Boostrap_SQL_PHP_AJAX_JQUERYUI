<?php
session_start();
include"../bd/conexion.php";
$conex=conectarse();
$cedula=$_POST['cedula'];
$nombre_apellido=$_POST['nombre_apellido'];
$estado=$_POST['estado'];
$ciudad=$_POST['ciudad'];
$municipio=$_POST['municipio'];
$parroquia=$_POST['parroquia'];
$calle_av=$_POST['calle_av'];
$casa_edif=$_POST['casa_edif'];
$dir_hab_familia=$_POST['dir_hab_familia'];
$pais_origen=$_POST['pais_origen'];
$nacionalidad=$_POST['nacionalidad'];
$sexo=$_POST['sexo'];
$rol=$_POST['rol'];
$edad_jefe=$_POST['edad_jefe'];
$fecha_nac_jefe=$_POST['fecha_nac_jefe'];
$tel_hab_jefe=$_POST['tel_hab_jefe'];
$cel_jefe=$_POST['cel_jefe'];
$correo_prin=$_POST['correo_prin'];
$correo_alter=$_POST['correo_alter'];
$carnet_patria=$_POST['carnet_patria'];
$cod_car_patria=$_POST['cod_car_patria'];
$cne=$_POST['cne'];
$nomb_familia=$_POST['nomb_familia'];
$viv_en_casa=$_POST['viv_en_casa'];
$cant_familia=$_POST['cant_familia'];
$ccomunal=$_SESSION["CONSEJO_COMUN"];


$sql="EXEC SP_ACTUALIZAR_DATOS_JEFE_FAMILIA '$cedula','$nombre_apellido',$estado,$ciudad,$municipio,$parroquia,'$calle_av','$casa_edif','$dir_hab_familia',$pais_origen,'$nacionalidad',$sexo,$rol,$edad_jefe,'$fecha_nac_jefe','$tel_hab_jefe','$cel_jefe','$correo_prin','$correo_alter',$carnet_patria,$cod_car_patria,$cne,'$nomb_familia',$viv_en_casa,$cant_familia";
$cn=odbc_exec($conex,$sql);

$rs=odbc_result($cn,"RESULTADO");

echo $rs;
?>