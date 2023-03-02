<?php  
 
   session_start();

    if(file_exists('vendor/autoload.php')) {
    require 'vendor/autoload.php';
    }else{
      return "Error: no se encontró el autoload.";
    }
 

    Use config\componentes\configSistema as configSistema;

    $GlobalConfig = new configSistema();
    $GlobalConfig->_int();

    Use Content\controlador\frontControlador as frontControlador;

    $IndexSystem = new frontControlador($_REQUEST);


?>