<?php

if($_SESSION["perfil"] == "2"){

  echo '<script>

    window.location = "vista-tecnico-solicitud";

  </script>';

  return;

}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">INICIO</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <?php
          date_default_timezone_set('America/Guatemala');
          $fecha = date('Y-m-d');
          $totalFinalizadas = 0;
          $totalSolicitudesFinalizadas= ControladorSolicitud::ctrMostrarTotalFinalizadas($fecha);

          foreach ($totalSolicitudesFinalizadas as $key => $value) {
                      if ($value["id"] == 6) {
                        $totalFinalizadas = $value["total"];
                      }
                    }

          $totalSolicitud = 0;
          $totalAsignadas = 0;
          $totalProceso = 0;
          date_default_timezone_set('America/Guatemala');

            $fecha = date('Y-m-d');
          $totalSolicitudesAsignadasAndProceso= ControladorSolicitud::ctrMostrarTotalAsignadasAndProceso();
                    foreach ($totalSolicitudesAsignadasAndProceso as $key => $value) {
                      if ($value["id"] == 3) {
                        $totalSolicitud = $value["total"];
                      }if ($value["id"] == 4) {
                        $totalAsignadas = $value["total"];
                      }if ($value["id"] == 5) {
                        $totalProceso = $value["total"];
                      }
                    }


          echo'<div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Total: '.$totalFinalizadas.'<sup style="font-size: 20px"></sup></h3>

                <p><font size=5>Finalizadas - HOY</font></p>
              </div>
              <div class="icon">
                <i class="ion ion-android-done-all"></i>
              </div>
              <a href="index.php?ruta=solicitudes-estado-fecha&estado=6&fecha='.$fecha.'" class="small-box-footer">Seleccionar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Total: '.$totalProceso.'</h3>

                <p ><font size=5>En Proceso</font></p>
              </div>
              <div class="icon">
                <i class="ion ion-settings"></i>
              </div>
              <a href="index.php?ruta=mostrar-solicitudes-estado&estado=5" class="small-box-footer">Seleccionar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>Total: '.$totalAsignadas.'</h3>

                <p><font size=5>Pendientes</font></p>
              </div>
              <div class="icon">
                <i class="ion ion-alert-circled"></i>
              </div>
              <a href="index.php?ruta=mostrar-solicitudes-estado&estado=4" class="small-box-footer">Seleccionar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>Total: '.$totalSolicitud.'</h3>

                <p><font size=5>Solicitudes</font></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Seleccionar <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>';

        ?>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-6 connectedSortable">

            

            <!-- solid sales graph -->
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  TIPOS DE SOLICITUDES
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                
                <div class="row">
                  <?php
                  $totalCorte = 0;
                  $totalSinServicio = 0;
                  $totalMalaSenial = 0;
                  $totalInstalacion = 0;
                  $totalSolicitudesTipo = 0;
                  $totalSolicitudesPorTipo= ControladorSolicitud::ctrMostrarTotalSolicitudesPorTipo();
                    foreach ($totalSolicitudesPorTipo as $key => $value) {
                      if ($value["id"] == 7) {
                        $totalInstalacion = $value["total"];
                        $totalSolicitudesTipo = $totalSolicitudesTipo + $value["total"];
                      }if ($value["id"] == 8) {
                        $totalMalaSenial = $value["total"];
                        $totalSolicitudesTipo = $totalSolicitudesTipo + $value["total"];
                      }if ($value["id"] == 12) {
                        $totalSinServicio = $value["total"];
                        $totalSolicitudesTipo = $totalSolicitudesTipo + $value["total"];
                      }if ($value["id"] == 11) {
                        $totalCorte = $value["total"];
                        $totalSolicitudesTipo = $totalSolicitudesTipo + $value["total"];
                      }
                    }

                  $porcentajeCorte = ($totalCorte / $totalSolicitudesTipo)*100;
                  $porcentajeSinServicio = ($totalSinServicio / $totalSolicitudesTipo)*100;
                  $porcentajeMalaSenial = ($totalMalaSenial / $totalSolicitudesTipo)*100;
                  $porcentajeInstalacion = ($totalInstalacion / $totalSolicitudesTipo)*100;
                  


             
                 echo '   <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-info"><i class="fas fa-caret-right"></i> '.number_format($porcentajeInstalacion, 2).'%</span>
                      <h5 class="description-header">'.$totalInstalacion.'</h5>
                      <span class="description-text">INSTALACIONES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-success"><i class="fas fa-caret-right"></i> '.number_format($porcentajeMalaSenial, 2).'%</span>
                      <h5 class="description-header">'.$totalMalaSenial.'</h5>
                      <span class="description-text">MALA SEÑAL</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block border-right">
                      <span class="description-percentage text-warning"><i class="fas fa-caret-right"></i> '.number_format($porcentajeSinServicio, 2).'%</span>
                      <h5 class="description-header">'.$totalSinServicio.'</h5>
                      <span class="description-text">SIN SEÑAL</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-3 col-6">
                    <div class="description-block">
                      <span class="description-percentage text-danger"><i class="fas fa-caret-right"></i> '.number_format($porcentajeCorte, 2).'%</span>
                      <h5 class="description-header">'.$totalCorte.'</h5>
                      <span class="description-text">CORTES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>';

                ?>
                </div>
                <!-- /.row -->

              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-transparent">
                <div class="row">
                
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

          </section>
          <!-- right col -->




          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-6 connectedSortable">

            <!-- solid sales graph -->
            <div class="card ">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Prioridad de las solicitudes
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                
                 <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-transparent">
                <div class="row">
                  
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            <?php
            $totalSolicitudesPrioridadBaja = 0;
            $totalSolicitudesPrioridadMedia = 0;
            $totalSolicitudesPrioridadAlta = 0;
            $totalSolicitudesPorPrioridad = ControladorSolicitud::ctrMostrarTotalSolicitudesPorPrioridad();
              foreach ($totalSolicitudesPorPrioridad as $key => $value) {
                if ($value["descripcion"] == 'baja') {
                  $totalSolicitudesPrioridadBaja = $value["total"];
                }if ($value["descripcion"] == 'media') {
                  $totalSolicitudesPrioridadMedia = $value["total"];
                }if ($value["descripcion"] == 'alta') {
                  $totalSolicitudesPrioridadAlta = $value["total"];
                }
              }


            echo' 
                <script type="text/javascript">
    var donutChartCanvas = $("#donutChart").get(0).getContext("2d")
    var donutData        = {
      labels: [
          "Alta",
          "Media",
          "Baja"
      ],
      datasets: [
        {
          data: ['.$totalSolicitudesPrioridadAlta.','.$totalSolicitudesPrioridadMedia.','.$totalSolicitudesPrioridadBaja.'],
          backgroundColor : ["#EC230B", "#ECA40B", "#07B0DA"],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: "doughnut",
      data: donutData,
      options: donutOptions
    })
  </script>
             ';

            ?>

          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  