<?php
       /*componentes*/ 
       use component\initcomponents as initcomponents;
       use component\menuLateral as menuLateral;
       $VarComp = new initcomponents();
       $VarNav = new menuLateral();
       /*modelo*/
     //    use modelo\venta as venta;
     if(isset($_SESSION['rol'])){
          if($_SESSION['rol'] != 'administrador'){
            die('<script> window.location = "?url=home" </script>');
          }
        }else{
          die('<script> window.location = "?url=login" </script>');
        }
    

  /* if(file_exists("modelo/modeloProvedores2.php")){
        require_once("modelo/modeloProvedores2.php");
   }else{
   	    die("<script>window.location=`?url=registro`</script>");
   }*/
   
  /* if(isset($_POST['usuario_registro']) && isset($_POST['correo'])  && isset($_POST['rol']) && isset ($_POST['contraseña']) && isset($_POST['repetir_contraseña'])){
      
      $obj_Model = new usuario();
      $respuesta = $obj_Model->getRegistrarSistema($_POST['usuario_registro'], $_POST['correo'] ,$_POST['rol'] ,$_POST['contraseña'], $_POST['repetir_contraseña']);
    } */
  

   if(file_exists("vista/reporte.php")){
        require_once("vista/reporte.php");
   }else{
   	    die("<script>window.location=`?url=home`</script>");
   }
?>