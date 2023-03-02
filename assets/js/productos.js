$(document).ready(function(){
	/* --- FUNCIÓN PARA RELLENAR LA TABLA --- */
	rellenar();
	function rellenar(){ 
		$.ajax({
			method: "post",
			url: "",
			dataType: "json",
			data: {mostrar: "labs" },
			success(data){
				// console.log(data);
				let lista = data;
				let tabla;
				lista.forEach(row => {
					tabla += `
					<tr>
					<td class="mdl-data-table__cell--non-numeric">${row.nombre}</td>
					<td>${row.codigo}</td>
					<td>${row.cantidad}</td>                      
					<td>${row.precioD}$</td>
					<td>${row.precioB}bs</td>
					<td>${row.nombre_marca}</td>
					<td>${row.descripcion}</td>
					<td class="opcciones">
						<button id="${row.codigo}" class="btn btn-success editar" data-bs-toggle="modal" data-bs-target="#Editar"><img src="assets/img/lapiz.png"></button>
						<button id="${row.codigo}"class="btn btn-danger borrar" data-bs-toggle="modal" data-bs-target="#Borrar"><img src="assets/img/basura.png"></button>
					</td>
					`
				})
				$('#tbody').html(tabla);
			}
		})
	}


			// REGISTRAR
			$("#registrar").click((e)=>{

		if (leerDato($("#codigo").val(), $(".error_producto"), "codigo") == true &&
			leerDato($("#nombre_producto").val(), $(".error_producto"), "nombre producto") == true &&
			leerNumero($("#cantidadMin").val(), $(".error_producto"), "cantidad minima") == true &&
			leerNumero($("#cantidad").val(), $(".error_producto"), "cantidad real") == true &&
			leerNumero($("#precio").val(), $(".error_producto"), "precio en dolares") == true &&
			leerNumero($("#precio_boliv").val(), $(".error_producto"), "precio en bolivares") == true &&
			leerDato($("#descripcion").val(), $(".error_producto"), "descripcion") == true &&
			validarSelect($("#cars").val(), $(".error_producto"), "marca") == true){


				e.preventDefault
				$.ajax({
					type: "post",
					url: '',
					data: {
						codigo : $("#codigo").val(),
						nombre_producto : $("#nombre_producto").val(),
						cantidadMin : $("#cantidadMin").val(),
						cantidad : $("#cantidad").val(),
						precio : $("#precio").val(),
						precio_boliv : $("#precio_boliv").val(),
						descripcion : $("#descripcion").val(),
						cars : $("#cars").val(),
					},
					success(data){
						$("#codigo").val("");
						$("#nombre_producto").val("");
						$("#cantidadMin").val("");
						$("#cantidad").val("");
						$("#precio").val("");
						$("#precio_boliv").val("");
						$("#descripcion").val("");
						$("#cars").val("");
						rellenar(); 
						$('.cerrar').click();
						Swal.fire({
							title: 'producto registrado!',
							text: 'El producto se ha registrado con exito',
							icon: 'success'
						});
					}
		
				})
				$(".error_producto").text("");
			}else{
				e.preventDefault()
			}
		
			})


			/* --- calcular precio en bolivares --- */
			$(document).on('blur', '#precio', function() {
				let precio_bolivares=($("#dolar").val()*$("#precio").val());
				$("#precio_boliv").val(precio_bolivares);

			});




	/* --- EDITAR --- */
	let id 
    // SELECCIONA ITEM
    $(document).on('click', '.editar', function() {
        id = this.id; 
       		$.ajax({
       			method: "post",
       			url: "",
       			dataType: "json",
		        data: {select: "labs", id}, // id : id
		        success(data){
				  console.log(data);
		        	$("#nombreEdit").val(data[0].nombre);
		        	$("#codigoEdit").val(data[0].codigo);
					$("#cantidadMinEdit").val(data[0].cantidadMIn);
		        	$("#cantidadEdit").val(data[0].cantidad);
		        	$("#precioDolarEdit").val(data[0].precioD);
					$("#precioBsEdit").val(data[0].precioB);
		        	$("#marcaEdit").val(data[0].nombre_marca);
					$("#descripcionEdit").val(data[0].descripcion);
		        }
		    })
	});

	// FORMULARIO DE EDITAR

	$("#editar").click((e)=>{
		if (leerDato($("#codigoEdit").val(), $(".error_producto_edit"), "codigo") == true &&
		leerDato($("#nombreEdit").val(), $(".error_producto_edit"), "nombre producto") == true &&
		leerNumero($("#cantidadMinEdit").val(), $(".error_producto_edit"), "cantidad minima") == true &&
		leerNumero($("#cantidadEdit").val(), $(".error_producto_edit"), "cantidad real") == true &&
		leerNumero($("#precioDolarEdit").val(), $(".error_producto_edit"), "precio en dolares") == true &&
		leerNumero($("#precioBsEdit").val(), $(".error_producto_edit"), "precio en bolivares") == true &&
		leerDato($("#marcaEdit").val(), $(".error_producto_edit"), "marca") == true &&
		validarSelect($("#descripcionEdit").val(), $(".error_producto_edit"), "descripcion") == true){

		e.preventDefault();
			// 	ENVÍO DE DATOS
			$.ajax({

				type: "post",
				url: '',
				dataType: 'json',
				data: {
					codigoEdit : $("#codigoEdit").val(),
					nombreEdit : $("#nombreEdit").val(),
					cantidadMinEdit : $("#cantidadMinEdit").val(),
					cantidadEdit : $("#cantidadEdit").val(),
					precioDolarEdit: $("#precioDolarEdit").val(),
					precioBsEdit: $("#precioBsEdit").val(),
					marcaEdit : $("#marcaEdit").val(),
					descripcionEdit : $("#descripcionEdit").val()
				},
				success(data){
					console.log(data)
					rellenar(); 
					$('#editarform').trigger('reset');
					$('.cerrar').click();
					Swal.fire({
    					title: 'producto editado!',
    					text: 'El producto se ha editado',
    					icon: 'success'
    				});

				}
			})
			$(".error_producto_edit").text("");
			}else{
				e.preventDefault()
			}
 
	})

    $(document).on('click', '.borrar', function() {
    	let id = this.id;
    	$('#borrar').click(()=>{
    		$.ajax({
    			type : 'post',
    			url : '',
    			data : {eliminar : 'asd', id},
    			success(data){
    				// console.log(data);
    				rellenar();
    				$('.cerrar').click();
    				Swal.fire({
    					title: 'producto eliminado!',
    					text: 'El producto se ha eliminado',
    					icon: 'success'
    				});
    			}
    		})
    	})
    });
})

