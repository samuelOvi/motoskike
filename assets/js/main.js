
/*Mostrar ocultar area de notificaciones*/
/*$('.btn-Notification').on('click', function(){
	var ContainerNoty=$('.container-notifications');
	var NotificationArea=$('.NotificationArea');
	if(NotificationArea.hasClass('NotificationArea-show')&&ContainerNoty.hasClass('container-notifications-show')){
		NotificationArea.removeClass('NotificationArea-show');
		ContainerNoty.removeClass('container-notifications-show');
	}else{
		NotificationArea.addClass('NotificationArea-show');
		ContainerNoty.addClass('container-notifications-show');
	}
});/*

/*cambiar pagina*/
/*function url(){
	var parts = window.location.search.substr(1).split("&");
	var $_GET = {};
	for (var i = 0; i < parts.length; i++) {
		var temp = parts[i].split("=");
		$_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
	}
	return $_GET.tipo
}*/

$(".provedores").click(() => {

	window.location = '?url=proveedores';
});

$(".ventas").click(() => {

	window.location = '?url=venta';
});

$(".dolar").click(() => {
	window.location = '?url=dolar';
})

$(".compra").click(() => {
	window.location = '?url=compra';
});

$(".productos").click(() => {

	window.location = '?url=producto';
});

$(".cliente").click(() => {

	window.location = '?url=cliente';
});

$(".administar").click(() => {
	window.location = '?url=usuario';

});

$(".marca").click(() => {
	window.location = '?url=marca';
	});

	$(".reporte").click(() => {
		window.location = '?url=reporte';
		})

/*Mostrar ocultar menu principal*/
$('.btn-menu').on('click', function () {
	var navLateral = $('.navLateral');
	var pageContent = $('.pageContent');
	var navOption = $('.navBar-options');
	if (navLateral.hasClass('navLateral-change') && pageContent.hasClass('pageContent-change')) {
		navLateral.removeClass('navLateral-change');
		pageContent.removeClass('pageContent-change');
		navOption.removeClass('navBar-options-change');
	} else {
		navLateral.addClass('navLateral-change');
		pageContent.addClass('pageContent-change');
		navOption.addClass('navBar-options-change');
	}
});
/*Salir del sistema*/
$('.btn-exit').on('click', function () {
	Swal.fire({
		title: 'Quieres salir del sistema?',
		text: "La sesión actual se cerrará y abandonará el sistema.",
		type: 'warning',
		closeOnConfirm: false,
		confirmButtonText: 'si, salir'
	  }).then((result) => {
		if (result.isConfirmed) {
		  window.location = '?url=cerrar';
		}
	  })

	// Swal.fire({
	// 	title: 'Quieres salir del sistema?',
	// 	text: "La sesión actual se cerrará y abandonará el sistema.",
	// 	type: 'warning',
	// 	confirmButtonText: 'si, salir',
	// 	closeOnConfirm: false
	// },
	// 	function (isConfirm) {
	// 		if (isConfirm) {
	// 			window.location = '?url=cerrar';
	// 		}
	// });
});
/*Mostrar y ocultar submenus*/
$('.btn-subMenu').on('click', function () {
	var subMenu = $(this).next('ul');
	var icon = $(this).children("span");
	if (subMenu.hasClass('sub-menu-options-show')) {
		subMenu.removeClass('sub-menu-options-show');
		icon.addClass('zmdi-chevron-left').removeClass('zmdi-chevron-down');
	} else {
		subMenu.addClass('sub-menu-options-show');
		icon.addClass('zmdi-chevron-down').removeClass('zmdi-chevron-left');
	}
});

(function ($) {
	$(window).on("load", function () {
		$(".NotificationArea, .pageContent").mCustomScrollbar({
			theme: "dark-thin",
			scrollbarPosition: "inside",
			autoHideScrollbar: true,
			scrollButtons: { enable: true }
		});
		$(".navLateral-body").mCustomScrollbar({
			theme: "light-thin",
			scrollbarPosition: "inside",
			autoHideScrollbar: true,
			scrollButtons: { enable: true }
		});
	});
})(jQuery);

/*---modals---*/

var openModal = document.querySelector('.btn12');
var modal = document.querySelector('.modal');
var closeModal = document.querySelector('.modal__close');

openModal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal.classList.add('modal--show');
});

closeModal.addEventListener('click', (e)=>{
    e.preventDefault();
    modal.classList.remove('modal--show');
});

