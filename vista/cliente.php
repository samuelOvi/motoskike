<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CASA</title>
	<link rel="stylesheet" href="modals.css">
	<?php $VarComp->header(); ?>
</head>

<body>
	<!-- MENU -->
	<?php  $VarNav->Menu();?>
	<!-- pageContent -->
	<section class="full-width pageContent">
		<!-- navBar -->
		<?php  $VarNav->headerMenu();?>

		
		<section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-accounts"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					todos los clientes registrados
				</p>
			</div>
		</section>
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabNewClient" class="mdl-tabs__tab is-active">NUEVO</a>
				<a href="#tabListClient" class="mdl-tabs__tab">LISTA</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabNewClient">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--12-col">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle text-center tittles bg0">
								NUEVO CLIENTE
							</div>
							<div class="full-width panel-content">
								<form id="agregarform">
									<div class="mdl-grid">
										<div class="mdl-cell mdl-cell--12-col">
											<legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i>
												&nbsp; datos cliente</legend><br>
										</div>

										<div class="mdl-cell mdl-cell--12-col">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input"
													type="number" pattern="-?[0-9]*(\.[0-9]+)?" id="cedula">
													<label class="mdl-textfield__label label_gris">Cedula</label>
												<span class="mdl-textfield__error">cedula invalida</span>
												<p class="text-center">
													<?php echo (isset($respuesta[0]))? ($respuesta[0] == "cedula")?  $respuesta[1] :  " " :  " " ?>
												</p>
											</div>
										</div>

										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input"
													type="text" pattern="-?[A-Za-z???????????????????? ]*(\.[0-9]+)?"
													id="nombre">
													<label class="mdl-textfield__label label_gris">nombre</label>
												<span class="mdl-textfield__error">datos invalido</span>
											</div>
										</div>

										<div class="mdl-cell mdl-cell--6-col mdl-cell--8-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input  class="mdl-textfield__input" type="text"
													pattern="-?[A-Za-z???????????????????? ]*(\.[0-9]+)?" id="apellido">
													<label class="mdl-textfield__label label_gris">apellido</label>
												<span class="mdl-textfield__error">datos invalido</span>
											</div>
										</div>



										<div class="mdl-cell mdl-cell--12-col mdl-cell--12-col-tablet">
											<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
												<input class="mdl-textfield__input" type="tel"
													pattern="-?[0-9+()- ]*(\.[0-9]+)?" id="telefono">
													<label class="mdl-textfield__label label_gris">telefono</label>
												<span class="mdl-textfield__error">Invalid phone number</span>
												<p class="text-center">
													<?php echo (isset($respuesta[0]))? ($respuesta[0] == "telefono")?  $respuesta[1] :  " " :  " " ?>
												</p>
											</div>
										</div>

									</div>
									<div style="color: red;" class="error_cliente"></div>
									<p class="text-center">
										<button type="button"
											class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg0"
											id="registrar">
											<i class="zmdi zmdi-plus"></i>
										</button>
									<div class="mdl-tooltip" for="registrar">Add client</div>
									</p>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- MOSTRAR -->
			<div class="mdl-tabs__panel" id="tabListClient">
				<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
					<thead>

						<tr>
							<th>Ceudla</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Telefono</th>
							<th>Opciones</th>
						</tr>
					</thead>
					<tbody id="tbody_cliente">


					</tbody>
				</table>
			</div>


		</div>


		</div>
	</section>


	<!-- MODAL EDITAR -->
	<div class="modal fade" id="Editar" tabindex="-1">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header alert bg0">
					<h4 class="text-white"> <strong>Editar Cliente</strong> </h4>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<div class="modal-body ">

					<form id="editarform">

						<div class="form-group col-md-12">
							<div class="container-fluid">
								<div class="row">

									<div class="form-group col-6">
										<label class="col-form-label"> <strong>cedula</strong> </label>
										<div class="input-group">
										
											<input type="number" disabled class="form-control" id="cedulaEdit">
										</div>
									</div>

									
									<div class="form-group col-6">
										<label class="col-form-label"> <strong>nombre</strong> </label>
										<div class="input-group">
										
											<input class="form-control" id="nombreEdit">
										</div>
									</div>

									
									<div class="form-group col-6">
										<label class="col-form-label"> <strong>apellido</strong> </label>
										<div class="input-group">
									
											<input class="form-control" id="apellidoEdit">
										</div>
									</div>

									<div class="form-group col-6">
										<label class="col-form-label"> <strong>telefono</strong> </label>
										<div class="input-group">
										
											<input type="number" class="form-control" id="telefonoEdit">
										</div>
									</div>

								</div>
							</div>
						</div>

				</div>
				<p style="color:#ff0000;text-align: center;" class="error_cliente_edit"></p>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary cerrar" data-bs-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-success" id="editar">Editar</button>
				</div>
				</form>
			</div>
		</div>
	</div>
	<!-- MODAL EDITAR FINAL -->

	<!-- MODAL BORRAR -->
	<div class="modal fade" id="Borrar" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false"
		aria-hidden="true" style="display: none; ">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Epa!</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					??Desea Borrar este cliente?
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary cerrar" data-bs-dismiss="modal">Cerrar</button>
					<button id="borrar" type="button" class="btn btn-danger">Borrar</button>
				</div>
			</div>
		</div>
	</div>
	<!-- MODAL BORRAR FINAL-->
</body>
<?php $VarComp->js();?>
<script src="assets/js/cliente.js"></script> 

</html>