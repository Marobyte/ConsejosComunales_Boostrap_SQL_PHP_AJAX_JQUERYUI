<?php
include"bd/conexion.php";
//$conex=conectarse();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Acceso al Sistema</title>
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
function verifica_clave()
{
  if($("#usuario").val()=="")
  {
    alert("Disculpe Debe ingresar su RIF...!")
    return
  }
    if($("#clave").val()=="")
  {
    alert("Disculpe Debe ingresar la Clave que se le Envio al Correo...!")
    return
  }
  if($("#ccomunal").val()==0)
  {
    alert("Disculpe Debe Seleccionar su Consejo Comunal...!")
    return
  }
  else
  {
  usuario=$("#usuario").val()
  clave=$("#clave").val()
  ccomunal=$("#ccomunal").val()
  
  $.ajax({
          type: "POST",
          dataType:"html",
          url: "VERIFICAR.PHP",     
          data: "usuario="+usuario+"&clave="+clave+"&ccomunal="+ccomunal,     
          beforeSend: function() {
              $.blockUI({ message: '<h2><img src="image/loading2.gif" /> <br><br><p>Cargando, Por Favor Espere...</p></h2>'});
            },   
          cache: false,     
          
          success: function(result) { 
          
           $.unblockUI();
          if(result==1)
          {
    window.location="index.php";
                      
          }
          else
          {
            window.location="index.php";
            //window.location="error.php";
           // alert("Estimado Usuario, Debe ingresar sus datos correctamente, Intente Nuevamente / Si no posee Acceso al Sistema debe Ir al Modulo ¿Aun no estas Registrado?") 
            
          $("#usuario").val('')
          $("#clave").val('')
                      
          }
          
          
                        
                    
          },      
       // progress: function(e) {
       //      if(e.lengthComputable) {
       //          var progress = e.loaded / e.total * 100;
       //          var content = e.srcElement.responseText;
       //      }
        });
  }
}
function no_puede_ingresar()
{
  alert("Sino estas Registrado debes ir al Vinculo ¿Aun no estas Resgitrado? para Registrarte en el Sistema de Consejos Comunales...!")
  window.location="no_pude_ingresar.php";
  
}
function registro_nuevo()
{
  window.location="REGISTRO_NUEVO.PHP";
}
</script>
<script>

$(document).keypress(function (e) {
    if (e.which == 13) {
      verifica_clave()
    }
});
 
 
</script>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Consejos </b>Comunales <small>Inicio de Sesion</small>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"></p>

    <form>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Registro de Informacion Fiscal (RIF)" id="usuario" onkeyup="this.value=this.value.toUpperCase()">
        <small style="color: #F00;"> * El Rif debe ir sin Guiones (Ej:J123467899)</small>
        <!--<span class="glyphicon glyphicon-envelope form-control-feedback"></span>-->
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Clave de Acceso" id="clave">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <select class="form-control" id="ccomunal">
        <option value="0">Seleccione...</option>
        <option value="1">La Sorpresa</option>
        <option value="2">San Jose</option>
                         
        <?php          
              
                            ////$sql = "SELECT * FROM USUARIOS WHERE FG_ACTIVO=1";
                            ////$cn=odbc_exec($conex,$sql);
                            ////while (odbc_fetch_array($cn))  
                                ////    {
                                       ////   $ID_USUARIO=odbc_result($cn,"ID_USUARIO");
                                       ////   $RAZON_SOCIAL=odbc_result($cn,"RAZON_SOCIAL");
                             //echo "<option value=\"$ID_USUARIO\">$RAZON_SOCIAL</option>";    
              
                                     // }
                          ?>
                       </select>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="button" class="btn btn-primary btn-block btn-flat" onclick="verifica_clave()">Accesar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    
    <!-- /.social-auth-links -->

    <a href="#" class="text-center" style="cursor:pointer;" onclick="no_puede_ingresar()">¿No Puedes Ingresar al Sistema?</a><br>
    <a href="#" class="text-center" style="cursor:pointer;" onclick="registro_nuevo()">¿Aun no te has Registrado?</a>

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
