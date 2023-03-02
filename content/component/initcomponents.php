<?php 

namespace component;
   

class initcomponents{

	public static function header(){	
		$varHeader = '
				<link rel="stylesheet" href="assets/css/normalize.css">
				<link rel="stylesheet" href="assets/css/sweetalert2.css">
				<link rel="stylesheet" href="assets/css/material.min.css">
				<link rel="stylesheet" href="assets/css/material-design-iconic-font.min.css">
				<link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.css">
				<link rel="stylesheet" href="assets/css/sweetalert2.min.css">
				<link rel="stylesheet" href="assets/css/main.css">
				<link rel="stylesheet" href="assets/css/bootstrap.min.css">
				
				    <!--FONTS AWESOME-->
                <script src="https://kit.fontawesome.com/002a346444.js" crossorigin="anonymous"></script>

				';
				echo $varHeader;
			}		

			public static function js(){
	$varJs = '
				<script src="assets/js/jquery.js"></script>
				<!--<script>window.jQuery || document.write(<script src="assets/js/jquery-1.11.2.min.js"></script>)</script>-->
				<script src="assets/js/material.min.js" ></script>
				<script src="assets/js/sweetalert2.min.js" ></script>
				<script src="assets/js/jquery.mCustomScrollbar.concat.min.js" ></script>
				<script src="assets/js/validaciones.js" ></script>
				<script src="assets/js/bootstrap.bundle.min.js" ></script>
				<script src="assets/js/sweetalert2.all.min.js" ></script>
				<script src="assets/js/main.js" ></script>';
				echo $varJs;
			}	

		}


?>