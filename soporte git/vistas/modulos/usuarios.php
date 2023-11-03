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
           
           <th style="width:10px; text-transform: uppercase;">#</th>
           <th style="text-transform: uppercase;">Nombre</th>
           <th>Usuario</th>
           <th>Rol</th>
           <th>Estado</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

        $item = null;
        $valor = null;

        $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

       foreach ($usuarios as $key => $value){
         
          echo ' <tr>
                  <td>'.$value["idU"].'</td>
                  <td>'.$value["nombre"].'</td>
                  <td>'.$value["usuario"].'</td>';

                

                  echo '<td>'.$value["rol"].'</td>';

                  if($value["estado"] != 10){

                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["idU"].'" estadoUsuario="10">Activado</button></td>';

                  }else{

                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["idU"].'" estadoUsuario="9">Desactivado</button></td>';

                  }             

                  echo '
                  <td>

                    <div class="btn-group">
                        
                      <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["idU"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-edit"></i></button>

                      <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["idU"].'"  ><i class="fas fa-trash-alt"></i></button>

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



  </section>

</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div class="modal fade" id="modalAgregarUsuario">
        <div class="modal-dialog">
          <div class="modal-content" >

             <form role="form" method="post" enctype="multipart/form-data">

            <div class="modal-header">
              <h4 class="modal-title">AGREGAR USUARIO</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

          <div class="box-body">


            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group ">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>

                   <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

            <div class="form-group">
              
              <div class="input-group ">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                  </div>

                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" id="nuevoUsuario" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

            <div class="form-group">
              
              <div class="input-group ">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-lock"></i></span>
                  </div>


                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

           <div class="form-group">
              
              <div class="input-group ">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                  </div>

                <select class="form-control input-lg" name="nuevoPerfil">
                  
                  <option value="">Selecionar perfil</option>

                  <option value="1">Administrador</option>
                  <option value="2">Tecnico</option>


                </select>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

       <div class="modal-footer justify-content-between">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar usuario</button>

        </div>

        <?php

          $crearUsuario = new ControladorUsuarios();
          $crearUsuario -> ctrCrearUsuario();

        ?>

      </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div id="modalEditarUsuario" class="modal fade"  >
  
  <div class="modal-dialog" >
          <div class="modal-content " >

             <form role="form" method="post" enctype="multipart/form-data">

            <div class="modal-header" >
              <h4 class="modal-title">EDITAR USUARIO</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
           <div class="form-group">
              
              <div class="input-group ">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>

                <input type="text" class="form-control input-lg" id="editarNombre" name="editarNombre" value="" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

            <div class="form-group">
              
              <div class="input-group ">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                  </div>

                <input type="text" class="form-control input-lg" id="editarUsuario" name="editarUsuario" value="" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group ">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user-lock"></i></span>
                  </div>


                <input type="password" class="form-control input-lg" name="editarPassword" placeholder="Escriba la nueva contraseña">

                <input type="hidden" id="passwordActual" name="passwordActual">

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

          <div class="form-group">
              
              <div class="input-group ">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-id-badge"></i></span>
                  </div>

                <select class="form-control input-lg" name="editarPerfil">
                  
                  <option value="" id="editarPerfil"></option>

                  <option value="Administrador">Administrador</option>

                  <option value="Cobrador">Cobrador</option>
                  
                  <option value="Tecnico">Tecnico</option>


                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" class="nuevaFoto" name="editarFoto">

              <p class="help-block">Peso máximo de la foto 2MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizarEditar" width="100px">

              <input type="hidden" name="fotoActual" id="fotoActual">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Modificar usuario</button>

        </div>

     <?php

          $editarUsuario = new ControladorUsuarios();
          $editarUsuario -> ctrEditarUsuario();

        ?> 

      </form>

    </div>

  </div>

</div>




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

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 