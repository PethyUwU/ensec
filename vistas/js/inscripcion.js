/* ====== DATATABLE (consume el mismo ajax) ====== */
$('.tablaInscripcion').DataTable({
  ajax: { url: 'ajax/inscripcion.ajax.php?accion=datatable', dataSrc: 'data' },
  deferRender: true, retrieve: true, processing: true,
  language: {
    sProcessing:"Procesando...", sLengthMenu:"Mostrar _MENU_", sZeroRecords:"Sin resultados",
    sEmptyTable:"Sin datos", sInfo:"Mostrando _START_ a _END_ de _TOTAL_",
    sInfoEmpty:"Mostrando 0 a 0 de 0", sInfoFiltered:"(filtrado de _MAX_)", sSearch:"Buscar:",
    oPaginate:{sFirst:"Primero",sLast:"Último",sNext:"Siguiente",sPrevious:"Anterior"}
  }
});

/* ====== CARGA DE CATÁLOGOS (ajusta tus URLs si ya existen) ====== */
async function cargarSelect(url, $sel, placeholder){
  $sel.prop('disabled', true).html(`<option value="">${placeholder||'Seleccione'}</option>`);
  const r = await fetch(url); const data = await r.json();
  $sel.append(data.map(o=>`<option value="${o.id}">${o.nombre}</option>`)).prop('disabled', false);
}

$('#modalAgregarInscripcion').on('shown.bs.modal', async function(){
  await cargarSelect('api/estudiantes', $('#selEstudiante'), '-- Selecciona estudiante --');
  await cargarSelect('api/gestiones',   $('#selGestion'),   '-- Selecciona gestión --');
  await cargarSelect('api/carreras',    $('#selCarrera'),   '-- Selecciona carrera --');
  await cargarSelect('api/turnos',      $('#selTurno'),     '-- Selecciona turno --');
  $('#selCurso').html('<option value="">-- Selecciona curso --</option>').prop('disabled',true);
});

/* ====== DEPENDIENTE Carrera -> Cursos ====== */
$("#selCarrera").change(function(){
  const idCarrera = $(this).val();
  const $selCurso = $("#selCurso");
  if(!idCarrera){
    $selCurso.prop('disabled',true).html('<option value="">-- Selecciona curso --</option>');
    return;
  }
  const datos = new FormData();
  datos.append("accion","cursosPorCarrera");
  datos.append("id_carrera", idCarrera);

  $.ajax({
    url: "ajax/inscripcion.ajax.php",
    method: "POST",
    data: datos, cache:false, contentType:false, processData:false, dataType:"json",
    success: function(res){
      if(res.ok){
        const html = '<option value="">-- Selecciona curso --</option>' +
          res.data.map(x=>`<option value="${x.id_curso}">${x.nombre}</option>`).join('');
        $selCurso.html(html).prop('disabled',false);
      }else{
        $selCurso.prop('disabled',true).html('<option value="">-- Selecciona curso --</option>');
        swal("Ups", res.msg || "No se pudo cargar cursos", "error");
      }
    }
  });
});

/* ====== CREAR (id_responsable se toma en servidor) ====== */
$("#formNuevaInscripcion").on("submit", function(e){
  e.preventDefault();
  const datos = new FormData(this);
  datos.append("accion","crear");
  $.ajax({
    url:"ajax/inscripcion.ajax.php", method:"POST",
    data:datos, cache:false, contentType:false, processData:false, dataType:"json",
    success:function(r){
      if(r.ok){
        $('#modalAgregarInscripcion').modal('hide');
        $('.tablaInscripcion').DataTable().ajax.reload(null,false);
        swal("¡Guardado!","Inscripción registrada.","success");
      }else{
        swal("Error", r.msg || "No se pudo guardar", "error");
      }
    }
  });
});

/* ====== ELIMINAR ====== */
$(".tablaInscripcion tbody").on("click",".btnEliminarInscripcion", function(){
  const id = $(this).attr("idInscripcion");
  swal({
    title:'¿Eliminar inscripción?', text:"Esta acción no se puede deshacer", type:'warning',
    showCancelButton:true, confirmButtonColor:'#3085d6', cancelButtonColor:'#d33',
    confirmButtonText:'Sí, eliminar', cancelButtonText:'Cancelar'
  }).then(function(result){
    if(result.value){
      const fd = new FormData(); fd.append("accion","eliminar"); fd.append("id_inscripcion", id);
      $.ajax({
        url:"ajax/inscripcion.ajax.php", method:"POST",
        data:fd, cache:false, contentType:false, processData:false, dataType:"json",
        success:function(r){
          if(r.ok){ $('.tablaInscripcion').DataTable().ajax.reload(null,false); swal("Eliminado","","success"); }
          else { swal("Error", r.msg || "No se pudo eliminar", "error"); }
        }
      });
    }
  });
});
