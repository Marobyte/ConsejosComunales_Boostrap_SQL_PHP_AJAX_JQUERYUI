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
.titulo2 {
	font-size: 24px;
}
.negra {
	font-weight: bold;
}
</style>
<?php
include ("../bd/conexion.php");
$conex=conectarse();
$rif=$_POST['rif'];

$sql="SELECT * FROM USUARIOS WHERE RIF='$RIF'";
$cn=odbc_exec($conex,$sql);
$nombre=odbc_result($cn,"RAZON_SOCIAL");
$rif=odbc_result($cn,"RIF");
$clave=odbc_result($cn,"CLAVE");
$correo_principal=odbc_result($cn,'CORREO_PRINCIPAL')
$correo_alter=odbc_result($cn,'CORREO_ALTERNA')
$pregunta_1=odbc_result($cn,"PRIMERA_PREG");
$respuesta_1=odbc_result($cn,"PRIMERA_RESP");
$pregunta_2=odbc_result($cn,"SEGUNDA_PREG");
$respuesta_2=odbc_result($cn,"SEGUNDA_RESP");

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
<table width="915" height="376" border="0" align="center" colspan="4">
  <tr>
    <td width="895" colspan="3"><p><img src="" alt="Image Hosted by ImageShack.us" width="885" height="52" /></p></td>
  </tr>
  <tr>
    <td colspan="3"><p align="center" class="titulo2">Sistema de Concejos Comulaes</p></td>
  </tr>
  <td colspan="3"><p align="center" class="estimado"><strong>Estimado Sr(es). '.$nombre.' Rif: '.$rif.' </strong></p></td>
  </tr>
  <tr>
    <td height="28" colspan="3" class="TABLA" align="justify">El Sistema de Consejos Comunales le notifica que su registro en el Sistema ha sido de manera Exitosa, Por lo tanto le enviamos sus Datos de Acceso:</span>
    </td>
    <td height="28" colspan="3" class="TABLA" align="justify">&nbsp;</td>
    </tr>
  <tr>
    <td height="28" colspan="3" class="TABLA" align="justify"><span class="negra">Usuario:</span> '.$rif.' <span class="negra">Clave:</span> '.$clave.'</td>
    <td height="28" colspan="3" class="TABLA" align="justify">&nbsp;</td>
  </tr>
  <tr>
    <td height="28" colspan="3" class="TABLA" align="justify"><span class="negra">1) Pregunta de Seguridad:</span> '.$pregunta_1.' <span class="negra">Respuesta:</span> '.$respuesta_1.'</td>
    <td height="28" colspan="3" class="TABLA" align="justify">&nbsp;</td>
  </tr>
  <tr>
    <td height="28" colspan="3" class="TABLA" align="justify"><span class="negra">2) Pregunta de Seguridad:</span> '.$pregunta_2.' <span class="negra">Respuesta:</span> '.$respuesta_2.'</td>
    <td height="28" colspan="3" class="TABLA" align="justify">&nbsp;</td>
  </tr>
  <tr>
    <td height="28" colspan="3" class="TABLA">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div align="center"><span class="titulo">***************AVISO IMPORTANTE***************</span><span class="nota"><br></div>
      <p  align="justify">Este mensaje es privado y confidencial, y está dirigido exclusivamente a su(s) destinatario(s). Si usted ha recibido este mensaje por error, debe abstenerse de distribuirlo, copiarlo o usarlo en cualquier sentido. Asimismo, le agradecemos comunicarlo al remitente y borrar el mensaje y cualquier documento adjunto.<br>
      Cualquier opinión contenida en este mensaje pertenece únicamente al autor remitente y no representa necesariamente la opinión del Bolivariana de Puertos, S.A., a menos que ello se señale en forma expresa.<br>
    Eventualmente, los correos electrónicos pueden ser interceptados o alterados, llegar con demora o incompletos. Al respecto, se le notifica no responder este mensaje ya que es una cuenta no monitoreada.</td>
    <td width="2"></p>
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
	$to = $correo_principal; //Para quien se le va enviar
	$mail->AddBCC($correo_alter);
	$mail->AddAddress($to);
	$mail->Subject  = "Sistema de Consejos Comunales - Registro Exitoso"; //Asunto del correo
	$mail->MsgHTML($body);
	$mail->IsHTML(true); // Enviar como HTML
	$mail->Send();//Enviar
	echo 'El Mensaje a sido enviado.';
} catch (phpmailerException $e) {
	echo $e->errorMessage();//Mensaje de error si se produciera.
}
?>
