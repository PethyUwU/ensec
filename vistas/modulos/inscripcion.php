<div class="content-wrapper">
  <section class="content-header"><h1>Inscripción</h1></section>
  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarInscripcion">Agregar inscripción</button>
      </div>
      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablaInscripcion" width="100%">
          <thead>
            <tr>
              <th>#</th><th>Estudiante</th><th>Carrera</th><th>Curso</th>
              <th>Turno</th><th>Fecha</th><th>Responsable</th><th>Acciones</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </section>
</div>

<!-- MODAL -->
<div id="modalAgregarInscripcion" class="modal fade" role="dialog">
  <div class="modal-dialog"><div class="modal-content">
    <form id="formNuevaInscripcion">
      <div class="modal-header" style="background:#3c8dbc;color:#fff">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar inscripción</h4>
      </div>
      <div class="modal-body"><div class="box-body">

        <div class="form-group">
          <label>Estudiante</label>
          <select class="form-control" id="selEstudiante" name="id_usuario" required></select>
        </div>

        <div class="form-group">
          <label>Gestión</label>
          <select class="form-control" id="selGestion" name="id_gestion" required></select>
        </div>

        <div class="form-group">
          <label>Carrera</label>
          <select class="form-control" id="selCarrera" name="id_carrera" required></select>
        </div>

        <div class="form-group">
          <label>Curso</label>
          <select class="form-control" id="selCurso" name="id_curso" required disabled>
            <option value="">-- Selecciona curso --</option>
          </select>
        </div>

        <div class="form-group">
          <label>Turno</label>
          <select class="form-control" id="selTurno" name="id_turno" required></select>
        </div>

      </div></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        <button type="submit" class="btn btn-primary">Guardar inscripción</button>
      </div>
    </form>
  </div></div>
</div>
