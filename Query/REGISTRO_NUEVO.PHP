<?php
include("../bd/conexion.php");
$conex=conectarse();

$rif=$_POST['rif'];
$nomb_cc=$_POST['nomb_cc'];

$clave=substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789',5)),0,15);
//$clave= rand(0,100000); 

$correo_prin=$_POST['correo_prin'];
$correo_alter=$_POST['correo_alter'];
$primera_pregunta=$_POST['primera_pregunta'];
$primera_respuesta=$_POST['primera_respuesta'];
$segunda_pregunta=$_POST['segunda_pregunta'];
$segunda_respuesta=$_POST['segunda_respuesta'];

$sql="EXEC SP_REGISTRO_USUARIO_NUEVO '$rif','$nomb_cc','$clave','$correo_prin','$correo_alter',
'$primera_pregunta','$primera_respuesta','$segunda_pregunta','$segunda_respuesta'";
$cn=odbc_exec($conex, $sql);

echo odbc_result($cn,'RESULTADO')."&".odbc_result($cn,'ID_USUARIO')."&".odbc_result($cn,'RIF_USUARIO')."&".odbc_result($cn,'CORREO_PRIN')."&".odbc_result($cn,'CORREO_ALTERNATIVO');

?>