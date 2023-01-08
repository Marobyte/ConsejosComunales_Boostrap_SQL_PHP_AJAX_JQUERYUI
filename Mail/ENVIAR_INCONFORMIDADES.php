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
session_start();
include ("../bd/conexion.php");
$conex=conectarse();
$id_empresa = 1;
$id_localidad = 1;
$sql="SELECT * FROM EMPRESA WHERE ID_EMPRESA = $id_empresa";
$cn=odbc_exec($conex,$sql);
$nombre=odbc_result($cn,"RAZON_SOCIAL");
$rif_empresa=odbc_result($cn,"RIF");

$sql="SELECT * FROM tb_localidad WHERE ID_localidad = $id_localidad";
$cn=odbc_exec($conex,$sql);
$puerto=odbc_result($cn,"nb_localidad");



echo $sql;
//$pregunta_se=odbc_result($cn,"PREGUNTA");
//$respuesta_se=odbc_result($cn,"RESP_PREGUN");
//$correo_1=odbc_result($cn,"E_MAIL1");
//$correo_2=odbc_result($cn,"E_MAIL2");
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
    <td colspan="3"><p><img src="http://img20.imageshack.us/img20/9940/cyoc.png" alt="Image Hosted by ImageShack.us" width="885" height="52" /></p></td>
  </tr>
  <tr>
    <td colspan="3"><p align="center"><img src="http://img849.imageshack.us/img849/2955/jodc.png" alt="Image Hosted by ImageShack.us" width="138" height="77" align="left" /></p></td>
  </tr>
  <td colspan="3"><p align="center" class="estimado"><strong>Estimado Sr(es). '.$nombre.' Rif: '.$rif_empresa.' </strong></p></td>
  </tr>
  <tr>
    <td height="28" colspan="3" class="TABLA" align="justify">Bolivariana de Puertos, S.A. le notifica que los documentos entregados en la sede de '.$puerto.' contiene inconformidades la cual se detallan a continuación:</td>
  </tr> 
   </table>';
  
 $aux = 1;
  // datos de DOCUMENTOS  inconformes
$sql_res="select * from VIEW_RP_DOCU_INCON where id_empresa = $id_empresa and id_localidad = $id_localidad and fg_conforme = 0 and estatus_inconf = 1 ";
$cn2=odbc_exec($conex,$sql_res);
while(odbc_fetch_row($cn2))
{
	$nb_documento=odbc_result($cn2,'nb_docum');
	
	if($aux == 1){
		$nro_acta=odbc_result($cn2,'nro_acta');
		$body .=" 
				<h3><strong> Datos de Documentos con Inconformidad  $nro_acta </strong></h3>
				<table class=\"hovered bordered\" >";
		$body .="<tr >
				<td >".htmlentities($nb_documento)."</td>
				</tr>";
		$aux = 1 + $aux;
	}else{
		$body .="
		<tr >
			<td >$nb_documento</td>
		</tr>";
	}

}
$body .="</table>";

$aux = 1;

// datos de garantias inconformes
$sql_res="select * from VIEW_RP_GARAN_INCON where id_empresa = $id_empresa and id_localidad = $id_localidad and fg_conforme = 0  and estatus_inconf = 1";
$cn2=odbc_exec($conex,$sql_res);
while(odbc_fetch_row($cn2))
{
	$nb_categoria=odbc_result($cn2,'nb_categoria');
	$nb_tgarantia=odbc_result($cn2,'nb_tgarantia');
	$nb_emp_asegur=odbc_result($cn2,'nb_emp_asegur');
	$nro_docum=odbc_result($cn2,'nro_docum');
	
	if($aux == 1){
	
		
		$nro_acta=odbc_result($cn2,'nro_acta');
		$body .="<div id=\"acta_doc\"> 
				<h3> <strong>Documentos de las Garantias (Nº. Acta $nro_acta)</strong></h3>
				<table class=\"hovered bordered striped\" width=\"1000px\" >
				<thead>
					<tr>
					<th>CATEGORIA</th>
					<th>TIPO DE GARANTIA</th>
					<th>EMPRESA ASEGURADORA</th>
					<th>Nº DOCUMENTO</th>
					</tr>
				</thead>
				";
				
		$body .="
			<tr >
				<td >$nb_categoria</td>
				<td >$nb_tgarantia</td>
				<td >$nb_emp_asegur</td>
				<td >$nro_docum</td>
			</tr>";
			$aux = 1 +$aux ;
	
	}else{
		$body .="
		<tr >
			<td >$nb_categoria</td>
			<td >$nb_tgarantia</td>
			<td >$nb_emp_asegur</td>
			<td >$nro_docum</td>
		</tr>";
	}

}
$body .="</table>";

$aux = 1;

// datos de EMPLEADOS inconformes

$sql_res="select * from VIEW_RP_EMPL_INCO where id_empresa = $id_empresa and id_localidad = $id_localidad and fg_conforme = 0  and estatus_inconf = 1 ";
$cn2=odbc_exec($conex,$sql_res);

while(odbc_fetch_row($cn2))
{
	$ci_empleado=odbc_result($cn2,'ci_empleado');
	$nb_empleado=odbc_result($cn2,'nb_empleado');
	$nb_cargo=odbc_result($cn2,'nb_cargo');
	
	
	if($aux == 1){
		$nro_acta=odbc_result($cn2,'nro_acta');
		$body .="
				<h3> <strong>Datos de los Empleados con Inconformidad</strong></h3>
				<table class=\"hovered bordered striped\" width=\"1000px\" >
				<thead>
					<tr>
					<th>CEDULA</th>
					<th>NOMBRE</th>
					<th>CARGO</th>
					</tr>
				</thead>
				";
				
		$body .="
			<tr >
				<td >$ci_empleado</td>
				<td >$nb_empleado</td>
				<td >$nb_cargo</td>
			</tr>";
			$aux = 1 +$aux ;
	
	}else{
		$body .="
			<tr >
				<td >$ci_empleado</td>
				<td >$nb_empleado</td>
				<td >$nb_cargo</td>
			</tr>";
	}

}
$body .="</table>";

$aux = 1;
// datos de vehiculos inconformes
$sql_res="select * from VIEW_RP_VEH_INCONF where id_empresa = $id_empresa and id_localidad = $id_localidad and fg_conforme = 0 and estatus_inconf = 1 ";
$cn2=odbc_exec($conex,$sql_res);

while(odbc_fetch_row($cn2))
{
	$placa=utf8_encode (odbc_result($cn2,'placa'));
	$nb_modelo_veh=utf8_encode (odbc_result($cn2,'nb_modelo_veh'));
	$nb_tvehiculo=utf8_encode (odbc_result($cn2,'nb_tvehiculo'));
	$color=utf8_encode (odbc_result($cn2,'color'));
	
	
	if($aux == 1){
	
		
		$nro_acta=odbc_result($cn2,'nro_acta');
		$body .="
				<h3> <strong>Datos de Vehiculos con Inconformidad</strong></h3>
				<table class=\"hovered bordered striped\" width=\"1000px\" >
				<thead>
					<tr>
					<th>PLACA</th>
					<th>MODELO</th>
					<th>TIPO DE VEHICULO</th>
					<th>COLOR</th>
					</tr>
				</thead>
				";
				
		$body .="
			<tr >
				<td >$placa</td>
				<td >$nb_modelo_veh</td>
				<td >$nb_tvehiculo</td>
				<td >$color</td>
			</tr>";
			$aux = 1 +$aux ;
	
	}else{
		$body .="
			<tr >
				<td >$placa</td>
				<td >$nb_modelo_veh</td>
				<td >$nb_tvehiculo</td>
				<td >$color</td>
			</tr>";
	}

}
$body .="</table>";

$aux = 1;

// datos de maquinaria inconformes
$sql_res="select * from VIEW_RP_MAQ_INCON where id_empresa = $id_empresa and id_localidad = $id_localidad and fg_conforme = 0 and estatus_inconf = 1";
$cn2=odbc_exec($conex,$sql_res);

while(odbc_fetch_row($cn2))
{
	$SERIAL=utf8_encode (odbc_result($cn2,'SERIAL'));
	$DS_MAQEQUIP=utf8_encode (odbc_result($cn2,'DS_MAQEQUIP'));
	$NB_PROPIETARIO=utf8_encode (odbc_result($cn2,'NB_PROPIETARIO'));
	$NB_TIPO_MAQEQUIP=utf8_encode (odbc_result($cn2,'NB_TIPO_MAQEQUIP'));
	$NB_MARCA_MAQEQUIP=utf8_encode (odbc_result($cn2,'NB_MARCA_MAQEQUIP'));
	
	
	
	if($aux == 1){
	
		
		$body .="<h3> <strong>Datos de Maquinarias y Equipos con Inconformidad</strong></h3>
				<table class=\"hovered bordered striped\" width=\"1000px\" >
				<thead>
					<tr>
					<th>SERIAL</th>
					<th>DESCRIPCIÓN</th>
					<th>PROPIETARIO</th>
					<th>TIPO MAQUINA</th>
					<th>MARCA</th>
					</tr>
				</thead>
				";
				
		$body .="
			<tr >
				<td >$SERIAL</td>
				<td >$DS_MAQEQUIP</td>
				<td >$NB_PROPIETARIO</td>
				<td >$NB_TIPO_MAQEQUIP</td>
				<td >$NB_MARCA_MAQEQUIP</td>
			</tr>";
			$aux = 1 +$aux ;
	
	}else{
		$body .="
			<tr >
				<td >$SERIAL</td>
				<td >$DS_MAQEQUIP</td>
				<td >$NB_PROPIETARIO</td>
				<td >$NB_TIPO_MAQEQUIP</td>
				<td >$NB_MARCA_MAQEQUIP</td>
			</tr>";
	}

}
$body .="</table>";
 
  
 $body .='<table> <tr>
    <td colspan="4"><div align="center"><span class="titulo">***************AVISO IMPORTANTE***************</span><span class="nota"><br></div>
      <p  align="justify">Este mensaje es privado y confidencial, y está dirigido exclusivamente a su(s) destinatario(s). Si usted ha recibido este mensaje por error, debe abstenerse de distribuirlo, copiarlo o usarlo en cualquier sentido. Asimismo, le agradecemos comunicarlo al remitente y borrar el mensaje y cualquier documento adjunto.<br>
      Cualquier opinión contenida en este mensaje pertenece únicamente al autor remitente y no representa necesariamente la opinión del Bolivariana de Puertos, S.A., a menos que ello se señale en forma expresa.<br>
    Eventualmente, los correos electrónicos pueden ser interceptados o alterados, llegar con demora o incompletos. Al respecto, se le notifica no responder este mensaje ya que es una cuenta no monitoreada.      
    </p></td>
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
	$mail->AddBCC("rblanco@bolipuertos.gob.ve");
	$mail->AddBCC("jocelynac@hotmail.com");
	$mail->AddAddress($to);
	$mail->Subject  = "Sistema de Registro de Operadores y Auxiliares Portuarios"; //Asunto del correo
	$mail->MsgHTML($body);
	$mail->IsHTML(true); // Enviar como HTML
	$mail->Send();//Enviar
	echo 'El Mensaje a sido enviado.';
} catch (phpmailerException $e) {
	echo $e->errorMessage();//Mensaje de error si se produciera.
}
?>
