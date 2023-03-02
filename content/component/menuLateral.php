<?php 

namespace component;

class menuLateral{

 public function Menu(){

    $varNav  ='	<section class="full-width navLateral">
    <div class="full-width navLateral-bg btn-menu"></div>
    <div class="full-width navLateral-body">
        <div class="full-width navLateral-body-logo text-center tittles">
            <i class="zmdi zmdi-close btn-menu"></i> Full Repuestos Kike 
        </div>
        <figure class="administrador full-width navLateral-body-tittle-menu">
            <div>
                <img src="assets/img/logo.jpg" alt="Avatar" class="img-responsive">
            </div>
            <figcaption>
                <span>
                '.$_SESSION["nombre"].'<br>
                </span>

                <span>
                '.$_SESSION["rol"].'<br>
                </span>
            </figcaption>
        </figure>
        <nav class="full-width">
            <ul class="full-width list-unstyle menu-principal">
                <li class="full-width">
                    <a href="?url=home" class="full-width">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-view-dashboard"></i>
                        </div>
                        <div class="navLateral-body-cr">
                            CASA
                        </div>
                    </a>
                </li>
                <li class="full-width divider-menu-h"></li>
                <li class="full-width">
                    <a href="#" class="dolar full-width">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-view-dashboard"></i>
                        </div>
                        <div class="navLateral-body-cr">
                            TASA DOLAR 
                        </div>
                    </a>
                </li>
                <li class="full-width divider-menu-h"></li>
                <li class="full-width">
                    
                        <li class="full-width">
                            <a href="#" class="provedores full-width">
                                <div class="navLateral-body-cl">
                                    <i class="zmdi zmdi-truck"></i>
                                </div>
                                <div class="navLateral-body-cr">
                                    PROVEDORES
                                </div>
                            </a>
                        </li>
                        <li class="full-width divider-menu-h"></li>

                        <li class="full-width">
                            <a href="#" class="compra full-width">
                                <div class="navLateral-body-cl">
                                    <i class="zmdi zmdi-truck"></i>
                                </div>
                                <div class="navLateral-body-cr">
                                    COMPRA
                                </div>
                            </a>
                        </li>
                        <li class="full-width divider-menu-h"></li>

                    
                </li>
                <li class="full-width divider-menu-h"></li>
                <li class="full-width">

                        <li class="full-width">
                            <a href="#" class="cliente full-width">
                                <div class="navLateral-body-cl">
                                    <i class="zmdi zmdi-accounts"></i>
                                </div>
                                <div class="navLateral-body-cr">
                                    CLIENTE
                                </div>
                            </a>
                        </li>
                
                </li>
                <li class="full-width divider-menu-h"></li>
                <li class="full-width">
                    <a href="#" class="productos full-width">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-washing-machine"></i>
                        </div>
                        <div class="navLateral-body-cr">
                            PRODUCTOS
                        </div>
                    </a>
                </li>
                <li class="full-width divider-menu-h"></li>
                <li class="full-width">
                    <a href="#" class="ventas full-width">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-shopping-cart"></i>
                        </div>
                        <div class="navLateral-body-cr">
                            VENTAS
                        </div>
                    </a>
                </li>
                <li class="full-width divider-menu-h"></li>
                </li>
                <li class="full-width divider-menu-h"></li>
                <li class="full-width">
                    <a href="#"  class="marca full-width">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-store"></i>
                        </div>
                        <div class="navLateral-body-cr">
                            REGISTAR MARCA
                        </div>
                    </a>
                </li>
                <li class="full-width divider-menu-h"></li>
                <li class="full-width">
                    <a href="#"  class="reporte full-width">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-store"></i>
                        </div>
                        <div class="navLateral-body-cr">
                            REPORTES
                        </div>
                    </a>
                </li>
                <li class="full-width divider-menu-h"></li>
                <li class="full-width">
                    <a href="#"  class="administar full-width">
                        <div class="navLateral-body-cl">
                            <i class="zmdi zmdi-store"></i>
                        </div>
                        <div class="navLateral-body-cr">
                            ADMINISTAR USUARIOS
                        </div>
                    </a>
                </li>
                
            </ul>
        </nav>
     </div>
    </section>';			
    echo $varNav;


}


public function headerMenu(){

    $varheader  ='<div class="full-width navBar">
    <div class="full-width navBar-options">
        <i class="zmdi zmdi-swap btn-menu" id="btn-menu"></i>	
        <div class="mdl-tooltip" for="btn-menu">Hide / Show MENU</div>
        <nav class="navBar-options-list">
            <ul class="list-unstyle">
                <li class="btn-exit" id="btn-exit">
                    <i class="zmdi zmdi-power"></i>
                    <div class="mdl-tooltip" for="btn-exit">LogOut</div>
                </li>
                <li class="text-condensedLight noLink" ><small>'.$_SESSION["nombre"].'</small></li>
                <li class="noLink">
                    <figure>
                        <img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
                    </figure>
                </li>
            </ul>
        </nav>
    </div>
</div>';			
    echo $varheader;


}
}


    ?>