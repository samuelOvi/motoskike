<?php
namespace modelo;
use config\connect\DBConnect as DBConnect;

class proveedores extends  DBConnect {
    private $codigoproveedores;
    private $nombre;
    private $correo;
    private $telefono;
    

    public function __construct(){
        parent::__construct();
    }

    
    public function mostrarProveedoresAjax(){
        try{
          $new = $this->con->prepare("SELECT * FROM `provedores`");
          $new->execute();
          $data = $new->fetchAll(\PDO::FETCH_OBJ);
          echo json_encode($data);
          die();

        }catch(\PDOException $e){
          return $e;
        }
      }  


    
    public function getRegistrarProveedores($codigoproveedores, $nombre, $correo, $telefono){
        $this->codigoproveedores = $codigoproveedores;
        $this->nombre= $nombre;
        $this->correo=$correo;
        $this->telefono=$telefono;


        return $this->registrarProveedores();
 }

    private function registrarProveedores(){

     try{
     $new = $this->con->prepare("INSERT INTO `provedores`(`codigoproveedores`, `nombre`, `correo`, `telefono`, `estado`) VALUES (?,?,?,?,1)");
     $new->bindValue(1, $this->codigoproveedores);
     $new->bindValue(2, $this->nombre);
     $new->bindValue(3, $this->correo);
     $new->bindValue(4, $this->telefono);
     $new->execute();
     die('Registrado');
   }catch(\PDOException $e){
     return $error;
   }
 }


 public function getItem($codigoproveedores){
  $this->codigoproveedores = $codigoproveedores;

  $this->selectItem();
}

private function selectItem(){

  try{
    $new = $this->con->prepare("SELECT * FROM provedores WHERE codigoproveedores = ?");
    $new->bindValue(1, $this->codigoproveedores);
    $new->execute();
    $data = $new->fetchAll(\PDO::FETCH_OBJ);
    echo json_encode($data);
    die();

  }catch(\PDOException $e){
    return $e;
  }

}

public function getEditar($codigoproveedores, $nombre, $telefono, $correo){
  $this->codigoproveedores= $codigoproveedores;
  $this->nombre= $nombre;
  $this->telefono=$telefono;
  $this->correo=$correo;

  $this->editarProveedores();
}

private function editarProveedores(){

  try{

    $new = $this->con->prepare("UPDATE `provedores` SET `nombre`= ?,`correo`= ?,`telefono`= ?,`estado`='1' WHERE  codigoproveedores = ?");
    $new->bindValue(1, $this->nombre);
    $new->bindValue(2, $this->correo);
    $new->bindValue(3, $this->telefono);
    $new->bindValue(4, $this->codigoproveedores);
    $new->execute();
    
    die('Editado');

  }catch(\PDOException $error){
    return $error;
  }
}




public function getEliminar($codigoproveedores){
      
  $this->codigoproveedores = $codigoproveedores;

  $this->proveedorEliminar();
}

private function proveedorEliminar(){
  try{

    $new = $this->con->prepare("DELETE FROM `provedores` WHERE codigoproveedores=?");
    $new->bindValue(1, $this->codigoproveedores);
    $new->execute();

  }catch(\PDOException $e){
    return $e;
  }

}
}
?>