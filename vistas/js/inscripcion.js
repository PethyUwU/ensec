function cargarCursos(idCarrera, $destino, selectedId=""){
  if(!idCarrera){ $destino.html('<option value="">Seleccione primero una carrera</option>'); return; }
  $.get('ajax/inscripcion.ajax.php', { accion:'cursos', id_carrera:idCarrera }, function(res){
    var opts = '<option value="">Seleccionar curso</option>';
    try { res.forEach(c => opts += '<option value="'+c.id_curso+'">'+c.nombre+'</option>'); }
    catch(e){ opts = '<option value="">(Sin cursos)</option>'; }
    $destino.html(opts);
    if(selectedId){ $destino.val(String(selectedId)).trigger('change'); }
  }, 'json');
}

function cargarParalelos(idCurso, $destino, selectedId=""){
  if(!idCurso){ $destino.html('<option value="">Seleccione primero un curso</option>'); return; }
  $.get('ajax/inscripcion.ajax.php', { accion:'paralelos', id_curso:idCurso }, function(res){
    var opts = '<option value="">Seleccionar paralelo</option>';
    try { res.forEach(p => opts += '<option value="'+p.id_paralelo+'">'+p.nombre+'</option>'); }
    catch(e){ opts = '<option value="">(Sin paralelos)</option>'; }
    $destino.html(opts);
    if(selectedId){ $destino.val(String(selectedId)); }
  }, 'json');
}

/* NUEVO */
$('#selCarrera_nueva').on('change', function(){
  cargarCursos($(this).val(), $('#selCurso_nuevo'));
});
$('#selCurso_nuevo').on('change', function(){
  cargarParalelos($(this).val(), $('#selParalelo_nuevo'));
});

/* EDITAR */
$('.tablas').on('click', '.btnEditarInscripcion', function(){
  var id = $(this).attr('idInscripcion');
  $.get('ajax/inscripcion.ajax.php', { accion:'inscripcion', id_inscripcion:id }, function(d){
    $('#idInscripcionEditar').val(d.id_inscripcion || '');
    $('#id_usuario_edit').val(d.id_usuario || '').trigger('change');
    $('#id_gestion_edit').val(d.id_gestion || '').trigger('change');
    $('#selCarrera_edit').val(d.id_carrera || '');
    cargarCursos(d.id_carrera, $('#selCurso_edit'), d.id_curso);
    setTimeout(function(){ cargarParalelos(d.id_curso, $('#selParalelo_edit'), d.id_paralelo); }, 150);
    $('#id_turno_edit').val(d.id_turno || '').trigger('change');
    if(d.fecha_inscripcion){
      var fv = (d.fecha_inscripcion+'').replace(' ', 'T').substring(0,16);
      $('#fecha_inscripcion_edit').val(fv);
    }
  }, 'json');
});

/* ELIMINAR */
$('.tablas').on('click', '.btnEliminarInscripcion', function(){
  var id = $(this).attr('idInscripcion');
  if(confirm('¿Eliminar la inscripción #'+id+'?')){
    window.location = "index.php?ruta=inscripcion&idInscripcion="+id;
  }
});
