<?php 
	// if(file_exists('Config/connect/DBConnect.php')){
  //   	 require_once('Config/connect/DBConnect.php');
  //   }else{
  //   	die("error: no se ha encontrado la base de datos Connect!");
  //   }
  namespace modelo;
  use config\connect\DBConnect as DBConnect;

    class dolar extends DBConnect{
      private $dolar;
      private $fechadolar;
      private $id;
      private $precio;

      public function __construct(){
      	parent::__construct();

      } 

      public function mostrarDolarAjax(){
          try{
          $new = $this->con->prepare("SELECT * FROM `tasa_dolar`");
          
          $new->execute();
          $data = $new->fetchAll(\PDO::FETCH_OBJ);
          echo json_encode($data);
          die();
  
          }catch(\PDOException $e){
            return $e;
          }
        }  

        public function getRegistrarDolar($dolar, $fechadolar){
	    	$this->dolar = $dolar;
	    	$this->fechadolar = $fechadolar;

   
		    return $this->registrarDolar();
     }

        private function registrarDolar(){

         try{
         $new = $this->con->prepare("INSERT INTO tasa_dolar(`id_dolar`,`fecha`,`precio_dolar`) VALUES (default,?,?)");
         $new->bindValue(1, $this->fechadolar);
         $new->bindValue(2, $this->dolar);
         $new->execute();
         $data = $new->fetchAll();
        }catch(\PDOException $e){
         	return $error;
         }
	 }

//  selecionar id

   public function getItem($id){
    $this->id = $id;

    $this->selectItem();
  }

  private function selectItem(){

    try{
      $new = $this->con->prepare("SELECT * FROM tasa_dolar WHERE id_dolar = ?");
      $new->bindValue(1, $this->id);
      $new->execute();
      $data = $new->fetchAll(\PDO::FETCH_OBJ);
      echo json_encode($data);
      die();

      }catch(\PDOException $e){
        return $e;
      }

  }

  public function getEditar($dolar, $fechadolar, $id){
    $this->precio = $dolar;
    $this->fecha = $fechadolar;
    $this->id = $id;

    $this->editarDolar();
}

private function editarDolar(){
    
  try{

      $new = $this->con->prepare("UPDATE `tasa_dolar` SET `precio_dolar` = ?, `fecha` = ? WHERE `id_dolar` = ?");
      $new->bindValue(1, $this->precio);
      $new->bindValue(2, $this->fecha);
      $new->bindValue(3, $this->id);
      $new->execute();
      echo json_encode(['asd' => 'aaaa']);
      die();
      

  }catch(\PDOException $error){
      return $error;
  }
}


public function getEliminar($id){
      
  $this->id = $id;

  $this->eliminarDolar();
}

private function eliminarDolar(){
  try{

    $new = $this->con->prepare("DELETE FROM `tasa_dolar` WHERE id_dolar=?");
    $new->bindValue(1, $this->id);
    $new->execute();

  }catch(\PDOException $e){
    return $e;
  }

}

}

?>