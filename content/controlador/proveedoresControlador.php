<?php
      /*componentes*/ 
      use component\initcomponents as initcomponents;
      use component\menuLateral as menuLateral;
      $VarComp = new initcomponents();
      $VarNav = new menuLateral();

      /*modelo*/
        use modelo\proveedores as proveedores;
        $obj_Model = new proveedores();

    if(!isset($_SESSION['rol'])){    
      die('<script> window.location = "?url=login" </script>');
    }


    if(isset($_POST['mostrar'])){
     $obj_Model->mostrarProveedoresAjax();
   }
//     $mostrarProveedores= $obj_Model->getMostrarProveedores();
   
   if (isset($_POST['codigo_proveedor']) && isset($_POST['nombre']) && isset($_POST['email']) &&  isset($_POST['telefono'])) { 
      
      $respuesta = $obj_Model->getRegistrarProveedores($_POST['codigo_proveedor'], $_POST['nombre'], $_POST['email'], $_POST['telefono']);
    } 

    
   if(isset($_POST['select'])){
     $obj_Model->getItem($_POST['id']);
   }

   if(isset($_POST['editCodigo_proveedor']) && isset($_POST['editNombre']) && isset($_POST['editEmail']) &&  isset($_POST['editTelefono'])){
     $obj_Model->getEditar($_POST['editCodigo_proveedor'], $_POST['editNombre'], $_POST['editEmail'], $_POST['editTelefono']);

   }

   if(isset($_POST['eliminar'])){
    $obj_Model->getEliminar($_POST['id']);
  }
  

   if(file_exists("vista/proveedores.php")){
        require_once("vista/proveedores.php");
   }else{
        die("<script>window.location = `?url=home`</script>");
   }
?>