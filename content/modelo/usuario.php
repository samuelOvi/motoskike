<?php 

	 namespace modelo;
   use config\connect\DBConnect as DBConnect;
   
    class usuario extends DBConnect{
      private $username;
      private $email;
      private $rol;
      private $password;

      public function __construct(){
      	parent::__construct();

      }

      public function mostrarUsuarioAjax(){
        try{
          $new = $this->con->prepare("SELECT * FROM `usuario`");
          $new->execute();
          $data = $new->fetchAll(\PDO::FETCH_OBJ);
          echo json_encode($data);
          die();

        }catch(\PDOException $e){
          return $e;
        }
      }  

        public function getRegistrarUsuario($email,$username,$rol,$password){
      if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $username)){
		    return "Error de usuario o contraseña!";
		}
	    if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $email)){
			return "Error de usuario o contraseña!";
		}
    if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $rol)){
			return "Error de usuario o contraseña!";
		}
		if(preg_match_all("[!#-'*+\\-\\/0-9=?A-Z\\^-~]", $password)) {
			return "Error de usuario o contraseña!";
		}
		
		$this->email = $email;
        $this->username = $username;
        $this->rol = $rol;
		$this->password = $password;
 
		return $this->registraUsuario();
     }

        private function registraUsuario(){

         try{
         $new = $this->con->prepare("INSERT INTO `usuario`(`correo`, `nombre`, `clave`, `rol`, `estado`) VALUES (?,?,?,?,1)");
         $new->bindValue(1, $this->email);
         $new->bindValue(2, $this->username);
         $new->bindValue(3, $this->password);
         $new->bindValue(4, $this->rol);
         $new->execute();
         $data = $new->fetchAll();

         if(!$data){
          return printf("<script>window.location = `?url=login`</script>"); 
         }else{
           return "Error!!";
         }
         }catch(exection $error){
         	return $error;
         }

	 }

     public function getItem($email){
        $this->email = $email;
  
        $this->selectItem();
      }
  
      private function selectItem(){
  
        try{
          $new = $this->con->prepare("SELECT * FROM usuario WHERE correo = ?");
          $new->bindValue(1, $this->email);
          $new->execute();
          $data = $new->fetchAll(\PDO::FETCH_OBJ);
          echo json_encode($data);
          die();
  
        }catch(\PDOException $e){
          return $e;
        }
  
      }

      public function getEditar($username, $password, $rol, $email){
        $this->username= $username;
        $this->password=$password;
        $this->rol=$rol;
        $this->email= $email;
  
        $this->editarUsuario();
      }
  
      private function editarUsuario(){
  
        try{
  
          $new = $this->con->prepare("UPDATE usuario SET nombre = ?, clave = ?, rol = ?, estado = 1  WHERE correo =?");
          $new->bindValue(1, $this->username);
          $new->bindValue(2, $this->password);
          $new->bindValue(3, $this->rol);
          $new->bindValue(4, $this->email);
          $new->execute();
          
          echo json_encode(['asdasd' => 'asdasdas']);
          die();
  
        }catch(\PDOException $error){
          return $error;
        }
      }

      
    public function getEliminar($email){

        $this->email = $email;
  
        $this->eliminarUsuario();
      }
  
      private function eliminarUsuario(){
        try{
  
          $new = $this->con->prepare("DELETE FROM `usuario` WHERE correo=?");
          $new->bindValue(1, $this->email);
          $new->execute();
  
        }catch(\PDOException $e){
          return $e;
        }
  
      }

 }

?>