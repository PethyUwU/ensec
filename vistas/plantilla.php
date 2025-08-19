<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Stellar Admin</title>
<!--  Ionicons  -->
    <link rel="stylesheet" href="vistas/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vistas/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vistas/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="vistas/css/style.css">
    <link rel="shortcut icon" href="vistas/images/favicon.png" />
    <link rel="stylesheet" href="https://i.icomoon.io/public/temp/0d3e5d5ea1/UntitledProject/style.css">
    <link rel="stylesheet" href="https://i.icomoon.io/public/temp/0d3e5d5ea1/UntitledProject/style.css">

    <link rel="stylesheet" href="https://i.icomoon.io/public/temp/fad4f15ad6/UntitledProject/style.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://i.icomoon.io/public/temp/b395ae480a/UntitledProject/style.css">

    <script src="vistas/vendors/js/vendor/modernizr-2.8.3.min.js"></script>

    <script src="vistas/sweetalert2/sweetalert2.1.all.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')</script>

    <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
        </script>
        <!-- FullCalendar -->
	<link rel="stylesheet" type="text/css" href="vistas/css/fullcalendar.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vistas/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="vistas/css/home.css">
    <script src ="vistas/js/jquery-3.0.0.min.js"> </script>                                                                                                                                                                                                                                 
    <script src="vistas/js/popper.min.js"></script>
    <script src="vistas/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/locales-all.min.js"></script>

<style>
  /* Cambiar el color de fondo del evento */
  .fc-daygrid-event {
    background-color: #4caf50 !important; /* Verde dental */
    color: white !important;
    border: none !important;
  }

  /* Cambiar el color de los botones del calendario */
  .fc-button {
    background-color: #0288d1 !important; /* Azul odontológico */
    color: white !important;
    border: none !important;
  }

  /* Cambiar el color del encabezado del mes */
  .fc-toolbar-title {
    color: #01579b;
    font-weight: bold;
  }
</style>


   



</head>
<body>
<div class="container-scroller">

<?php   
if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
    echo '<div class="wrapper">';
    
    // Incluir cabecera
    include "modulos/cabecera.php";

    echo '<div class=" page-body-wrapper">';

    // Incluir menú lateral
    include "modulos/menu.php";
    //echo '<div class="container-fluid page-body-wrapper">';

    echo '<div class="main-panel">
    <div class="content-wrapper">';

    if (isset($_GET["ruta"])) {
        if ($_GET["ruta"] == "inicio" ||
            $_GET["ruta"] == "usuarios" ||
            $_GET["ruta"] == "carreras" ||
            $_GET["ruta"] == "gestiones" ||
            $_GET["ruta"] == "turnos" ||
            $_GET["ruta"] == "paralelo" ||
            $_GET["ruta"] == "cursos" ||
            $_GET["ruta"] == "asistencia" ||
            $_GET["ruta"] == "licencias" ||
            $_GET["ruta"] == "inscripcion" ||
            $_GET["ruta"] == "salir") {
            include "modulos/" . $_GET['ruta'] . ".php";
        } else {
            include "modulos/404.php";
        }
    } else {
        include "modulos/inicio.php";
    }

    echo '    </div>'; // Cerrar content-wrapper

    // Incluir pie de página
    include "modulos/footer.php";

    echo '  </div>'; // Cerrar main-panel
    echo '</div>'; // Cerrar page-body-wrapper

    echo '</div>'; // Cerrar wrapper
} else {
    // Mostrar página de inicio de sesión si no se ha iniciado sesión
    include "modulos/login.php";
}
?>

</div>
<script src="vistas/vendors/js/vendor.bundle.base.js"></script>
<script src="vistas/js/off-canvas.js"></script>
<script src="vistas/js/misc.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/carreras.js"></script>
<script src="vistas/js/gestiones.js"></script>
<script src="vistas/js/turno.js"></script>
<script src="vistas/js/paralelo.js"></script>
<script src="vistas/js/cursos.js"></script>
<script src="vistas/js/asistencia.js"></script>
<script src="vistas/js/licencias.js"></script>
<script src="vistas/js/inscipcion.js"></script>

</body>
</html>
