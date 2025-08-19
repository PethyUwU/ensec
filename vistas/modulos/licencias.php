<?php
require_once "controladores/licencias.controlador.php";
require_once "modelos/licencias.modelo.php";

$licencias = ControladorLicencias::ctrMostrarLicencias();
?>
 
<div class="container mt-4">
  <div id='calendar'></div>
</div>

<!-- MODAL AGREGAR LICENCIA -->
<div class="modal fade" id="modalAgregarLicencia" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form id="formAgregarLicencia" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header bg-primary text-white">
          <h5 class="modal-title">Registrar nueva licencia</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Estudiante</label>
            <select name="id_estudiante" id="selectEstudiante" class="form-control" required></select>
          </div>
          <div class="form-group">
            <label>Carrera</label>
            <select name="id_carrera" id="selectCarrera" class="form-control" required></select>
          </div>
          <div class="form-group">
            <label>Curso</label>
            <select name="id_curso" id="selectCurso" class="form-control" required></select>
          </div>
          <div class="form-group">
            <label>Fecha inicio</label>
            <input type="date" name="fecha_inicio" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Fecha fin</label>
            <input type="date" name="fecha_fin" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Motivo</label>
            <select name="motivo" class="form-control" required>
              <option value="Médica">Médica</option>
              <option value="Familiar">Familiar</option>
              <option value="Viaje">Viaje</option>
              <option value="Otros">Otros</option>
            </select>
          </div>
          <div class="form-group">
            <label>Justificativo</label>
            <input type="file" name="justificativo" class="form-control-file" accept="application/pdf,image/*" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- MODAL EDITAR LICENCIA -->
<div class="modal fade" id="modalEditarLicencia" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form id="formEditarLicencia" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title">Editar licencia</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id_licencia" id="editarIdLicencia">

          <div class="form-group">
            <label>Fecha inicio</label>
            <input type="date" name="fecha_inicio" id="editarFechaInicio" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Fecha fin</label>
            <input type="date" name="fecha_fin" id="editarFechaFin" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Motivo</label>
            <select name="motivo" id="editarMotivo" class="form-control" required>
              <option value="Médica">Médica</option>
              <option value="Familiar">Familiar</option>
              <option value="Viaje">Viaje</option>
              <option value="Otros">Otros</option>
            </select>
          </div>
          <div class="form-group">
            <label>Justificativo actual</label>
            <div id="contenedorJustificativo"></div>
          </div>
          <div class="form-group">
            <label>Cambiar justificativo</label>
            <input type="file" name="justificativo" class="form-control-file" accept="application/pdf,image/*">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-warning">Actualizar</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="button" class="btn btn-danger" id="btnEliminarLicencia">Eliminar</button>
        </div>
      </div>
    </form>
  </div>
</div>
