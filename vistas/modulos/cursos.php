<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar cursos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar cursos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCurso">
          
          Agregar curso

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>Curso</th>
           <th>Carrera</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $cursos = ControladorCursos::ctrMostrarCursos($item, $valor);

          foreach ($cursos as $key => $value) {
           
            echo ' <tr>

                    <td>'.($key+1).'</td>

                    <td class="text-uppercase">'.$value["curso"].'</td>

                    <td class="text-uppercase">'.$value["carrera"].'</td>

                    <td>

                      <div class="btn-group">
                          
                        <button class="btn btn-warning btnEditarCurso" idCurso="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarCurso"><i class="fa fa-pencil"></i></button>

                        <button class="btn btn-danger btnEliminarCurso" idCurso="'.$value["id"].'"><i class="fa fa-times"></i></button>

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
MODAL AGREGAR CURSO
======================================-->

<div id="modalAgregarCurso" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar curso</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE DEL CURSO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-book"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoCurso" placeholder="Ingresar curso" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR CARRERA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span> 

                <select class="form-control input-lg" name="nuevaCarrera" required>
                  
                  <option value="">Seleccionar carrera</option>

                  <?php

                    $carreras = ControladorCursos::ctrMostrarCarreras();

                    foreach ($carreras as $key => $value) {
                      
                      echo '<option value="'.$value["id"].'">'.$value["carrera"].'</option>';
                    }

                  ?>

                </select>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar curso</button>

        </div>

        <?php

          $crearCurso = new ControladorCursos();
          $crearCurso -> ctrCrearCurso();

        ?>

      </form>

    </div>

  </div>

</div>

<!--=====================================
MODAL EDITAR CURSO
======================================-->

<div id="modalEditarCurso" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Editar curso</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE DEL CURSO -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-book"></i></span> 

                <input type="text" class="form-control input-lg" name="editarCurso" id="editarCurso" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR CARRERA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span> 

                <select class="form-control input-lg" name="editarCarrera" id="editarCarrera" required>
                  
                  <option value="" id="carreraActual"></option>

                  <?php

                    $carreras = ControladorCursos::ctrMostrarCarreras();

                    foreach ($carreras as $key => $value) {
                      
                      echo '<option value="'.$value["id"].'">'.$value["carrera"].'</option>';
                    }

                  ?>

                </select>

              </div>

            </div>

            <!-- INPUT OCULTO PARA EL ID DEL CURSO -->
            <input type="hidden" name="idCurso" id="idCurso">
  
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

          $editarCurso = new ControladorCursos();
          $editarCurso -> ctrEditarCurso();

        ?> 

      </form>

    </div>

  </div>

</div>

<?php

  $borrarCurso = new ControladorCursos();
  $borrarCurso -> ctrBorrarCurso();

?>