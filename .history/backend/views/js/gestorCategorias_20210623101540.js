/*=============================================
Agregar categorias        
=============================================*/
$("#btnAgregarCategoria").click(function(){

	$("#agregarCategoria").toggle(400);

})

/*=============================================
Editar Artículo        
=============================================*/

function cierraArticulos() {
	// history.back();
window.location = "articulos"
}
$(".editarCategoria").click(function(){
	

	idCategoria= $(this).parent().parent().attr("id");
	rutaImagen = $("#"+idArticulo).children("img").attr("src");
	nombreCategorias = $("#"+idCategoria).children("h1").html();
	introduccion = $("#"+idArticulo).children("p").html();
	contenido = $("#"+idArticulo).children("input").val();

	
	$("#"+idCategoria).html('<form method="post" enctype="multipart/form-data"><span><input style="width:10%; padding:5px 0; margin-top:4px" type="button" class="btn btn-danger pull-right" value="Cancelar" data-dismiss="modal"  onClick="cierraArticulos()"><input style="width:10%; padding:5px 0; margin-top:4px" type="submit" class="btn btn-primary pull-right" value="Guardar"></span><div id="editarImagen"><input style="display:none" type="file" id="subirNuevaFoto" class="btn btn-default"><div id="nuevaFoto"><span class="fa fa-times cambiarImagen"></span><img src="'+rutaImagen+'" class="img-thumbnail"></div></div><input type="text" value="'+titulo+'" name="editarTitulo"><textarea cols="30" rows="5" name="editarIntroduccion">'+introduccion+'</textarea><textarea name="editarContenido" id="editarContenido" cols="30" rows="10">'+contenido+'</textarea><input type="hidden" value="'+idArticulo+'" name="id"><input type="hidden" value="'+rutaImagen+'" name="fotoAntigua"><hr></form>');


})