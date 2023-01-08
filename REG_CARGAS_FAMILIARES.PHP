<?php
if(isset($_SESSION['CED_TITULAR']))
{
  $cedula=$_SESSION['CED_TITULAR'];
}
else
{

}
 session_start(); 
 include("bd/conexion.php");
 $conex=conectarse();
 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registro Carga Familiar</title>
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
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
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
function buscar_ced()
{
  
  if($("#sig_ced").val()==0)
  {
    alert("Debe Seleccionar su Nacionalidad...!");
    return
  }
  if($("#num_ced").val()=="")
  {
    alert("Debe Ingresar su Numero de Cedula...!")
    return
  }
  else
  {
  $("#equis").show()
  $("#busca_ced").hide()
  ced_jefe=$("#sig_ced").val()+$("#num_ced").val()
  
  
  $.ajax({
          type: "POST",
          dataType:"html",
          url: "query/BUSCAR_DATOS_TITULAR.PHP",      
          data: "ced_jefe="+ced_jefe,     
          beforeSend: function() {
            Pace.restart(); 
           // $.blockUI({ message: '<h2><img src="image/loading2.gif" /> <br><br><p>Cargando, Por Favor Espere...</p></h2>'});
            },      
                        
          cache: false,     
          success: function(result) { 
          $.unblockUI();
          datos=result.split('&')
          if (datos[0]==1)
          {

          cargar_tabla_cargafam()

          }
          else
          {
            $("#datos_titular").show('fadeIn')   
            $("#g_datos_titular").show('fadeIn')
            $("#btn_up_datos_titular").hide('fadeOut')
            
          }
          
              
 //         
              
          },      
      
        }); 
  }
}
function registrar_carga_familiar()
{

  if($("#sin_ced").val()==0)
  {

  
    if($("#sig_ced_carga").val()==0)
    {
      alert("Debe Seleccionar su Nacionalidad...!")
      return
    }
    if($("#num_ced_carga").val()=="")
    {
      alert("Debe Ingresar su Cedula de Identidad...!")
      return
    }
  }
      if($("#nombre_carga_fam").val()=="")
      {
        alert("Debe Ingresar sus Apellidos y Nombres Completos...!")
        return
      }
      if($("#sexo_carga_fam").val()==0)
      {
        alert("Debe Seleccionar su Sexo...!")
        return
      }
      if($("#parentesco_carga_fam").val()==0)
      {
        alert("Debe Seleccionar el Parentesco...!")
        return
      }
      if($("#edad_carga_fam").val()=="")
      {
        alert("Debe Ingresar su Edad...!")
        return
      }
      if($("#fecha_nac_carga").val()=="")
      {
        alert("Debe Ingresar su Fecha de Nacimiento...!")
        return
      }
      if($("#carnet_patria").val()==0)
      {
        alert("Debe Seleccionar si Tiene Carnet de la Patria...!")
        return
      }
      if($("#carnet_patria").val()==1)
      {
        if($("#cod_car_patria").val()=="")
        {
        alert("Debe Ingresar el Codigo de su Carnet de la Patria...!")
        return
        }
      }
      if($("#sig_ced").val()==0)
      {
        alert("Debe Seleccionar la Nacionalidad Jefe de Familia...!")
      }
      if($("#num_ced").val()==0)
      {
        alert("Debe Ingresar el Numero de Cedula del Jefe de Familia...!")
      }
      if($("#cne").val()==0)
      {
        alert("Debe Seleccionar si Esta Isncrito en el Registro Electoral...!")
      }
  else
  {
    ced_carga=$("#sig_ced_carga").val()+$("#ced_carga_fam").val()
    nombre_carga=$("#nombre_carga_fam").val()
    sexo_carga_fam=$("#sexo_carga_fam").val()
    parentesco_carga_fam=$("#parentesco_carga_fam").val()
    edad_carga=$("#edad_carga_fam").val()
    fecha_nac_carga=$("#fecha_nac_carga").val()
    carnet_P_carga=$("#carnet_patria").val()
    num_canrnet_P_carga=$("#cod_car_patria").val()
    ced_jefe_familia=$("#sig_ced").val()+$("#num_ced").val()
    cne=$("#cne").val()
    $.ajax({
          type: "POST",
          dataType:"html",
          url: "query/GUARDAR_DATOS_CARGAFAM.PHP",      
          data: "ced_carga="+ced_carga+"&nombre_carga="+nombre_carga+"&sexo_carga_fam="+sexo_carga_fam+"&parentesco_carga_fam="+parentesco_carga_fam+"&edad_carga="+edad_carga+"&fecha_nac_carga="+fecha_nac_carga+"&carnet_P_carga="+carnet_P_carga+"&num_canrnet_P_carga="+num_canrnet_P_carga+"&ced_jefe_familia="+ced_jefe_familia+"&cne="+cne,     
          beforeSend: function() {
            $.blockUI({ message: '<h2><img src="image/loading2.gif" /> <br><br><p>Cargando, Por Favor Espere...</p></h2>'});
                    
          //$("#tabla_inventario tbody").html('');            
          },      
                        
          cache: false,     
          success: function(result) { 
          $.unblockUI();
          if(result==1)
        {
          alert("Datos Guardados Exitosamente...!") 
          $("#sig_ced_carga").val(0)
          $("#ced_carga_fam").val('')
          $("#nomb_carga_fam").val('')
          $("#sexo_carga_fam").val(0)
          $("#parentesco_carga_fam").val(0)
          $("#edad_carga").val('')
          $("#fecha_nac_carga").val('')
          $("#carnet_P_carga").val(0)
          $("#num_canrnet_P_carga").val('')
          
        }
        else
        {
          if(result==2)
          {
            alert("Esta Cedula ya se encuentra Registrada en el Sistema")
          $("#sig_ced_carga").val(0)
          $("#ced_carga_fam").val('')
          $("#nomb_carga_fam").val('')
          $("#sexo_carga_fam").val(0)
          $("#parentesco_carga_fam").val(0)
          $("#edad_carga").val('')
          $("#fecha_nac_carga").val('')
          $("#carnet_P_carga").val(0)
          $("#num_canrnet_P_carga").val('')
          }
        }
                                
                    
          },      
      
        }); 
  }
}
function cargar_tabla_cargafam()
{
  ced_jefefam=$("#sig_ced").val()+$("#num_ced").val()
  $.ajax({
          type: "POST",
          dataType:"html",
          url: "query/CARGAR_TABLA_CARGA_FAMILIAR.PHP",     
          data: "ced_jefefam="+ced_jefefam,     
          beforeSend: function() {
            $.blockUI({ message: '<h2><img src="image/loading2.gif" /> <br><br><p>Cargando, Por Favor Espere...</p></h2>'});
                    
          $("#tabla_carga_registrada tbody").html('');            
          },      
                        
          cache: false,     
          success: function(result) { 
          $.unblockUI();
          datos=result.split('&')
          
           $("#tabla_carga_registrada tbody").html(result);              
                    
          },      
      
        });
}
function cancelar_busqueda()
{
  $("#equis").hide()
  $("#busca_ced").show()
  $("#sig_ced").val(0)
  $("#num_ced").val('')
  $("#apellido_jefe").val('')
  $("#nomb_jefe").val('')
  $("#calle_av").val('')
  $("#sexo").val(0)
  $("#t_jefe").val(0)
  $("#edad_jefe").val('')
  $("#fecha_nac_jefe").val('')
  $("#cod_tel_hab_jefe").val('')
  $("#tel_hab_jefe").val('')
  $("#cod_cel_jefe").val('')
  $("#tel_cel_jefe").val('')
  $("#correo_prin").val('')
  $("#correo_alter").val('')
  $("#datos_titular").hide('fadeOut')
  
}

function ver_ciudad()
{
  $("#ciudad").val(0)
  $("#municipio").val(0)
  $("#parroquia").val(0)
  estado=$("#estado").val()
    
    $.ajax({
          type: "POST",
          dataType:"html",
          url: "query/CARGAR_COMBO_CIUDADES.PHP",      
          data: "estado="+estado,     
          beforeSend: function() {
            $.blockUI({ message: '<h2><img src="image/loading2.gif" /> <br><br><p>Cargando, Por Favor Espere...</p></h2>'});
           
            },      
                        
          cache: false,     
          success: function(result) { 
          $.unblockUI();
           $("#ciudad").html(result)
            },      
      
        }); 
}
function ver_municipios()
{
  estado=$("#estado").val()
    
    $.ajax({
          type: "POST",
          dataType:"html",
          url: "query/CARGAR_COMBO_MUNICIPIOS.PHP",      
          data: "estado="+estado,     
          beforeSend: function() {
            $.blockUI({ message: '<h2><img src="image/loading2.gif" /> <br><br><p>Cargando, Por Favor Espere...</p></h2>'});
           
            },      
                        
          cache: false,     
          success: function(result) { 
          $.unblockUI();
           $("#municipio").html(result)
            },      
      
        }); 
}
function ver_parroquias()
{
  municipio=$("#municipio").val()
    
    $.ajax({
          type: "POST",
          dataType:"html",
          url: "query/CARGAR_COMBO_PARROQUIAS.PHP",      
          data: "municipio="+municipio,     
          beforeSend: function() {
            $.blockUI({ message: '<h2><img src="image/loading2.gif" /> <br><br><p>Cargando, Por Favor Espere...</p></h2>'});
           
            },      
                        
          cache: false,     
          success: function(result) { 
          $.unblockUI();
           $("#parroquia").html(result)
            },      
      
        }); 
}
function sin_cedula()
{
  $("#sig_ced_carga").prop('disabled',true)
  $("#num_ced_carga").prop('disabled',true)
  $("#sin_ced").val(1)
}

function con_cedula()
{
  $("#sig_ced_carga").prop('disabled',false)
  $("#num_ced_carga").prop('disabled',false)
  $("#sin_ced").val(0)
}
function carnetP()
{
  if($("#carnet_patria").val()==1)
  {
    $("#lbl_cp").show('fadeIn')
    $("#cod_car_patria").show('fadeIn')
  }
  else
  {
    $("#lbl_cp").hide('fadeOut')
    $("#cod_car_patria").hide('fadeOut')

  }
}
</script>
<script>
$(document).ready(function()
  { 
 $("#equis").hide();
 $("#datos_titular").hide()
 
 $("#cod_car_patria").hide()
 $("#lbl_cp").hide()
 $("#btn_up_datos_titular").hide()
 $("#g_datos_titular").hide()
 //$("#reg_carga_fam").hide()
 $("#reg_misiones").hide()


  });
</script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Consejos </b>Comunales</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>


      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
                      page and may cause design problems
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 9 tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Create a nice theme
                        <small class="pull-right">40%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">40% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Some task I need to do
                        <small class="pull-right">60%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">60% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Make beautiful transitions
                        <small class="pull-right">80%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">80% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"> <?php echo( $_SESSION["NOMBRE_USUARIO"]); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo( $_SESSION["NOMBRE_USUARIO"]); ?>
                  
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="salir.php" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
         CC:<?php
              $sql="SELECT * FROM CONSEJO_COMUNAL WHERE ID_CONSEJO_COMUNAL=".$_SESSION["CONSEJO_COMUN"];
            $cn=odbc_exec($conex,$sql);
            echo " ".odbc_result($cn,"SIG_CONSEJO_COMUNAL");
            ?><br>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="button" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><a href="index.php">Menu Lateral</a></li>
        <li class=" active treeview">
          <a href="#">
            <i class="fa fa-save "></i> <span>Configuracion</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="CONF_CCOMUNAL.PHP"><i class="fa fa-user"></i>Consejo Comunal</a></li>
            <li><a href="CONF_COMITES.PHP"><i class="fa fa-user"></i>Comites</a></li>
          </ul>

        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-save "></i> <span>Registros</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="REGISTRO_JEFE.php"><i class="fa fa-user"></i>Jefes de Familia</a></li>
            <li id="reg_carga_fam"><a href="REG_CARGAS_FAMILIARES.PHP"><i class="fa fa-circle-o"></i>Cargas Familiares</a></li>
            <li id="reg_misiones"><a href="#"><i class="fa fa-circle-o"></i>Datos de Gobierno</a></li>
          </ul>

        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Layout Options</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
            <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
            <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
            <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/widgets.html">
            <i class="fa fa-th"></i> <span>Widgets</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>UI Elements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
          <h1>
            Datos de Identidad del Titular  
          </h1>
          
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Cargas Familiares</li>
      </ol>
    </section>
          <div class="row">
            <div class="col-md-6">
              <div class="box box-success" style="margin-left: 15px;">
                <div class="box-header width-border">
                  <h3 class="box-title">
                    Cedula de Identidad
                  </h3>           
                  <div role="form">
                    <div class="box-body">
                    <div class="col-md-12">
                      <div class="form-group">
                        
                        <select class="form-control" id="sig_ced">
                            <option value="0" selected="selected">--</option>
                            <option value="V">V</option>
                            <option value="E">E</option>
                      </select>
                      <input type="text" class="form-control" id="num_ced" placeholder="Nº Cedula de Identidad" onkeypress="if (e.which == 13) {buscar_ced()}"><br>
                      <button type="button" class="btn btn-info pull-right" onclick="buscar_ced()" id="busca_ced">Buscar</button>
                      <button type="button" class="btn btn-danger pull-right" onclick="cancelar_busqueda()" id="equis">Otra Busqueda</button>
                                           
                  </div>  
                    </div>
                  </div>     
                </div>
              </div>
            </div>      
           </div>
           <div class="row">
             <div class="col-md-6">
              <div class="box box-success" style="width: 570px;">
                <div class="box-header">
                  <h3 class="box-title">Cargas Familiares Registradas</h3>
                   <div class="box-tools">
                    <ul class="pagination pagination-sm no-margin pull-right">
                      <li><a href="#">«</a></li>
                      <li><a href="#">1</a></li>
                      <li><a href="#">2</a></li>
                      <li><a href="#">3</a></li>
                      <li><a href="#">»</a></li>
                    </ul>
                  </div>
                </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table" id="tabla_carga_registrada">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Cedula</th>
                  <th>Nombre y Apellido</th>
                  <th>Genero</th>
                  <th>Parentesco</th>
                  <th>Consultar</th>
                </tr>
                </thead>
                  <tbody>
                  </tbody>
                
              </table>
            </div>
            <!-- /.box-body -->
            </div> 
         </div>
      </div>
</div>
<div class="row">
    <section class="content-header">
      <h1 style="margin-left: 25px;">
            Datos de las Cargas Familiares  
          </h1>
    </section> 
<div class="row" style="width: 1200px; margin-left: 1px;">
    <div class="col-md-12">
      <div class="box box-success" style="margin-left: 15px;">
        <div class="box-header width-border">
            <div role="form">
              <div class="box-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="form-group">
                       <input type="hidden" id="sin_ced">
                        <div class="radio">
                          <label>

                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" onclick="sin_cedula()">No Posee Cedula
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2" checked="" onclick="con_cedula()">Posee Cedula
                          </label>
                        </div>
                      </div>
                    <label>Cedula de Identidad:</label>
                      <select class="form-control" id="sig_ced_carga">
                        <option value="0" selected="selected">--</option>
                        <option value="V">V</option>
                        <option value="E">E</option>
                      </select>
                      <input type="text" class="form-control" id="num_ced_carga" placeholder="Nº Cedula de Identidad">

                      <br>
                      <label>Genero:</label>
                      <select class="form-control" id="sexo_carga_fam">
                        <option value="0" selected="selected">--</option>
                        <option value="1">F</option>
                        <option value="2">M</option>
                      </select>
                      <br>
                      <label>Fecha de Nacimiento:</label>
                      <div class="input-group">
                        <div class="input-group-addon">
                          <i class="fa fa-clock-o"></i>
                        </div>
                          <input type="text" class="form-control pull-right" id="fecha_nac_carga">
                      </div> <br>
                      <label>Edad:</label><small style="color: #F00;"> Si es un Infante solo colocar cero (0) como Edad.</small>
                      <input type="text" class="form-control" id="edad_carga_fam" placeholder="Edad">
                     
                    </div>
                  </div>
                    <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                    
                    <label>Nombres y Apellidos:</label>
                    <input type="text" class="form-control" id="nombre_carga_fam" placeholder="Nombre y Apellidos de la Carga Familiar">
                    <br>
                      <label>Parentesco:</label>
                      <select class="form-control" id="parentesco_carga_fam">
                        <option value="0" selected="selected">Seleccione...</option>
                          <?php         
                            $sql = "SELECT * FROM PARENTESCOS WHERE FG_ACTIVO=1";
                              $cn=odbc_exec($conex,$sql);
                                while (odbc_fetch_array($cn))  
                                  { 
                                    $ID_PARENTESCO=odbc_result($cn,"ID_PARENTESCO");
                                    $DS_PARENTESCO=odbc_result($cn,"DS_PARENTESCO");
                                    echo "<option value=\"$ID_PARENTESCO\">$DS_PARENTESCO</option>";    
                                  }
                          ?>
                      </select>
                      <br>
                      <label>Carnet de la Patria</label>
                        <select class="form-control" id="carnet_patria" onchange="carnetP()">
                          <option value="0" selected="selected">Seleccione...</option>
                          <option value="1">SI</option>
                          <option value="2">NO</option>
                      </select>
                          <br>
                      <label id="lbl_cp">Codigo</label>
                        <input type="text" class="form-control" id="cod_car_patria" placeholder="Codigo Carnet de la Patria">
                          <br>
                      <label>¿Inscrito en el CNE?</label>
                        <select class="form-control" id="cne">
                          <option value="0" selected="selected">Seleccione...</option>
                          <option value="1">SI</option>
                          <option value="2">NO</option>
                        </select>
                    </div>
                  </div>         
                </div>
              </div>
            </div>     
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 text-center">
  <button class="btn btn-success" id="" onclick="registrar_carga_familiar()">Guardar Datos Titular</button>
  <button class="btn btn-primary" id="" onclick="up_datos_jefe()">Actualizar Datos Titular</button>
  <br><br>
  </div>
</div>
  <!-- /.content-wrapper -->

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstra 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

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
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript">
</script>
</body>
</html>
