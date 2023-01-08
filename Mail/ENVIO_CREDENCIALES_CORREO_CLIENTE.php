<style>
@charset "utf-8";
.TABLA {
	font-family: Arial, Helvetica, sans-serif;
	text-align: justify;
	font-size: 16px;
}
.NEGRITA {
	font-weight: bold;
}
.nota {
	text-align: center;
	font-family: Arial, Helvetica, sans-serif;
}
.nota {
	text-align: justify;
}
.titulo {
	text-align: center;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
}
.estimado {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 14px;
}
.estimado strong {
	font-size: 36px;
}
.TABLA p {
	font-size: 24px;
}
</style>
<?php
include ("../bd/conexion.php");
$conex=conectarse();
$correo_prin=$_POST['correo_prin'];

$sql="SELECT * FROM USUARIO WHERE CORREO_PRINCIPAL='$correo_prin'";
$cn=odbc_exec($conex,$sql);
$nombre=odbc_result($cn,"RAZON_SOCIAL");
$rif_cc=odbc_result($cn,"RIF");
$clave=odbc_result($cn,"CLAVE");
$correo_aleter=odbc_result($cn,"CORREO_ALTERNATIVO");
?>
<?php
require 'class.phpmailer.php';
try {
	$mail = new PHPMailer(true); //Nueva instancia, con las excepciones habilitadas
	$body             = '<html> 
<head> 
   <title></title> 
</head> 
<body> 
<table width="1007" height="376" border="0" align="center" colspan="4">
  <tr>
    <td colspan="2"><p></p></td>
  </tr>
  <tr>
    <td colspan="2"><p align="center"></p></td>
  </tr>
  <td colspan="2"><p align="center" class="estimado"><strong>Estimado Sr(es). '.$nombre.' Rif: '.$rif.' </strong></p></td>
  </tr>
  <tr>
    <td height="28" colspan="2" class="TABLA" align="justify">El Sistema de Consejos Comunales le notifica el Envio de Sus Credenciales, por lo tanto le mostramos los datos de Acceso al Sistema:</td>
  </tr>  <tr>
    <td width="495" align="right" class="TABLA">Usuario:</td>
    <td width="502" class="TABLA">'.$rif_empresa.'</td>
  </tr>
  <tr>
    <td align="right" class="TABLA">Clave Nueva:</td>
    <td class="TABLA">'.$clave.'</td>
  </tr>
  <tr>
    <td class="TABLA">&nbsp;</td>
    <td class="TABLA"></td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><span class="titulo">***************AVISO IMPORTANTE***************</span><span class="nota"><br></div>
      <p  align="justify">Este mensaje es privado y confidencial, y está dirigido exclusivamente a su(s) destinatario(s). Si usted ha recibido este mensaje por error, debe abstenerse de distribuirlo, copiarlo o usarlo en cualquier sentido. Asimismo, le agradecemos comunicarlo al remitente y borrar el mensaje y cualquier documento adjunto.<br>
      Cualquier opinión contenida en este mensaje pertenece únicamente al autor remitente y no representa necesariamente la opinión del Sistema de Consejos Comunales, a menos que ello se señale en forma expresa.<br>
    Eventualmente, los correos electrónicos pueden ser interceptados o alterados, llegar con demora o incompletos. Al respecto, se le notifica no responder este mensaje ya que es una cuenta no monitoreada.            </p>  </td>
  </tr>
</table>
</body> 
</html> ';


	$body             = preg_replace('/\\\\/','', $body); //Escapar backslashes
	$mail->IsSMTP();                           // Usamos el metodo SMTP de la clase PHPMailer
	$mail->SMTPAuth   = true;                  // habilitado SMTP autentificación
	$mail->Port       = 25;                    // puerto del server SMTP
	$mail->Host       = "190.9.128.50"; // SMTP server
	$mail->Username   = "registro@bolipuertos.gob.ve";     // SMTP server Usuario
	$mail->Password   = "0123456789";          // SMTP server password
	$mail->From       = "Registro@bolipuertos.gob.ve"; //Remitente de Correo
	$mail->FromName   = "Bolivariana de Puertos, S.A."; //Nombre del remitente
	$to = $correo_1; //Para quien se le va enviar
	//$mail->AddBCC($correo_2);
	//$mail->AddBCC();
	$mail->AddAddress($to);
	$mail->Subject  = "Sistema de Consejos Comunales - Envio de Credenciales de Acceso"; //Asunto del correo
	$mail->MsgHTML($body);
	$mail->IsHTML(true); // Enviar como HTML
	$mail->Send();//Enviar
	echo 'El Mensaje a sido enviado.';
} catch (phpmailerException $e) {
	echo $e->errorMessage();//Mensaje de error si se produciera.
}
?>
