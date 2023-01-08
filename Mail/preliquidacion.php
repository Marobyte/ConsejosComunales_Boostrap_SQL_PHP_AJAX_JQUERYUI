<?php
include"../bd/conexion.php";
$conex=conectarse();
$rif=$_POST['rif'];
$sql = "EXEC SP_PRELIQUIDAR '$rif'";
		$rs=odbc_exec($conex,$sql);
		$id_pre=odbc_result($rs,"id_pre");
		
		$sql = "SELECT * FROM VIEW_PRELIQUIDACION_PENDIENTE WHERE id_preliquidacion=$id_pre";
		$rs=odbc_exec($conex,$sql);
		while (odbc_fetch_row($rs)){
			$fecha_cre=date("d/m/Y",strtotime(odbc_result($rs,"fecha_cre")));
			$nomb_emp=odbc_result($rs,"nomb_emp");
			$rif_emp=odbc_result($rs,"rif_emp");
			$fecha_cre=date("d/m/Y",strtotime(odbc_result($rs,"fecha_cre")));
			$cambio=odbc_result($rs,"cambio");
			$email_emp=odbc_result($rs,"email_emp");
			$para  = odbc_result($rs,"email_emp");

		}
		$sql = "SELECT * FROM VIEW_PRELIQUIDACION_PENDIENTE WHERE id_preliquidacion=$id_pre";
		$rs=odbc_exec($conex,$sql);
		while (odbc_fetch_row($rs)){
			$codigo_regimen=odbc_result($rs,"codigo_regimen");
			$categoria=odbc_result($rs,"categoria");
			$monto=odbc_result($rs,"monto");
			$valor=odbc_result($rs,"valor");
		}
		$sql = "SELECT subtotal_cambio,monto_iva,monto_exento,monto_total FROM PRELIQUIDACION WHERE id_preliquidacion=$id_pre";
		$rs=odbc_exec($conex,$sql);
		
		$subtotal_cambio=odbc_result($rs,"subtotal_cambio");
		$monto_iva=odbc_result($rs,"monto_iva");
		$monto_exento=odbc_result($rs,"monto_exento");
		$monto_total=odbc_result($rs,"monto_total");
?>

<?php
require 'class.phpmailer.php';
try {
	$mail = new PHPMailer(true); //Nueva instancia, con las excepciones habilitadas
	$body             = '<html>
<head>
<title>Pre-Liquidación</title>
</head>
<body>

<table width="786" height="364" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="280" colspan="4"><p><img src="http://img825.imageshack.us/img825/4862/headerfal.png" alt="Image Hosted by ImageShack.us" width="885" height="52" /></p><br/>
      <p align="left"><img src="http://imageshack.us/a/img441/5984/logopequeno.png" alt="Image Hosted by ImageShack.us" width="138" height="77" /></p><br/> 
	  
<p>PRELIQUIDACI&Oacute;N:'. $id_pre.'</p>
    <p>FECHA EMISI&Oacute;N: '.$fecha_cre.'</p>
    <p>A NOMBRE DE: '.$nomb_emp.'</p>
    <p>RIF:   '.$rif_emp.'</p>
    <p>&nbsp;</p>
    
  </tr>
  <p align="center"><strong>DETALLE DE PRELIQUIDACI&Oacute;N </strong></p>
  <tr>
    <td width="119"><div align="center">CODIGO</div></td>
    <td width="455"><div align="center">DESCRIPCI&Oacute;N</div></td>
    <td width="163"><div align="center">MONTO UNIT (BS). </div></td>
    <td width="147"><div align="center">TOTAL (BS)</div></td>
  </tr>
  
  <tr>
				<td width="119"><div align="center">'.$codigo_regimen.'</div></td>
				<td width="455">'.$categoria.'</td>
				<td width="163"><div align="right">'.$monto.'</div></td>
				<td width="147"><div align="right">'.$valor.'</div></td>
			  </tr>
			  
			  <tr>
    <td colspan="4">
	<p align="right">&nbsp;</p>
    <p align="right"><strong>MONTO GRAVABLE(BS)</strong>:'.$subtotal_cambio.'</p>
    <p align="right"><strong>IVA(12%)</strong>: '.$monto_iva.'</p>
	<p align="right"><strong>MONTO CAMBIO($)</strong>:'.$cambio.'</p>
    <p align="right"><strong>MONTO NO GRAVABLE (BS)</strong>:'.$monto_exento.'</p>
    <p align="right"><strong>TOTAL (BS) </strong>: '.$monto_total.'</p></td>
  </tr>
</table> 
</body> 
</html>';
	$body             = preg_replace('/\\\\/','', $body); //Escapar backslashes
	$mail->IsSMTP();                           // Usamos el metodo SMTP de la clase PHPMailer
	$mail->SMTPAuth   = true;                  // habilitado SMTP autentificación
	$mail->Port       = 25;                    // puerto del server SMTP
	$mail->Host       = "190.9.128.50"; // SMTP server
	$mail->Username   = "registro@bolipuertos.gob.ve";     // SMTP server Usuario
	$mail->Password   = "0123456789";          // SMTP server password       // SMTP server password
	$mail->From       = "Registro@bolipuertos.gob.ve"; //Remitente de Correo
	$mail->FromName   = "Bolivariana de Puertos, S.A."; //Nombre del remitente
	$to = $email_emp; //Para quien se le va enviar
	$mail->AddAddress($to);
	$mail->Subject  = "Preliquidacion por Registro Portuario BOLIVARIANA DE PUERTOS, (BOLIPUERTOS) S.A."; //Asunto del correo
	$mail->MsgHTML($body);
	$mail->IsHTML(true); // Enviar como HTML
	$mail->Send();//Enviar
	echo 'El Mensaje a sido enviado.';
} catch (phpmailerException $e) {
	echo $e->errorMessage();//Mensaje de error si se produciera.
}
?>

