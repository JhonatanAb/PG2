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
      
      Clientes
    
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


        
       <table class="table table-bordered table-striped dt-responsive tablaClientes tablas" width="100%">
         
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

<!--=====================================
MODAL GENERAR SOLICITUD
======================================-->

<div id="modalGenerarSolicitud" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Generar Solicitud</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <input type="hidden" name="redireccionar" value="clientes">
            <input type="text" id="id" name="idCliente">
           
            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              <label>Nombre:</label>
              <div class="input-group">
               <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span> 
              </div>

                <input type="text" class="form-control input-lg" name="editarNombre" id="editarNombre" required>
                
              </div>

            </div>

            <div class="form-group">
              <label>Descripcion:</label>
              <div class="input-group">
               <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span> 
              </div>

                <input type="text" class="form-control input-lg" name="agregarDescripcion"  required>
                
              </div>

            </div>

            <div class="form-group">
              <label>Telefono:</label>
              <div class="input-group">
               <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span> 
              </div>

                <input type="text" class="form-control input-lg" name="agregarTelefono"  required>
                
              </div>

            </div>

            <div class="form-group">
              <label>Tipo de Solicitud:</label>
              <div class="input-group">
               <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-plus"></i></span> 
              </div>
                <select class="form-control select2 input-lg" name="tipoSolicitud" required>
                  
                  <option value="">Seleccionar</option>

                  <?php

                  $catalogo = '3';

                  $cat = ControladorCatalogos::ctrDatosCatalogoByIdCatalogo($catalogo);

                  foreach ($cat as $key => $value) {
                    
                    echo '<option value="'.$value["id_dato"].'">'.$value["descripcion"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>


            <div class="form-group">
              <label>Prioridad:</label>
              <div class="input-group">
               <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-plus"></i></span> 
              </div>
                <select class="form-control select2 input-lg" name="prioridad" required>
                  
                  <option value="">Seleccionar</option>

                  <?php

                  $catalogo = '2';

                  $cat = ControladorCatalogos::ctrDatosCatalogoByIdCatalogo($catalogo);

                  foreach ($cat as $key => $value) {
                    
                    echo '<option value="'.$value["id_dato"].'">'.$value["descripcion"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>


           

           
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Generar Solicitud</button>

        </div>

      </form>

      <?php
       $a = new ControladorSolicitud();
        $a -> ctrCrearSolicitud();
     
      ?>

    

    </div>

  </div>

</div>



<script>
$('.tablaClientes').DataTable( {
    "ajax": "ajax/datatable-clientes.ajax.php",
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