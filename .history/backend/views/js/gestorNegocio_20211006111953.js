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

						$("#arrastreImagenNegocio").before('<div class="alert alert-warning alerta text-center">Se recomienda la imagen de 800px * 400px, esta es inferior pero se guaradara</div>')
						// $("#arrastreImagenNegocio").html('<div id="imagenNegocio"><img src="'+respuesta.slice(6)+'" class="img-thumbnail"></div>');

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
// function estados() {
// 	if($_SESSION["rol"] == 0){
// 		<select name="estado" class="form-control" required>
// 		<option value="">Selecciona Estado</option>
// 		<option value="publico">Publico</option>
// 		<option value="privado">Privado</option>
// 	 </select>				
// } else{
// 	  before("<input type='hidden' value='privado' name='estado'>");
// 	    }
// }



$(".editarNegocio").click(function(){
	

	idNegocio = $(this).parent().parent().attr("id");
	imagenNegocio = $("#"+idNegocio).children("img").attr("src");
	nombreNegocio = $("#"+idNegocio).children("h1").html();
	

	telefono = $("#"+idNegocio).children("div").children("p").html();
	link = $("#"+idNegocio).children("div").children("p").children("a").attr("href");
	correo = $("#"+idNegocio).children("div").children("h4").html();
	direccion = $("#"+idNegocio).children("div").children("h5").html();
    ubicacion = $("#"+idNegocio).children("h6").html(); 
	estado = $("#"+idNegocio).children("div").children("ul").html();
	// rol = $("#"+idNegocio).children("div").html();





	
	$("#"+idNegocio).html('<form method="post" enctype="multipart/form-data"><span><input style="width:10%; padding:5px 0; margin-top:4px" type="button" class="btn btn-danger pull-right" value="Cancelar" data-dismiss="modal"  onClick="cierraNegocios()"><input style="width:10%; padding:5px 0; margin-top:4px" type="submit" class="btn btn-primary pull-right" value="Guardar"></span><div id="editarImagen"><input style="display:none" type="file" id="subirNuevaFoto" class="btn btn-default"><div id="nuevaFoto"><span class="fa fa-times cambiarImagen"></span><img src="'+imagenNegocio+'" class="img-thumbnail"></div></div><br><br><label id="titulos"> Nombre del Negocio</label><input type="text" style="text-transform:capitalize;" value="'+nombreNegocio+'" name="editarNombreNegocio"><label id="titulos"> Teléfono</label><input type="number" value="'+telefono+'" onkeydown="return event.keyCode !== 69"  minlength="10" maxlength="10"  oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="editarTelefono"><label id="titulos"> Link del WhatsApp</label><input type="text" value="'+link+'" name="editarWhatsApp" type="tel" onkeydown="return event.keyCode !== 69"  minlength="26" maxlength="26"  oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"><label id="titulos"> Correo del Negocio</label><input type="email" id="email" value="'+correo+'" name="editarCorreo"><label id="titulos"> Dirección</label><input type="text"  style="text-transform:uppercase;" value="'+direccion+'" name="editarDireccion" id="editarUbicacion"><label id="titulos">Ubicación</label><textarea name="editarUbicacion" id="editarContenido" cols="30" rows="10">'+ubicacion+'</textarea><label id="titulos"> Estado</label><select name="editarEstadoNegocios" class="form-control"><option value="'+estado+'">'+estado+'</option><option value="publico">Publico</option> <option value="privado">Privado</option></select><input type="hidden" value="'+idNegocio+'" name="idNegocio"><input type="hidden" value="'+imagenNegocio+'" name="fotoAntigua"><hr></form>');

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
/*=============================================
VALIDACION CORREO
=============================================*/
// document.getElementById('email').addEventListener('input', function () {
//     campo = event.target;
//     valido = document.getElementById('emailOK');
        
//     emailRegex = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
//     //Se muestra un texto a modo de ejemplo, luego va a ser un icono
//     if (emailRegex.test(campo.value)) {
//       valido.innerText = "válido";
//     } else {
//       valido.innerText = "incorrecto";
//     }
// });
/*=====  Fin de VALIDACION CORREO  ======*/

document.getElementById('email').addEventListener('input', function() {
    campo = event.target;
    valido = document.getElementById('emailOK');
        
  var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

 var regOficial = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (reg.test(campo.value) && regOficial.test(campo.value)) {
      valido.innerText = "válido oficial y extraoficialmente";
    } else if (reg.test(campo.value)) {
      valido.innerText = "válido extraoficialmente";

    } else {
      valido.innerText = "incorrecto";

}
});