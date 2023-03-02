<?php 
    use component\initcomponents as initcomponents;
    use component\menuLateral as menuLateral;

    $VarComp = new initcomponents();
    $VarNav = new menuLateral();
    if(!isset($_SESSION['rol'])){    
      die('<script> window.location = "?url=login" </script>');
    }
//   if (file_exists("modelo/homeModelo.php")){
//     require_once("modelo/homeModelo.php");
// }else {
// die ("<script>window.location='?url=login'</script>");
// } 

if ( file_exists("vista/home.php")){
  require_once("vista/home.php");
}else {
  die("<script>window.location='?url=login'</script>");
}

?>