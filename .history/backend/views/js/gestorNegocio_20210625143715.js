/*=============================================
=============================================*/
$("#btnAgregarNegocio").click(function(){

	$("#agregarNegocio").toggle(400);

})

/*=============================================
Subir Imagen a través del Input         
=============================================*/
$("#subirFoto").change(function(){

	imagen = this.files[0];

	//Validar tamaño de la imagen

	imagenSize = imagen.size;

	if(Number(imagenSize) > 2000000){

		$("#arrastreImagenNegocio").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>')

	}

	else{

		$(".alerta").remove();

	}

	// Validar tipo de la imagen

	imagenType = imagen.type;

	if(imagenType == "image/jpeg" || imagenType == "image/png"){

		$(".alerta").remove();
	}

	else{

		$("#arrastreImagenNegocio").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')

	}

	/*=============================================
	Mostrar imagen con AJAX       
	=============================================*/
	if(Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png"){

		var datos = new FormData();

		datos.append("imagen", imagen);

		$.ajax({
			url:"views/ajax/gestorNegocio.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function(){

					$("#arrastreImagenNegocio").before('<img src="views/images/status.gif" id="status">');

				},
			success: function(respuesta){
				
					$("#status").remove();

					if(respuesta == 0){

						$("#arrastreImagenNegocio").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')

					}else{

						$("#arrastreImagenNegocio").html('<div id="imagenNegocio"><img src="'+respuesta.slice(6)+'" class="img-thumbnail"></div>');

					}

			}

		})

	}

})

/*=============================================
Editar Negocio        
=============================================*/

function cierraNegocios() {
	// history.back();
window.location = "negocios"
}
$(".editarNegocio").click(function(){
	

	idNegocio = $(this).parent().parent().attr("id");
	rutaImagen = $("#"+idNegocio).children("img").attr("src");
	nombreNegocio = $("#"+idNegocio).children("h1").html();
	telefono = $("#"+idNegocio).children("p").html();
	direccion = $("#"+idNegocio).children("h5").html();
    ubicacion = $("#"+idNegocio).children("input").val();


	
	$("#"+idNegocio).html('<form method="post" enctype="multipart/form-data"><span><input style="width:10%; padding:5px 0; margin-top:4px" type="button" class="btn btn-danger pull-right" value="Cancelar" data-dismiss="modal"  onClick="cierraNegocios()"><input style="width:10%; padding:5px 0; margin-top:4px" type="submit" class="btn btn-primary pull-right" value="Guardar"></span><div id="editarImagen"><input style="display:none" type="file" id="subirNuevaFoto" class="btn btn-default"><div id="nuevaFoto"><span class="fa fa-times cambiarImagen"></span><img src="'+rutaImagen+'" class="img-thumbnail"></div></div><input type="text" value="'+nombreNegocio+'" name="editarNombreNegocio"><textarea cols="30" rows="5" name="editarTelefono">'+telefono+'</textarea><textarea cols="30" rows="10" name="editarDireccion">'+direccion+'</textarea><textarea cols="30" rows="10" name="editarUbicacion" id="editarUbicacion">'+ubicacion+'</textarea><input type="hidden" value="'+idNegocio+'" name="idNegocio"><input type="hidden" value="'+imagenNegocio+'" name="fotoAntigua"><hr></form>');

	$(".cambiarImagen").click(function(){
	
		$(this).hide();

		$("#subirNuevaFoto").show();
		$("#subirNuevaFoto").css({"width":"90%"});
		$("#nuevaFoto").html("");
		$("#subirNuevaFoto").attr("name","editarImagen");
		$("#subirNuevaFoto").attr("required",true);

		$("#subirNuevaFoto").change(function(){

			imagen = this.files[0];
			imagenSize = imagen.size;

			if(Number(imagenSize) > 2000000){

				$("#editarImagen").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>')

			}

			else{

				$(".alerta").remove();

			}

			imagenType = imagen.type;
			
			if(imagenType == "image/jpeg" || imagenType == "image/png"){

				$(".alerta").remove();

			}

			else{

				$("#editarImagen").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')

			}

			if(Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png"){

				var datos = new FormData();

				datos.append("imagen", imagen);	

				$.ajax({
						url:"views/ajax/gestorNegocio.php",
						method: "POST",
						data: datos,
						cache: false,
						contentType: false,
						processData: false,
						beforeSend: function(){

							$("#nuevaFoto").html('<img src="views/images/status.gif" style="width:15%" id="status2">');

						},
						success: function(respuesta){
				
							$("#status2").remove();

							if(respuesta == 0){

								$("#editarImagen").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')
							
							}

							else{

								$("#nuevaFoto").html('<img src="'+respuesta.slice(6)+'" class="img-thumbnail">');

							}
							
						}

				})	

			}

		})

	})

})

