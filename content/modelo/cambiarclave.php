<?php 
   
	if(file_exists('Config/connect/DBConnect.php')){
    	 require_once('Config/connect/DBConnect.php');
    }else{
    	die("error: no se ha encontrado la base de datos Connect!");
    }

    class usuario extends DBConnect{
      private $usuario;
      private $clave;
      private $repclave;

      public function __construct(){
      	parent::__construct();

      } 

        public function getRegistrarSistema($usuario,$clave,$repclave){
		$this->usuario = $usuario;
		$this->clave = $clave;
		$this->repclave = $repclave;

		return $this->registraSistema();
     }

        private function registraSistema(){

          if($this->clave !== $this->repclave){
           return "No coicide la contraseña";
          }

         try{
         $new = $this->con->prepare("UPDATE  usuario(`usuario`,`clave`,`repclave`) VALUES (1,?,?,1)");
         $new->bindValue(1, $this->usuario);
         $new->bindValue(2, $this->clave);
         $new->bindValue(3, $this->repclave);
         $new->execute();
         $data = $new->fetchAll();

         if(!$data){
          return "Registrado";
         }else{
           return "Error!!";
         }

         }catch(exection $error){
         	return $error;
         }

	 }

 }

?>