<?php

if($_SESSION["perfil"] == "2"){

  echo '<script>

    window.location = "vista-tecnico-solicitud";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar clientes
    
    </h1>


  </section>

  <section class="content">


      <div class="container-fluid">

     </div>
      <div class="container-fluid">

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                 
                 
              </div>
              <!-- /.card-header -->
              <div class="card-body">
		<?php
       		echo'<input type="hidden" id="area" value="'.$_SESSION["clientes-area"].'">';
        ?>
       <table class="table table-bordered table-striped dt-responsive tablaClientesArea tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th >Id</th>
           <th>Nombre</th>
           <th>Direccion</th>
           <th>Servicio</th>
           <th>precio</th>
           <th>ult_pago</th>
           <th>Mes pendiente</th>
           <th>Telefono</th>
           <th>Reporte</th>

         </tr> 

        </thead>

        <tbody>

       
        </tbody>

       </table>
</div>

    </div></div></div>

  </section>

</div>



<script>
	var area = $("#area").val();
$('.tablaClientesArea').DataTable( {
    "ajax": "ajax/datatable-clientesArea.ajax.php?area="+area,
    "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print", "colvis"],
   "language": {

      "sProcessing":     "Procesando...",
      "sLengthMenu":     "Mostrar _MENU_ registros",
      "sZeroRecords":    "No se encontraron resultados",
      "sEmptyTable":     "Ningún dato disponible en esta tabla",
      "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
      "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
      "sInfoPostFix":    "",
      "sSearch":         "Buscar:",
      "sUrl":            "",
      "sInfoThousands":  ",",
      "sLoadingRecords": "Cargando...",
      "oPaginate": {
      "sFirst":    "Primero",
      "sLast":     "Último",
      "sNext":     "Siguiente",
      "sPrevious": "Anterior"
      },
      "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
      }

  }

} );
 

</script>