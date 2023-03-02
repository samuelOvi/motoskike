
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
                <td>${row.nombre}</td>
                <td>${row.correo}</td>  
                <td>${row.rol}</td>
                <td>${row.clave}</td>                      
                <td class="opcciones">
                    <button id="${row.correo}" class="btn btn-success editar" data-bs-toggle="modal" data-bs-target="#Editar"><img src="assets/img/lapiz.png"></button>
                    <button id="${row.correo}"class="btn btn-danger borrar" data-bs-toggle="modal" data-bs-target="#Borrar"><img src="assets/img/basura.png"></button>
                </td>
                `
            })
            $('#tbody').html(tabla);
        }
    })
}

        // REGISTRAR
        $("#registrar").click((e)=>{
            if (leerString($("#nombre").val(), $(".error_usuario"), "nombre") == true &&
                leerCorreo($("#correo").val(), $(".error_usuario")) == true &&
                leerString($("#rol").val(), $(".error_usuario"), "rol") == true &&
                leerContraseña($("#clave").val(), $(".error_usuario"), "contraseña") == true &&
                leerRepContraseña($("#clave").val(), $("#repClave").val(), $(".error_usuario")) == true) {
            e.preventDefault
            $.ajax({
                type: "post",
                url: '',
                data: {
                    correo : $("#correo").val(),
                    nombre : $("#nombre").val(),
                    clave : $("#clave").val(),
                    rol : $("#rol").val()
                },
                success(data){
                    $("#nombre").val("");
                    $("#correo").val("");
                    $("#rol").val("");
                    $("#clave").val("");
                    $("#repClave").val("");
                    rellenar(); 
                    Swal.fire({
                        title: 'usuario registrado!',
                        text: 'El Cliente se ha registrado con exito',
                        icon: 'success'
                    });
                },
    
            })
            $(".error_usuario").text("");
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
                    $("#nombreEdit").val(data[0].nombre);
                    $("#correoEdit").val(data[0].correo);
                    $("#rolEdit").val(data[0].rol);
                    $("#claveEdit").val(data[0].clave);
		        }
		    })
	});

// FORMULARIO DE EDITAR

$("#editar").click((e)=>{
    if (leerString($("#nombreEdit").val(), $(".error_usuario_edit"), "nombre") == true &&
    leerCorreo($("#correoEdit").val(), $(".error_usuario_edit")) == true &&
    leerString($("#rolEdit").val(), $(".error_usuario_edit"), "rol") == true &&
    leerContraseña($("#claveEdit").val(), $(".error_usuario_edit"), "contraseña") == true) {

    e.preventDefault();
    $.ajax({

        type: "post",
        url: '',
        dataType: 'json',
        data: {
            nombreEdit : $("#nombreEdit").val(),
            claveEdit : $("#claveEdit").val(),
            rolEdit : $("#rolEdit").val(),
            correoEdit : $("#correoEdit").val()
        },
        success(data){
            console.log(data)
            $('#editarform').trigger('reset');
            $('.cerrar').click();
            rellenar(); 

        }
    })
    $(".error_usuario_edit").text("");
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