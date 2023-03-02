<?php 

  namespace modelo; 
  use config\connect\DBConnect as DBConnect;

  class compra extends DBConnect{

  	  private $id;
      private $fecha;
      private $proveedor;
      private $monto;
      private $codigoP;
      private $cantidad;
      private $subtotal;
      private $dolar;


      function __construct(){
       parent::__construct();
     }

     //ventas agregar

     public function getAgregarCompra($fecha,$monto, $dolar, $proveedor){
      $this->proveedor = $proveedor; 
      $this->monto = $monto;
      $this->dolar = $dolar;
      $this->fecha = $fecha;

      return $this->agregarCompra();

    }

    private function agregarCompra(){
     try{
      // $new = $this->con->prepare("SELECT `codigoproveedores` FROM `provedores` WHERE `codigoproveedores` = ?");
      // $new->bindValue(1, $this->proveedor);
      // $new->execute();
      // $data = $new->fetchAll();

      // if(isset($data[0]["codigoproveedores"])){

       $new = $this->con->prepare("INSERT INTO `compra`(`numero_compra`, `fecha`, `moton_t`, `id_dolar`, `codigo_provedores`, `estado`) VALUES (default,?,?,?,?,1)");
       $new->bindValue(1, $this->fecha);
       $new->bindValue(2, $this->monto);
       $new->bindValue(3, $this->dolar);
       $new->bindValue(4, $this->proveedor);
       $new->execute();

       $this->id = $this->con->lastInsertId();
       echo json_encode(['id' => $this->id]);
       die();
      //  }
    }catch(\PDOexection $error){
      return $error;	
   }
 }

  //---------------------------------AGREGAR VENTA POR PRODUCTO--------------------------------

   public function AgregarCompraXProd($precio, $cantidad, $subtotal, $producto, $idVenta){

    $this->codigoP = $producto;
    $this->precio = $precio;
    $this->cantidad = $cantidad;
    $this->subtotal = $subtotal;
    $this->id = $idVenta;
    

    return $this->CompraXProducto();

   }

   private function CompraXProducto(){

    try {
      
      $new = $this->con->prepare('INSERT INTO `tblcompraproducto`(`cod_producto`, `cod_compra`, `cantidad`, `precio`, `subtotal`) VALUES (?,?,?,?,?)');
      $new->bindValue(1, $this->codigoP);
      $new->bindValue(2, $this->id);
      $new->bindValue(3, $this->cantidad);
      $new->bindValue(4, $this->precio);
      $new->bindValue(5, $this->subtotal);
      $new->execute();

      $new = $this->con->prepare('SELECT cantidad FROM producto WHERE codigo = ?');
      $new->bindValue(1, $this->codigoP);
      $new->execute();
      $cantidad= $new->fetchAll(\PDO::FETCH_OBJ);
      $stockActual = $cantidad[0]->cantidad;

      $stockActual += $this->cantidad;
      $new = $this->con->prepare('UPDATE producto SET	cantidad = ? WHERE codigo = ?');
      $new->bindValue(1, $stockActual);
      $new->bindValue(2, $this->codigoP);
      $new->execute();
      echo "cantidad actualizado";
      die();	
      
    } catch (\PDOException $e) {
      return $e;
    }

  }


  //  private function VentaXProducto(){
  //   try{
  //    $new = $this->con->prepare(" INSERT INTO `tblcompraproducto`(`cod_producto`, `cod_compra`, `cantidad`, `precio`, `subtotal`) VALUES (?,?,?,?,?)");                          
  //    $new->bindValue(1, $this->codigoP);
  //    $new->bindValue(2, $this->id);
  //    $new->bindValue(3, $this->cantidad);
  //    $new->bindValue(4, $this->precio);
  //    $new->bindValue(5, $this->subtotal);
  
    
  //    $new->execute();
  //   $this->actualizarStock($this->codigoP , $this->cantidad);

  //   }catch(\PDOexection $error){
  //     return $error;
  //   }

  //  }

    //---------------------------------ACTUALIZAR STOCK--------------------------------

  //  private function actualizarStock($codigoP , $cantidad){
  //   try{
  //    $new = $this->con->prepare("SELECT cantidad FROM producto WHERE producto.codigo =?");
  //    $new->bindValue(1, $codigoP);
  //    $new->execute();
  //    $data = $new->fetchAll();

  //    $stockAct = $data[0]['cantidad'];

  //    $newStock = $stockAct - $cantidad;

  //    $new = $this->con->prepare("UPDATE producto SET cantidad = ? WHERE producto.codigo = ?");
  //    $new->bindValue(1, $newStock);
  //    $new->bindValue(2, $codigoP);
  //    $new->execute();

  //   }catch(\PDOexection $error){
  //     return $error;
  //   }
  //  }


   
  //   //---------------------------------ELIMINAR VENTA--------------------------------


    
		public function eliminarCompra($id){
			$this->id = $id;

			try {
				
				$new = $this->con->prepare('UPDATE compra SET estado = 0 WHERE numero_compra = ?');
				$new->bindValue(1, $this->id);
				$new->execute();

				die();

			} catch (\PDOException $e) {
				return $e;
			}

		}

  //  public function eliminarVenta($id){
  //    try{
  //     $this->id = $id;

  //     $new = $this->con->prepare("SELECT producto.codigo , tblproductoventa.cantidadDetalle , producto.cantidad FROM tblproductoventa INNER JOIN producto ON producto.codigo = tblproductoventa.tblproducto WHERE tblproductoventa.tblventa = ?");
      
  //     $new->bindValue(1, $this->id);
  //     $new->execute();
  //     $result = $new->fetchAll(\PDO::FETCH_OBJ);

  //     foreach ($result as $data){

  //       $stockAct = $data->cantidad;
  //       $cantidad = $data->cantidadDetalle;
  //       $codigoP = $data->codigo;

  //       $NewStock = $cantidad + $stockAct;

  //       $new = $this->con->prepare("UPDATE producto SET cantidad = ? WHERE producto.codigo = ?;");
  //       $new->bindValue(1, $NewStock);
  //       $new->bindValue(2, $codigoP);
  //       $new->execute();
        
  //     }

  //     $new = $this->con->prepare("UPDATE `ventas` SET `estado`= 0 WHERE numero_venta = ?");
  //     $new->bindValue(1, $this->id);
  //     $new->execute();
  //     $data = $new->fetchAll(\PDO::FETCH_OBJ);
  //   }
  //   catch(\PDOexection $error){
  //     return $error;
  //   }
    
  // }
    
    //---------------------------------MOSTRAR COMPRA--------------------------------

    public function getMostrarCompra(){
      try{
        $new = $this->con->prepare("SELECT * FROM `compra` WHERE estado = 1");
          $new->execute();
          $data = $new->fetchAll(\PDO::FETCH_OBJ);
          echo json_encode($data);
          die();
  
          }catch(\PDOException $e){
            return $e;
          }
        }  

     //---------------------------------DETALLES PRODUCTOS POR VENTA--------------------------------

    public function getDetalleV($id){
      try{
        $this->id = $id;
        $new = $this->con->prepare("SELECT producto.nombre, tblcompraproducto.cantidad, tblcompraproducto.subtotal, tblcompraproducto.precio, compra.numero_compra FROM tblcompraproducto INNER JOIN producto ON tblcompraproducto.cod_producto = producto.codigo INNER JOIN compra ON compra.numero_compra = tblcompraproducto.cod_compra WHERE compra.estado = 1 AND compra.numero_compra = ?");                                                                                                                                                                                                                                                                                                                                     
        $new->bindValue(1, $this->id);
        $new->execute();
        $data = $new->fetchAll(\PDO::FETCH_OBJ);
        echo json_encode($data);
        die();

      }catch(\PDOexection $error){
        return $error;
      }
    }

     //---------------------------------MOSTRAR PRODUCTO--------------------------------

    public function getMostrarProducto(){
      try{
        $new = $this->con->prepare("SELECT * FROM `producto` WHERE 1");
        $new->execute();
        $data = $new->fetchAll(\PDO::FETCH_OBJ);
        echo json_encode($data);
        die();


      }catch(\PDOexection $error){

       return $error;   

     }   
    }
     //---------------------------------MOSTRA CANTIDAD Y PRECIO DE PRODUCTO--------------------------------

    public function productoDetalle($codigoP){
      $this->producto = $codigoP;

      try {
        $new = $this->con->prepare("SELECT precioD, cantidad FROM producto WHERE codigo = ?");
        $new->bindValue(1, $this->producto);
        $new->execute();
        $data = $new->fetchAll(\PDO::FETCH_OBJ);
        
        echo json_encode($data);
        die();

      } catch (\PDOException $e) {
        return $e;
      }
    }

      //---------------------------------OBTENER COMPRA--------------------------------

      public function getCompra($id){
        $this->id = $id;
  
        $this->selectCompra();
      }
  
      private function selectCompra(){
        try {
          
          $new = $this->con->prepare("SELECT codigo_provedores, id_dolar, fecha, moton_t FROM compra WHERE numero_compra = ?;");
          $new->bindValue(1, $this->id);
          $new->execute();
          $compra = $new->fetchAll(\PDO::FETCH_OBJ);
  
          $new = $this->con->prepare("SELECT cod_producto, cantidad, precio FROM tblcompraproducto WHERE cod_compra = ?");
          $new->bindValue(1, $this->id);
          $new->execute();
          $codigoP = $new->fetchAll(\PDO::FETCH_OBJ);
  
          echo json_encode(['venta' => $compra , 'producto' => $codigoP]);
          die();
  
        } catch (\PDOException $e) {
          return $e;
        }
      }

    //   public function getEditarProducto($cantidad,$id,$codigoP){
    //    $this->cantidad=$cantidad; 
    //    $this->codigoP = $codigoP;
    //    $this->id = $id;

    //    $this->EditarProducto();
    //  }

    //  private function EditarProducto(){

    //   try {

    //     $new = $this->con->prepare("SELECT * FROM tblproductoventa WHERE tblventa = ? and tblproducto = ?");
    //     $new->bindValue(1, $this->id);
    //     $new->bindValue(2, $this->codigoP);
    //     $new->execute();
    //     $data = $new->fetchAll(\PDO::FETCH_OBJ);

    //     $cantidadVieja = $data[0]->cantidadDetalle;
    //     $cantidadNueva = $this->cantidad;

    //     $cantidadSumar = $cantidadVieja - $cantidadNueva;
    //     if($cantidadSumar < 0){
    //       $cantidadSumar = 0;
    //     }

    //     $new = $this->con->prepare("UPDATE producto SET cantidad = cantidad + ? WHERE codigo = ?");
    //     $new->bindValue(1, $cantidadSumar);
    //     $new->bindValue(2, $this->codigoP);
    //     $new->execute();

    //     $new = $this->con->prepare("UPDATE tblproductoventa SET cantidadDetalle = ?, subtotal = (precio*cantidadDetalle) WHERE tblventa = ? AND tblproducto = ?");
    //     $new->bindValue(1, $this->cantidad);
    //     $new->bindValue(2, $this->id);
    //     $new->bindValue(3, $this->codigoP);
    //     $new->execute();
    //     die(json_encode(['asd' => 'editao']));
    //   }
    //   catch(\PDOexection $error){
    //     return $error;
    //   }
    // }

     //---------------------------------MOSTRAR CLIENTE--------------------------------
    
    public function getMostrarProveedores(){
      try{
        $new = $this->con->prepare("SELECT * FROM `provedores` WHERE 1");
        $new->execute();
        $data = $new->fetchAll(\PDO::FETCH_OBJ);
        return $data;

      }catch(\PDOexection $error){

       return $error;   

     }   
    }

         //mostar dolar
    
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