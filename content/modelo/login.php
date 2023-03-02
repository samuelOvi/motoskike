<?php

namespace modelo;
use config\connect\DBConnect as DBConnect;

class login extends DBConnect{
    private $correo;
    private $contraseña;

    public function __construct(){
        parent::__construct(); 
    }
    
    public function getLoginSistema($correo ,$contraseña){
        $this->correo = $correo;
        $this->contraseña = $contraseña;
        return $this->loginSistema();
    }

    private function loginSistema(){
        try{
            // SELECT `correo`,`clave` FROM `usuario` WHERE `estado` = 1 and `correo` = ?
            $new = $this->con->prepare("SELECT * FROM `usuario`  WHERE `correo` = ?;");
            $new->bindValue(1 , $this->correo);
            $new->execute();
            $data = $new->fetchAll(); 
            if(isset($data[0]["clave"])){
              if($data[0]["clave"] == $this->contraseña){
                        $_SESSION['correo'] = $data[0]['correo'];
						$_SESSION['nombre'] = $data[0]['nombre'];
						$_SESSION['clave'] = $data[0]['clave'];
						$_SESSION['rol'] = $data[0]['rol'];
                        header('Location: ?url=home');
               }else{
                    return "Error de usuario o contraseña!";
              }
            }else{
                return "Error de usuario o contraseña!";
            }

        }catch(PDOException $error){
           return $error;
        }
    }
   
}


?>