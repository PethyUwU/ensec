<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Administrar carreras
    </h1>

    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar carreras</li>
    </ol>

  </section>

  <section class="content">
    <div class="box">

      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCarrera">
          Agregar carrera
        </button>
      </div>

      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Carrera</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $item = null;
            $valor = null;

            $carreras = ControladorCarreras::ctrMostrarCarreras($item, $valor);

            foreach ($carreras as $key => $value) {
              echo ' <tr>
                        <td>' . ($key + 1) . '</td>
                        <td class="text-uppercase">' . $value["carrera"] . '</td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-warning btnEditarCarrera" idCarrera="' . $value["id_carrera"] . '" data-toggle="modal" data-target="#modalEditarCarrera"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btnEliminarCarrera" idCarrera="' . $value["id_carrera"] . '"><i class="fa fa-times"></i></button>
                          </div>  
                        </td>
                      </tr>';
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<!--=====================================
MODAL AGREGAR CARRERA
======================================-->
<div id="modalAgregarCarrera" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!-- CABEZA DEL MODAL -->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar carrera</h4>
        </div>

        <!-- CUERPO DEL MODAL -->
        <div class="modal-body">
          <div class="box-body">
            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <input type="text" class="form-control input-lg" name="nuevaCarrera" placeholder="Ingresar carrera" required>
              </div>
            </div>
          </div>
        </div>

        <!-- PIE DEL MODAL -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar carrera</button>
        </div>

        <?php
          $crearCarrera = new ControladorCarreras();
          $crearCarrera -> ctrCrearCarrera();
        ?>

      </form>
    </div>
  </div>
</div>

<!--=====================================
MODAL EDITAR CARRERA
======================================-->
<div id="modalEditarCarrera" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <!-- CABEZA DEL MODAL -->
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar carrera</h4>
        </div>

        <!-- CUERPO DEL MODAL -->
        <div class="modal-body">
          <div class="box-body">
            <!-- ENTRADA PARA EL NOMBRE -->
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                <input type="text" class="form-control input-lg" name="editarCarrera" id="editarCarrera" required>
                <input type="hidden" name="idCarrera" id="idCarrera" required>
              </div>
            </div>
          </div>
        </div>

        <!-- PIE DEL MODAL -->
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>

        <?php
          $editarCarrera = new ControladorCarreras();
          $editarCarrera -> ctrEditarCarrera();
        ?> 

      </form>
    </div>
  </div>
</div>

<?php
  $borrarCarrera = new ControladorCarreras();
  $borrarCarrera -> ctrBorrarCarrera();
?>
