$(function() {
    var Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

  })
/*=============================================
CAMBIAR ESTADO SOLICITUD
=============================================*/
$(".tablas").on("click", ".btnEstado", function(){
		
	console.log("oook");

	 var idSol = $(this).attr("idSol");
	 var estado = $(this).attr("estado");
  Swal.fire({
    title: '¿Esta seguro de cambiar el estado de la solicitud?',
    text: "¡Si no lo está puede cancelar la accíón!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, cambiar estado!'
  }).then(function(result){

    if(result.value){

      window.location = "index.php?ruta=vista-tecnico-solicitud&idSol="+idSol+"&estado="+estado;

    }

  })
})
/*=============================================
FINALIZAR SOLICITUD
=============================================*/
$(".tablas").on("click", ".btnFinalizar", function(){
	console.log("ok");
 
 	 var idSol = $(this).attr("idSol");
	 var estado = $(this).attr("estado"); 
  
toastr.options = {
  "closeButton": true,
  "newestOnTop": false,
  "progressBar": true
}

Swal.fire({
  title: '<strong>Especifique como resolvió:</strong>',
  icon: 'info',
  html:
    ' <input type="text" class="form-control input-lg" id="observacion" placeholder = "ingrese observacion" required>',
  showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Finalizar!'
        }).then(function(result) {
        if (result.value) {
          var observacion = $("#observacion").val();

         cadena5="&idSol=" + idSol +
            "&estado=" + estado+"&observacion=" + observacion;

        $.ajax({
          type:"POST",
          url:"ajax/guardarComentario.ajax.php",
          data:cadena5,
          success:function(r){
            console.log(r);
            if(r=="ok"){
             toastr.success('¡Solicitud Finalizada Exitosamente!');
             
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

