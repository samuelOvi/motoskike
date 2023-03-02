<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CASA</title>
	<?php $VarComp->header(); ?>
	<link rel="stylesheet" href="assets/css/chosen.min.css">
	<link rel="stylesheet" href="assets/css/select2.min.css">
    <link rel="stylesheet" href="assets/css/select2-bootstrap-5-theme.min.css">
    <link rel="stylesheet" href="assets/css/select2-bootstrap-5-theme.rtl.min.css">
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
				<i class="zmdi zmdi-shopping-cart"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					VENTAS
					<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#Agregar">Agregar</button>
				</p>
			</div>
			
		</section>
		<div class="full-width divider-menu-h"></div>
		<div class="mdl-grid">
			<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">

			
				<div class="table-responsive">
           
					<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
						<thead>
							<tr>
								<th class="mdl-data-table__cell--non-numeric">fecha</th>
								<th>Cedula</th>
								<th>detalles</th>
								<th>Total</th>
								<th>Options</th>
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

	  <div class="modal fade" id="Agregar" >
     <div class="modal-dialog modal-dialog-scrollable modal-lg ">
       <div class="modal-content">
         <div class="modal-header alert bg0">
          <h4 class="modal-title text-white"> <strong>Nuevo Venta</strong> </h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body ">

		<form id = "agregarform">

<div class="form-group col-md-12">  
  <div class="container-fluid">
	<div class="row">

	             <div class="form-group col-md-6">                          
                    <label for="inputText" class="col-sm-3 col-form-label"><strong>Cliente</strong></label>
                    <div class="input-group">
                     
                      <select class="form-control select2" placeholder="Cédula" id="cedula">
                        <option value="0" selected disabled>Clientes</option>
                        <?php if(isset($mostrarC)){
                          foreach($mostrarC as $data){
                            ?> 
                            <option value="<?php echo $data->cedula;?>" class="opcion"><?php echo $data->nombre;?> <?php echo $data->apellido;?> <?php echo $data->cedula;?></option>
                            <?php
                          }
                        }else{"";}?>
                      </select> 
                    </div>
                    <p style="color:#ff0000;text-align: center;" id="error1"></p>
                  </div>

				  <div class="form-group col-md-6">  
                    <label class="col-form-label" for="config_iva"><strong>IVA</strong></label>
                    <div class="input-group">
                      <button type="button" class="iconos btn btn-secondary" data-bs-trigger="hover focus"data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top" data-bs-content="Introduzca un IVA para la venta">%</button> 
                      <input class="form-control" type="text" id="config_iva" value="16"/>

                    </div>
                  </div>


	  <div class="form-group col-md-6">                          
		<label class="col-form-label"> <strong>Monto</strong> </label>
		<div class="input-group">
		 
		  <input type="number" class="form-control monto" disabled="disabled" id="monto" >
		</div>
		<p style="color:#ff0000;text-align: center;" id="error3"></p>
	  </div>

	  <div class="form-group col-md-6">                          
		<label class="col-form-label"> <strong>dolar</strong> </label>
		<div class="input-group">


		          <?php if(isset($mostrarD)){
                          foreach($mostrarD as $data){
                            ?> 
                           <input type="number" class="form-control" id="dolar" value="<?php echo $data->id_dolar;?>">
                            <?php
                          }
                        }else{"";}?>
		 
		</div>
		<p style="color:#ff0000;text-align: center;" id="error3"></p>
	  </div>

  </div>
</div> 


<div class="form-group col-md-12">  
  <div class="container-fluid">
	<div class="row">
	  <div class="table-body form-group col-12">

		<table class="table table-striped">
		  <thead>
			<tr>
			  <th></th>
			  <th>Producto</th>
			  <th>Cantidad</th>
			  <th>Precio</th>
			  <th>IVA</th>
			  <th>Total</th>
			</tr>
		  </thead>
		  <tbody id="ASD" class="tbody">
			<tr>
			  <td width="1%"><a class="removeRow a-asd" href="#">x</i></a></td>
			  <td width='30%'> 
				<select class="select-productos select-asd" name="productos">
				  <option></option>
				</select>
			  </td>
			  <td width='10%' class="amount"><input class="select-asd stock" type="number" value=""/></td>
			  <td width='10%' class="rate"><input class="select-asd" type="number" disabled value="" /></td>
			  <td width='10%'class="tax"></td>
			  <td width='10%' class="sum"></td>
			</tr>
		  </tbody>
		</table>
		<a class="newRow a-asd" href="#"><i class="bi bi-plus-circle-fill"></i> Nueva fila</a> <br>
		<div class="text-end">
		  <p id="montos"></p>
		  <p id="montos2"></p>
		</div>
	  </div>

	</div>
  </div>
</div>

</div>

<p style="color:#ff0000;text-align: center;" id="error"></p>

<div class="modal-footer d-flex justify-content-end">
			<div>
			<button type="button" class="btn btn-secondary cerrar" id="cerrar" data-bs-dismiss="modal">Cancelar</button>
			<button type="submit" class="btn btn-success " id="registrar">Registrar</button>
			</div>				
		</div>
</form>
      </div>
    </div>
  </div>
</div>

  <!-- Modal AGREGAR  FIN-->



<!-- MODAL ELIMINAR-->

<div class="modal fade" id="Borrar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="staticBackdropLabel">¿Estás seguro?</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5>esta compra sera anulada.</h5>
      </div>
      <div class="modal-footer">
        <button id="close" type="button" class="btn btn-secondary cerrar" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="delete">Anular</button>
      </div>
    </div>
  </div>
</div>

<!--FIN MODAL ELIMINAR-->




  <!-- MODAL DE PRODUCTOS -->
  <div class="modal fade" id="detalleVenta" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title"><strong id="ventaNombre"></strong></h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	  <table class="table table-hover">
          <thead>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
			<th>total</th>
          </thead>
          <tbody id="bodyDetalle">
            
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button id="close" type="button" class="btn btn-secondary cerrar" data-bs-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>

</body>
<?php $VarComp->js();?>
<script src="assets/js/chosen.jquery.min.js"></script>
<script src="assets/js/select2.full.min.js"></script>
<script src="assets/js/ventas.js"></script>
</html>
