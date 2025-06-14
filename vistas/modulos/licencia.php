<?php
// vistas/modulos/licencia.php
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>Solicitar Licencia</h1>
  </section>

  <section class="content">
    <div class="box box-primary">
      <form method="post" enctype="multipart/form-data">
        <div class="box-body">

          <div class="form-group">
            <label>Usuario:</label>
            <input type="text" class="form-control" value="<?php echo $_SESSION['usuario']; ?>" readonly>
          </div>

          <div class="form-group">
            <label>Password:</label>
            <input type="password" class="form-control" value="*****" readonly>
          </div>

          <div class="form-group">
            <label>Seleccionar Carrera:</label>
            <select class="form-control" name="nuevaCarrera" required>
              <option value="">Seleccione carrera</option>
              <?php
                $carreras = ControladorCarreras::ctrMostrarCarreras();
                foreach($carreras as $c){
                  echo '<option value="'.$c["id_carrera"].'">'.$c["carrera"].'</option>';
                }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label>Seleccionar Curso:</label>
            <select class="form-control" name="nuevoCurso" required>
              <option value="">Seleccione curso</option>
              <?php
                $cursos = ControladorCursos::ctrMostrarCursos();
                foreach($cursos as $curso){
                  echo '<option value="'.$curso["id_curso"].'">'.$curso["curso"].'</option>';
                }
              ?>
            </select>
          </div>

          <div class="form-group">
            <label>Fecha Inicio:</label>
            <input type="date" class="form-control" name="fechaInicio" required>
          </div>

          <div class="form-group">
            <label>Fecha Fin:</label>
            <input type="date" class="form-control" name="fechaFin" required>
          </div>

          <div class="form-group">
            <label>Motivo:</label>
            <select class="form-control" name="motivo" required>
              <option value="">Seleccione motivo</option>
              <option value="salud">Salud</option>
              <option value="familiar">Familiar</option>
              <option value="otro">Otro</option>
            </select>
          </div>

          <div class="form-group">
            <label>Justificativo (PDF, imagen):</label>
            <input type="file" class="form-control" name="justificativo" required>
          </div>

        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>

        <?php
          $licencia = new ControladorLicencias();
          $licencia->ctrCrearLicencia();
        ?>

      </form>
    </div>
  </section>
</div>


