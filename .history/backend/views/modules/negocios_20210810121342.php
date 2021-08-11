<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:ingreso");

	exit();

}

include "views/modules/botonera.php";
include "views/modules/cabezote.php";

?>
<!-- <script>
document.getElementById("email").addEventListener("input", function() {
    campo = event.target;
    valido = document.getElementById("emailOK");
        
    emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
    //Se muestra un texto a modo de ejemplo, luego va a ser un icono
    if (emailRegex.test(campo.value)) {
      valido.innerText = "válido";
    } else {
      valido.innerText = "incorrecto";
    }
});
</script> -->

<!--=====================================
NEGOCIO ADMINISTRABLE          
======================================-->
<div id="seccionArticulos" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
	
	<button id="btnAgregarNegocio" class="btn btn-info btn-lg"><a style="color:white;"><span class="fa fa-plus-square"></span> Agregar Negocio</a></button>

	<!--==== AGREGAR ARTÍCULO  ====-->

	<div id="agregarNegocio" style="display:none">
		
		<form method="post" enctype="multipart/form-data">

			<input name="nombresNegocios" type="text" style="text-transform:capitalize;" placeholder="Nombre de Negocio" class="form-control" required>
			
            <label> Imagen</label>
			<input type="file" name="imagen" class="btn btn-default" id="subirFoto" required>
            
            <p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>
			<div id="arrastreImagenArticulo"></div>	
            <label> Teléfono</label>
			<input name="telefonoNegocio" type="number" onkeydown="return event.keyCode !== 69"  minlength="10" maxlength="10"  oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="Teléfono" class="form-control" required>
			<input value="https://wa.me/593" name="WhatsApp" placeholder="complete el link con su numero sin el 0 al inicio" type="tel" onkeydown="return event.keyCode !== 69"  minlength="26" maxlength="26"  oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" placeholder="WhatsApp" class="form-control" required>
			<input name="correoNegocio" type="email" id="email"  placeholder="Email" class="form-control" required><span id="emailOK"></span>
			<input name="direccionNegocio" type="text"  style="text-transform:uppercase;" placeholder="Direccion" class="form-control" required>
			<input name="ubicacionNegocio" type="text" placeholder="Ingrese un link http de la Ubicación" class="form-control" required>
			<input type="hidden" value="privado" name="estadoNegocios">

			<input type="submit" id="guardarNegocio" value="Guardar negocio" class="btn btn-primary">

		</form>

	</div>

	<?php

		$guardarNegocio = new GestorNegocio();
		$guardarNegocio -> guardarNegocioController();
	
	?>

	<hr>

	<!--==== EDITAR ARTÍCULO  ====-->

	<ul id="editarArticulo">

	<?php
		$mostrarNegocio = new GestorNegocio();
		$mostrarNegocio -> mostrarNegociosController();
		$mostrarNegocio -> confirmarBorrarNegocioController();
		$mostrarNegocio -> borrarNegocioController();
		$mostrarNegocio -> editarNegocioController();

		// $mostrarCategoria = new gestorCategorias();
		// $mostrarCategoria -> mostrarCategoriaController();
		// $mostrarArticulo -> borrarArticuloController();
		// $mostrarArticulo -> editarArticuloController();

	?>

	</ul>
</div>