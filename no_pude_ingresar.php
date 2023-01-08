<?php
include"bd/conexion.php";
$conex=conectarse();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Olvido de Clave de Acceso</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script>

function enviar_clave()
{
  if ($("#correo_prin").val()=="")
  {
    alert("Debe Ingresar El Correo Electronico que Utilizo para Registrarse en el Sistema de Consejos Comunales...!")
    return
  }
  else
  {
    correo_prin=$("#correo_prin").val()
    $.ajax({
          type: "POST",
          dataType:"html",
          url: "Query/VERIFICAR_CORREO.PHP",     
          data: "correo_prin="+correo_prin,     
          beforeSend: function() {
              $.blockUI({ message: '<h2><img src="image/loading2.gif" /> <br><br><p>Cargando, Por Favor Espere...</p></h2>'});
            },   
          cache: false,     
          
          success: function(result) { 
          
           $.unblockUI();
          if(result==1)
          {
          
          enviar_clave_correo()
                      
          }
          else
          {
            //window.location="error.php";
            alert("Estimado Usuario, El Correo Electronico que Suministro no se Encuatra Registrado en el Sistema de Consejos Comunales...!") 
            //$("#correo_prin").val('')
          }
         },      
       
        });
  }
}
function enviar_clave_correo()
{
  correo_prin=$("#correo_prin").val()
    $.ajax({
          type: "POST",
          dataType:"html",
          url: "Mail/ENVIO_CREDENCIALES_CORREO_CLIENTE.PHP",     
          data: "correo_prin="+correo_prin,     
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
</script>
<script>
 
</script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Consejos </b>Comunales <small>Olvido de Contraseña</small>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"></p>

    <form>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Correo Electronico Principal" id="correo_prin"  onkeyup="this.value=this.value.toUpperCase()">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" class="btn btn-primary btn-block btn-flat" onclick="enviar_clave()">Enviar</button>

        </div>
        <a href="inicio_sesion.php" style="margin-left: 10px;"><small>Regresar</small></a>
        <!-- /.col -->
      </div>
    </form>

    
    <!-- /.social-auth-links -->

    
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

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
