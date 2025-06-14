
<div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
  <div class="login-logo">
                  <img src="vistas/images/logo.png" width="180px">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Bienvenidos al sistema</p>

    <form method="post">
    <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>
    </div>
    <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="ingPassword" required>
    </div>

    <div class="row">
        <div class="col-xs-4">
            <button type="submit" class="btn btn-block btn-primary">Ingresar</button>
        </div>
    </div>

    <?php
    // Instancia y llamada al método correcto (ctrIngresoUsuario)
    $login = new ControladorUsuarios();
    $login->ctrIngresoUsuario(); // Asegúrate de que es "ctrIngresoUsuario" y no "crtIngresoUsuario"
    ?>
</form>

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
