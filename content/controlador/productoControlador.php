
<?php
    /*componentes*/ 
    use component\initcomponents as initcomponents;
    use component\menuLateral as menuLateral;
    $VarComp = new initcomponents();
    $VarNav = new menuLateral();
    /*modelo*/
    use modelo\producto as producto;
    $objModel = new producto();

    // if(!isset($_SESSION['rol'])){    
    //   die('<script> window.location = "?url=login" </script>');
    // }
    
    if(isset($_SESSION['rol'])){
      if($_SESSION['rol'] != 'administrador'){
        die('<script> window.location = "?url=home" </script>');
      }
    }else{
      die('<script> window.location = "?url=login" </script>');
    }


    $mostrarMarcas= $objModel->mostrarMarca();
    $mostrarDolar = $objModel->getMostrarDolar();

    if(isset($_POST['mostrar'])){
      $objModel->mostrarProductoAjax();
    }

    if(isset($_POST['select'])){
      $objModel->getItem($_POST['id']);
    }

    if(isset($_POST['nombreEdit']) && isset($_POST['precioDolarEdit']) && isset($_POST['precioBsEdit']) && isset($_POST['cantidadMinEdit']) && isset($_POST['cantidadEdit']) && isset($_POST['descripcionEdit'])  && isset($_POST['marcaEdit'])  && isset($_POST['codigoEdit'])){

      $objModel->getEditar($_POST['nombreEdit'], $_POST['precioDolarEdit'],  $_POST['precioBsEdit'], $_POST['cantidadMinEdit'], $_POST['cantidadEdit'], $_POST['descripcionEdit'], $_POST['marcaEdit'], $_POST['codigoEdit']);

    }

    if(isset($_POST['eliminar'])){
      $objModel->getEliminar($_POST['id']);
    }

    if(isset($_POST['codigo']) && isset($_POST['nombre_producto']) && isset($_POST['precio']) && isset($_POST['precio_boliv']) && isset($_POST['cantidadMin']) && isset($_POST['cantidad'])  && isset($_POST['descripcion']) && isset($_POST['cars'])){
    
      $respuesta = $objModel->getRegistrarProducto($_POST['codigo'], $_POST['nombre_producto'], $_POST['precio'], $_POST['precio_boliv'], $_POST['cantidadMin'], $_POST['cantidad'], $_POST['descripcion'], $_POST['cars']);
       } 

    if(file_exists("vista/producto.php")){
      require_once("vista/producto.php");
    }else{
      die("<script>window.location=`?url=home`</script>");
    }
    ?>