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
      
     ASIGNACION SECTORES
    
    </h1>

  

  </section>

  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <button class="btn  bg-gradient-info btn-md" data-toggle="modal" data-target="#modalAgregarUsuario">Asignar Sector</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tblusuarios" class="table table-bordered table-striped tablas">
         
        <thead>
         
         <tr>
           
           
           <th style="text-transform: uppercase;">Nombre Del Usuario</th>
           <th style="text-transform: uppercase;">Sector Asignado</th>
          
         </tr> 

        </thead>

        <tbody>

        <?php
        $perfil = 2;
        $Usuario= $_SESSION["sector-usuario"];
        $sec = ControladorSectores::ctrMostrarSectores();
        $usuarios = ControladorSectores::ctrMostrarSectoresByUsuario($Usuario);

       foreach ($usuarios as $key => $value){
         
          echo ' <tr>
                  <td>'.$value["nom_usr"].'</td>
                  <td>'.$value["des_sector"].'</td>';

               

             

                  echo'

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
    $('#selectSector').val('');

    $('#selectSector').change(function(){
      seleccionada();
    });

  })
</script
>
<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div class="modal fade" id="modalAgregarUsuario">
        <div class="modal-dialog">
          <div class="modal-content" >

             <form role="form" method="post" enctype="multipart/form-data">

            <div class="modal-header">
              <h4 class="modal-title">ASIGNAR SECTOR</h4>
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

            <?php
            echo '
            <select class="form-control select2 input-lg" name="selectSector"> 
                <option value="">Seleccionar un  Sector </option>';
              
                  foreach ($sec as $key => $value) {
                    
                    echo '<option value="'.$value["id_sector"].'">'.$value["descripcion"].'</option>';
                  }

                  echo'</select>';

            ?>
              </div>

            </div>



          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

       <div class="modal-footer justify-content-between">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Asignar Sector</button>

        </div>

        <?php

         $asignarSector = new ControladorSectores();
         $asignarSector -> ctrAsignarSector();

        ?>

      </form>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->






  </section>

</div>