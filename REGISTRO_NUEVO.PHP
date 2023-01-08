<?php
 session_start(); 
 include("bd/conexion.php");
 //$conex=conectarse();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Creacion de Usuario Nuevo</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <script type="text/javascript" src="jquery2/jquery-ui.min.js"></script>

<script src="jquery2/jquery-ui.js"></script>

<script src="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
<script src="js/validacion.js" type="text/javascript"> </script>


<script type="text/javascript" src="js/funciones.js"></script>

 <script type="text/javascript" src="scripts/jquery-1.3.2.js"></script>
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
     <script>
function buscar_rif()
{
  if($("#sig_rif").val()==0)
  {
    alert("Debe Seleccionar la Sigla del RIF...!");
    return
  }
  if($("#num_rif").val()=="")
  {
    alert("Debe Ingresar su Numero de RIF...!")
    return
  }
  else
  {
  $("#equis").show()
  $("#busca_rif").hide()
  rif=$("#sig_rif").val()+$("#num_rif").val()
  
  
  $.ajax({
          type: "POST",
          dataType:"html",
          url: "query/BUSCAR_DATOS_RIF.PHP",      
          data: "rif="+rif,     
          beforeSend: function() {
            $.blockUI({ message: '<h2><img src="image/loading2.gif" /> <br><br><p>Cargando, Por Favor Espere...</p></h2>'});
            },      
                        
          cache: false,     
          success: function(result) { 
          $.unblockUI();
          datos=result.split('&')
          if (datos[0]==1)
          {
            alert("Este RIF ya se encuentra Registrado en el Sistema de Consejos Comunales")
         
          window.location="inicio_sesion.php";
          
          }
         if (datos[0]==2)
          {
            $("#datos_reg_nuevo").show('fadeIn')   
            
          }
          
              
 //         
              
          },      
      
        }); 
  }
}
function reg_usuario_nuevo()
{
  if($("#nomb_cc").val()=="")
  {
    alert("Debe Ingresar el Nombre o Razon Social...!");
    return
  }
  if($("#correo_prin").val()=="")
  {
    alert("Debe Ingresar su Correo Principal...!")
    return
  }
  if($("#correo_alter").val()=="")
  {
    alert("Debe Ingresar su Correo Alternativo...!")
    return
  }
  if($("#primera_pregunta").val()=="")
  {
    alert("Debe Ingresar su Priemra Pregunta de Seguridad...!")
    return
  }
  if($("#primera_respuesta").val()=="")
  {
    alert("Debe Ingresar su Primera Respuesta de Seguridad...!")
    return
  }
  if($("#segunda_pregunta").val()=="")
  {
    alert("Debe Ingresar su Segunda Pregunta de Seguridad...!")
    return
  }
  if($("#segunda_respuesta").val()=="")
  {
    alert("Debe Ingresar su Segunda Respuesta de Seguridad...!")
    return
  }
  else
  {

rif=$("#sig_rif").val()+$("#num_rif").val()
nomb_cc=$("#nomb_cc").val()
correo_prin=$("#correo_prin").val()
correo_alter=$("#correo_alter").val()
primera_pregunta=$("#primera_pregunta").val()
primera_respuesta=$("#primera_respuesta").val()
segunda_pregunta=$("#segunda_pregunta").val()
segunda_respuesta=$("#segunda_respuesta").val()

$.ajax({
          type: "POST",
          dataType:"html",
          url: "query/REGISTRO_NUEVO.PHP",      
          data: "rif="+rif+"&nomb_cc="+nomb_cc+"&correo_prin="+correo_prin+"&correo_alter="+correo_alter+"&primera_pregunta="+primera_pregunta+"&primera_respuesta="+primera_respuesta+"&segunda_pregunta="+segunda_pregunta+"&segunda_respuesta="+segunda_respuesta,
          beforeSend: function() {
            $.blockUI({ message: '<h2><img src="image/loading2.gif" /> <br><br><p>Cargando, Por Favor Espere...</p></h2>'});
            },      
                        
          cache: false,     
          success: function(result) { 
          $.unblockUI();
          datos=result.split('&')
          if (datos[0]==1)
          {
            alert("Usuario de Acceso Creado Exitosamente");
            enviar_registro_exitoso()
            //window.location="inicio_sesion.php";
          }
          },      
      
        }); 

  }
}
function enviar_registro_exitoso() {
  // body...
  rif=$("#sig_rif").val()+$("#num_rif").val()
    $.ajax({
          type: "POST",
          dataType:"html",
          url: "Mail/REGISTRO_EXITOSO.PHP",     
          data: "rif="+rif,     
          beforeSend: function() {
              $.blockUI({ message: '<h2><img src="image/loading2.gif" /> <br><br><p>Cargando, Por Favor Espere...</p></h2>'});
            },   
          cache: false,     
          
          success: function(result) { 
          
           $.unblockUI();

         alert("Favor Revise su Correo Electronico, Datos Enviados Exitosamente...!");
          window.location="inicio_sesion.php"
          },      
       // progress: function(e) {
       //      if(e.lengthComputable) {
       //          var progress = e.loaded / e.total * 100;
       //          var content = e.srcElement.responseText;
       //      }
        });
}
function cancelar_busqueda()
{
  $("#equis").hide()
  $("#busca_rif").show()
  $("#sig_rif").val(0)
  $("#num_rif").val('')
  $("#nomb_cc").val('')
  $("#correo_prin").val('')
  $("#correo_alter").val('')
  $("#primera_pregunta").val('')
  $("#primera_respuesta").val('')
  $("#segunda_pregunta").val('')
  $("#segunda_respuesta").val('')
  $("#datos_reg_nuevo").hide('fadeOut')
  
}
</script>
<script>
$(document).ready(function()
  { 
 $("#equis").hide();
 $("#datos_reg_nuevo").hide()
 });
</script>
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
  <b>Consejos </b>Comunales
    <small>Creacion de Usuario</small>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Consulta de RIF</p>

    <form>
      <div class="form-group has-feedback">
      <select class="form-control" id="sig_rif">
        <option value="0" selected="selected">Seleccione...</option>
        <option value="1" selected="selected">J</option>
        <option value="1" selected="selected">V</option>
        <option value="1" selected="selected">G</option>
        <?php         
              
              //$sql = "SELECT * FROM SIGLAS_RIF ORDER BY ID_SIG_RIF ASC";
             // $cn=odbc_exec($conex,$sql);
             // while (odbc_fetch_array($cn))  
              //{ 
               //   $ID_SIG_RIF=odbc_result($cn,"ID_SIG_RIF");
               //   $DS_SIG_RIF=utf8_encode(odbc_result($cn,"DS_SIG_RIF"));
              //    echo "<option value=\"$ID_SIG_RIF\">$DS_SIG_RIF</option>";    
              //}
            ?>
      </select>
      
        <input type="text" class="form-control" id="num_rif" placeholder="Registro de Informacion Fiscal (RIF)">
        <small style="font-size: 9px; color: #F00;">* El numero del RIF debe ir sin caracteres especiales (ej: 123456789)</small>
        </div>
       <button type="button" class="btn btn-primary btn-block btn-flat" onclick="buscar_rif()" id="busca_rif">Buscar</button><button type="button" class="btn btn-danger btn-block btn-flat" onclick="cancelar_busqueda()" id="equis">Otra Busqueda</button>
       <br>
       <a href="inicio_sesion.php" class="text-center"><small>Ya Tengo Usuario...!</small></a>
</form>
</div>
<br>

  <div class="register-box-body" id="datos_reg_nuevo">
    <p class="login-box-msg">Registro de Usuario Nuevo</p>

    <form> 
    <div class="form-group has-feedback">
    <input type="text" class="form-control" id="nomb_cc" placeholder="Nombre del Consejo Comunal" onkeyup="this.value=this.value.toUpperCase()">
    </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" id="correo_prin" placeholder="Ingrese su Correo Electronico" onkeyup="this.value=this.value.toUpperCase()">
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" id="correo_alter" placeholder="Ingrese su Correo Electronico Alternativo" onkeyup="this.value=this.value.toUpperCase()">
      </div>
      <div class="form-group has-feedback">
      <input type="text" class="form-control" id="primera_pregunta" placeholder="Primera Pregunta de Seguridad" onkeyup="this.value=this.value.toUpperCase()">        
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" id="primera_respuesta" placeholder="Respuesta Pregunta de Seguridad" onkeyup="this.value=this.value.toUpperCase()">
      </div>
      <div class="form-group has-feedback">
      <input type="text" class="form-control" id="segunda_pregunta" placeholder="Segunda Pregunta de Seguridad" onkeyup="this.value=this.value.toUpperCase()">        
      </div>
      <div class="form-group has-feedback">
      <input type="text" class="form-control" id="segunda_respuesta" placeholder="Respuesta Pregunta de Seguridad" onkeyup="this.value=this.value.toUpperCase()">        
      </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
           <button type="button" class="btn btn-success btn-block btn-flat" onclick="reg_usuario_nuevo()" id="reg_usu_new">Registrar Usuario Nuevo</button><br>
        </div>
        <!-- /.col -->
      </div>
    </form>
   
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="js/alertify.js"></script>
<script src="js/alertify.min.js"></script>
<script type="text/javascript" src="jquery2/jquery-ui.min.js"></script>
<script src="jquery2/jquery-ui.js"></script>

<script src="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
<script src="js/validacion.js" type="text/javascript"> </script>
<script type="text/javascript" src="js/jquery.formatCurrency-1.4.0.js"></script>
<script type="text/javascript" src="js/jquery.formatCurrency.all.js"></script>
<script type="text/javascript" src="js/ui_block.js"></script>
<script type="text/javascript" src="js/funciones.js"></script>
<!--<script type="text/javascript" src="js/jquery-barcode.js"></script> 
<script type="text/javascript" src="js/jquery-barcode.min"></script>--> 
<script type="text/javascript" src="js/jquery.qrcode.min.js"></script>

 <script type="text/javascript" src="scripts/jquery-1.3.2.js"></script>
<script src="js/sample.js"></script>
</body>
</html>
