<?php
include"bd/conexion.php";
$conex=conectarse();
?>
<script>
function verifica_clave()
{
  if($("#usuario").val()=="")
  {
    alert("Disculpe Debe ingresar el Usuario de Acceso al Sistema...!")
    return
  }
    if($("#clave").val()=="")
  {
    alert("Disculpe Debe ingresar la Clave de Acceso al Sistema...!")
    return
  }
  if($("#ccomunal").val()==0)
  {
    alert("Disculpe Debe Seleccionar el Consejo Comunal...!")
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
          cache: false,     

          success: function(result) { 
          
          
          if(result==1)
          {
    window.location="menu_principal.php";
                      
          }
          else
          {
            //window.location="error.php";
            alert("Estimado Usuario, Debe ingresar sus datos correctamente, Intente Nuevamente / Si no posee Acceso al Sistema debe comunicarse con su Jefe Inmediato..!") 
            
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

</script>
<script>

$(document).keypress(function (e) {
    if (e.which == 13) {
      verifica_clave()
    }
});
 
 
</script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/login.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<body>

<nav class="navbar navbar-default navbar-inverse" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Sistema de Consejos Comunales</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      
      <ul class="nav navbar-nav navbar-right">
        <li><p class="navbar-text">Aun no estas Registrado?</p></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Iniciar</b> <span class="caret"></span></a>
			<ul id="login-dp" class="dropdown-menu">
				<li>
					 <div class="row">
							<div class="col-md-12">
								
								 <form class="form" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
										<div class="form-group">
											 <label class="sr-only" for="usuario2">Usuario</label>
											 <input type="text" class="form-control" id="usuario" placeholder="Usuario" required>
										</div>
										<div class="form-group">
											 <label class="sr-only" for="clave2">Password</label>
											 <input type="password" class="form-control" id="clave" placeholder="Password" required>
										</div>
                    <div class="form-group">
                       <label class="sr-only" for="comuna"></label>
                       <select class="form-control" id="ccomunal">
                         
                         <?php          
              
                            $sql = "SELECT * FROM CONSEJO_COMUNAL WHERE FG_ACTIVO=1";
                            $cn=odbc_exec($conex,$sql);
                            while (odbc_fetch_array($cn))  
                                    {
                                          $ID_CONSEJO_COMUNAL=odbc_result($cn,"ID_CONSEJO_COMUNAL");
                                          $DS_CONSEJO_COMUNAL=odbc_result($cn,"DS_CONSEJO_COMUNAL");
                             echo "<option value=\"$ID_CONSEJO_COMUNAL\">$DS_CONSEJO_COMUNAL</option>";    
              
                                      }
                          ?>
                       </select>
                                             <div class="help-block text-right"><a href="">Olvidaste tu Calve?</a></div>
                    </div>
										<div class="form-group">
											 <button type="button" class="btn btn-primary btn-block" onclick="verifica_clave()">Accesar</button>
										</div>
										
								 </form>
							</div>
					 </div>
				</li>
			</ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


</body>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<script type="text/javascript" src="jquery2/jquery-ui.min.js"></script>

<script src="jquery2/jquery-ui.js"></script>

<script src="js/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>
<script src="js/validacion.js" type="text/javascript"> </script>


<script type="text/javascript" src="js/funciones.js"></script>

 <script type="text/javascript" src="scripts/jquery-1.3.2.js"></script>

 
  

<script src="js/index_login.js"></script>
<script src="https://cdn.rawgit.com/ilopX/jquery-ajax-progress/master/dist/jquery.ajax-progress.min.js"></script>
<script src="https://cdn.rawgit.com/ilopX/jquery-ajax-progress/master/dist/jquery.ajax-progress.js"></script>
</body>