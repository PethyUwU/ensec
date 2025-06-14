<!-- Vista de gestión -->
<div class="content-wrapper">
    <section class="content-header">
        <h1>Gestión de Gestiones</h1>
    </section>

    <section class="content">
        <!-- Botón para abrir el modal de agregar gestión -->
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarGestion">Agregar Gestión</button>
        
        <!-- Tabla de gestiones -->
        <table id="tablaGestiones" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Gestión</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí se llenarán las gestiones utilizando PHP -->
                <?php

                $item = null;
                $valor = null;

                // Obtener todas las gestiones
                $gestiones = ControladorGestiones::ctrMostrarGestiones($item, $valor);

                foreach ($gestiones as $key => $value) {
                    echo '<tr>
                            <td>' . ($key + 1) . '</td>
                            <td class="text-uppercase">' . $value["gestion"] . '</td>
                            <td>
                                <div class="btn-group">
                                    <button class="btn btn-warning btnEditarGestion" data-idGestion="' . $value["id_gestion"] . '" data-toggle="modal" data-target="#modalEditarGestion"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btnEliminarGestion" data-idGestion="' . $value["id_gestion"] . '"><i class="fa fa-times"></i></button>
                                </div>  
                            </td>
                          </tr>';
                }

                ?>
            </tbody>
        </table>
    </section>
</div>

<!-- Modal Agregar Gestión -->
<div id="modalAgregarGestion" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formAgregarGestion" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Agregar Gestión</h4>
                </div>
                <div class="modal-body">
                    <input type="text" name="gestion" id="gestion" class="form-control" placeholder="Ingrese la gestión" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Editar Gestión -->
<div id="modalEditarGestion" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEditarGestion" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Editar Gestión</h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_gestion" id="id_gestion_edit">
                    <input type="text" name="gestion" id="gestion_edit" class="form-control" placeholder="Ingrese la nueva gestión" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
