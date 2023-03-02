<?php 

   namespace modelo;
   use config\connect\DBConnect as DBConnect;

 class producto extends DBConnect{
      private $codigo;
      private $nombre;
      private $precio;
      private $precio_bolivares;
      private $cantidadMin;
      private $cantidad;
      private $descripcion;
      private $id;

      public function __construct(){
      	parent::__construct();

      } 

      public function mostrarProductoAjax(){
        try{
        $new = $this->con->prepare("SELECT * FROM producto INNER JOIN marca ON producto.marca=marca.id_marca");
        
        $new->execute();
        $data = $new->fetchAll(\PDO::FETCH_OBJ);
        echo json_encode($data);
        die();

        }catch(\PDOException $e){
          return $e;
        }
      }  

      
      public function mostrarMarca(){
        try{
        $new = $this->con->prepare("SELECT * FROM `marca`");
        $new->execute();
        $data = $new->fetchAll(\PDO::FETCH_OBJ);
        return $data;
      
        }catch(\PDOException $e){
          return $e;
        }
      }

      public function getRegistrarProducto($codigo,$nombre,$precio,$precio_bolivares,$cantidadMin,$cantidad, $descripcion,$marca){
		
        if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $codigo)){
          return "Error de codigo!";
        }
        if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $nombre)){
          return "Error de nombre!";
        }
        if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $precio)){
          return "Error de precio $!";
        }
        if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $precio_bolivares)){
          return "Error de precio bs!";
        }
        if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $cantidadMin)){
          return "Error de cantidad minima!";
        }
        if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $cantidad)){
          return "Error de cantidad!";
        }
        if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $descripcion)){
          return "Error de descripcion!";
        }
        if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $marca)){
          return "Error de marca!";
        }

        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->precio_bolivares = $precio_bolivares;
        $this->cantidadMin = $cantidadMin;
        $this->cantidad = $cantidad;
        $this->descripcion = $descripcion;
        $this->marca = $marca;
        return $this->registraProducto();
         }
    
            private function registraProducto(){
             try{
             $new = $this->con->prepare("INSERT INTO `producto`(`codigo`, `nombre`, `precioD`, `precioB`, `cantidadMIn`, `cantidad`, `descripcion`, `marca`) VALUES (?,?,?,?,?,?,?,?)");    
             $new->bindValue(1, $this->codigo);
             $new->bindValue(2, $this->nombre);
             $new->bindValue(3, $this->precio);
             $new->bindValue(4, $this->precio_bolivares);
             $new->bindValue(5, $this->cantidadMin);
             $new->bindValue(6, $this->cantidad);
             $new->bindValue(7, $this->descripcion);
             $new->bindValue(8, $this->marca);
             $new->execute();
             $data = $new->fetchAll();
             }catch(\PDOException $error){
               return $error;
             }
    
       }

  public function getItem($id){
    $this->id = $id;

    $this->selectItem();
  }

  private function selectItem(){

    try{
      $new = $this->con->prepare("SELECT * FROM producto INNER JOIN marca ON producto.marca=marca.id_marca WHERE producto.codigo = ?");
      $new->bindValue(1, $this->id);
      $new->execute();
      $data = $new->fetchAll(\PDO::FETCH_OBJ);
      echo json_encode($data);
      die();

      }catch(\PDOException $e){
        return $e;
      }

  }

  public function getEditar($nombre, $precio, $precio_bolivares, $cantidadMin, $cantidad, $descripcion, $marca, $codigo){

    if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $nombre)){
      return "Error de codigo!";
    }
    if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $precio)){
      return "Error de nombre!";
    }
    if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $precio_bolivares)){
      return "Error de precio $!";
    }
    if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $cantidadMin)){
      return "Error de precio bs!";
    }
    if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $cantidad)){
      return "Error de cantidad minima!";
    }
    if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $descripcion)){
      return "Error de descripcion!";
    }
    if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $marca)){
      return "Error de marca!";
    }
    if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $codigo)){
      return "Error de marca!";
    }

    $this->nombre = $nombre;
    $this->precio = $precio;
    $this->precio_bolivares = $precio_bolivares;
    $this->cantidadMin = $cantidadMin;
    $this->cantidad = $cantidad;
    $this->descripcion = $descripcion;
    $this->marca = $marca;
    $this->codigo = $codigo;
    // $this->id = $id;

    $this->editarProducto();
}

private function editarProducto(){
    
    try{

        $new = $this->con->prepare("UPDATE producto p INNER JOIN marca m ON p.marca = m.id_marca SET`nombre`=?,`precioD`=?,`precioB`=?,`cantidadMIn`=?,`cantidad`=?,`descripcion`=?,`marca`=? WHERE `codigo`=?");
        // UPDATE `producto` SET `nombre`=?,`precioD`=?,`precioB`=?,`cantidadMIn`=?,`cantidad`=?,`descripcion`=?,`marca`=? WHERE `codigo`=?;
        // UPDATE producto p INNER JOIN marca m ON p.marca = m.id_marca SET p.nombre=?, p.precioD = ? , p.precioB = ?, p.cantidadMIn = ?, p.cantidad = ?, p.descripcion = ?, p.marca = ?  WHERE p.codigo = ?
        $new->bindValue(1, $this->nombre);
        $new->bindValue(2, $this->precio);  
        $new->bindValue(3, $this->precio_bolivares);
        $new->bindValue(4, $this->cantidadMin);
        $new->bindValue(5, $this->cantidad);
        $new->bindValue(6, $this->descripcion);
        $new->bindValue(7, $this->marca);
        $new->bindValue(8, $this->codigo);
        // $new->bindValue(9, $this->id);
        $new->execute();
        echo json_encode(['asd' => 'aaaa']);
        die();
        

    }catch(\PDOException $error){
        return $error;
    }
}


public function getEliminar($id){
      
  $this->id = $id;

  $this->eliminarProducto();
}

private function eliminarProducto(){
  try{

    $new = $this->con->prepare("
    DELETE FROM `producto` WHERE producto.codigo =?");
    $new->bindValue(1, $this->id);
    $new->execute();

  }catch(\PDOException $e){
    return $e;
  }

}

public function getMostrarDolar(){
  try{
    $new = $this->con->prepare("SELECT * FROM `tasa_dolar` ORDER BY id_dolar DESC LIMIT 1");
    $new->execute();
    $data = $new->fetchAll(\PDO::FETCH_OBJ);
    return $data;

  }catch(\PDOexection $error){

   return $error;   

 }   
}

}

?>