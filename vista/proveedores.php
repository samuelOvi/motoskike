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

		
<section class="full-width header-well">
	<div class="full-width header-well-icon">
		<i class="zmdi zmdi-truck"></i>
	</div>
	<div class="full-width header-well-text">
		<p class="text-condensedLight">
			PROVEEDORES

		</p>
	</div>
</section>
<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
	<div class="mdl-tabs__tab-bar">
	    <a href="#" class="mdl-tabs__tab nuevo">NUEVO</a>
		<a href="#" class="mdl-tabs__tab lista">LISTA</a>
	
	</div>
	<div class="mdl-tabs__panel is-active" id="registrar_proveedores">
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--12-col">
				<div class="full-width panel mdl-shadow--2dp">
					<div class="full-width panel-tittle text-center tittles bg0">
						NUEVO PROVEEDOR
					</div>
					<div class="full-width panel-content">
						<form>
							<div class="mdl-grid">
								<div class="mdl-cell mdl-cell--12-col">
									<legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp;
										DATOS PROVEEDOR</legend><br>
								</div>

								<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="number" id="codigo_proveedor">
											<label class="mdl-textfield__label label_gris">rif de la empresa</label>
									</div>
								</div>

								<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="text" id="nombre">
											<label class="mdl-textfield__label label_gris">nombre de la empresa</label>
									</div>
								</div>
								

								<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input class="mdl-textfield__input" type="number" id="telefono">
											<label class="mdl-textfield__label label_gris">telefono de la empresa</label>
									</div>
								</div>
								<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input  class="mdl-textfield__input" type="email" id="email">
											<label class="mdl-textfield__label label_gris">email</label>
									</div>
								</div>

							</div>
						
								<div style="color: red; text-align:center" class="error_proveedores"></div>

							<div class="d-flex justify-aling-center">	
								<button  type="button"
									class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg0"
									id="registrar"> +
								</button>
									
								<div class="mdl-tooltip" for="btn-addProvider">agregar proveedor</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	


	<div class="mdl-tabs__panel" id="lista">
     
	         <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
						<thead>
							
							<tr>
								<th class="mdl-data-table__cell--non-numeric">Codigo</th>
								<th>Nombre</th>					
								<th>correo</th>
								<th>telefono</th>

							</tr>
					  	 </thead>
					<tbody id = "tbody">
					</tbody>	
			</table>	
		</div>								


<!-- MODAL EDITAR -->
<div class="modal fade" id="Editar" tabindex="-1">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header alert bg0">
                      <h4 class="modal-title"> <strong class="text-white">Editar Proveedores</strong> </h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body ">

                    <form id = "editarform">

                    <div class="form-group col-md-12">  
                      <div class="container-fluid">
                        <div class="row">

						<div class="form-group col-6">                          
                            <label class="col-form-label"> <strong>codigo</strong> </label>
                              <div class="input-group">
                                <input class="form-control" id="editCodigo_proveedor">
                              </div>
                            </div>


                            <div class="form-group col-6">                          
                            <label class="col-form-label"> <strong>nombre</strong> </label>
                            <div class="input-group">
                              <input class="form-control" id="editNombre" >
                            </div>
                            </div>

                        </div>
                      </div>
                    </div>

                     <div class="form-group col-md-12">  
                      <div class="container-fluid">
                        <div class="row">

                            <div class="form-group col-12">                          
                            <label class="col-form-label"> <strong>telefono</strong> </label>
                              <div class="input-group">
                               <input class="form-control" id="editTelefono" >
                              </div>
                            </div>

                        </div>
                      </div>
                    </div>
                     
                      <div class="form-group col-md-12">  
                      <div class="container-fluid">
                        <div class="row">

                            <div class="form-group col-6">                          
                            <label class="col-form-label"> <strong>correo</strong> </label>
                              <div class="input-group">
                                <input class="form-control" id="editEmail" >
								<div class="modal-footer">

								
								
                      <button type="button" class="btn btn-secondary cerrar" data-bs-dismiss="modal" id="cerrar">Cancelar</button>
                      <button type="button" class="btn btn-success" id="editar">Editar</button>
                    </div>
                              </div>
                            </div>

                            
              <!-- MODAL EDITAR FINAL --> 



</section>
</section>

      <!-- MODAL BORRAR -->
	  <div class="modal fade" id="Borrar" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" style="display: none; ">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Atencion!</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      ¿Desea eliminar este proveedor?
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
<script src="assets/js/proveedores.js"></script> 

<!-- <script>
	$("#registrar").on('click', function (e) {
		if (leerDato($("#codigoproveedores").val(), $(".error_proveedores"), "codigo") == true &&
			leerString($("#nombre").val(), $(".error_proveedores"), "nombre") == true &&
			leerNumero($("#telefono").val(), $(".error_proveedores"), "telefono") == true &&
			leerCorreo($("#correo").val(), $(".error_proveedores"), "correo") == true ) {
				$(".error_proveedores").text("")
		} else {
			e.preventDefault()
		}
		})
</script> -->
</html>
