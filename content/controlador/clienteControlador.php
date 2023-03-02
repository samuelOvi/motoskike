<?php

         /*componentes*/ 
          use component\initcomponents as initcomponents;
          use component\menuLateral as menuLateral;
          $VarComp = new initcomponents();
          $VarNav = new menuLateral();
          /*modelo*/
          use modelo\cliente as cliente;
          $obj_cliente = new cliente();

          if(!isset($_SESSION['rol'])){    
            die('<script> window.location = "?url=login" </script>');
          }

    if(isset($_POST['mostrar'])){
     $obj_cliente->mostrarClienteAjax();
   }

   if(isset($_POST['select'])){
     $obj_cliente->getItem($_POST['id']);
   }

   if(isset($_POST['cedulaEdit']) && isset($_POST['nombreEdit']) && isset($_POST['apellidoEdit']) &&  isset($_POST['telefonoEdit'])){
     $obj_cliente->getEditar($_POST['cedulaEdit'], $_POST['nombreEdit'], $_POST['apellidoEdit'], $_POST['telefonoEdit']);

   }

   if(isset($_POST['eliminar'])){
     $obj_cliente->getEliminar($_POST['id']);
   }
   
   if (isset($_POST['cedula']) && isset($_POST['nombre']) && isset($_POST['apellido']) &&  isset($_POST['telefono'])) { 
      
      $respuesta = $obj_cliente->getRegistrarClientes($_POST['cedula'], $_POST['nombre'], $_POST['apellido'], $_POST['telefono']);
    } 
  

   if(file_exists("vista/cliente.php")){
        require_once("vista/cliente.php");
   }else{
        die("<script>window.location = `?url=home`</script>");
   }
?>