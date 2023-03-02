<?php
          /*componentes*/ 
    use component\initcomponents as initcomponents;
    use component\menuLateral as menuLateral;
    $VarComp = new initcomponents();
    $VarNav = new menuLateral();
    /*modelo*/
    use modelo\dolar as dolar;
   
         $obj_dolar = new dolar();
     
         if(isset($_POST['mostrar'])){
            $obj_dolar->mostrarDolarAjax();
          }
       

          
    if(isset($_POST['select'])){
      $obj_dolar->getItem($_POST['id']);
    }

    if(isset($_POST['precioEdit']) && isset($_POST['fechaEdit']) && isset($_POST['id'])){
      $obj_dolar->getEditar($_POST['precioEdit'], $_POST['fechaEdit'], $_POST['id']);

    }

    if(isset($_POST['eliminar'])){
      $obj_dolar->getEliminar($_POST['id']);
    }
     

   if(isset($_POST['dolar']) && isset($_POST['fechadolar'])){
      
      $respuesta = $obj_dolar->getRegistrarDolar($_POST['dolar'] , $_POST['fechadolar']);

    } 
  

   if(file_exists("vista/dolar.php")){
        require_once("vista/dolar.php");
   }else{
   	    die("<script>window.location = `?url=registro`</script>");
   }
?>