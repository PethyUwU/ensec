<?php
// Variables que deben venir de $_GET o formulario o sesión
$idAsignatura = $_GET['id_asignatura'] ?? 1; // ejemplo
$fecha = $_GET['fecha'] ?? date('Y-m-d');
$idDocente = $_SESSION['id_docente'] ?? 1; // por ejemplo, según sesión

$datos = ControladorAsistencia::ctrMostrarEstudiantesAsistencia($idAsignatura, $fecha);
$estudiantes = $datos['estudiantes'];
$asistencia = $datos['asistencia'];
?>

<h2>Tomar Asistencia para el día <?= $fecha ?></h2>
<form id="formAsistencia">
  <input type="hidden" name="id_asignatura" value="<?= $idAsignatura ?>">
  <input type="hidden" name="fecha" value="<?= $fecha ?>">
  <input type="hidden" name="id_docente" value="<?= $idDocente ?>">

  <table border="1" cellpadding="5" cellspacing="0">
    <thead>
      <tr>
        <th>#</th>
        <th>Estudiante</th>
        <th>Estado</th>
        <th>Observación</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($estudiantes as $index => $est): 
        $estado = $asistencia[$est['id_estudiante']]['estado'] ?? 'presente';
        $observacion = $asistencia[$est['id_estudiante']]['observacion'] ?? '';
      ?>
      <tr>
        <td><?= $index + 1 ?></td>
        <td><?= $est['nombre'] . ' ' . $est['apellidoP'] . ' ' . $est['apellidoM'] ?></td>
        <td>
          <select name="asistencia[<?= $est['id_estudiante'] ?>][estado]">
            <option value="presente" <?= $estado == 'presente' ? 'selected' : '' ?>>Presente</option>
            <option value="ausente" <?= $estado == 'ausente' ? 'selected' : '' ?>>Ausente</option>
            <option value="retraso" <?= $estado == 'retraso' ? 'selected' : '' ?>>Retraso</option>
            <option value="licencia" <?= $estado == 'licencia' ? 'selected' : '' ?>>Licencia</option>
          </select>
        </td>
        <td>
          <input type="text" maxlength="50" name="asistencia[<?= $est['id_estudiante'] ?>][observacion]" value="<?= htmlspecialchars($observacion) ?>">
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  <button type="submit">Guardar Asistencia</button>
</form>

<div id="resultado"></div>

<script src="js/asistencia.js"></script>
