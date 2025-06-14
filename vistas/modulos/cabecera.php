<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="navbar-brand-wrapper d-flex align-items-center">
    <a class="navbar-brand brand-logo" href="inicio">
      <img src="vistas/images/logo.png" alt="logo" class="logo-dark" />
    </a>
    <a class="navbar-brand brand-logo-mini" href="index"><img src="vistas/images/logo-mini.svg" alt="logo" /></a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
    <ul class="navbar-nav navbar-nav-right ml-auto">
      <form class="search-form d-none d-md-block" action="#">
        <i class="icon-magnifier"></i>
        <input type="search" class="form-control" placeholder="Search Here" title="Search here">
      </form>
      <li class="nav-item"><a href="#" class="nav-link"><i class="icon-basket-loaded"></i></a></li>
      <li class="nav-item"><a href="#" class="nav-link"><i class="icon-chart"></i></a></li>

      <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
        <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
        <?php 
         if ($_SESSION["foto"]!= "") {
           echo '<img src="'.$_SESSION["foto"].'" class="img-thumbnail" width="40px">';
         }else{
           echo '<img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px">';
         }
        ?> <span class="font-weight-normal"> <?php echo $_SESSION["nombre"]; ?> </span></a>
        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
          <div class="dropdown-header text-center">
            <?php 
               if ($_SESSION["foto"]!= "") {
                 echo '<img class="img-md rounded-circle" src="'.$_SESSION["foto"].'" class="user-image" alt="Profile image">';
               }else{
                 echo '<img class="img-md rounded-circle" src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px" alt="Profile image">';
               }
              ?>
            <p class="mb-1 mt-3"><?php echo $_SESSION["nombre"]; ?></p>
            <p class="font-weight-light text-muted mb-0"><?php echo $_SESSION["usuario"]; ?></p>
          </div>
          <a class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
          <a class="dropdown-item" href="salir"><i class="dropdown-item-icon icon-power text-primary"></i>Salir</a>
        </div>
      </li>
    </ul>
    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
      <span class="icon-menu"></span>
    </button>
  </div>
</nav>