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
		<i class="zmdi zmdi-washing-machine"></i>
	</div>
	<div class="full-width header-well-text">
		<p class="text-condensedLight">
			TASA DOLAR 
		</p>
	</div>
</section>
<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
	<div class="mdl-tabs__tab-bar">
		<a href="#" class="mdl-tabs__tab nuevo">NUEVO</a>
		<a href="#" class="mdl-tabs__tab lista">LISTA</a>
	</div>
	<div class="mdl-tabs__panel is-active" id="registrar_dolar">
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--12-col">
				<div class="full-width panel mdl-shadow--2dp">
					<div class="full-width panel-tittle text-center tittles bg0">
						TASA DOLAR
					</div>
					<div class="full-width panel-content">


						<form id = "agregarform">
							<div class="mdl-grid">
								<div class="mdl-cell mdl-cell--12-col">
									<legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i> &nbsp;
										DATOS DE DOLAR</legend><br>
								</div>
								

								<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input id="dolar" class="mdl-textfield__input" type="number">
											<label class="mdl-textfield__label label_gris">tasa dolar</label>
									</div>
								</div>
				
							
								<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield">
										<input id="fechadolar" type="date" class="mdl-textfield__input">
									</div>
								</div>
		
							</div>
							<div style="color: red;" class="error_producto"></div>
							<p class="text-center">

								<button type="button"
									class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg0"
									id="registrar">
									+
								</button>
							<div class="mdl-tooltip" for="registrar">Add Product</div>
							</p>
						</form>
						
					</div>
				

				</div>
			</div>
		</div>
	</div>

				<div id="lista">
					<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
						<thead>	
							<tr>
								<th>fecha</th>
								<th>precio</th>
							</tr>
						</thead>
						<tbody id = "tbody_dolar">				
						</tbody>	
						</table>	
			 		 </div>	
				</div>
</section>	




	              <!-- MODAL EDITAR -->
				  <div class="modal fade" id="Editar" tabindex="-1">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header alert bg0">
                      <h4 class="text-white"> <strong>Editar dolar</strong> </h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body ">

                    <form id = "editarform">

                    <div class="form-group col-md-12">  
                      <div class="container-fluid">
                        <div class="row">

                            <div class="form-group col-6">                          
                            <label class="col-form-label"> <strong>precio</strong> </label>
                            <div class="input-group">
                               
                              <input class="form-control" id="precioEdit" >
                            </div>
                            </div>

                            <div class="form-group col-6">                          
                            <label class="col-form-label"> <strong>fecha</strong> </label>
                              <div class="input-group">
                                <input class="form-control" id="fechaEdit">
                              </div>
                            </div>

                        </div>
                      </div>
                    </div>

                  </div>
                    
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
              <div class="modal fade" id="Borrar" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" style="display: none; ">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Epa!</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      ¿Desea Borrar este Dolar?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary cerrar" data-bs-dismiss="modal">Cerrar</button>
                      <button id="borrar" type="button" class="btn btn-danger">Borrar</button>
                    </div>
                  </div> 
                </div>
              </div>
              <!-- MODAL BORRAR FINAL-->

<?php $VarComp->js();?>
<script src="assets/js/dolar.js"></script> 
</body>
<script>
	$("#fechadolar").val(fechaActual());


	$("#registrar").on('click', function (e) {

		if (leerNumero($("#dolar").val(), $(".error_producto"), "dolar") == true &&  
			leerfecha($("#fechadolar").val(), $(".error_producto"), "fecha")== true) {
				$(".error_producto").text("")
		} else {
			e.preventDefault()
		}
	})
</script>
</html>
