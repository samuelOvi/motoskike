<?php
  
          /*componentes*/ 
          use component\initcomponents as initcomponents;
          use component\menuLateral as menuLateral;
          $VarComp = new initcomponents();
          $VarNav = new menuLateral();
          /*modelo*/
          use modelo\compra as compra;

   $objModel = new compra();
   
   if(isset($_SESSION['rol'])){
    if($_SESSION['rol'] != 'administrador'){
      die('<script> window.location = "?url=home" </script>');
    }
  }else{
    die('<script> window.location = "?url=login" </script>');
  }


   
    $mostrarC = $objModel->getMostrarProveedores();
    $mostrarD = $objModel->getMostrarDolar();

    if (isset($_POST['mostrar'])) {
      $mostrarV = $objModel->getMostrarCompra();
    }

    if(isset($_POST['detalleV'])) {
     $mostraDet = $objModel->getDetalleV($_POST['id']);
    }

    if(isset($_POST['select'])) {
      $mostrarP = $objModel->getMostrarProducto();
    }

    if(isset($_GET['producto']) && isset($_GET['fill'])){
      $objModel->productoDetalle($_GET['producto']);
    }

     if(isset($_POST['fecha']) && isset($_POST['montoT']) && isset($_POST['dolar']) && isset($_POST['cedula']) ){

       $objModel->getAgregarCompra($_POST['fecha'], $_POST['montoT'], $_POST['dolar'], $_POST['cedula']);

     }

    if(isset($_POST['precio']) && isset($_POST['cantidad']) && isset($_POST['subtotal']) && isset($_POST['producto']) && isset($_POST['id']) ){

     $objModel->AgregarCompraXProd($_POST['precio'] , $_POST['cantidad'], $_POST['subtotal'] , $_POST['producto'], $_POST['id'] );

    }

    if (isset($_POST["eliminar"])) {
     $MS = $objModel->eliminarCompra($_POST["id"]);
    }




   if(file_exists("vista/compra.php")){
        require_once("vista/compra.php");
   }else{
   	    die("<script>window.location = `?url=login`</script>");
   }

?>