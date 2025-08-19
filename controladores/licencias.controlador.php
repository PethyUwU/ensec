<?php
class ControladorLicencias {

  static public function ctrMostrarLicencias() {
    return ModeloLicencias::mdlMostrarLicencias();
  }

  static public function ctrCrearLicencia($datos) {
    return ModeloLicencias::mdlCrearLicencia($datos);
  }

  static public function ctrEditarLicencia($datos) {
    return ModeloLicencias::mdlEditarLicencia($datos);
  }

  static public function ctrEliminarLicencia($id) {
    return ModeloLicencias::mdlEliminarLicencia($id);
  }

  static public function ctrCargarEstudiantes() {
    return ModeloLicencias::mdlCargarEstudiantes();
  }

  static public function ctrCargarCarreras() {
    return ModeloLicencias::mdlCargarCarreras();
  }

  static public function ctrCargarCursos() {
    return ModeloLicencias::mdlCargarCursos();
  }
}
