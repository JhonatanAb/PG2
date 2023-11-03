 <!-- Preloader
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="vistas/dist/img/logo3.png" alt="AdminLTELogo" height="160" width="155">
  </div>  -->
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <img src="vistas/img/plantilla/tvglogo2.png">
    </div>
    <div class="card-body">
      <p class="login-box-msg">Identificate para iniciar:</p>

      <form  method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Contraseña" name="ingPassword" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

              

<div class="social-auth-links text-center mt-2 mb-3">
        <button type="submit" class="btn btn-block btn-primary">
          <i class="fa fa-sign-in-alt mr-2"></i> INICIAR SESION
        </button>
      </div>
        <?php

        $login = new ControladorUsuarios();
        $login -> ctrIngresoUsuario();
        
      ?>
      
      </form>

      
      <!-- /.social-auth-links -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
</body>

