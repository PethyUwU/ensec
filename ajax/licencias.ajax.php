<?php
require_once "../controladores/licencias.controlador.php";
require_once "../modelos/licencias.modelo.php";

if (isset($_POST['accion'])) {

    switch ($_POST['accion']) {

        case 'listar':
            $licencias = ControladorLicencias::ctrMostrarLicencias();
            $eventos = array();

            foreach ($licencias as $licencia) {
                $eventos[] = array(
                    'id' => $licencia['id_licencia'],
                    'title' => $licencia['motivo'],
                    'start' => $licencia['fecha_inicio'],
                    'end' => date('Y-m-d', strtotime($licencia['fecha_fin'] . ' +1 day')),
                    'extendedProps' => array(
                        'fecha_fin' => $licencia['fecha_fin'],
                        'motivo' => $licencia['motivo'],
                        'justificativo' => $licencia['justificativo']
                    )
                );
            }

            echo json_encode($eventos);
            break;

        case 'crear':
            $ruta = guardarArchivo($_FILES['justificativo']);

            $datos = array(
                'id_estudiante' => $_POST['id_estudiante'],
                'id_carrera' => $_POST['id_carrera'],
                'id_curso' => $_POST['id_curso'],
                'fecha_inicio' => $_POST['fecha_inicio'],
                'fecha_fin' => $_POST['fecha_fin'],
                'motivo' => $_POST['motivo'],
                'justificativo' => $ruta
            );

            echo json_encode(ControladorLicencias::ctrCrearLicencia($datos));
            break;

        case 'editar':
            $ruta = isset($_FILES['justificativo']) && $_FILES['justificativo']['error'] == 0
                ? guardarArchivo($_FILES['justificativo'])
                : null;

            $datos = array(
                'id_licencia' => $_POST['id_licencia'],
                'fecha_inicio' => $_POST['fecha_inicio'],
                'fecha_fin' => $_POST['fecha_fin'],
                'motivo' => $_POST['motivo'],
                'justificativo' => $ruta
            );

            echo json_encode(ControladorLicencias::ctrEditarLicencia($datos));
            break;

        case 'eliminar':
            echo json_encode(ControladorLicencias::ctrEliminarLicencia($_POST['id_licencia']));
            break;

        case 'cargarEstudiantes':
            $estudiantes = ControladorLicencias::ctrCargarEstudiantes();
            foreach ($estudiantes as $row) {
                echo "<option value='{$row['id_estudiante']}'>Estudiante {$row['id_estudiante']}</option>";
            }
            break;

        case 'cargarCarreras':
            $carreras = ControladorLicencias::ctrCargarCarreras();
            foreach ($carreras as $row) {
                echo "<option value='{$row['id_carrera']}'>{$row['carrera']}</option>";
            }
            break;

        case 'cargarCursos':
            $cursos = ControladorLicencias::ctrCargarCursos();
            foreach ($cursos as $row) {
                echo "<option value='{$row['id_curso']}'>{$row['curso']}</option>";
            }
            break;
    }
}

function guardarArchivo($file)
{
    $directorio = "../vistas/archivos/licencias/";
    if (!file_exists($directorio)) {
        mkdir($directorio, 0777, true);
    }

    $nombreArchivo = uniqid() . "_" . basename($file['name']);
    $rutaFinal = $directorio . $nombreArchivo;
    move_uploaded_file($file['tmp_name'], $rutaFinal);
    return substr($rutaFinal, 3); 
}
