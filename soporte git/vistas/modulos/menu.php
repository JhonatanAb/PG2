<style type="text/css">
  .sidebar-dark-danger .nav-sidebar > .nav-item > .nav-link.active,
.sidebar-light-danger .nav-sidebar > .nav-item > .nav-link.active {
  background-color: #dc3545;
  color: #fff;
}
</style>

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="inicio" class="brand-link">
     
      <span class="brand-text font-weight-light">TVGUATE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php

         

            echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

          ?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php  echo $_SESSION["nombre"]; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         
         <?php 
         if ($_SESSION["perfil"] == 1) {
         echo'
        <li class="nav-item">
            <a href="usuarios" class="nav-link">
              <i class="nav-icon fa fa-key"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="clientes" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Clientes
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="consulta-clientes-area" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Clientes Por Area
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="solicitud" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Mostrar Solicitudes
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="seleccionar-usuarios" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                seleccionar tecnico
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="solicitudes-tecnico" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                solicitudes por tecnico
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="solicitudes-sector" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                solicitudes por sector
              </p>
            </a>
          </li>';}
          if ($_SESSION["perfil"] == 2) {
            echo '<li class="nav-item">
            <a href="vista-tecnico-solicitud" class="nav-link">
              <i class="nav-icon fa fa-user"></i>
              <p>
                solicitudes asignadas
              </p>
            </a>
          </li>';
          }
          

          ?>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>