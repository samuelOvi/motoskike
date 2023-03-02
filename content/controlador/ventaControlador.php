<?php
       /*componentes*/ 
       use component\initcomponents as initcomponents;
       use component\menuLateral as menuLateral;
       $VarComp = new initcomponents();
       $VarNav = new menuLateral();
       /*modelo*/
       use modelo\venta as venta;
       $objModel = new venta();
       if(!isset($_SESSION['rol'])){    
        die('<script> window.location = "?url=login" </script>');
      }
   
       $mostrarC = $objModel->getMostrarCliente();
       $mostrarD = $objModel->getMostrarDolar();
   
       if (isset($_POST['mostrar'])) {
         $mostrarV = $objModel->getMostrarVentas();
       }

       if(isset($_POST['detalleV'])) {
        $mostraDet = $objModel->getDetalleV($_POST['id']);
       }
   
       if(isset($_POST['select'])) {
         $mostrarP = $objModel->getMostrarProducto();
       }
   
       if(isset($_GET['producto']) && isset($_GET['fill'])){
         $objModel->detalleProducto($_GET['producto']);
       }
   
        if(isset($_POST['cedula']) && isset($_POST['montoT']) && isset($_POST['dolar']) && isset($_POST['fecha']) ){
   
          $objModel->getVentaAgregar($_POST['cedula'] , $_POST['montoT'] , $_POST['dolar'] , $_POST['fecha'] );
   
        }
   
       if(isset($_POST['precio']) && isset($_POST['cantidad']) && isset($_POST['subtotal']) && isset($_POST['producto']) && isset($_POST['id']) ){
   
        $objModel->AgregarVentaProdroducto($_POST['precio'] , $_POST['cantidad'], $_POST['subtotal'] , $_POST['producto'], $_POST['id'] );
   
       }

       if (isset($_POST["eliminar"])) {
        $MS = $objModel->eliminarVenta($_POST["id"]);
       }
   

   if(file_exists("vista/venta.php")){
        require_once("vista/venta.php");
   }else{
   	    die("<script>window.location=`?url=home`</script>");
   }
?>