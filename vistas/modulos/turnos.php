<?php

$turnos = ControladorTurno::ctrMostrarTurnos(null, null);

?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Administrar Turnos</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Turnos</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTurno">
          Agregar turno
        </button>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
          <thead>
            <tr>
              <th>#</th>
              <th>Turno</th>
              <th>Hora Inicio</th>
              <th>Hora Fin</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($turnos as $key => $turno): ?>
            <tr>
              <td><?= $key + 1 ?></td>
              <td><?= $turno["turno"] ?></td>
              <td><?= $turno["hora_inicio"] ?></td>
              <td><?= $turno["hora_fin"] ?></td>
              <td>
                <div class="btn-group">
                  <button class="btn btn-warning btnEditarTurno" idTurno="<?= $turno["id_turno"] ?>" data-toggle="modal" data-target="#modalEditarTurno"><i class="fa fa-pencil"></i></button>
                  <button class="btn btn-danger btnEliminarTurno" idTurno="<?= $turno["id_turno"] ?>"><i class="fa fa-times"></i></button>
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<!-- MODAL AGREGAR TURNO -->
<div id="modalAgregarTurno" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <h4 class="modal-title">Agregar Turno</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <label>Nombre del Turno</label>
              <input type="text" class="form-control" name="nuevoTurno" required>
            </div>
            <div class="form-group">
              <label>Hora de Inicio</label>
              <input type="time" class="form-control" name="nuevoHorainicio" required>
            </div>
            <div class="form-group">
              <label>Hora de Fin</label>
              <input type="time" class="form-control" name="nuevoHorafin" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Turno</button>
        </div>
        <?php ControladorTurno::ctrCrearTurno(); ?>
      </form>
    </div>
  </div>
</div>

<!-- MODAL EDITAR TURNO -->
<div id="modalEditarTurno" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="post">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <h4 class="modal-title">Editar Turno</h4>
        </div>
        <div class="modal-body">
          <div class="box-body">
            <input type="hidden" name="idTurno" id="idTurno">
            <div class="form-group">
              <label>Nombre del Turno</label>
              <input type="text" class="form-control" name="editarTurno" id="editarTurno" required>
            </div>
            <div class="form-group">
              <label>Hora de Inicio</label>
              <input type="time" class="form-control" name="editarHorainicio" id="editarHorainicio" required>
            </div>
            <div class="form-group">
              <label>Hora de Fin</label>
              <input type="time" class="form-control" name="editarHorafin" id="editarHorafin" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
        <?php
         ControladorTurno::ctrEditarTurno(); 

        //   $editarTurno = new ControladorTurno();
        //   $editarTurno->ctrEditarTurno();
        
        ?>
      </form>
    </div>
  </div>
</div>


<?php ControladorTurno::ctrBorrarTurno(); ?>
