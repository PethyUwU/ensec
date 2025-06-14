<div class="content-wrapper">
    <section class="content-header">
        <h1>Administrar Turnos</h1>
        <ol class="breadcrumb">
            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li class="active">Administrar Turnos</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarTurno">
                    Agregar Turno
                </button>
            </div>

            <div class="box-body">
                <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
                    <thead>
                        <tr>
                            <th style="width:10px">#</th>
                            <th>Nombre</th>
                            <th>Hora Inicio</th>
                            <th>Hora Fin</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $turnos = ControladorTurno::ctrMostrarTurnos(null, null);
                        foreach ($turnos as $key => $value) {
                            echo '<tr>
                                <td>'.($key+1).'</td>
                                <td>'.$value["nombre"].'</td>
                                <td>'.$value["horainicio"].'</td>
                                <td>'.$value["horafin"].'</td>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning btnEditarTurno" idTurno="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarTurno"><i class="fa fa-pencil"></i></button>
                                        <button class="btn btn-danger btnEliminarTurno" idTurno="'.$value["id"].'"><i class="fa fa-times"></i></button>
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

<!-- Modal Agregar Turno -->
<div id="modalAgregarTurno" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Turno</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nuevoNombre">Nombre del Turno</label>
                            <input type="text" class="form-control" id="nuevoNombre" name="nuevoNombre" placeholder="Ej: Matutino" required>
                        </div>
                        <div class="form-group">
                            <label for="nuevoHorainicio">Hora Inicio</label>
                            <input type="time" class="form-control" id="nuevoHorainicio" name="nuevoHorainicio" required>
                        </div>
                        <div class="form-group">
                            <label for="nuevoHorafin">Hora Fin</label>
                            <input type="time" class="form-control" id="nuevoHorafin" name="nuevoHorafin" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Turno</button>
                </div>
                <?php
                    $crearTurno = new ControladorTurno();
                    $crearTurno->ctrCrearTurno();
                ?>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Turno -->
<div id="modalEditarTurno" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" method="post">
                <div class="modal-header" style="background:#3c8dbc; color:white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Turno</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="editarNombre">Nombre del Turno</label>
                            <input type="text" class="form-control" id="editarNombre" name="editarNombre" required>
                            <input type="hidden" id="idTurno" name="idTurno">
                        </div>
                        <div class="form-group">
                            <label for="editarHorainicio">Hora Inicio</label>
                            <input type="time" class="form-control" id="editarHorainicio" name="editarHorainicio" required>
                        </div>
                        <div class="form-group">
                            <label for="editarHorafin">Hora Fin</label>
                            <input type="time" class="form-control" id="editarHorafin" name="editarHorafin" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
                <?php
                    $editarTurno = new ControladorTurno();
                    $editarTurno->ctrEditarTurno();
                ?>
            </form>
        </div>
    </div>
</div>

<?php
    $eliminarTurno = new ControladorTurno();
    $eliminarTurno->ctrEliminarTurno();
?>