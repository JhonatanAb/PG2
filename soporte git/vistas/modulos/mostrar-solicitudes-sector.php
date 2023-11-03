<?php

if($_SESSION["perfil"] == "2"){

  echo '<script>

    window.location = "vista-tecnico-solicitud";

  </script>';

  return;

}

?>
<!--------------------------------
 MOSTRAR TODAS LAS SOLICITUDES
------------------------------------>


<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Solicitudes por sector
    
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


        
       <table class="table table-bordered table-striped dt-responsive tablaSolicitud tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th >Id</th>
           <th>Tipo Solicitud</th>
           <th>Descripcion</th>
           <th>prioridad</th>
           <th>estado</th>
           <th>Nombre</th>
           <th>Telefono</th>
           <th>Direccion</th>
         </tr> 

        </thead>

        <tbody>

       
        <?php
        $sector= $_SESSION["sector-solicitud"];
        $sec = ControladorSolicitud::ctrMostrarSolicitudesBySector($sector);
       foreach ($sec as $key => $value){
         
          echo ' <tr>
                  <td>'.$value["idSolicitud"].'</td>
                  <td>'.$value["tipoSolicitud"].'</td>
                  <td>'.$value["descripcion"].'</td>
                  <td>'.$value["prioridad"].'</td>
                  <td>'.$value["estado"].'</td>
                  <td>'.$value["nombreCliente"].'</td>
                  <td>'.$value["Telefono"].'</td>
                  <td>'.$value["area"].','.$value["sector"].','.$value["localidad"].'-'.$value["referencia"].'</td>';
                  echo'

                </tr>';
        }


        ?> 
        </tbody>

       </table>
</div>

    </div></div></div>

  </section>

</div>


<script>
$('.tablaSolicitud').DataTable( {
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