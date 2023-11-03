<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
     Administrar Usuarios
    
    </h1>

  

  </section>

  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <button class="btn  bg-gradient-info btn-md" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Usuario</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tblusuarios" class="table table-bordered table-striped tablas">
         
        <thead>
         
         <tr>
           
           
           <th>Id_sector</th>
           <th>Descripcion</th>
           <th>select</th>
         </tr> 

        </thead>

        <tbody>

        <?php
        $perfil = 2;
        $sec = ControladorSectores::ctrMostrarSectores();
        $usuarios = ControladorUsuarios::ctrMostrarUsuariosByPerfil($perfil);

       foreach ($sec as $key => $value){
         
          echo '<tr>
                <td>'.$value["id_sector"].'</td>
                  <td>'.$value["descripcion"].'</td>';

                  echo '<td>
                 

                    <div class="btn-group">
                <input type="hidden" id="idSector" value="'.$value["id_sector"].'">
                <select class="form-control select2 input-lg" id="selectUsuario"> 
                <option value="">Asignar un usuario</option>';
              
                  foreach ($usuarios as $key => $value2) {
                    
                    echo '<option value="'.$value2["id"].'">'.$value2["nombre"].'</option>';
                  }

                  echo'</select>

                    </div>  

                  </td>

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