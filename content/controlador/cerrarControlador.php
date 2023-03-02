<?php 

if(isset($_SESSION['correo'])){
	session_destroy();
	die('<script> window.location = "?url=login" </script>');
	
}

?>