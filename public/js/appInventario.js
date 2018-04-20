$(function () {
    $('#tablaInfo').DataTable()
})

$(document).ready(function(){

	/* Accion que permite mostrar o ocultar el formulario de creacion */
	$("#btnAgregar").click(function(){
		$("#divForm").toggle('500');
	})

	/* Metodo para obtener la informacion del registro que se desea editar y mostrarla en el formulario de modificacion */
	$('a[id=btn-editar]').on('click', function(){
		/* Se toma la ruta desde el id del TD donde esta la opcion Editar */
		var ruta = $(this).parent().attr('id')
		/* Se envia la informacion al metodo EDIT del controlador para obtener la informacion del registro y mostrarla en el formulario editar */
		$.get(ruta, function (data) {
			$("#formEdicion input").each(function(){
				$(this).val(data[$(this).attr('name')])
			});
			$("#formEdicion select").each(function(){
				$(this).val(data[$(this).attr('name')])
			});
			$("#formEdicion textarea").each(function(){
				$(this).val(data[$(this).attr('name')])
			});
	    })

	});
})
