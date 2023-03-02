<?php
   if(file_exists("modelo/cambiarclaveModelo.php")){
        require_once("modelo/cambiarclaveModelo.php");
   }else{
   	    die("<script>window.location = `?url=home.php`</script>");
   }
   
   if(isset($_POST['usuario']) && isset($_POST['clave']) && isset ($_POST['repclave'])){
      
      $obj_Model = new usuario();
      $respuesta = $obj_Model->getRegistrarSistema($_POST['usuario'], $_POST['clave'] ,$_POST['repclave']);
    } 
?>