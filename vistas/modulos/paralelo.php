<div class="content-wrapper">
  <section class="content-header">
    <h1>Administrar Paralelos</h1>
    <ol class="breadcrumb">
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      <li class="active">Administrar paralelos</li>
    </ol>
  </section>

  <section class="content">
    <div class="box">
      <div class="box-header with-border">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarParalelo">
          Agregar paralelo
        </button>
      </div>

      <div class="box-body">
        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
          <thead>
            <tr>
              <th style="width:10px">#</th>
              <th>Paralelo</th>
              <th>Acciones</th>
            </tr> 
          </thead>
          <tbody>
            <?php
              $item = null;
              $valor = null;
              $paralelos = ControladorParalelos::ctrMostrarParalelos($item, $valor);

              foreach ($paralelos as $key => $value) {
                echo '<tr>
                        <td>'.($key+1).'</td>
                        <td class="text-uppercase">'.$value["paralelo"].'</td>
                        <td>
                          <div class="btn-group">
                            <button class="btn btn-warning btnEditarParalelo" idParalelo="'.$value["id_paralelo"].'" data-toggle="modal" data-target="#modalEditarParalelo"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btnEliminarParalelo" idParalelo="'.$value["id_paralelo"].'"><i class="fa fa-times"></i></button>
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

<!-- MODAL AGREGAR PARALELO -->
<div id="modalAgregarParalelo" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Agregar paralelo</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg" name="nuevoParalelo" placeholder="Ingresar paralelo" required>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar paralelo</button>
        </div>

        <?php
          $crearParalelo = new ControladorParalelos();
          $crearParalelo->ctrCrearParalelo();
        ?>
      </form>
    </div>
  </div>
</div>

<!-- MODAL EDITAR PARALELO -->
<div id="modalEditarParalelo" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form role="form" method="post">
        <div class="modal-header" style="background:#3c8dbc; color:white">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Editar paralelo</h4>
        </div>

        <div class="modal-body">
          <div class="box-body">
            <div class="form-group">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-th"></i></span>
                <input type="text" class="form-control input-lg" name="editarParalelo" id="editarParalelo" required maxlength="1">
                <input type="hidden" name="idParalelo" id="idParalelo" required>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>

        <?php
          $editarParalelo = new ControladorParalelos();
          $editarParalelo->ctrEditarParalelo();
        ?> 
      </form>
    </div>
  </div>
</div>

<?php
  $borrarParalelo = new ControladorParalelos();
  $borrarParalelo->ctrBorrarParalelo();
?>