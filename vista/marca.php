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
		    MARCA
		</p>
	</div>
</section>
<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
	<div class="mdl-tabs__tab-bar">
	<a href="#" class="mdl-tabs__tab nuevo">NUEVO</a>
		<a href="#" class="mdl-tabs__tab lista">LISTA</a>
	</div>
	<div class="mdl-tabs__panel is-active" id="registrar_mostrar">
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--12-col">
				<div class="full-width panel mdl-shadow--2dp">
					<div class="full-width panel-tittle text-center tittles bg0">
						MARCA
					</div>
					<div class="full-width panel-content">
						<form method="POST">
							<div class="mdl-grid">

								<div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
										<input name="marca" class="mdl-textfield__input" type="text"
										pattern="-?[A-Za-z0-9áéíóúÁÉÍÓÚ ]*(\.[0-9]+)?" id="marca">
										<label class="mdl-textfield__label label_gris">marca</label>
										<span class="mdl-textfield__error">dato invalido</span>
									</div>
								</div>
				
								<div>
								</div>

							</div>
							<p style="color:#ff0000;text-align: center;" class="error_marca"></p>
							<p class="text-center">
								<input type="submit" value="+"
									class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg0"
									id="btn-addProduct">
									
								</input>
							<div class="mdl-tooltip" for="btn-addProduct">Add marca</div>
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
								  <th class="mdl-data-table__cell--non-numeric">MARCAS</th>
								  <th>Opciones</th>
							  </tr>
						  </thead>
						  <tbody id = "tbody">
						  <form method="POST">
							  <?php
						   foreach($mostrarMarcas as $datos)
							{                      
							  echo "<tr>";
							  echo "<td>".$datos["nombre_marca"]."</td>";                        
								  ?>
								  <td>
						<!-- <button value="<?php $datos["id_marca"] ?>" id="datosDetallados" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#infomodal">
						  <i class="fa fa-eye"></i>
						</button> -->
						 <button type="button" id="EditarDart" class="btn btn-success editar"  onclick="cargar_datos(<?php echo $datos["id_marca"]?>);">
						 <img width="22px" src="assets/img/lapiz.png">
						</button>
			  
						<button style="display: none;"  type="button" id="<?php echo $datos["id_marca"]?>" class="btn btn-danger borrar_marca"  data-bs-toggle="modal" data-bs-target="#borrar_marca">
						<img width="22px" src="assets/img/basura.png">
						</button>
							</td>
							</tr>
							 <?php } ?>
							  </form>
						  </tbody>	
							  </table>				
											  
					  </div>
		</section>


		              <!-- MODAL EDITAR -->
					  <div class="modal fade" id="Editar" tabindex="-1">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header alert bg0">
                      <h4 class="modal-title" style="color:#fff;"> <strong>Editar marca</strong> </h4>
                    </div>

                    <div class="modal-body ">

                    <form method="post">

                    <div class="form-group col-md-12">  
                      <div class="container-fluid">
                        <div class="row">

                            <div class="form-group col-6">                          
                            <label class="col-form-label"> <strong>marca</strong> </label>
                            <div class="input-group">                          
                              <input type="text" class="form-control" id="nombreEdit" name="nombreEdit">
                              <input type="text" class="form-control input_oculto" id="id_marca" name="id_marca">
                            </div>
                            </div>

                            <div style="color:#ff0000;text-align: center;" id="errorEdit"><?php echo (isset($respuesta)) ? $respuesta : " "; ?></div>
							<p style="color:#ff0000;text-align: center;" class="error_marca_editar"></p>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary cerrar" data-bs-dismiss="modal">Cancelar</button>
                      <button type="button" class="btn btn-success" onclick="modificar();">Editar</button>
                    </div>
                  </form>
                  </div>
                </div>
              </div>
              <!-- MODAL EDITAR FINAL --> 

			   <!-- MODAL BORRAR -->
			   <div class="modal fade" id="Borrar_marca" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true" style="display: none; ">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Epa!</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      ¿Desea Borrar este producto?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary cerrar_marca" data-bs-dismiss="modal">Cerrar</button>
                      <button id="borrar_marca" type="button" class="btn btn-danger">Borrar</button>
                    </div>
                  </div> 
                </div>
              </div>
              <!-- MODAL BORRAR FINAL-->


				</div>
			</div>
		</div>
	</div>
</div>
</section>	

<?php $VarComp->js();?>
</body>
<script type="text/javascript" src="assets/js/marca.js"></script>
<script>

	/*$("#btn-addProduct").on('click', function (e) {

		if (leerString($("#marca").val(), $(".error_producto"), "marca") == true) {
			console.log("ola")
			alert("se añadio con exito")
		} else {
			e.preventDefault()
		}
	})*/
</script>
</html>
