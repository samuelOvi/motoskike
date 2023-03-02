var TAX_RATE = parseFloat ($('#config_tax_rate').val());
var total_bs= parseFloat($("#config_tax_rate2").val());
var total_global =0;
var total_sin_iva = 0;
var total_todo = 0;
var bolivares=0;
var TAX_SETTING = false;
$('body').addClass('hidetax hidenote hidedate');

function calculate(){

  var total_price = 0,
      total_tax = 0;
      
  
  console.log('CALCULATING - Tax Rate:'+TAX_RATE);

  $('.invoicelist-body tbody tr').each( function(){
    var row = $(this),
        rate   = row.find('.rate input').val(),
        amount = row.find('.amount input').val();
    
    var sum = rate * amount;
    var tax = ((sum / (TAX_RATE+100) ) * TAX_RATE);
    
    
    total_price = total_price + sum;
    total_tax = total_tax + tax;
    total_todo = total_price + total_tax;
    total_sin_iva=total_price;
    
    row.find('.sum').text( sum.toFixed(2) );
    row.find('.tax').text( tax.toFixed(2) );   
  });

  $('#total_price').text(total_price.toFixed(0));
  $('#total_tax').text(total_tax.toFixed(0));
  total_global=total_price;
  bolivares = total_global*total_bs;
}

// ACTIAR IVA
$('#config_tax').on('click', function () {
  var activar_iva = $('#config_tax').prop('checked');
  if (activar_iva == true) {
    $(".taxrelated").css('display', 'block')
   // $('#total_price').text(total_todo.toFixed(0));
  } else {
    $(".taxrelated").css('display', 'none');
    //$('#total_price').text(total_sin_iva.toFixed(0));
  }
})
//ACTIVAR TASA DOLAR
$('#config_tax2').on('click', function () {
  var activar_tasa = $('#config_tax2').prop('checked');
  if (activar_tasa == true) {
   $(".taxrelated2").css('display', 'block')
   $('#total_price').text((bolivares).toFixed(0));
   $('#moneda').text("BS")
  } else {
    $(".taxrelated2").css('display','none');
    $('#total_price').text(total_global.toFixed(0));
    $('#moneda').text("$");
  }
})

//validar datos cliente
$('.boton').on('click', function () {
  var f = new Date();
  $(".ocultar_cliente").css("display", "block")
  let nombre = $(".Ncliente").val().toUpperCase();
  let cedula = $(".Ncedula").val();
  let telefono = $(".Ntelefono").val();

  if (leerRif(cedula,$(".error")) == true && leerString(nombre,$(".error"),"nombre") == true &&  leerNumero(telefono,$(".error"),"telefono") == true) {
    $(".clientee").text("NOMBRE: " + nombre)
    $(".cedula").text("RIF: " + cedula)
    $(".telefono").text("TELEFONO: " + telefono)
    $(".fecha").text("fecha:" +f.getDate() + "-"+ f.getMonth()+ "-" +f.getFullYear())
    $("input")[2].value = "";
    $("input")[3].value = "";
    $("input")[4].value = "";
    $(".error").hide();
  }
})




var newRow = `   <tr>
<td width="5%"><a class="control removeRow" href="#">x</a></td> 
<td width="25%" ><input placeholder="nombre producto" type="text" value=""></td>
<td width="15%" ><input type="number" placeholder="codigo" value=""></td>
<td width="8%" >
<select class="cars" name="cars">
        <?php 
                         if(isset( $mostrarMarcas)) {
                         foreach ($mostrarMarcas as $data){
          
                        ?>
  
    <option value="<?php echo $data->id_marca?>"><?php echo $data->nombre_marca?></option>

    <?php 
                       }
                       }else{
                         " "; 
                           }
                       ?>	
               </select>
</td>
<td width="15%" class="amount"><input type="number" placeholder="cantidad" value=""></td>
<td width="15%" class="rate"><input type="number" placeholder="precio" value=""></td>
<td class="tax taxrelated">11.39</td>
<td width="15%" class="sum">0</td>

</tr>`;

$('.invoicelist-body').on('keyup','input',function(){
  calculate();
});

$('.newRow').on('click',function(e){
  $('.invoicelist-body tbody').append(newRow);
  e.preventDefault();
  calculate();
});

$('body').on('click','.removeRow',function(e){
  $(this).closest('tr').remove();
  e.preventDefault();
  calculate();
});

// $('#config_note').on('change',function(){
//   $('body').toggleClass('shownote hidenote');
// });
$('#config_tax').on('change',function(){
  TAX_SETTING = !TAX_SETTING;
  $('body').toggleClass('showtax hidetax');
});

$('#config_tax_rate').on('keyup',function(){
  TAX_RATE = parseFloat($(this).val());
  if (TAX_RATE < 0 || TAX_RATE > 100){
    TAX_RATE = 0;
  }
  console.log('Changed tax rate to: '+TAX_RATE);
  calculate();
});

$('#config_tax_rate2').on('keyup',function(){
  total_bs = parseFloat($(this).val());
  if (total_bs < 0 || total_bs > 100){
    total_bs = 0;
  }
  console.log('total volivares: '+total_bs);
  calculate();
});


$('#config_date').on('change',function(){
  $('body').toggleClass('hidedate showdate');
});


init_date();
calculate();