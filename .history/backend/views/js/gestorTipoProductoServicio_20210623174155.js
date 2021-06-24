/*=============================================
Agregar categorias        
=============================================*/
$("#btnAgregarCategoria").click(function(){

	$("#agregarCategoria").toggle(400);

})

/*=============================================
Editar Artículo        
=============================================*/

function cierraCategoria() {
	// history.back();
window.location = "tipoproductoservicio"
}
$(".editarCategoria").click(function(){
	

	idCategoria= $(this).parent().parent().attr("id");
	nombreCategorias = $("#"+idCategoria).children("h1").html();

	
	$("#"+idCategoria).html('<form method="post" enctype="multipart/form-data"><span><input style="width:10%; padding:5px 0; margin-top:4px" type="button" class="btn btn-danger pull-right" value="Cancelar" data-dismiss="modal"  onClick="cierraCategoria()"><input style="width:10%; padding:5px 0; margin-top:4px" type="submit" class="btn btn-primary pull-right" value="Guardar"></span><input type="text" value="'+nombreCategorias+'" name="editarNombre"><input type="hidden" value="'+idCategoria+'" name="idCategoria"><hr></form>');


})