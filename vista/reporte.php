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
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
            <div class="full-width header-well-text">
                <p class="text-condensedLight">
                    REPORTES
                </p>
            </div>
        </section>

        <!-- datos -->

        <div class="mdl-tabs__panel is-active" id="tabNewProduct">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col">
                    <div class="full-width panel mdl-shadow--2dp">
                        <div class="full-width panel-tittle text-center tittles bg0">
                           GENERAR REPORTE
                        </div>
                        <div class="full-width panel-content">
                            <form method="POST">
                                <div class="mdl-grid">
                                    <div class="mdl-cell mdl-cell--12-col">
                                        <legend class="text-condensedLight"><i class="zmdi zmdi-border-color"></i>
                                            DATOS DE REPORTE</legend><br>
                                    </div>                 
                   
                                    <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                                            <select name="" class="mdl-textfield__input" id="select">
                                                <option disabled selected>Tipo de reporte</option>
                                                <option value="venta" >Ventas</option>
                                                <option value="compra" >Compras</option>                                  
                                            </select>
                               
                                        </div>
                                    </div>
                                             
                                    <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                        <div class="mdl-textfield mdl-js-textfield">
                                            <input type="date" class="mdl-textfield__input" id="fecha" name="">
                                        </div>
                                    </div>
                            
                                    <div class="mdl-cell mdl-cell--4-col mdl-cell--8-col-tablet">
                                        <div class="mdl-textfield mdl-js-textfield">
                                            <input type="date" class="mdl-textfield__input" id="fecha2" name="">
                                        </div>
                                    </div>

                                </div>
                                <div style="color: red;" class="error_producto"></div>
                                <p class="text-center">
                                    <button class="mdl-button mdl-js-button mdl-button--fab 
                                mdl-js-ripple-effect mdl-button--colored bg0" id="btn-addProduct">
                                        <i class="zmdi zmdi-plus" type="submit">
                                        </i>
                                    </button>
                                <div class="mdl-tooltip" for="btn-addProduct">Add Product</div>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <!-- TABLA REPORTES -->
        <div class="full-width divider-menu-h"></div>
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                <div class="table-responsive">
                    <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
                        <thead>
                            <tr>
                             
                                <th>N factura</th>
                                <th> cedula</th>
                                <th>cliente</th>
                                <th >Date</th>
                                <th>monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>30559659</td>
                                <td>samuel</td>
                                <td >11/04/2016</td>
                                <td>$77</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>30559659</td>
                                <td>samuel</td>
                                <td >11/04/2016</td>
                                <td>$77</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>30559659</td>
                                <td>samuel</td>
                                <td >11/04/2016</td>
                                <td>$77</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>30559659</td>
                                <td>samuel</td>
                                <td >11/04/2016</td>
                                <td>$77</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</body>
<?php $VarComp->js();?>

</html>