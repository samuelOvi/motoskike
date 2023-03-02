<?php 
	// if(file_exists('Config/connect/DBConnect.php')){
  //   	 require_once('Config/connect/DBConnect.php');
  //   }else{
  //   	die("error: no se ha encontrado la base de datos Connect!");
  //   }

    namespace modelo;
    use config\connect\DBConnect as DBConnect;

    

    class marca extends DBConnect{
      private $marca;
      private $id;

      public function __construct(){
      	parent::__construct();

      //} 


            //CARGAR MARCAS

      // public function mostrarMarca(){
      //  try{
      //  $new = $this->con->prepare("SELECT * FROM `marca`");
       // $new->execute();
       // $data = $new->fetchAll();
       // return $data;

        //}catch(PDOException $e){
        //  return $e;
        //

       } 
       public function mostrarMarcaAjax(){
        try{
         $new = $this->con->prepare("SELECT * FROM `marca`");
        $new->execute();
        $data = $new->fetchAll();
        return $data;

        }catch(PDOException $e){
          return $e;
        }
    }
        public function getRegistrarMarca($marca){
	    	$this->marca = $marca; 
		    return $this->registrarMarca();
     }

        private function registrarMarca(){
         try{
         $new = $this->con->prepare("INSERT INTO `marca`(`nombre_marca`) VALUES (?)");
         $new->bindValue(1, $this->marca);
         $new->execute();
         return true;

         }catch(PDOException $error){
         	return $error;
         }

      }

       public function mostrarMarca(){
        try{
        $new = $this->con->prepare("SELECT * FROM `marca`");
        $new->execute();
        $data = $new->fetchAll(\PDO::FETCH_OBJ);
        return $data;
      
        }catch(PDOException $e){
          return $e;
        }
         }


     public function getItem($id){
    $this->id = $id;

    $this->selectItem();
  }

  public function selectItem($id){

        $resultado = $this->con->prepare("SELECT * FROM marca WHERE id_marca = '$id'");
 
        try {
            $resultado->execute();
            $respuestaArreglo = $resultado->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $respuestaArreglo;

    }



      public function getEditar($marca, $id){
    $this->marca = $marca;
    $this->id = $id;

    $this->editarMarca();
}


      public function editarMarca($marca, $id){
    
    try{

        $new = $this->con->query("UPDATE marca SET nombre_marca = '$marca' WHERE id_marca = $id");
       return true;
        

    }catch(Exception $error){
        return $e->getMessage();
    }
}

public function getEliminar($id){
      
  $this->id = $id;

  $this->eliminarMarca();
}

private function eliminarMarca(){
  try{

    $new = $this->con->prepare("DELETE FROM `marca` WHERE marca.id_marca =?");
    $new->bindValue(1, $this->id);
    $new->execute();

  }catch(\PDOException $e){
    return $e;
  }

}



}

?>

