<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
     Solicitudes asignadas
    
    </h1>

  

  </section>

  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tblusuarios" class="table table-bordered table-striped tablas">
         
        <thead>
         
         <tr>         
           
           <th>Id_solicitud</th>
           <th>Cliente</th>
           <th>Tipo Solicitud</th>
           <th>Prioridad</th>
           <th>Direccion</th>
           <th>Telefono</th>
           <th>estado</th>


         </tr> 

        </thead>

        <tbody>

        <?php
        $user=2;
        $usuarios = ControladorSolicitud::ctrMostrarSolicitudesByTecnico2($user);

       foreach ($usuarios as $key => $value){
         
          echo '<tr>
                <td>'.$value["idSol"].'</td>
                <td>'.$value["nom"].'</td>
                <td>'.$value["ts"].'</td>
                <td>'.$value["pr"].'</td>
                <td>'.$value["ar"].', '.$value["se"].', '.$value["loc"].'-'.$value["ref"].'</td>
                <td>'.$value["tlf"].'</td>
                 ';
                 if($value["est"]=='Asignada'){
                    echo '<td><button class="btn btn-success btn-xs btnEstado" idSol="'.$value["idSol"].' " estado="5">'.$value["est"].'</button></td>';
                }
                if($value["est"]=='En Proceso'){
                    echo '<td><button class="btn btn-info btn-xs btnFinalizar" idSol="'.$value["idSol"].' " estado="6">'.$value["est"].'</button></td>';
                }
                
                  
                  echo '

                </tr>';
        }


        ?> 

        </tbody>

       </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <script type="text/javascript">
  
  $(document).ready(function(){
    $('#selectUsuario').val('');

    $('#selectUsuario').change(function(){
      seleccionada();
    });

  })
</script>
<script>
  $(function () {
    $("#tblusuarios").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tblusuarios_wrapper .col-md-6:eq(0)');
    $('#tblusuarios2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<?php

  $actualizarEstado = new ControladorSolicitud();
  $actualizarEstado -> ctrCambiarEstadoSolicitud();

?> 
