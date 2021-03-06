/*=============================================
=============================================*/
$("#btnAgregarProductoServicio").click(function(){

	$("#agregarProductoServicio").toggle(400);

})

/*=============================================
Subir Imagen a través del Input         
=============================================*/
$("#subirFoto").change(function(){

	imagen = this.files[0];

	//Validar tamaño de la imagen

	imagenSize = imagen.size;

	if(Number(imagenSize) > 2000000){

		$("#arrastreImagenProductoServicio").before('<div class="alert alert-warning alerta text-center">El archivo excede el peso permitido, 200kb</div>')

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

		$("#arrastreImagenProductoServicio").before('<div class="alert alert-warning alerta text-center">El archivo debe ser formato JPG o PNG</div>')

	}

	/*=============================================
	Mostrar imagen con AJAX       
	=============================================*/
	if(Number(imagenSize) < 2000000 && imagenType == "image/jpeg" || imagenType == "image/png"){

		var datos = new FormData();

		datos.append("imagen", imagen);

		$.ajax({
			url:"views/ajax/gestorProductoServicios.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			beforeSend: function(){

					$("#arrastreImagenProductoServicio").before('<img src="views/images/status.gif" id="status">');

				},
			success: function(respuesta){
				
					$("#status").remove();

					if(respuesta == 0){

						$("#arrastreImagenProductoServicio").before('<div class="alert alert-warning alerta text-center">La imagen es inferior a 800px * 400px</div>')

					}else{

						$("#arrastreImagenProductoServicio").html('<div id="imagenProductoServicio"><img src="'+respuesta.slice(6)+'" class="img-thumbnail"></div>');

					}

			}

		})

	}

})

/*=============================================
Editar ProductoServicio        
=============================================*/

function cierraProductoServicios() {
	// history.back();
window.location = "productoservicios"
}
$(".editarProductoServicio").click(function(){
	

	idProductoServicio = $(this).parent().parent().attr("id");
	nombreProductoServicio = $("#"+idProductoServicio).children("h1").html();
    descripcion = $("#"+idProductoServicio).children("h1").html();
    imagenRuta = $("#"+idProductoServicio).children("img").attr("src");
	precio = $("#"+idProductoServicio).children("h2").html();
    cantidad = $("#"+idProductoServicio).children("h3").html();
    disponibles = $("#"+idProductoServicio).children("h4").html();
	idTipoProductoServicio = $("#"+idProductoServicio).children("p").html();
	idCategoria = $("#"+idProductoServicio).children("input").val();
    idNegocio = $("#"+idProductoServicio).children("input").val();


	
	$("#"+idProductoServicio).html('<form method="post" enctype="multipart/form-data"><span><input style="width:10%; padding:5px 0; margin-top:4px" type="button" class="btn btn-danger pull-right" value="Cancelar" data-dismiss="modal"  onClick="cierraProductoServicios()"><input style="width:10%; padding:5px 0; margin-top:4px" type="submit" class="btn btn-primary pull-right" value="Guardar"></span><div id="editarImagen"><input style="display:none" type="file" id="subirNuevaFoto" class="btn btn-default"><div id="nuevaFoto"><span class="fa fa-times cambiarImagen"></span><img src="'+imagenRuta+'" class="img-thumbnail"></div></div><input type="text" value="'+nombreProductoServicio+'" name="editarNombreProductoServicio"><textarea cols="30" rows="5" name="editarDescripcion">'+descripcion+'</textarea><input type="text" value="'+precio+'" name="editarPrecio"><input type="text" value="'+cantidad+'" name="editarCantidad"><input type="text" value="'+disponibles+'" name="editarDisponibles">       <select name="nuevoRol" class="form-control" required>

	<option value="">Seleccione el Rol</option>
	<option value="0">Administrador</option></select><input type="hidden" value="'+idProductoServicio+'" name="idProductoServicio"><input type="hidden" value="'+imagenRuta+'" name="fotoAntigua"><hr></form>');

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
						url:"views/ajax/gestorProductoServicio.php",
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
