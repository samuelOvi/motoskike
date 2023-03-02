<?php

namespace modelo;
use config\connect\DBConnect as DBConnect;

    class cliente extends DBConnect{
      private $cedula;
      private $nombre;
      private $apellido;
      private $telefono;

      public function __construct(){
        parent::__construct();
      }

      public function mostrarClienteAjax(){
        try{
          $new = $this->con->prepare("SELECT * FROM `clientes`");
          $new->execute();
          $data = $new->fetchAll(\PDO::FETCH_OBJ);
          echo json_encode($data);
          die();

        }catch(\PDOException $e){
          return $e;
        }
      }  


      public function getRegistrarClientes($cedula,$nombre, $apellido, $telefono ){
       $this->cedula= $cedula;
       $this->nombre= $nombre;
       $this->apellido=$apellido;
       $this->telefono=$telefono;


       $this->registrarClientes();

     }

     private function registrarClientes(){

      try{
        $new = $this->con->prepare("INSERT INTO `clientes`(`cedula`, `nombre`, `apellido`, `telefono`, `estado`) VALUES (?,?,?,?,1)");
        $new->bindValue(1, $this->cedula);
        $new->bindValue(2, $this->nombre);
        $new->bindValue(3, $this->apellido);
        $new->bindValue(4, $this->telefono);
        $new->execute();

      }catch(\PDOException $e){
        return $error;
      }
    }

    public function getItem($cedula){
      $this->cedula = $cedula;

      $this->selectItem();
    }

    private function selectItem(){

      try{
        $new = $this->con->prepare("SELECT * FROM clientes WHERE cedula = ?");
        $new->bindValue(1, $this->cedula);
        $new->execute();
        $data = $new->fetchAll(\PDO::FETCH_OBJ);
        echo json_encode($data);
        die();

      }catch(\PDOException $e){
        return $e;
      }

    }


    public function getEditar($cedula, $nombre, $apellido, $telefono){
      $this->cedula= $cedula;
      $this->nombre= $nombre;
      $this->apellido=$apellido;
      $this->telefono=$telefono;

      $this->editarCliente();
    }

    private function editarCliente(){

      try{

        $new = $this->con->prepare("UPDATE clientes SET nombre = ?, apellido = ?, telefono = ?, estado = 1  WHERE cedula = ?");
        $new->bindValue(1, $this->nombre);
        $new->bindValue(2, $this->apellido);
        $new->bindValue(3, $this->telefono);
        $new->bindValue(4, $this->cedula);
        $new->execute();
        
        echo json_encode(['asdasd' => 'asdasdas']);
        die();

      }catch(\PDOException $error){
        return $error;
      }
    }


    public function getEliminar($cedula){

      $this->cedula = $cedula;

      $this->eliminarCliente();
    }

    private function eliminarCliente(){
      try{

        $new = $this->con->prepare("DELETE FROM `clientes` WHERE cedula=?");
        $new->bindValue(1, $this->cedula);
        $new->execute();

      }catch(\PDOException $e){
        return $e;
      }

    }

    }



?>