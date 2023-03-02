<?php

  use component\initcomponents as initcomponents;
  use modelo\login as login;
  
  if(isset($_SESSION['correo'])){
    die('<script>window.location = "?url=home" </script>');
  }

  if(isset($_POST['correo']) && isset($_POST['contraseña'])){
   $objModel = new login();
   $respuesta = $objModel->getLoginSistema($_POST['correo'], $_POST['contraseña']);
  }

  $VarComp = new initcomponents();

  if ( file_exists("vista/login.php")){
    require_once("vista/login.php");
  }else{
    die("<script>window.location = `?url=login`</script>");
  }

?>