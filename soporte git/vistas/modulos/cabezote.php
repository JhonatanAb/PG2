   <!-- Preloader
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="vistas/dist/img/logo3.png" alt="AdminLTELogo" height="160" width="155">
  </div>  -->

 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
      <div class="nav-item">
          <?php


            echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

          ?>
        </div>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        

      <!--<li class="nav-item">
       <a class="btn btn-outline-info btn-lg" href="inicio">Inicio</a>-
      </li>-->

      <li class="nav-item">
        <a href="salir" class="btn btn-block btn-outline-danger btn-lg"><i class="fa fa-door-open"></i>  Cerrar Sesion
        </a>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->