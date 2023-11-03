<div class="content-wrapper">

  <section class="content-header">
    


  </section>

  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-lg-5">
            <div class="card">
              <div class="card-header">
                <h2>SOLICITUDES POR SECTOR:</h2>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="sector-seleccionado" method="POST">


                <div class="form-group">
              <label>Sectores:</label>
              <div class="input-group">
                 <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fa fa-plus"></i></span> 
              </div>

                <select class="form-control input-lg"  name="sector" required>
                  
                  <option value="">Selecione un sector</option>

                  <?php

                  $sec = ControladorSectores::ctrMostrarSectores();

                  foreach ($sec as $key => $value) {
                    
                    echo '<option value="'.$value["id_sector"].'">'.$value["descripcion"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>

                

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <center><button class="btn btn-lg btn-info" type="submit" value="Enviar">Consultar</button></center>
              </div>

            </form>
            </div>
            <!-- /.card -->



  </section>

</div>

<script>
  $(function () {

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('yyyy/mm/dd', { 'placeholder': 'año/mes/dia' })
    $('[data-mask]').inputmask()
  })
 
</script>