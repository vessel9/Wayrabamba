/*=============================================
Agregar categorias        
=============================================*/
$("#btnAgregarTipoProductoServicio").click(function(){

	$("#agregarTipoProductoServicio").toggle(400);

})

/*=============================================
Editar Artículo        
=============================================*/

function cierraTipoProductoServicio() {
	// history.back();
window.location = "categorias"
}
$(".editarTipoProductoServicio").click(function(){
	

	idTipoProductoServicio= $(this).parent().parent().attr("id");
	nombreTipoProductoServicios = $("#"+idTipoProductoServicio).children("h1").html();

	
	$("#"+idTipoProductoServicio).html('<form method="post" enctype="multipart/form-data"><span><input style="width:10%; padding:5px 0; margin-top:4px" type="button" class="btn btn-danger pull-right" value="Cancelar" data-dismiss="modal"  onClick="cierraTipoProductoServicio()"><input style="width:10%; padding:5px 0; margin-top:4px" type="submit" class="btn btn-primary pull-right" value="Guardar"></span><input type="text" value="'+nombreTipoProductoServicios+'" name="editarNombre"><input type="hidden" value="'+idTipoProductoServicio+'" name="idTipoProductoServicio"><hr></form>');


})