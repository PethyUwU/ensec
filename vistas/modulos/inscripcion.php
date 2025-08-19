<?php if (!isset($_SESSION)) session_start(); ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Administrar inscripciones</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Inscripciones</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarInscripcion">Agregar inscripción</button>
      </div>

      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Estudiante</th>
              <th>Gestión</th>
              <th>Carrera</th>
              <th>Curso</th>
              <th>Paralelo</th>
              <th>Turno</th>
              <th>Fecha inscripción</th>
              <th>Responsable</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
              $inscripciones = ControladorInscripcion::ctrlListar(null,null);
              foreach ($inscripciones as $k=>$i){
                echo '<tr>
                  <td>'.($k+1).'</td>
                  <td>'.$i["estudiante"].'</td>
                  <td>'.$i["gestion"].'</td>
                  <td>'.$i["carrera"].'</td>
                  <td>'.$i["curso"].'</td>
                  <td>'.$i["paralelo"].'</td>
                  <td>'.$i["turno"].'</td>
                  <td>'.$i["fecha_inscripcion"].'</td>
                  <td>'.$i["responsable"].'</td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-warning btnEditarInscripcion" idInscripcion="'.$i["id_inscripcion"].'" data-toggle="modal" data-target="#modalEditarInscripcion"><i class="fa fa-pencil"></i></button>
                      <button class="btn btn-danger btnEliminarInscripcion" idInscripcion="'.$i["id_inscripcion"].'"><i class="fa fa-times"></i></button>
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

<!-- MODAL AGREGAR -->
<div id="modalAgregarInscripcion" class="modal fade" role="dialog">
  <div class="modal-dialog"><div class="modal-content">
    <form method="post">
      <div class="modal-header" style="background:#3c8dbc;color:white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar inscripción</h4>
      </div>
      <div class="modal-body"><div class="box-body">
        <?php
          // Estudiantes = usuarios con perfil Estudiante
          $item="perfil"; $valor="Estudiante";
          $estudiantes = ControladorUsuarios::ctrMostrarUsuarios($item,$valor);
          $gestiones   = ControladorGestiones::ctrMostrarGestiones(null,null);
          $turnos      = ControladorTurnos::ctrMostrarTurnos(null,null);
          $carreras    = ControladorCarreras::ctrMostrarCarreras(null,null);
        ?>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <select class="form-control input-lg" name="id_usuario" required>
              <option value="">Seleccionar estudiante</option>
              <?php foreach($estudiantes as $e){ echo '<option value="'.$e["id"].'">'.$e["nombre"].' '.$e["apellidoP"].'</option>'; } ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <select class="form-control input-lg" name="id_gestion" required>
              <option value="">Seleccionar gestión</option>
              <?php foreach($gestiones as $g){ echo '<option value="'.$g["id_gestion"].'">'.$g["nombre"].'</option>'; } ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
            <select class="form-control input-lg" id="selCarrera_nueva" name="id_carrera" required>
              <option value="">Seleccionar carrera</option>
              <?php foreach($carreras as $c){ echo '<option value="'.$c["id_carrera"].'">'.$c["nombre"].'</option>'; } ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-book"></i></span>
            <select class="form-control input-lg" id="selCurso_nuevo" name="id_curso" required>
              <option value="">Seleccione primero una carrera</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-columns"></i></span>
            <select class="form-control input-lg" id="selParalelo_nuevo" name="id_paralelo" required>
              <option value="">Seleccione primero un curso</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
            <select class="form-control input-lg" name="id_turno" required>
              <option value="">Seleccionar turno</option>
              <?php foreach($turnos as $t){ echo '<option value="'.$t["id_turno"].'">'.$t["nombre"].'</option>'; } ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
            <input type="datetime-local" class="form-control input-lg" name="fecha_inscripcion" value="<?php echo date('Y-m-d\TH:i'); ?>" required>
          </div>
        </div>

        <input type="hidden" name="id_responsable" value="<?php echo $_SESSION['id'] ?? ''; ?>">
      </div></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar inscripción</button>
      </div>
      <?php $crear = new ControladorInscripcion(); $crear->ctrlCrearInscripcion(); ?>
    </form>
  </div></div>
</div>

<!-- MODAL EDITAR -->
<div id="modalEditarInscripcion" class="modal fade" role="dialog">
  <div class="modal-dialog"><div class="modal-content">
    <form method="post">
      <div class="modal-header" style="background:#3c8dbc;color:white">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Editar inscripción</h4>
      </div>
      <div class="modal-body"><div class="box-body">
        <input type="hidden" id="idInscripcionEditar" name="id_inscripcion">

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            <select class="form-control input-lg" id="id_usuario_edit" name="id_usuario" required>
              <option value="">Seleccionar estudiante</option>
              <?php foreach($estudiantes as $e){ echo '<option value="'.$e["id"].'">'.$e["nombre"].' '.$e["apellidoP"].'</option>'; } ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            <select class="form-control input-lg" id="id_gestion_edit" name="id_gestion" required>
              <option value="">Seleccionar gestión</option>
              <?php foreach($gestiones as $g){ echo '<option value="'.$g["id_gestion"].'">'.$g["nombre"].'</option>'; } ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
            <select class="form-control input-lg" id="selCarrera_edit" name="id_carrera" required>
              <option value="">Seleccionar carrera</option>
              <?php foreach($carreras as $c){ echo '<option value="'.$c["id_carrera"].'">'.$c["nombre"].'</option>'; } ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-book"></i></span>
            <select class="form-control input-lg" id="selCurso_edit" name="id_curso" required>
              <option value="">Seleccione primero una carrera</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-columns"></i></span>
            <select class="form-control input-lg" id="selParalelo_edit" name="id_paralelo" required>
              <option value="">Seleccione primero un curso</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
            <select class="form-control input-lg" id="id_turno_edit" name="id_turno" required>
              <option value="">Seleccionar turno</option>
              <?php foreach($turnos as $t){ echo '<option value="'.$t["id_turno"].'">'.$t["nombre"].'</option>'; } ?>
            </select>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar-plus-o"></i></span>
            <input type="datetime-local" class="form-control input-lg" id="fecha_inscripcion_edit" name="fecha_inscripcion" required>
          </div>
        </div>

        <input type="hidden" name="id_responsable" value="<?php echo $_SESSION['id'] ?? ''; ?>">
      </div></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Modificar inscripción</button>
      </div>
      <?php $editar = new ControladorInscripcion(); $editar->ctrlEditarInscripcion(); ?>
    </form>
  </div></div>
</div>

<?php $borrar = new ControladorInscripcion(); $borrar->ctrlBorrarInscripcion(); ?>

<!-- JS del módulo -->
<script src="vistas/js/inscripcion.js"></script>
