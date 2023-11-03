
$(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

  })

/*=============================================
ACTIVAR Cliente
=============================================*/
$(".tablas").on("click", ".btnActivarC", function(){

  var idCliente = $(this).attr("idCliente");
  var estadoCliente = $(this).attr("estadoCliente");

  var datos = new FormData();
  datos.append("activarIdC", idCliente);
    datos.append("activarCliente", estadoCliente);

    $.ajax({

    url:"ajax/clientes.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){

      }

    })

    if(estadoCliente == 0){

      $(this).removeClass('btn-success');
      $(this).addClass('btn-danger');
      $(this).html('Deshabilitado');
      $(this).attr('estadoCliente',1);

    }else{

      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');
      $(this).html('Activado');
      $(this).attr('estadoCliente',0);

    }

})


$(".tablas").on("click", ".btnSuspender", function(){
  
  
toastr.options = {
  "closeButton": true,
  "newestOnTop": false,
  "progressBar": true
}
  var idClienteS = $(this).attr("idClienteS");

Swal.fire({
  title: '<strong>Motivo de Suspencion:</strong>',
  icon: 'info',
  html:
    ' <input type="text" class="form-control input-lg" id="observacion" placeholder = "ingrese observacion" required>',
  showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Suspender!'
        }).then(function(result) {
        if (result.value) {
          var observacion = $("#observacion").val();

         cadena5="&cliente=" + idClienteS +
            "&observacion=" + observacion;

        $.ajax({
          type:"POST",
          url:"ajax/guardarSuspension.ajax.php",
          data:cadena5,
          success:function(r){
            
            if(r=="ok"){
             toastr.success('¡Suspendido exitosamente!');
             
            }else{
              Swal.fire({
        position: 'top-center',
        icon: 'error',
        title: 'Error al guardar datos',
        text: 'contacte con soporte tecnico',
        showConfirmButton: false,
        timer: 1500
      })
            }
          }

        });

        }
})
                         
})


$(".tablas").on("click", ".btnReconectar", function(){
  
  
toastr.options = {
  "closeButton": true,
  "newestOnTop": false,
  "progressBar": true
}
  var idClienteR = $(this).attr("idClienteR");

Swal.fire({
  title: '<strong>Observacion:</strong>',
  icon: 'info',
  html:
    ' <input type="text" class="form-control input-lg" id="observacion" placeholder = "ingrese observacion" required>',
  showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Reconectar'
        }).then(function(result) {
        if (result.value) {
          var observacion = $("#observacion").val();

         cadena5="&cliente=" + idClienteR +
            "&observacion=" + observacion;

        $.ajax({
          type:"POST",
          url:"ajax/guardarReconexion.ajax.php",
          data:cadena5,
          success:function(r){
            
            if(r=="ok"){
             toastr.success('¡Reconectado exitosamente!');
             
            }else{
              Swal.fire({
        position: 'top-center',
        icon: 'error',
        title: 'Error al guardar datos',
        text: 'contacte con soporte tecnico',
        showConfirmButton: false,
        timer: 1500
      })
            }
          }

        });

        }
})
                         
})

/*=============================================
COBRAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnCobrarClienteCobradorRecibo", function(){

  var idClienteCobrar = $(this).attr("idClienteCobrar");

  var datos = new FormData();
    datos.append("idClienteCobrar", idClienteCobrar);

    $.ajax({

      url:"ajax/clientes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
           $("#cobrarIdCliente").val(respuesta["idcliente"]);
           $("#cobrarIdArea").val(respuesta["idarea"]);
           $("#cobrarIdSector").val(respuesta["idsector"]);
         $("#cobrarNombre").val(respuesta["nombre"]);
          $("#cobrarNit").val(respuesta["nit"]);
          $("#cobrarServicio").val(respuesta["servicio"]);
          $("#cobrarPrecioServicio").val(respuesta["precio"]);
          $("#cobrarPrecioTotal").val(respuesta["precio"]);
          $("#cobrarIdMes").val(respuesta["idmes"]);
          $("#cobrarAno").val(respuesta["ano"]);
          $("#cobrarMes").val(respuesta["mes"]);
          $("#cobrarDireccion").val(respuesta["area"] + ", "+respuesta["sector"]+", "+respuesta["localidad"] +"-"+ respuesta["referencia"] );
    }



    })
})

/*=============================================
COBRAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnCobrarClienteCobradorFacturaTemp", function(){

  var idClienteCobrar = $(this).attr("idClienteImprFacTemp");

  var datos = new FormData();
    datos.append("idClienteCobrar", idClienteCobrar);

    $.ajax({

      url:"ajax/clientes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
           $("#ftCobrarIdCliente").val(respuesta["idcliente"]);
           $("#ftCobrarIdArea").val(respuesta["idarea"]);
           $("#ftCobrarIdSector").val(respuesta["idsector"]);
         $("#ftCobrarNombre").val(respuesta["nombre"]);
          $("#ftCobrarNit").val(respuesta["nit"]);
          $("#ftCobrarServicio").val(respuesta["servicio"]);
          $("#ftCobrarPrecioServicio").val(respuesta["precio"]);
          $("#ftCobrarPrecioTotal").val(respuesta["precio"]);
          $("#ftCobrarIdMes").val(respuesta["idmes"]);
          $("#ftCobrarAno").val(respuesta["ano"]);
          $("#ftCobrarMes").val(respuesta["mes"]);
          $("#ftCobrarDireccion").val(respuesta["area"] + ", "+respuesta["sector"]+", "+respuesta["localidad"] +"-"+ respuesta["referencia"] );
    }



    })
})

/*=============================================
COBRAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnGuardarDatosFac", function(){
  var idClienteFacTemp = $(this).attr("idClienteFacTemp");
 $("#facIdCliente").val(idClienteFacTemp);
})

/*=============================================
boton mas cantidad
=============================================*/
$(".modal").on("click", ".ftbtnMas", function(){

   var x = "";
  var y = ""; 
  var mesActual = Number($("#ftCobrarIdMes").val());
 var cant = Number($("#ftCantidadMeses").val())+1;
 var totalmeses = mesActual + cant;
 var nuevoPrecio =  Number($("#ftCobrarPrecioServicio").val()) * cant; 
    $("#ftCantidadMeses").val(cant);
    $("#ftCobrarPrecioTotal").val(nuevoPrecio);


    if (cant > 1) {
    document.getElementById("ftmenos").disabled = false;
    }

    while(mesActual < totalmeses){

       if (mesActual == 1 ) {
        y = "ENERO";
      }
      if (mesActual == 2 ) {
        y = "FEBRERO";
      }
      if (mesActual == 3 ) {
        y = "MARZO";
      }
      if (mesActual == 4 ) {
        y = "ABRIL";
      }
      if (mesActual == 5 ) {
        y = "MAYO";
      }
      if (mesActual == 6 ) {
        y = "JUNIO";
      }
      if (mesActual == 7 ) {
        y = "JULIO";
      }
      if (mesActual == 8 ) {
        y = "AGOSTO";
      }
      if (mesActual == 9 ) {
        y = "SEPTIEMBRE";
      }
      if (mesActual == 10 ) {
        y = "OCTUBRE";
      }
      if (mesActual == 11 ) {
        y = "NOVIEMBRE";
      }
      if (mesActual == 12 ) {
        y = "DICIEMBRE";
      }
      if (mesActual == 13 ) {
        y = "ENERO";
      }
       if (mesActual == 14 ) {
        y = "FEBRERO";
      }
       if (mesActual == 15 ) {
        y = "MARZO";
      }
       if (mesActual == 16 ) {
        y = "ABRIL";
      }
       if (mesActual == 17 ) {
        y = "MAYO";
      }
       if (mesActual == 18 ) {
        y = "JUNIO";
      }

      x += " / "+ y;

      mesActual ++;

    }

$("#ftCobrarMes").val(x);

})

/*=============================================
boton menos cantidad
=============================================*/
$(".modal").on("click", ".ftbtnMenos", function(){

  var x = "";
  var y = ""; 
  var mesActual = Number($("#ftCobrarIdMes").val());
 var cant = Number($("#ftCantidadMeses").val())-1;  
 var totalmeses = mesActual + cant;  
  var nuevoPrecio =  Number($("#ftCobrarPrecioServicio").val()) * cant; 
    $("#ftCantidadMeses").val(cant);
    $("#ftCobrarPrecioTotal").val(nuevoPrecio);

    if (cant <= 1) {
    document.getElementById("ftmenos").disabled = true;
    }

    while(mesActual < totalmeses){

      if (mesActual == 1 ) {
        y = "ENERO";
      }
      if (mesActual == 2 ) {
        y = "FEBRERO";
      }
      if (mesActual == 3 ) {
        y = "MARZO";
      }
      if (mesActual == 4 ) {
        y = "ABRIL";
      }
      if (mesActual == 5 ) {
        y = "MAYO";
      }
      if (mesActual == 6 ) {
        y = "JUNIO";
      }
      if (mesActual == 7 ) {
        y = "JULIO";
      }
      if (mesActual == 8 ) {
        y = "AGOSTO";
      }
      if (mesActual == 9 ) {
        y = "SEPTIEMBRE";
      }
      if (mesActual == 10 ) {
        y = "OCTUBRE";
      }
      if (mesActual == 11 ) {
        y = "NOVIEMBRE";
      }
      if (mesActual == 12 ) {
        y = "DICIEMBRE";
      }
       if (mesActual == 13 ) {
        y = "ENERO";
      }
       if (mesActual == 14 ) {
        y = "FEBRERO";
      }
       if (mesActual == 15 ) {
        y = "MARZO";
      }
       if (mesActual == 16 ) {
        y = "ABRIL";
      }
       if (mesActual == 17 ) {
        y = "MAYO";
      }
       if (mesActual == 18 ) {
        y = "JUNIO";
      }

      x += " / "+ y;

      mesActual ++;

    }

$("#ftCobrarMes").val(x);
})
/*=============================================
boton mas cantidad
=============================================*/
$(".modal").on("click", ".btnMas", function(){

   var x = "";
  var y = ""; 
  var mesActual = Number($("#cobrarIdMes").val());
 var cant = Number($("#cantidadMeses").val())+1;
 var totalmeses = mesActual + cant;
 var nuevoPrecio =  Number($("#cobrarPrecioServicio").val()) * cant; 
    $("#cantidadMeses").val(cant);
    $("#cobrarPrecioTotal").val(nuevoPrecio);


    if (cant > 1) {
    document.getElementById("menos").disabled = false;
    }

    while(mesActual < totalmeses){

       if (mesActual == 1 ) {
        y = "ENERO";
      }
      if (mesActual == 2 ) {
        y = "FEBRERO";
      }
      if (mesActual == 3 ) {
        y = "MARZO";
      }
      if (mesActual == 4 ) {
        y = "ABRIL";
      }
      if (mesActual == 5 ) {
        y = "MAYO";
      }
      if (mesActual == 6 ) {
        y = "JUNIO";
      }
      if (mesActual == 7 ) {
        y = "JULIO";
      }
      if (mesActual == 8 ) {
        y = "AGOSTO";
      }
      if (mesActual == 9 ) {
        y = "SEPTIEMBRE";
      }
      if (mesActual == 10 ) {
        y = "OCTUBRE";
      }
      if (mesActual == 11 ) {
        y = "NOVIEMBRE";
      }
      if (mesActual == 12 ) {
        y = "DICIEMBRE";
      }
      if (mesActual == 13 ) {
        y = "ENERO";
      }
       if (mesActual == 14 ) {
        y = "FEBRERO";
      }
       if (mesActual == 15 ) {
        y = "MARZO";
      }
       if (mesActual == 16 ) {
        y = "ABRIL";
      }
       if (mesActual == 17 ) {
        y = "MAYO";
      }
       if (mesActual == 18 ) {
        y = "JUNIO";
      }

      x += " / "+ y;

      mesActual ++;

    }

$("#cobrarMes").val(x);

})

/*=============================================
boton menos cantidad
=============================================*/
$(".modal").on("click", ".btnMenos", function(){

  var x = "";
  var y = ""; 
  var mesActual = Number($("#cobrarIdMes").val());
 var cant = Number($("#cantidadMeses").val())-1;  
 var totalmeses = mesActual + cant;  
  var nuevoPrecio =  Number($("#cobrarPrecioServicio").val()) * cant; 
    $("#cantidadMeses").val(cant);
    $("#cobrarPrecioTotal").val(nuevoPrecio);

    if (cant <= 1) {
    document.getElementById("menos").disabled = true;
    }

    while(mesActual < totalmeses){

      if (mesActual == 1 ) {
        y = "ENERO";
      }
      if (mesActual == 2 ) {
        y = "FEBRERO";
      }
      if (mesActual == 3 ) {
        y = "MARZO";
      }
      if (mesActual == 4 ) {
        y = "ABRIL";
      }
      if (mesActual == 5 ) {
        y = "MAYO";
      }
      if (mesActual == 6 ) {
        y = "JUNIO";
      }
      if (mesActual == 7 ) {
        y = "JULIO";
      }
      if (mesActual == 8 ) {
        y = "AGOSTO";
      }
      if (mesActual == 9 ) {
        y = "SEPTIEMBRE";
      }
      if (mesActual == 10 ) {
        y = "OCTUBRE";
      }
      if (mesActual == 11 ) {
        y = "NOVIEMBRE";
      }
      if (mesActual == 12 ) {
        y = "DICIEMBRE";
      }
       if (mesActual == 13 ) {
        y = "ENERO";
      }
       if (mesActual == 14 ) {
        y = "FEBRERO";
      }
       if (mesActual == 15 ) {
        y = "MARZO";
      }
       if (mesActual == 16 ) {
        y = "ABRIL";
      }
       if (mesActual == 17 ) {
        y = "MAYO";
      }
       if (mesActual == 18 ) {
        y = "JUNIO";
      }

      x += " / "+ y;

      mesActual ++;

    }

$("#cobrarMes").val(x);
})





function recargarLista(){

 
    $.ajax({
      type:"POST",
      url:"ajax/municipios.php",
      data:"departamento=" + $('#departamento').val(),
      success:function(r){
        $('#ListaMunicipios').html(r);

      }
    });
  }

 function recargarListaNuevoClienteArea(){

 
    $.ajax({
      type:"POST",
      url:"ajax/sectoresnuevocliente.php",
      data:"nuevoclientearea=" + $('#nuevoclientearea').val(),
      success:function(r){
        $('#ListaSectoresNuevoCliente').html(r);

      }
    });
  }



  function recargarLista2(){

 
    $.ajax({
      type:"POST",
      url:"ajax/municipios2.php",
      data:"departamento2=" + $('#departamento2').val(),
      success:function(r){
        $('#ListaMunicipios2').html(r);

      }
    });
  }

  /*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEliminarCliente", function(){

  var idCliente = $(this).attr("idCliente");
  
  Swal.fire({
        title: '¿Está seguro de borrar el cliente?',
        text: "¡Si no lo está puede cancelar la acción!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Si, borrar cliente!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?ruta=clientes&idCliente="+idCliente;
        }

  })

})

/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablas").on("click", ".btnEditarCliente", function(){

  var idCliente = $(this).attr("idCliente");

  var datos = new FormData();
    datos.append("idCliente", idCliente);

    $.ajax({

      url:"ajax/clientes.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(respuesta){
      
           $("#id").val(respuesta["id"]);
           $("#editarMes").html(respuesta["id_mes"]);
      $("#editarMes").val(respuesta["id_mes"]);
      $("#editarServicio").html(respuesta["id_servicio"]);
      $("#editarServicio").val(respuesta["id_servicio"]);
         $("#editarNombre").val(respuesta["nombre"]);
         $("#editarTelefono").val(respuesta["telefono"]);
         $("#editarPrecio").val(respuesta["precio"]);
         $("#editarObservacion").val(respuesta["observacion"]);
         $("#editarFechaInstalacion").val(respuesta["fecha_instalacion"]);
         $("#editarAno").val(respuesta["ano"]);
          $("#editarNit").val(respuesta["NIT"]);
           $("#editarLocalidad").val(respuesta["localidad"]);
         $("#editarReferencia").val(respuesta["referencia"]);
         $("#editarArea").val(respuesta["id_area"]);
         $("#editarSector").val(respuesta["id_sector"]);
         $("#editarArea2").val(respuesta["id_area"]);
         $("#editarSector2").val(respuesta["id_sector"]);
    }

    })

})
