$(document).ready(function () {


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
				lista.forEach(row => {
					
					tabla += `
					<tr>
					<td>${row.codigoproveedores}</td>
					<td>${row.nombre}</td>  
                    <td>${row.correo}</td>
					<td>${row.telefono}</td>                      
					<td class="opcciones">
						<button id="${row.codigoproveedores}" class="btn btn-success editar" data-bs-toggle="modal" data-bs-target="#Editar"><img src="assets/img/lapiz.png"></button>
						<button id="${row.codigoproveedores}"class="btn btn-danger borrar" data-bs-toggle="modal" data-bs-target="#Borrar"><img src="assets/img/basura.png"></button>
					</td>
					`
				})
				$('#tbody').html(tabla);
			}
		})
	}


    // REGISTRAR
    $("#registrar").click((e) => {
		if (leerDato($("#codigo_proveedor").val(), $(".error_proveedores"), "codigo") == true &&
			leerString($("#nombre").val(), $(".error_proveedores"), "nombre") == true &&
			leerNumero($("#telefono").val(), $(".error_proveedores"), "telefono") == true &&
			leerCorreo($("#email").val(), $(".error_proveedores"), "correo") == true ) {
				e.preventDefault
        $.ajax({
            type: "post",
            url: '',
            data: {
                codigo_proveedor: $("#codigo_proveedor").val(),
                nombre: $("#nombre").val(),
                telefono: $("#telefono").val(),
                email: $("#email").val()
            },
            success(data) {
                $("#codigo_proveedor").val("");
                $("#nombre").val("");
                $("#telefono").val("");
                $("#email").val("");
                 rellenar();
                Swal.fire({
                    title: 'proveedor registrado!',
                    text: 'el proveedor se ha registrado con exito',
                    icon: 'success'
                });
            }

        })
		$(".error_proveedores").text("");
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
                    $("#editCodigo_proveedor").val(data[0].codigoproveedores);
                    $("#editNombre").val(data[0].nombre);
                    $("#editTelefono").val(data[0].telefono);
                    $("#editEmail").val(data[0].correo);
		        }
		    })
	});

	// FORMULARIO DE EDITAR

	$("#editar").click(()=>{

			// 	ENVÍO DE DATOS
			$.ajax({

				type: "post",
				url: '',
				dataType: 'json',
				data: {
                    editCodigo_proveedor : $("#editCodigo_proveedor").val(),                  
                    editNombre : $("#editNombre").val(),
                    editTelefono : $("#editTelefono").val(),
                    editEmail : $("#editEmail").val()
				},
				success(){
					rellenar(); 
					$('#editarform').trigger('reset');
					$('.cerrar').click();
				}
			})
 
	})
	
	$(document).on('click', '.borrar', function() {
		id = this.id; 
    });
    $('#borrar').click(()=>{
    	$.ajax({
    		type : 'post',
    		url : '',
    		data : {eliminar : 'asd', id},
    		success(){
    				rellenar();
    				$('.cerrar').click();
    		}
    	})
    })



	//ocultar y mostrar lista y registro

	$("#registrar_proveedores").show();
	$("#lista").hide();

	$(".nuevo").click(()=>{
		$("#registrar_proveedores").show();
		$("#lista").hide()
	})
	$(".lista").click(()=>{
		$("#registrar_proveedores").hide();
		$("#lista").show()
	})

});

	
	

