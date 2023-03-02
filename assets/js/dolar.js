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
					<td>${row.fecha}</td>
					<td>${row.precio_dolar}</td>                      
					<td class="opcciones">
						<button id="${row.id_dolar}" class="btn btn-success editar" data-bs-toggle="modal" data-bs-target="#Editar"><img src="assets/img/lapiz.png"></button>
						<button id="${row.id_dolar}"class="btn btn-danger borrar" data-bs-toggle="modal" data-bs-target="#Borrar"><img src="assets/img/basura.png"></button>
					</td>
					`
				})
				$('#tbody_dolar').html(tabla);
			}
		})
	}

			// REGISTRAR
			$("#registrar").click((e)=>{
				if (leerNumero($("#dolar").val(), $(".error_dolar"), "dolar") == true &&  
				leerfecha($("#fechadolar").val(), $(".error_dolar"), "fecha")== true) {
				e.preventDefault
				$.ajax({
					type: "post",
					url: '',
					data: {
						dolar : $("#dolar").val(),
						fechadolar : $("#fechadolar").val()
					},
					success(data){
						$("#dolar").val("");
						rellenar(); 
						Swal.fire({
							title: 'dolar registrado!',
							text: 'El dolar se ha registrado con exito',
							icon: 'success'
						});
					}
		
				})
				$(".error_dolar").text("");
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
		        	$("#fechaEdit").val(data[0].fecha);
		        	$("#precioEdit").val(data[0].precio_dolar);
		        }
		    })
	});

	// FORMULARIO DE EDITAR

	$("#editar").click((e)=>{
		if (leerNumero($("#precioEdit").val(), $(".error_dolar_editar"), "dolar") == true &&  
		    leerfecha($("#fechaEdit").val(), $(".error_dolar_editar"), "fecha")== true) {

		e.preventDefault();
			// 	ENVÍO DE DATOS
			$.ajax({

				type: "post",
				url: '',
				dataType: 'json',
				data: {
					precioEdit : $("#precioEdit").val(),
                    fechaEdit : $("#fechaEdit").val(),
					id
				},
				success(data){
					console.log(data)
					rellenar(); 
					$('#editarform').trigger('reset');
					$('.cerrar').click();

				}
			})
			$(".error_dolar_editar").text("");
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
    					title: 'dolar eliminado!',
    					text: 'El dolar se ha eliminado en la base de datos.',
    					icon: 'success'
    				});
    			}
    		})
    	})
    });


	//ocultar y mostrar lista y registro

	$("#registrar_dolar").show();
	$("#lista").hide();

	$(".nuevo").click(()=>{
		$("#registrar_dolar").show();
		$("#lista").hide()
	})
	$(".lista").click(()=>{
		$("#registrar_dolar").hide();
		$("#lista").show()
	})
	
})

