$(document).ready(function () {
  cargar_datos();
  function cargar_datos() {
    $.ajax({
      method: "POST",
      url: " ",
      dataType: "json",
      data: { mostrar: "venta" },
      success(data) {
        let lista = data;
        let tabla;
        lista.forEach(row => {
          tabla += `
					<tr>
					<td>${row.fecha}</td>
					<td>${row.cedula_cliente}</td>     
        	<td><button type="button" class="btn btn-success  venta_detalle" id="${row.numero_venta}" data-bs-toggle="modal" data-bs-target="#detalleVenta">Productos</button></td>                 
					<td>${row.moton_total}</td>   
          <td class="opcciones d-flex justify-content-end">
          <button id="${row.numero_venta}"class="btn btn-danger borrar" data-bs-toggle="modal" data-bs-target="#Borrar"><img src="assets/img/basura.png"></button>
					</td>
					`
        })
        $('#tbody').html(tabla);
      }
    })
  }

  let id;

  // detalles venta producto
  $(document).on('click', '.venta_detalle', function () {
    id = this.id;
    $.post('', { detalleV: 'detV', id }, function (data) {
      let lista = JSON.parse(data);
      let tabla;
      lista.forEach(row => {
        tabla += `
           <tr>
             <td>${row.nombre}</td>
             <td>${row.cantidadDetalle}</td>
             <td>${row.precio}</td>         
             <td>${row.subtotal}</td>                      
           </tr>
          `
      })
      $('#ventaNombre').text(`Numero de Factura #${lista[0].numero_venta}.`);
      $('#bodyDetalle').html(tabla);

    })
  })

  // FUNCION calcular
  var iva = parseFloat($('#config_iva').val());
  opciones_selecionar();
  calcular();

  function calcular() {
    let total_price = 0,
      total_tax = 0;

    $('.table-body tbody tr').each(function () {
      let row = $(this),
        rate = row.find('.rate input').val(),
        amount = row.find('.amount input').val();
      let sum = rate * amount;
      let tax = ("0." + iva) * sum;
      total_price = total_price + sum;
      total_tax = total_tax + tax;
      row.find('.sum').text(sum.toFixed(2));
      row.find('.tax').text(tax.toFixed(2));
    });

    let precioTotal = (total_price + total_tax).toFixed(2);
    let ivatotal = total_tax.toFixed(2);
    let total = total_price.toFixed(2);
    $('#montos').text(`IVA: ${ivatotal} - Total: ${total}`)
    $('#montos2').text(`Total + IVA: ${precioTotal}`)
    $('#monto').val(precioTotal)
  }

  //  rellena los select de las filas de productos
  function opciones_selecionar() {
    $.ajax({
      url: '',
      method: 'POST',
      dataType: 'json',
      data: {
        select: "Prod"
      },
      success(data) {
        let option = ""
        data.forEach((row) => {
          option += `<option value="${row.codigo}">${row.nombre}</option>`
        })
        $('.select-productos').each(function () {
          if (this.children.length == 1) {
            cambio
            $(this).append(option);
            $(this).chosen({
              width: '25vw',
              placeholder_text_single: "Selecciona un producto",
              search_contains: true,
              allow_single_deselect: true,
            });
            calcular();
          }
        })
      }
    })
  }

  let producto, select, cantidad, stock;
  //Selecciona cada producto 
  cambio();
  function cambio() {
    $('.select-productos').change(function () {
      select = $(this);
      producto = $(this).val();
      cantidad = select.closest('tr').find('.amount input');
      rellenar_CantPrecio();

    })
  }
  //  Rellena los inputs con el precio y cantidad de cada producto
  function rellenar_CantPrecio() {
    $.getJSON('', { producto, fill: "data" }, function (data) {

      let precio = select.closest('tr').find('.rate input');
      stock = data[0].cantidad;
      cantidad.val(data[0].cantidad);
      cantidad.attr("placeholder", cantidad);
      precio.val(data[0].precioD);
      calcular();
      validarCantidad(cantidad, stock);
    })
  }

  function validarCantidad(input, max) {
    $(input).keyup(() => {
      stock = Number(max);
      num = Number(input.val());
      if (num > stock || num === 0) {
        input.css({ "border": "solid 1px", "border-color": "red" })
        input.attr("valid", "false")
      } else {
        input.css({ 'border': 'none' })
        input.attr("valid", "true")
      }
    })
  }

  //  buscador con selec bootstrap
  $(".select2").select2({
    theme: 'bootstrap-5',
    dropdownParent: $('#Agregar .modal-body'),
  })

  //  fila que se inserta
  let newRow = `<tr>
          <td width="1%"><a class="removeRow a-asd"  href="#">x</a></td>
          <td width='30%'> 
          <select class="select-productos select-asd">
            <option></option>
          </select>
          </td>
          <td width='10%' class="amount"><input class="select-asd stock" type="number" placeholder="cantidad" value=""/></td>
          <td width='10%' class="rate"><input class="select-asd" type="number" disabled value="" /></td>
          <td width='10%'class="tax"></td>
          <td width='10%' class="sum"></td>
          </tr>`;

  //Validar que no se repita 
  function NoRepetir() {
    $('.select-productos').change(function () {
      let producto;

      $('.select-productos').each(function () {

        producto = $(this).val();
        let count = 0;
        $('.select-productos').each(function () {

          if (producto != '') {
            if (producto == $(this).val()) {
              count++
              if (count >= 2) {
                $(this).closest('tr').attr('style', 'border-color: red;')
                $(this).attr('valid', 'false');
                $('#error').text('No pueden haber productos repetidos');
              } else {
                $(this).attr('valid', 'true');
              }
            }
          }

        });

      })
      $('.select-productos').each(function () {
        if ($(this).is('[valid="true"]')) {
          $(this).closest('tr').attr('style', 'border-color: none;');
        }

      })
      if (!$('.select-productos').is('[valid="false"]')) {
        $('#error').text('');
      }

    })

  }

  function filaAgregar() {
    $('#ASD').append(newRow);
    opciones_selecionar();
    cambio();
    NoRepetir()
  }

  // Agregar fila para insertar producto
  $('.newRow').on('click', function (e) {
    filaAgregar();
  });


  // ELiminar fila
  $('body').on('click', '.removeRow', function (e) {
    $(this).closest('tr').remove();
    calcular();
  });

  //Evento keyup para que funcione calcular()
  $('.table-body').on('keyup', 'input', function () {
    calcular();
  })

  //configuracion de IVA
  $('#config_iva').on('keyup', function () {
    iva = parseFloat($(this).val())

    if (iva < 0 || iva > 100) {
      iva = 0
    }
    calcular();
  })

  // venta registrar
  let click = 0;
  setInterval(() => { click = 0 }, 2000);
  $("#registrar").click((e) => {
    e.preventDefault();
    if (click >= 1) { throw new Error('Spam de clicks'); }
    let cedula = validarSelec2($(".select2"), $(".select2-selection"), $("#error1"), "Error de Cedula");

    $('.select2').change(function () {
      let select2 = $(this).val()
      if (select2 == " " || select2 == null) {
        return cedula = false
      } else {
        $('#error1').text(" ");
        $(".select2-selection").attr("style", "border-color: none;")
        $(".select2-selection").attr("style", "backgraund-image: none;");
        return cedula = true;
      }
    })
    let montoT = leerDato($("#monto"), $("#error3"), "Error de monto");

    let vproductos = true;

    $('.table-body tbody tr').each(function () {
      let producto = $(this).find('.select-productos').val();
      if (producto == "" || producto == null) {
        vproductos = false;
        $('#error').text('No debe haber productos vacíos.')
      }
    })

    let repetidos = true
    if ($('.select-productos').is('[valid="false"]')) {
      repetidos = false
    } else if (!$('.select-productos').is('[valid="false"]')) {
      repetidos = true
    }
    let vstock = true;
    if ($('.stock').is('[valid="false"]')) {
      vstock = false
      $('#error').text('Cantidad inválida.')
    } else if ($('.stock').val() == "" || $('.stock').val() === '0') {
      vstock = false
      $('#error').text('Seleccione un producto');
    }

    if (cedula == true && montoT == true && vproductos == true && vstock == true && repetidos) {

      $.post('', {
        cedula: $('#cedula').val(),
        montoT: $('#monto').val(),
        dolar: $('#dolar').val(),
        fecha: fechaActual()
      },
        function (data) {
          let idVenta = JSON.parse(data);
          enviarProduct(idVenta.id);
          cargar_datos();
          $('.select2').val(0).trigger('change');
          $('#agregarform').trigger('reset');
          $('.cerrar').click();
          $('.removeRow').click();
          $('#error').text('');
          filaAgregar()
        })
    }
    click++;
  })

  //función para enviar productos uno por uno
  function enviarProduct(id) {
    $('#Agregar tbody tr').each(function () {
      let producto = $(this).find('.select-productos').val();
      let cantidad = $(this).find('.amount input').val();
      let precio = $(this).find('.rate input').val();
      let subtotal = $(this).find('.sum').text();
      $.post("", { precio, cantidad, subtotal, producto, id })

    })
  }

  $('#cerrar').click(() => {
    $('.select2').val(0).trigger('change');
    $('#agregarform').trigger('reset');
    $('.removeRow').click();
    $('#error').text('');
    filaAgregar() // 
  })

  // eliminar venta
  $(document).on('click', '.borrar', function () {
    id = this.id;
  })

  $("#delete").click(() => {
    $.ajax({
      type: "POST",
      url: '',
      data: { eliminar: "asd", id },
      success(data) {
        cargar_datos();
        $('.cerrar').click();
      }
    })
    click++
  })

});