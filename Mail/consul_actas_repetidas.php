<script src="jquery/ui/jquery.ui.core.js"></script>
<script src="jquery/ui/jquery.ui.widget.js"></script>
<script src="jquery/ui/jquery.ui.tabs.js"></script>
<!--<script src="js/jquery.min.js" type="text/javascript"></script>-->
<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript"> 
document.ready( function(){
//Fucnciones
function envio_registro_exitoso(empresa2)
{
$.ajax({
							type: "POST",
							dataType:"html",
							url: "Mail/Registro_exitoso.php",			
							data: "empresa="+empresa2,	
							beforeSend: function() {
											
									$(".progress").show();
				
									},												
								cache: false,			
								success: function(result) {	
								
								alert("Su empresa se ha registrado Exitosamente..!")
								$("#guardar_pre").hide(300);
								$("#registro_exito").hide(300);
								$("#observaciones_inconformes").hide(300);
								//window.location.reload();
							    
									},	
												
								error: function(error) {				
									//alert("Disculpe, se ha producido un error al burcar el rif, por favor intente mas tarde");			
								}
								
						});
				
};
})
</script>
<?php
include"bd/conexion.php";
$conex=conectarse();
$rif=$_POST['rif'];
$sql="select * from conj_acta where usuario=$rif";
$cn=odbc_exec($conex,$sql);
?>
<table width="200" border="1" align="center">
  <tr>
    <td>ACTA</td>
    <td>ID_EMPRESA</td>
    <td>RIF</td>
    <td>ACCION</td>
  </tr>  
  <?php
while (odbc_fetch_array($cn))
{  
?>
  <tr>
  <tr id=\"tv_".odbc_result($rs,"ID")."\">
    <td align="center"><?php echo odbc_result($cn,"id_acta"); ?></td>
    <td align="center"><?php echo odbc_result($cn,"id_empresa"); ?></td>
    <td align="center"><?php echo odbc_result($cn,"usuario"); ?></td>
    <td align="center" id="eliminar".odbc_result($rs,"id_acta")><img src="/registro/img/close.png" width="30" height="30"></td>
	  <?php
}
    ?>
  </tr>
</table>
