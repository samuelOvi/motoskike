
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	
	<?php  $VarComp->header();?>
	<?php $VarComp->js();?>   
</head>
<body class="body_login">
	<div class="login-wrap cover">
		<div class="container-login">
			<p class="text-center" style="font-size: 80px;">
			<!--	<i class="zmdi zmdi-account-circle"></i>-->
			<img class="logo_login" src="assets/img/logo.jpg" alt="">
			</p>
			<h4 class="text-center h4 text-condensedLight">Bienvenido</h4>
			<form method="POST">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    <input name="correo" class="mdl-textfield__input" type="text" id="userName">
				    <label class=" mdl-textfield__label" for="userName" style="color=#fff">correo</label>
				</div>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
				    <input name="contraseña" class="mdl-textfield__input" type="password" id="pass">
				    <label class=" mdl-textfield__label" for="pass" style="color=#fff">Contraseña</label>
				</div>

				<div class="error"></div>

				<input type="submit" id="iniciar" value="iniciar" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #d33d16; margin: 0 auto; display: block;" >
		</form>
			<p style="color:#ff0000;text-align: center;"><?php echo (isset($respuesta))? $respuesta : " " ?></p>
		</div>
	</div>
</body>

<script> 
			$("#iniciar").click((e)=>{
				console.log("ola")
				if(leerString($("#userName").val(),$(".error") ,"error usuario")==true && 
				leerContraseña($("#pass").val(),$(".error") , "error contraseña")==true){
				    window.location='vista/home.php';
				}else{
					e.preventDefault()
				}		
			})

		

			</script>
</html>