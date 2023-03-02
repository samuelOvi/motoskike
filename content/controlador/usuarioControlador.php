<?php
          /*componentes*/ 
    use component\initcomponents as initcomponents;
    use component\menuLateral as menuLateral;
    $VarComp = new initcomponents();
    $VarNav = new menuLateral();
    /*modelo*/
    use modelo\usuario as usuario;
    $obj_Model = new usuario();
    if(!isset($_SESSION['rol'])){    
      die('<script> window.location = "?url=login" </script>');
    } 
  
         if(isset($_POST['mostrar'])){
          $obj_Model->mostrarUsuarioAjax();
        }
       
        if(isset($_POST['select'])){
          $obj_Model->getItem($_POST['id']);
        }
     
        if(isset($_POST['nombreEdit']) && isset($_POST['claveEdit']) && isset($_POST['rolEdit'])  &&  isset($_POST['correoEdit'])){
          $obj_Model->getEditar($_POST['nombreEdit'], $_POST['claveEdit'], $_POST['rolEdit'], $_POST['correoEdit']);
     
        }

        
   if(isset($_POST['eliminar'])){
     $obj_Model->getEliminar($_POST['id']);
   }
          

     

    if(isset($_POST['correo']) && isset($_POST['nombre'])  && isset($_POST['rol']) && isset ($_POST['clave'])){
      
    $respuesta = $obj_Model->getRegistrarUsuario($_POST['correo'], $_POST['nombre'], $_POST['rol'], $_POST['clave']);

    } 
  

   if(file_exists("vista/usuario.php")){
        require_once("vista/usuario.php");
   }else{
   	    die("<script>window.location = `?url=login`</script>");
   }
?>