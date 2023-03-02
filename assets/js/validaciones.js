//variables
let name = document.getElementById("name").value;
let cedula = document.getElementById("cedula").value;
let numPas = document.getElementById("numPas").value;
let numRif = document.getElementById("numRif").value;
let email = document.getElementById("email").value;
let phone = document.getElementById("phone").value;
let numBoleto = document.getElementById("numBoleto").value;
let numVuelo = document.getElementById("numVuelo").value;
let aeroOrigen = document.getElementById("aeroOrigen").value;
let aeroDestino = document.getElementById("aeroDestino").value;
let fecha = document.getElementById("fecha").value;
let hora = document.getElementById("hora").value;
let codVendedor = document.getElementById("codVendedor").value;
let agencia = document.getElementById("agencia").value;
let fecVenta = document.getElementById("fecVenta").value;
let horaVenta = document.getElementById("horaVenta").value;
let visa = document.getElementById("visa").value;
let amex = document.getElementById("amex").value;
let mastercard = document.getElementById("mastercard").value;
let cardnumber = document.getElementById("cardnumber").value;
let secure = document.getElementById("secure").value;
let namecard = document.getElementById("namecard").value;
let montoPago = document.getElementById("montoPago").value;




function leerNombre(parametro, mensaje) {
	if (parametro == null || parametro == "") {
		alert(mensaje + " debe intruducir el Nombre")

		return false
	} else if (!isNaN(parametro)) {
		alert(mensaje + " el nombre debe ser solo letras")

		return false
	} else {
		return true
	}
}

function leerRif(parametro, div) {
	if (parametro == null || parametro == "") {
		div.text(" debe intruducir el rif o cedula")

		return false
	} else if (isNaN(parametro)) {
		div.text("el rif o cedula debe ser solo numeros")

		return false
	} else if (parametro.length < 5) {
		div.text(" el rif o cedula debe tener mas de 5 digitos")
	} else {
		return true
	}
}

function leerDireccion(parametro, div, mensaje) {
	if (parametro == null || parametro == "") {
		div.text(mensaje + " debe intruducir la direccion")

		return false
	} else if (parametro.length < 3) {
		div.text(mensaje + "debe introducir una direccion valida")

		return false
	} else {
		return true
	}
}


function leerString(parametro, div, mensaje) {
	if (parametro == null || parametro == "") {
		div.text("debe intruducir el " + mensaje)

		return false
	} else if (!isNaN(parametro)) {
		div.text(mensaje + " debe ser solo letras")

		return false
	} else {
		return true
	}
}

function leerDato(parametro, div, mensaje) {
	if (parametro == null || parametro == "") {
		div.text("debe intruducir el " + mensaje)
		return false
	}else {
		return true
	}
}

function leerNumero(parametro, div, mensaje) {
	if (parametro == null || parametro == "") {
		div.text("debe intruducir el " + mensaje)
		return false
	} else if (isNaN(parametro)) {
		div.text(mensaje + " debe ser solo numeros")
		return false
	} else {
		return true
	}
}

function leerfecha(parametro, div, mensaje) {
	if (parametro == null || parametro == "") {
		div.text("debe intruducir el " + mensaje)
		return false
	}else {
		return true
	}
}

function leerCorreo(parametro, div) {
	//campo = event.target;
	//valido = document.getElementById('emailOK');
	emailRegex = /^([\da-z_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/;
	//Se muestra un texto a modo de ejemplo, luego va a ser un icono
	if (emailRegex.test(parametro)) {
		console.log("correo valido")
		return true
	} else {
		div.text("correo incorrecto");
		return false
	}
}

function leerContraseña(parametro, div, mensaje) {
	if (parametro == null || parametro == "") {
		div.text(mensaje, "debe intruducir el itens")

		return false
	} else if (parametro.length < 8) {
		div.text(mensaje + " debe tener minimo 8 caracteres")

		return false
	} else {
		return true
	}
}

function leerRepContraseña(parametro, parametroDos, div) {
	if (parametro != parametroDos) {
		div.text("la contraseña y repetir contraseña no son iguales");

		return false
	} else {
		return true
	}
}

function validarSelec2(input, select , div, mensaje){ 
	parametro = input.val();
	if (parametro==null||parametro=="") {
	  div.text(mensaje+" debe introducir datos.") 
	  select.attr("style","border-color: red;")
	  select.attr("style","border-color: red; background-image: url(assets/img/Triangulo_exclamacion.png); background-repeat: no-repeat; background-position: right calc(0.375em + 0.1875rem) center; background-size: calc(0.75em + 0.375rem) calc(0.75em + 0.375rem);");                           
	  return false
	}else{
	  div.text(" ");
	  select.attr("style","border-color: none;")
	  select.attr("style","backgraund-image: none;");
	  return true
	}
  }

  function validarSelect(parametro,div,mensaje){
	if (parametro == ''|| parametro==null) {
        div.text('Debe seleccionar una '+ mensaje);
		return false

    } else {
		return true
    }
  }

function fechaActual(){
	var now = new Date();
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);
    var today = now.getFullYear()+"-"+(month)+"-"+(day);
  //var today = (day)+"-"+(month)+"-"+now.getFullYear();
	return today;
}