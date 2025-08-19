<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
</br>
</br>
</br>

    <!-- Perfil de usuario -->
    <!-- <li class="nav-item nav-profile">
      <a href="inicio" class="nav-link">
        <div class="profile-image">
          <?php 
            if ($_SESSION["foto"] != "") {
              echo '<img class="img-xs rounded-circle" src="'.$_SESSION["foto"].'"  alt="Profile image">';
            } else {
              echo '<img class="img-xs rounded-circle" src="vistas/img/usuarios/default/anonymous.png"  alt="Profile image">';
            }
          ?>
          <div class="dot-indicator bg-success"></div>
        </div>
        <div class="text-wrapper">
          <p class="profile-name"><?php echo $_SESSION["usuario"]; ?></p>
          <p class="designation"><?php echo $_SESSION["perfil"]; ?></p>
        </div>
        <div class="icon-container">
          <i class="icon-bubbles"></i>
          <div class="dot-indicator bg-danger"></div>
        </div>
      </a>
    </li> -->

    <!-- Inicio -->
    <li class="nav-item nav-category">
      <span class="nav-link">Inicio</span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="inicio">
        <span class="menu-title">Inicio</span>
        <i class="icon-home menu-icon"></i>
      </a>
    </li>

    <!-- Administrar -->
    <li class="nav-item nav-category">
      <span class="nav-link">Administrar</span>
    </li>

    <li class="nav-item">
      <a class="nav-link" href="usuarios">
        <span class="menu-title">Usuarios</span>
        <i class="icon-user menu-icon"></i>
      </a>
    </li>

    <!-- Carrera -->
    <li class="nav-item">
      <a class="nav-link" href="carreras">
        <span class="menu-title">Carrera</span>
        <i class="icon-user menu-icon"></i>
      </a>
    </li>

    <!-- Gestiones -->
    <li class="nav-item">
      <a class="nav-link" href="gestiones">
        <span class="menu-title">Gestiones</span>
        <i class="icon-user menu-icon"></i>
      </a>
    </li>

    <!-- Turno -->
    <li class="nav-item">
      <a class="nav-link" href="turnos">
        <span class="menu-title">Turno</span>
        <i class="icon-user menu-icon"></i>
      </a>
    </li>

    <!-- Paralelos -->
    <li class="nav-item">
      <a class="nav-link" href="paralelo">
        <span class="menu-title">Paralelo</span>
        <i class="icon-user menu-icon"></i>
      </a>
    </li>

    <!-- Cursos -->
    <li class="nav-item">
      <a class="nav-link" href="cursos">
        <span class="menu-title">Curso</span>
        <i class="icon-user menu-icon"></i>
      </a>
    </li>

    <!-- Licencias -->
    <li class="nav-item">
      <a class="nav-link" href="licencias">
        <span class="menu-title">Licencias</span>
        <i class="icon-user menu-icon"></i>
      </a>
    </li>

    <!-- Inscripción -->
    <li class="nav-item">
      <a class="nav-link" href="inscripcion">
        <span class="menu-title">Inscripcion</span>
        <i class="icon-user menu-icon"></i>
      </a>
    </li>

    <!-- Acerca de -->
    <li class="nav-item nav-category">
      <span class="nav-link">Blog</span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="acercaDe">
        <span class="menu-title">Nosotro blog</span>
        <i class="icon-info menu-icon"></i>
      </a>
    </li>

    <!-- Contacto -->
    <li class="nav-item nav-category">
      <span class="nav-link">Contacto</span>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="contacto">
        <span class="menu-title">Contacto</span>
        <i class="icon-envelope menu-icon"></i>
      </a>
    </li>

  </ul>
</nav>
