<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar gestiones
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar gestiones</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarGestion">
          
          Agregar gestión

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Gestión</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $gestiones = ControladorGestiones::ctrMostrarGestiones($item, $valor);

          foreach ($gestiones as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["gestion"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarGestion" idGestion="'.$value["id_gestion"].'" data-toggle="modal" data-target="#modalEditarGestion"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarGestion" idGestion="'.$value["id_gestion"].'"><i class="fa fa-times"></i></button>

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

<!--=====================================
MODAL AGREGAR GESTIÓN
======================================-->

<div id="modalAgregarGestion" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar gestión</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA GESTIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

            <!--<input type="text" class="form-control input-lg" name="nuevaGestion" placeholder="Ingresar gestión" required>-->
                <input type="number" class="form-control input-lg" name="nuevaGestion" min="2000" max="2100" placeholder="Ingresar gestión" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar gestión</button>

        </div>

        <?php

          $crearGestion = new ControladorGestiones();
          $crearGestion -> ctrCrearGestion();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR GESTIÓN
======================================-->

<div id="modalEditarGestion" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar gestión</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA LA GESTIÓN -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="editarGestion" id="editarGestion" required>

                 <input type="hidden" name="idGestion" id="idGestion" required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      <?php

          $editarGestion = new ControladorGestiones();
          $editarGestion -> ctrEditarGestion();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarGestion = new ControladorGestiones();
  $borrarGestion -> ctrBorrarGestion();

?>
