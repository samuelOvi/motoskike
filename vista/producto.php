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
				<i class="zmdi zmdi-store"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
				INVENTARIO
          <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Agregar">Agregar</button>
        </p>
			</div>
		</section>
		<div class="full-width divider-menu-h"></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
				<div class="table-responsive">


<!--adactacion  de buscarrdor-->
<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
	<label class="mdl-button mdl-js-button mdl-button--icon" for="searchProvider">
		<i class="zmdi zmdi-search"></i>
	</label>
	<div class="mdl-textfield__expandable-holder">
		<input class="mdl-textfield__input" type="text" id="searchProvider">
		<label class="mdl-textfield__label"></label>
	</div>
</div>

                        
								<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
						<thead>
							
							<tr>
								<th class="mdl-data-table__cell--non-numeric">nombre</th>
								<th>codigo</th>
								<th>cantidad</th>
								<th>precio $</th>
                <th>precio BS</th>
								<th>marca</th>
								<th>descripcion</th>
								<th>opciones</th>
							</tr>
						</thead>
						<tbody id = "tbody">

				
						</tbody>	
						</table>				
											
					
				</div>
			</div>
		</div>
		</section>
     <!-- Modal AGREGAR -->

     <div class="modal fade" id="Agregar" tabindex="-1">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header alert bg0">
                      <h4 class="text-white"> <strong>registrar producto</strong> </h4>
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
                                <input class="form-control" id="codigo">
                              </div>
                            </div>

                            <div class="form-group col-6">                          
                            <label class="col-form-label"> <strong>nombre</strong> </label>
                            <div class="input-group">
                              <input class="form-control" id="nombre_producto" >
                            </div>
                            </div>

                        </div>
                      </div>
                    </div>

                     <div class="form-group col-md-12">  
                      <div class="container-fluid">
                        <div class="row">

                        <div class="form-group col-5">                          
                            <label class="col-form-label"> <strong>cantidad minima</strong> </label>
                              <div class="input-group">  
                                <input class="form-control" id="cantidadMin" >
                              </div>
                            </div> 

                            <div class="form-group col-4">                          
                            <label class="col-form-label"> <strong>cantidad</strong> </label>
                              <div class="input-group">  
                                <input class="form-control" id="cantidad" >
                              </div>
                            </div>

                            
                            <!-- precio de dolar -->
									
								    	<div class="form-group col-md-3">                          
									    	<label class="col-form-label"> <strong>dolar</strong> </label>
								      	<div class="input-group">

		         					       <?php if(isset($mostrarDolar)){
                     			         foreach($mostrarDolar as $data){
                      			          ?> 
                       				         <input type="number" disabled class="form-control" id="dolar" value="<?php echo $data->precio_dolar;?>">
                         				      <?php
                        		      }
                      			        }else{"";}?>
								      	</div>
									        <p style="color:#ff0000;text-align: center;" id="error3"></p>
							          </div>                 
								    	</div>

                        </div>
                      </div>
                    </div>
                     
                      <div class="form-group col-md-12">  
                      <div class="container-fluid">
                        <div class="row">

                            <div class="form-group col-6">                          
                            <label class="col-form-label"> <strong>precio dolares</strong> </label>
                              <div class="input-group">
                                <input class="form-control" id="precio" >
                              </div>
                            </div>

                            <div class="form-group col-6">                          
                            <label class="col-form-label"> <strong>precio bolivares</strong> </label>
                              <div class="input-group">
                                <input class="form-control" id="precio_boliv" >
                              </div>
                            </div>


                          <!-- CARGAR MARCA -->
                            <div class="form-group col-5">                          
                            <label class="col-form-label"> <strong>marca</strong> </label>
                              <div class="input-group">                           
                                <!-- PHP CARGA DE DATOS -->
								            	<select class="cars" name="cars" id="cars">
                              <option value="0" disabled  selected>Marcas</option>
								              	<?php 
                                     if(isset( $mostrarMarcas)) {
                                     foreach ($mostrarMarcas as $data){
                                      
                                      ?>
						
						              	<option value="<?php echo $data->id_marca?>"><?php echo $data->nombre_marca?></option>

						                	<?php 
                                     }
                                     }else{
                                       " "; 
                                        }
                                    ?>	
								             	 </select>
                              </div>
                            </div>

                            <div class="form-group col-7">                          
                            <label class="col-form-label"> <strong>descripcion</strong> </label>
                              <div class="input-group">
                                <input class="form-control"  id="descripcion">
                              </div>
                            </div>

                        </div>
                      </div>
                      <div style="color:#ff0000;text-align: center;" id="errorEdit"><?php echo (isset($respuesta)) ? $respuesta : " "; ?></div>
                    <p   style="color:#ff0000;text-align: center;" class="error_producto"></p>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary cerrar" data-bs-dismiss="modal">Cancelar</button>
                      <button type="button" class="btn btn-success" id="registrar">agregar</button>
                   </div>
                    </div> 
                     </div>
                  </form>
                  </div>
                </div>
              </div>

  <!-- Modal AGREGAR  FIN-->


		              <!-- MODAL EDITAR -->
					  <div class="modal fade" id="Editar" tabindex="-1">
                <div class="modal-dialog modal-md">
                  <div class="modal-content">
                    <div class="modal-header alert bg0">
                      <h4 class="text-white"> <strong>Editar producto</strong> </h4>
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
                                <input class="form-control" id="codigoEdit">
                              </div>
                            </div>

                            <div class="form-group col-6">                          
                            <label class="col-form-label"> <strong>nombre</strong> </label>
                            <div class="input-group">
                              <input class="form-control" id="nombreEdit" >
                            </div>
                            </div>

                        </div>
                      </div>
                    </div>

                     <div class="form-group col-md-12">  
                      <div class="container-fluid">
                        <div class="row">

                        <div class="form-group col-12">                          
                            <label class="col-form-label"> <strong>cantidad minima</strong> </label>
                              <div class="input-group">  
                                <input class="form-control" id="cantidadMinEdit" >
                              </div>
                            </div> 

                            <div class="form-group col-12">                          
                            <label class="col-form-label"> <strong>cantidad</strong> </label>
                              <div class="input-group">  
                                <input class="form-control" id="cantidadEdit" >
                              </div>
                            </div>

                        </div>
                      </div>
                    </div>
                     
                      <div class="form-group col-md-12">  
                      <div class="container-fluid">
                        <div class="row">

                            <div class="form-group col-6">                          
                            <label class="col-form-label"> <strong>precio dolares</strong> </label>
                              <div class="input-group">
                                <input class="form-control" id="precioDolarEdit" >
                              </div>
                            </div>

                            <div class="form-group col-6">                          
                            <label class="col-form-label"> <strong>precio bolivares</strong> </label>
                              <div class="input-group">
                                <input class="form-control" id="precioBsEdit" >
                              </div>
                            </div>

                            <div class="form-group col-6">                          
                            <label class="col-form-label"> <strong>marca</strong> </label>
                              <div class="input-group">                           
                                <!-- PHP CARGA DE DATOS -->
								            	<select class="cars" name="cars" id="marcaEdit">
                              <option value="0" disabled  selected>Marcas</option>
								              	<?php 
                                     if(isset( $mostrarMarcas)) {
                                     foreach ($mostrarMarcas as $data){
                                      
                                      ?>
						
						              	<option value="<?php echo $data->id_marca?>"><?php echo $data->nombre_marca?></option>

						                	<?php 
                                     }
                                     }else{
                                       " "; 
                                        }
                                    ?>	
								             	 </select>
                              </div>
                            </div>

                            <div class="form-group col-6">                          
                            <label class="col-form-label"> <strong>descripcion</strong> </label>
                              <div class="input-group">
                                <input class="form-control"  id="descripcionEdit">
                              </div>
                            </div>

                        </div>
                      </div>
                    </div>

                  </div>

                    <div style="color:#ff0000;text-align: center;" id="errorEdit"><?php echo (isset($respuesta)) ? $respuesta : " "; ?></div>
                    <p   style="color:#ff0000;text-align: center;" class="error_producto_edit"></p>
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
                      ¿Desea Borrar este producto?
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
<script src="assets/js/productos.js"></script> 
</html>