<?php
 session_start(); 
 //include("bd/conexion.php");
 //$conex=conectarse();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registro Jefe de Familia</title>
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
            $.blockUI({ message: '<h2><img src="image/loading2.gif" /> <br><br><p>Cargando, Por Favor Espere...</p></h2>'});
            },      
                        
          cache: false,     
          success: function(result) { 
          $.unblockUI();
          datos=result.split('&')
          if (datos[0]==1)
          {

          $("#datos_titular").show('fadeIn')   
          $("#btn_up_datos_titular").show('fadeIn') 
          $("#g_datos_titular").hide()
          $("#lbl_cp").show('fadeIn')
          $("#cod_car_patria").show('fadeIn')
          $("#reg_carga_fam").show('fadeIn')
          $("#nomb_jefe").val(datos[1])
          $("#estado").val(datos[2])
          $("#ciudad").val(datos[3])
          $("#municipio").val(datos[4])
          $("#parroquia").val(datos[5])
          $("#calle_av").val(datos[6])
          $("#casa_edif").val(datos[7])
          $("#dir_hab_familia").val(datos[8])
          $("#pais_origen").val(datos[9])
          $("#nacionalidad").val(datos[10])
          $("#sexo").val(datos[11])
          $("#t_jefe").val(datos[12])
          $("#edad_jefe").val(datos[13])
          $("#fecha_nac_jefe").val(datos[14])
          $("#tel_hab_jefe").val(datos[15])
          $("#tel_cel_jefe").val(datos[16])
          $("#correo_prin").val(datos[17])
          $("#correo_alter").val(datos[18])
          $("#carnet_patria").val(datos[19])
          $("#cod_car_patria").val(datos[20])
          $("#cne").val(datos[21])

          //$("#ced_jefe_familia").val(datos[11])
          //$("#nomb_jefe_familia").val(datos[1])
         
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
function reg_datos_jefe()
{
 if($("#sig_ced").val()==0)
 {
   alert("Debe Seleccionar su Nacionalidad...!")
   return
 }
 if($("#num_ced").val()=="")
 {
   alert("Debe Ingresar su Cedula de Identidad...!")
   return
 }
 if($("#apellido_jefe").val()=="")
 {
    alert("Debe Ingresar sus 2 Apellidos....!")
    return
 }
 if($("#nomb_jefe").val()=="")
 {
   alert("Debe Ingresar sus 2 Nombres...!")
   return
 }
 if($("#estado").val()==0)
 {
   alert("Debe Seleccionar el Estado...!")
   return
 }
 if($("#ciudad").val()==0)
 {
   alert("Debe Seleccionar la Ciudad...!")
   return
 }
 if($("#municipio").val()==0)
 {
   alert("Debe Seleccionar el Municipio...!")
   return
 }
 if($("#calle_av").val()==0)
 {
   alert("Debe Ingresar la Calle o Avenida...!")
   return
 }
 if($("#dir_hab_familia").val()=="")
 {
   alert("Debe Ingresar su Direccion de Habitacion...!")
   return
 }
 if($("#pais_origen").val()==0)
 {
   alert("Debe Seleccionar su Pais de Origen...!")
   return
 }
 if($("#nacionalidad").val()==0)
 {
   alert("Debe Ingresar su Nacionalidad...!")
   return
 }
  if($("#sexo").val()==0)
 {
   alert("Debe Seleccionar el Sexo...!")
   return
 }
  if($("#t_jefe").val()==0)
 {
   alert("Debe Seleccionar el Rol en su Hogar...!")
   return
 }
 if($("#edad_jefe").val()==0)
 {
   alert("Debe Ingresar su Edad...!")
   return
 }
 if($("#fecha_nac_jefe").val()==0)
 {
   alert("Debe Ingresar su Fecha de Nacimiento...!")
   return
 }
 if($("#tel_hab_jefe").val()==0)
 {
   alert("Debe Ingresar su Telefono de Habitacion...!")
   return
 }
 if($("#tel_cel_jefe").val()==0)
 {
   alert("Debe Ingresar su Numero de Celular...!")
   return
 }
 if($("#correo_prin").val()==0)
 {
   alert("Debe Ingresar su Correo Principal...!")
   return
 }
 if($("#carnet_patria").val()==0)
 {
   alert("Debe Seleccionar si Posee el Carnet de la Patria...!")
   return
 }
 if($("#carnet_patria").val()==1)
 {
   if($("#cod_car_patria").val()=="")
   {
   alert("Debe el Codigo del Carnet de la Patria...!")
   return
 }
 }
 if($("#cne").val()==0)
 {
   alert("Debe Seleccionar si esta Inscrito en el CNE...!")
   return
 }
 else
 {
   cedula=$("#sig_ced").val()+$("#num_ced").val()
   apellido=$("#apellido_jefe").val()
   nombre=$("#nomb_jefe").val()
   estado=$("#estado").val()
   ciudad=$("#ciudad").val()
   municipio=$("#municipio").val()
   parroquia=$("#parroquia").val()
   calle_av=$("#calle_av").val()
   casa_edif=$("#casa_edif").val()
   dir_hab_familia=$("#dir_hab_familia").val()
   pais_origen=$("#pais_origen").val()
   nacionalidad=$("#nacionalidad").val()
   sexo=$("#sexo").val()
   rol=$("#t_jefe").val()
   edad_jefe=$("#edad_jefe").val()
   fecha_nac_jefe=$("#fecha_nac_jefe").val()
   tel_hab_jefe=$("#cod_tel_hab_jefe").val()+$("#tel_hab_jefe").val()
   cel_jefe=$("#cod_cel_jefe").val()+$("#tel_cel_jefe").val()
   correo_prin=$("#correo_prin").val()
   correo_alter=$("#correo_alter").val()
   carnet_patria=$("#carnet_patria").val()
   cod_car_patria=$("#cod_car_patria").val()
   cne=$("#cne").val()
  $.ajax({
          type: "POST",
          dataType:"html",
          url: "query/GUARDAR_DATOS_TITULAR.PHP",     
          data: "cedula="+cedula+"&apellido="+apellido+"&nombre="+nombre+"&estado="+estado+"&ciudad="+ciudad+"&municipio="+municipio+"&parroquia="+parroquia+"&calle_av="+calle_av+"&casa_edif="+casa_edif+"&dir_hab_familia="+dir_hab_familia+"&pais_origen="+pais_origen+"&nacionalidad="+nacionalidad+"&sexo="+sexo+"&rol="+rol+"&edad_jefe="+edad_jefe+"&fecha_nac_jefe="+fecha_nac_jefe+"&tel_hab_jefe="+tel_hab_jefe+"&cel_jefe="+cel_jefe+"&correo_prin="+correo_prin+"&correo_alter="+correo_alter+"&carnet_patria="+carnet_patria+"&cod_car_patria="+cod_car_patria+"&cne="+cne,     
          beforeSend: function() {
            $.blockUI({ message: '<h2><img src="image/loading2.gif"" /> <br><br><p>Cargando, Por Favor Espere...</p></h2>'});
                    
          //$("#tabla_inventario tbody").html('');            
          },      
                        
          cache: false,     
          success: function(result) { 
          $.unblockUI();
        if(result==1)
        {
          alert("Datos Guardados Exitosamente...!") 
          $("#sig_ced").val(0)
          $("#num_ced").val('')
          $("#nomb_jefe").val('')
          $("#estado").val(0)
          $("#ciudad").val(0)
          $("#municipio").val(0)
          $("#parroquia").val(0)
          $("#calle_av").val('')
          $("#casa_edif").val('')
          $("#dir_hab_familia").val('')
          $("#pais_origen").val(0)
          $("#nacionalidad").val('')
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
          $("#carnet_patria").val(0)
          $("#cod_car_patria").val('')
          $("#cne").val(0)
          
          alert("Ahora sera Redireccionado al Modulo de Registro de Carga Familiar Automaticamente, Por Favor Espere...")
          window.location="REG_CARGAS_FAMILIARES.PHP?cedula="+cedula;

        }
        else
        {
          if(result==2)
          {
            alert("Esta Cedula ya se encuentra Registrada en el Sistema")
              $("#sig_ced").val(0)
          $("#num_ced").val('')
          $("#nomb_jefe").val('')
          $("#estado").val(0)
          $("#ciudad").val(0)
          $("#municipio").val(0)
          $("#parroquia").val(0)
          $("#calle_av").val('')
          $("#casa_edif").val('')
          $("#dir_hab_familia").val('')
          $("#pais_origen").val(0)
          $("#nacionalidad").val('')
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
          $("#carnet_patria").val(0)
          $("#cod_car_patria").val('')
          $("#cne").val(0)
          }
        }
                        
                    
          },      
      
        }); 
  }
}
function up_datos_jefe()
{
 if($("#sig_ced").val()==0)
 {
   alert("Debe Seleccionar su Nacionalidad...!")
   return
 }
 if($("#num_ced").val()=="")
 {
   alert("Debe Ingresar su Cedula de Identidad...!")
   return
 }
 if($("#nomb_familia").val()=="")
 {
   alert("Debe Ingresar el Nombre de Su Familia...!")
   return
 }
 if($("#cant_familia").val()==0)
 {
   alert("Debe Seleccionar la Cantidad que Familias Existentes en el Hogar...!")
   return
 }
 if($("#viv_en_casa").val()=="")
 {
   alert("Debe Ingresar si Viven en la Misma Casa...!")
   return
 }
 if($("#nomb_jefe").val()=="")
 {
   alert("Debe Ingresar su Nombre Completo...!")
   return
 }
 if($("#estado").val()==0)
 {
   alert("Debe Seleccionar el Estado...!")
   return
 }
 if($("#ciudad").val()==0)
 {
   alert("Debe Seleccionar la Ciudad...!")
   return
 }
 if($("#municipio").val()==0)
 {
   alert("Debe Seleccionar el Municipio...!")
   return
 }
 if($("#calle_av").val()==0)
 {
   alert("Debe Ingresar la Calle o Avenida...!")
   return
 }
 if($("#dir_hab_familia").val()=="")
 {
   alert("Debe Ingresar su Direccion de Habitacion...!")
   return
 }
 if($("#pais_origen").val()==0)
 {
   alert("Debe Seleccionar su Pais de Origen...!")
   return
 }
 if($("#nacionalidad").val()==0)
 {
   alert("Debe Ingresar su Nacionalidad...!")
   return
 }
  if($("#sexo").val()==0)
 {
   alert("Debe Seleccionar el Sexo...!")
   return
 }
  if($("#t_jefe").val()==0)
 {
   alert("Debe Seleccionar el Rol en su Hogar...!")
   return
 }
 if($("#edad_jefe").val()==0)
 {
   alert("Debe Ingresar su Edad...!")
   return
 }
 if($("#fecha_nac_jefe").val()==0)
 {
   alert("Debe Ingresar su Fecha de Nacimiento...!")
   return
 }
 if($("#tel_hab_jefe").val()==0)
 {
   alert("Debe Ingresar su Telefono de Habitacion...!")
   return
 }
 if($("#tel_cel_jefe").val()==0)
 {
   alert("Debe Ingresar su Numero de Celular...!")
   return
 }
 if($("#correo_prin").val()==0)
 {
   alert("Debe Ingresar su Correo Principal...!")
   return
 }
 if($("#carnet_patria").val()==0)
 {
   alert("Debe Seleccionar si Posee el Carnet de la Patria...!")
   return
 }
 if($("#carnet_patria").val()==1)
 {
   if($("#cod_car_patria").val()=="")
   {
   alert("Debe el Codigo del Carnet de la Patria...!")
   return
 }
 }
 if($("#cne").val()==0)
 {
   alert("Debe Seleccionar si esta Inscrito en el CNE...!")
   return
 }
 else
 {
   cedula=$("#sig_ced").val()+$("#num_ced").val()
   nombre_apellido=$("#nomb_jefe").val()
   estado=$("#estado").val()
   ciudad=$("#ciudad").val()
   municipio=$("#municipio").val()
   parroquia=$("#parroquia").val()
   calle_av=$("#calle_av").val()
   casa_edif=$("#casa_edif").val()
   dir_hab_familia=$("#dir_hab_familia").val()
   pais_origen=$("#pais_origen").val()
   nacionalidad=$("#nacionalidad").val()
   sexo=$("#sexo").val()
   rol=$("#t_jefe").val()
   edad_jefe=$("#edad_jefe").val()
   fecha_nac_jefe=$("#fecha_nac_jefe").val()
   tel_hab_jefe=$("#tel_hab_jefe").val()
   cel_jefe=$("#tel_cel_jefe").val()
   correo_prin=$("#correo_prin").val()
   correo_alter=$("#correo_alter").val()
   carnet_patria=$("#carnet_patria").val()
   cod_car_patria=$("#cod_car_patria").val()
   cne=$("#cne").val()
  $.ajax({
          type: "POST",
          dataType:"html",
          url: "query/ACTUALIZAR_DATOS_TITULAR.PHP",     
          data: "cedula="+cedula+"&nombre_apellido="+nombre_apellido+"&estado="+estado+"&ciudad="+ciudad+"&municipio="+municipio+"&parroquia="+parroquia+"&calle_av="+calle_av+"&casa_edif="+casa_edif+"&dir_hab_familia="+dir_hab_familia+"&pais_origen="+pais_origen+"&nacionalidad="+nacionalidad+"&sexo="+sexo+"&rol="+rol+"&edad_jefe="+edad_jefe+"&fecha_nac_jefe="+fecha_nac_jefe+"&tel_hab_jefe="+tel_hab_jefe+"&cel_jefe="+cel_jefe+"&correo_prin="+correo_prin+"&correo_alter="+correo_alter+"&carnet_patria="+carnet_patria+"&cod_car_patria="+cod_car_patria+"&cne="+cne,     
          beforeSend: function() {
            $.blockUI({ message: '<h2><img src="image/loading2.gif"" /> <br><br><p>Cargando, Por Favor Espere...</p></h2>'});
                    
          //$("#tabla_inventario tbody").html('');            
          },      
                        
          cache: false,     
          success: function(result) { 
          $.unblockUI();
        if(result==1)
        {
          alert("Datos Actualizados Exitosamente...!") 
          $("#sig_ced").val(0)
          $("#num_ced").val('')
          $("#nomb_jefe").val('')
          $("#estado").val(0)
          $("#ciudad").val(0)
          $("#municipio").val(0)
          $("#parroquia").val(0)
          $("#calle_av").val('')
          $("#casa_edif").val('')
          $("#dir_hab_familia").val('')
          $("#pais_origen").val(0)
          $("#nacionalidad").val('')
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
          $("#carnet_patria").val(0)
          $("#cod_car_patria").val('')
          $("#cne").val(0)
          $("#busca_ced").show('fadeIn')
          $("#equis").hide('fadeOut')
          $("#datos_titular").hide('fadeOut')

        }
    },      
      
        }); 
  }
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
 //$("#reg_misiones").hide()
 });
</script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
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
              <span class="hidden-xs"> <?php //echo( $_SESSION["NOMBRE_USUARIO"]); ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php //echo( $_SESSION["NOMBRE_USUARIO"]); ?>
                  
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
              //$sql="SELECT * FROM CONSEJO_COMUNAL WHERE ID_CONSEJO_COMUNAL=".$_SESSION["CONSEJO_COMUN"];
              //$cn=odbc_exec($conex,$sql);
              //echo " ".odbc_result($cn,"SIG_CONSEJO_COMUNAL");
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
        <li class="active treeview">
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
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-save "></i> <span>Registros</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="reg_jefe_familia"><a href="REGISTRO_JEFE.php"><i class="fa fa-user"></i>Jefes de Familia</a></li>
            <li id="reg_carga_fam"><a href="REG_CARGAS_FAMILIARES.PHP'"><i class="fa fa-circle-o"></i>Cargas Familiares</a></li>
            <li id="reg_misiones"><a href="#"><i class="fa fa-circle-o"></i>Datos de Gobierno</a></li>
          </ul>

        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
          <h1>
            Configuracion de su Consejo Comunal 
          </h1>
           <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Registro Datos del Consejo Comunal</li>
      </ol><br>
             <div class="row">
            <div class="col-md-12">
              <div class="box box-primary">
                <div class="box-header width-border">
                  <h3 class="box-title">
                    Registro de Informacion Fiscal (RIF)
                  </h3>           
                  <div role="form">
                    <div class="box-body">
                    <div class="col-md-12">
                      <div class="form-group">
                        
                        <input type="text" class="form-control" id="num_rif" placeholder="Nº Registro de Informacion Fiscal (RIF)" disabled="disabled"><br>
                        <label>Nombre o Razon Social del Consejo Comunal:</label>
                        <input type="text" class="form-control" id="razon_social" placeholder="Nombre o Razon Social del Consejo Comunal" disabled="disabled"><br>
                        <label>Siglas del Consejo Comunal:</label>
                        <input type="text" id="sig_ccomunal" class="form-control" placeholder="Siglas del Consejo Comunal" onkeyup="this.value=this.value.toUpperCase()"><br>
                         <label>SITUR:</label>
                        <input type="text" id="cod_situr" class="form-control" placeholder="SITUR Nº" onkeyup="this.value=this.value.toUpperCase()"><br>
                        <div class="form-group">
                          <label for="exampleInputFile">Subir Logo</label>
                           <input type="file" id="logo_cc">
                            <p class="help-block"></p>
                            </div><br>
                            <button class="btn btn-flat" id="subir_logo">Subir Logo</button><br><br>
                        <label>Estado:</label>
                      <select class="form-control" id="estado" onchange="ver_ciudad()">
                            <option value="0" selected="selected">Seleccione...</option>
                            <?php         
              
                              //$sql = "SELECT * FROM ESTADOS ORDER BY ESTADOS ASC";
                              //$cn=odbc_exec($conex,$sql);
                              //while (odbc_fetch_array($cn))  
                              //{ 
                              //    $ID_ESTADO=odbc_result($cn,"ID_ESTADO");
                                  //$ESTADOS=utf8_encode(odbc_result($cn,"ESTADOS"));
                                  //echo "<option value=\"$ID_ESTADO\">$ESTADOS</option>";    
                             // }
                            ?>
                      </select><br>
                      <label>Ciudad:</label>
                      <select class="form-control" id="ciudad" onchange="ver_municipios()">
                            <option value="0" selected="selected">Seleccione...</option>
                      </select>
                      <br>
                      <label>Municipio:</label>
                      <select class="form-control" id="municipio" onchange="ver_parroquias()">
                            <option value="0" selected="selected">Seleccione...</option>
                            
                      </select><br>
                      <label>Parroquia:</label>
                      <select class="form-control" id="parroquia">
                            <option value="0" selected="selected">Seleccione...</option>
                            
                      </select><br>
                      <label>Calle/Av.:</label>
                      <input type="text" id="calle_av" class="form-control" placeholder="Calle, Avenida, Vereda, Sector, Urb."><br>
                      <label>Casa:</label>
                      <input type="text" id="casa_edif" class="form-control" placeholder="Casa, Edificio, Piso">
                      <br>
                      <label>Puento de Referencia</label>
                      <textarea class="form-control" rows="3" placeholder="Puento de Referencia..." id="dir_hab_familia"></textarea><br>
                      <label>Pais de Origen:</label>
                      <select class="form-control" id="pais_origen">
                            <option value="0" selected="selected">Seleccione...</option>
                            <?php         
              
                              $sql = "SELECT * FROM PAISES ORDER BY PAISES ASC";
                              $cn=odbc_exec($conex,$sql);
                              while (odbc_fetch_array($cn))  
                              { 
                                  $ID_PAIS=odbc_result($cn,"ID_PAIS");
                                  $PAISES=utf8_encode(odbc_result($cn,"PAISES"));
                                  echo "<option value=\"$ID_PAIS\">$PAISES</option>";    
                              }
                            ?>
                      </select>
                      <br>
                      <label>Telefono Habitacion:</label>
                              <input type="text" class="form-control" id="tel_hab_jefe" placeholder="Nº Telefono de Habitacion">
                              <br>
                              <label>Telefono Celular:</label>
                              <input type="text" class="form-control" id="tel_cel_jefe" placeholder="Nº Telefono Celular"><br>
                      <label>Correo Electronico</label> 
                      <input type="email" class="form-control" id="correo_prin" placeholder="Ingrese su Correo Electronico"><br>
                      <label>Correo Electronico Alternativo</label>
                      <input type="email" class="form-control" id="correo_alter" placeholder="Ingrese su Correo Electronico Alternativo"><br>
                      <br>
                      <label>Redes Sociales</label>
                      <input type="text" class="form-control" id="face" placeholder="Facebook"><br>
                      <input type="text" class="form-control" id="insta" placeholder="Instagram"><br>
                      <input type="text" class="form-control" id="twitter" placeholder="Twitter"><br>
                      <button class="btn btn-primary" id="btn_up_datos_ccomunal" onclick="up_datos_jefe()">Actualizar Datos</button>
                      </div>
                      </div>
                      
                      </div>
                      </div>
</section>

          </row>  
        </div>
  </div>
    <!-- /.content -->
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
