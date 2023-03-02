
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
				let lista = data;
				let tabla;
				console.log(lista);
				lista.forEach(row => {
					
					tabla += `
					<tr>
					<td>${row.cedula}</td>
					<td>${row.nombre}</td>  
                    <td>${row.apellido}</td>
					<td>${row.telefono}</td>                      
					<td class="opcciones">
						<button id="${row.cedula}" class="btn btn-success editar" data-bs-toggle="modal" data-bs-target="#Editar"><img src="assets/img/lapiz.png"></button>
						<button id="${row.cedula}"class="btn btn-danger borrar" data-bs-toggle="modal" data-bs-target="#Borrar"><img src="assets/img/basura.png"></button>
					</td>
					`
				})
				$('#tbody_cliente').html(tabla);
			}
		})
	}

			// REGISTRAR
			$("#registrar").click((e)=>{
				if (leerNumero($("#cedula").val(), $(".error_cliente"), "cedula") == true &&
					leerString($("#nombre").val(), $(".error_cliente"), "nombre") == true &&
					leerString($("#apellido").val(), $(".error_cliente"), "apellido") == true &&
					leerNumero($("#telefono").val(), $(".error_cliente"), "telefono") == true) {
				e.preventDefault
				$.ajax({
					type: "post",
					url: '',
					data: {
						cedula : $("#cedula").val(),
						nombre : $("#nombre").val(),
                        apellido : $("#apellido").val(),
						telefono : $("#telefono").val()
					},
					success(data){
                        $("#cedula").val("");
                        $("#nombre").val("");
                        $("#apellido").val("");
                        $("#telefono").val("");
						rellenar(); 
						Swal.fire({
							title: 'Cliente registrado!',
							text: 'El Cliente se ha registrado con exito',
							icon: 'success'
						});
					},
		
				})
				$(".error_cliente").text("");
				}else{
				e.preventDefault()
				}
		
			})

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
                    $("#cedulaEdit").val(data[0].cedula);
                    $("#nombreEdit").val(data[0].nombre);
                    $("#apellidoEdit").val(data[0].apellido);
                    $("#telefonoEdit").val(data[0].telefono);
		        }
		    })
	});

	// FORMULARIO DE EDITAR

	$("#editar").click((e)=>{
		if (leerNumero($("#cedulaEdit").val(), $(".error_cliente_edit"), "cedula") == true &&
		leerString($("#nombreEdit").val(), $(".error_cliente_edit"), "nombre") == true &&
		leerString($("#apellidoEdit").val(), $(".error_cliente_edit"), "apellido") == true &&
		leerNumero($("#telefonoEdit").val(), $(".error_cliente_edit"), "telefono") == true) {

		e.preventDefault();
		console.log('aaaaaa')
		$.ajax({

			type: "post",
			url: '',
			dataType: 'json',
			data: {
				cedulaEdit : $("#cedulaEdit").val(),
				nombreEdit : $("#nombreEdit").val(),
				apellidoEdit : $("#apellidoEdit").val(),
				telefonoEdit : $("#telefonoEdit").val(),
			},
			success(data){
				console.log(data)
				$('#editarform').trigger('reset');
				$('.cerrar').click();
				rellenar(); 

			}
		})
		$(".error_cliente_edit").text("");
		}else{
		e.preventDefault()
			}
	})

    $(document).on('click', '.borrar', function() {
    	id = this.id;
    });
    $('#borrar').click(()=>{
    	$.ajax({
    		type : 'post',
    		url : '',
    		data : {eliminar : 'asd', id},
    		success(data){
    				// console.log(data);
    				rellenar();
    				$('.cerrar').click();
    				alert('borrao')
    		}
    	})
    })





})
