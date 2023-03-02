<?php 

  namespace modelo; 
  use config\connect\DBConnect as DBConnect;

  class venta extends DBConnect{

  	  private $id;
      private $fecha;
      private $cedula;
      private $monto;
      private $codigoP;
      private $cantidad;
      private $subtotal;
      private $dolar;


      function __construct(){
       parent::__construct();
     }

     //ventas agregar

     public function getVentaAgregar($cedula,$montoT,$dolar,$fecha){
    
      $this->cedula = $cedula; 
      $this->monto = $montoT;
      $this->dolar = $dolar;
      $this->fecha = $fecha;


      return $this->agregarVenta();

    }

    private function agregarVenta(){
     try{
      $new = $this->con->prepare("SELECT `cedula` FROM `clientes` WHERE `cedula` = ?");
      $new->bindValue(1, $this->cedula);
      $new->execute();
      $data = $new->fetchAll();

      if(isset($data[0]["cedula"])){

       $new = $this->con->prepare("INSERT INTO `ventas`(`numero_venta`, `fecha`, `moton_total`, `cedula_cliente`, `id_dolar`, `estado`) VALUES  (default,?,?,?,?,1)");
       $new->bindValue(1, $this->fecha);
       $new->bindValue(2, $this->monto);
       $new->bindValue(3, $this->cedula);
       $new->bindValue(4, $this->dolar);
       $new->execute();
       $this->id = $this->con->lastInsertId();
       echo json_encode(['id' => $this->id]);
       die();

       }else{
        return ("¡Cedula no se encuentra registrado!");
      }

    }catch(\PDOexection $error){
      return $error;	
   }
 }

  //---------------------------------AGREGAR VENTA POR PRODUCTO--------------------------------

   public function AgregarVentaProdroducto($precio, $cantidad, $subtotal, $producto, $idVenta){

    $this->codigoP = $producto;
    $this->precio = $precio;
    $this->cantidad = $cantidad;
    $this->subtotal = $subtotal;
    $this->id = $idVenta;
    return $this->VentaXProducto();
   }

   private function VentaXProducto(){
    try{
     $new = $this->con->prepare("INSERT INTO `tblproductoventa`(`precio`, `cantidadDetalle`, `subtotal`, `tblproducto`, `tblventa`) VALUES (?,?,?,?,?)");
    //  INSERT INTO `venta_producto`(`num_fact`, `cod_producto`, `cantidad`, `precio_actual`) VALUES (?,?,?,?)
     $new->bindValue(1, $this->precio);
     $new->bindValue(2, $this->cantidad);
     $new->bindValue(3, $this->subtotal);
     $new->bindValue(4, $this->codigoP);
     $new->bindValue(5, $this->id);
     $new->execute();
    $this->actualizarStock($this->codigoP , $this->cantidad);

    }catch(\PDOexection $error){
      return $error;
    }
   }
    //---------------------------------ACTUALIZAR STOCK--------------------------------

   private function actualizarStock($codigoP , $cantidad){
    try{
     $new = $this->con->prepare("SELECT cantidad FROM producto WHERE producto.codigo =?");
     $new->bindValue(1, $codigoP);
     $new->execute();
     $data = $new->fetchAll();

     $stockAct = $data[0]['cantidad'];

     $newStock = $stockAct - $cantidad;

     $new = $this->con->prepare("UPDATE producto SET cantidad = ? WHERE producto.codigo = ?");
     $new->bindValue(1, $newStock);
     $new->bindValue(2, $codigoP);
     $new->execute();

    }catch(\PDOexection $error){
      return $error;
    }
   }
   
  //   //---------------------------------ELIMINAR VENTA--------------------------------

   public function eliminarVenta($id){
     try{
      $this->id = $id;

      $new = $this->con->prepare("SELECT producto.codigo , tblproductoventa.cantidadDetalle , producto.cantidad FROM tblproductoventa INNER JOIN producto ON producto.codigo = tblproductoventa.tblproducto WHERE tblproductoventa.tblventa = ?");
      
      $new->bindValue(1, $this->id);
      $new->execute();
      $result = $new->fetchAll(\PDO::FETCH_OBJ);

      foreach ($result as $data){

        $stockAct = $data->cantidad;
        $cantidad = $data->cantidadDetalle;
        $codigoP = $data->codigo;

        $NewStock = $cantidad + $stockAct;

        $new = $this->con->prepare("UPDATE producto SET cantidad = ? WHERE producto.codigo = ?;");
        $new->bindValue(1, $NewStock);
        $new->bindValue(2, $codigoP);
        $new->execute();
        
      }

      $new = $this->con->prepare("UPDATE `ventas` SET `estado`= 0 WHERE numero_venta = ?");
      $new->bindValue(1, $this->id);
      $new->execute();
      $data = $new->fetchAll(\PDO::FETCH_OBJ);
    }
    catch(\PDOexection $error){
      return $error;
    }
    
  }
    
    //---------------------------------MOSTRAR VENTA--------------------------------

    public function getMostrarVentas(){
      try{
        $new = $this->con->prepare("SELECT * FROM `ventas` WHERE estado = 1");
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
        $new = $this->con->prepare("SELECT producto.nombre, tblproductoventa.cantidadDetalle, tblproductoventa.subtotal, tblproductoventa.precio, ventas.numero_venta FROM tblproductoventa INNER JOIN producto ON tblproductoventa.tblproducto = producto.codigo INNER JOIN ventas ON ventas.numero_venta = tblproductoventa.tblventa WHERE ventas.estado = 1 AND ventas.numero_venta = ?");                                                                                                                                                                                                                                                                                                                                     
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

    public function detalleProducto($codigoP){
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

     //---------------------------------MOSTRAR CLIENTE--------------------------------
    
    public function getMostrarCliente(){
      try{
        $new = $this->con->prepare("SELECT * FROM `clientes` WHERE 1");
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