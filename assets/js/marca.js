document.onload = carga();
  function carga() {
      document.getElementById("btn-addProduct").onclick = function (e) {
        if (leerString($("#marca").val(), $(".error_marca"), "marca") == true) {
				e.preventDefault()

        var datos = new FormData();
      datos.append("accion", 'registrar');
      datos.append("marca", $("#marca").val());
      enviaAjax(datos);
      $(".error_marca").text("");
		}else{
		e.preventDefault()
			}
  };

 };


function cargar_datos(valor) {
  var datos = new FormData();
  datos.append("accion", "editar");
  datos.append("id_marca", valor);
  mostrar(datos);
}

function modificar(){
  // if (leerString($("#nombreEdit").val(), $(".error_marca_editar"), "marca") == true) {
  //   e.preventDefault()
    var datos = new FormData();
      datos.append("accion", 'modificar');
      datos.append("nombre_marca", $("#nombreEdit").val());
      datos.append("id_marca", $("#id_marca").val());
      enviaAjax(datos);
      $(".error_marca_editar").text("");
		// }else{
		// e.preventDefault()
		// 	}
}

let id; 
$(document).on('click', '.borrar_marca', function() {
  let id = this.id;
  $('#borrar_marca').click(()=>{
    $.ajax({
      type : 'post',
      url : '',
      data : {eliminar : 'asd', id},
      success(data){
        // console.log(data);
        $('.cerrar_marca').click();
        Swal.fire({
          title: 'marca eliminado!',
          text: 'la marca se ha eliminado en la base de datos.',
          icon: 'success'
        });
      }
    })
  })
});

function enviaAjax(datos) {
  $.ajax({
    url: "",
    type: "POST",
    contentType: false,
    data: datos,
    processData: false,
    cache: false,
    success: (response) => {
      alert(response);
      setTimeout(function () {
          window.location.reload();
        }, 2000);
      
    },
    error: (err) => {
      alert(err)
    },
  });
}


function mostrar(datos) {
  $.ajax({
    async: true,
    url: "",
    type: "POST",
    contentType: false,
    data: datos,
    processData: false,
    cache: false,
    success: (response) => {
      var res = JSON.parse(response);
      $("#id_marca").val(res.id);
      $("#nombreEdit").val(res.nombre);
      $("#Editar").modal("show");
    },
    error: (err) => {
      alert(err);
    },
  });
}

//ocultar y mostrar lista y registro

$("#registrar_mostrar").show();
$("#lista").hide();

$(document).on('click', '.nuevo', function() {
  $("#registrar_mostrar").show();
  $("#lista").hide()
})
$(document).on('click', '.lista', function() {
  $("#registrar_mostrar").hide();
  $("#lista").show()
})