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
    


  </section>

  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-lg-5">
            <div class="card">
              <div class="card-header">
                <h2>CLIENTES POR AREA:</h2>
            </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="asignar-clientes-area" method="POST">


                <div class="form-group">
              <label>Area:</label>
              <div class="input-group">
                 <div class="input-group-prepend">
              
                <span class="input-group-text"><i class="fa fa-plus"></i></span> 
              </div>

                <select class="form-control input-lg"  name="area" required>
                  
                  <option value="">Selecionar Area</option>

                  <?php

                  
                  $areas = ControladorAreas::ctrMostrarAreasTodas();

                  foreach ($areas as $key => $value) {
                    
                    echo '<option value="'.$value["id_area"].'">'.$value["descripcion"].'</option>';
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