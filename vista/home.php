<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CASA</title>
	<?php $VarComp->header(); ?>
</head>
<body>
	<!-- MENU -->
    <?php  $VarNav->Menu();?>
	<!-- pageContent -->
	<section class="full-width pageContent">
		<!-- navBar -->
		<?php  $VarNav->headerMenu();?>


		<section id="respuesta" class="full-width text-center" >
			<h3 class="text-center tittles">FULL REPUESTOS KIKE</h3>
			<!-- Tiles -->
			<article class="full-width tile">
				<div class="dolar tile-text">
					<span class="text-condensedLight">
						2<br>
						<small>Dolar</small>
					</span>
				</div>
				<i class="zmdi zmdi zmdi-store tile-icon"></i>
			</article>
			
			<article class="full-width tile">
				<div class="compra tile-text">
					<span class="text-condensedLight">
						14<br>
						<small>Compra</small>
					</span>
				</div>
				<i class="zmdi zmdi zmdi-store tile-icon"></i>
			</article>

			<article class="full-width tile">
				<div class="cliente tile-text">
					<span class="text-condensedLight">
						71<br>
						<small>Clientes</small>
					</span>
				</div>
				<i class="zmdi zmdi-accounts tile-icon"></i>
			</article>

			<article class="full-width tile">
				<div class="reporte tile-text">
					<span class="text-condensedLight">
						1<br>
						<small>Reportes</small>
					</span>
				</div>
				<i class="zmdi zmdi-card tile-icon"></i>
			</article>
			<article class="full-width tile">
				<div class="productos tile-text">
					<span class="text-condensedLight">
						121<br>
						<small>productos</small>
					</span>
				</div>
				<i class="zmdi zmdi-washing-machine tile-icon"></i>
			</article>
			<article class="full-width tile">
				<div class="ventas tile-text">
					<span class="text-condensedLight">
						47<br>
						<small>ventas</small>
					</span>
				</div>
				<i class="zmdi zmdi-shopping-cart tile-icon"></i>
			</article>
		</section>
	</section>
</body>
<?php $VarComp->js();?>
</html>