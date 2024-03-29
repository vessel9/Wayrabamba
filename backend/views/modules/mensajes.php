<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:ingreso");

	exit();

}

include "views/modules/botonera.php";
include "views/modules/cabezote.php";

?>
<!--=====================================
MENSAJES        
======================================-->
<?php 
if($_SESSION["rol"] == 0){
	?>
<div id="bandejaMensajes" class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
 
	 <div >
	    <h1>Bandeja de Entrada</h1>
	    <hr>
	 </div>

	  <?php

	 	$mostrarMensajes = new MensajesController();
	 	$mostrarMensajes -> mostrarMensajesController();
	 	$mostrarMensajes -> borrarMensajesController();

	 ?>

</div>

<div id="lecturaMensajes" class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
 
	 <div >
	  <hr>
	   <button id="enviarCorreoMasivo"  class="btn btn-success">Enviar mensaje a todos los usuarios</button>
	    <hr>
	 </div>

	 <div id="visorMensajes">

	 <?php

	 	$responderMensajes = new MensajesController();
	 	$responderMensajes -> responderMensajesController();
	 	$responderMensajes -> mensajesMasivosController();

	 ?>


	 </div>


</div>

<script>

$(window).load(function(){

	var datos = new FormData();

	datos.append("revisionMensajes", 1);

	$.ajax({
			url:"views/ajax/gestorRevision.php",
			method: "POST",
			data: datos,
			cache: false,
			contentType: false,
			processData: false,
			success: function(respuesta){}

		});


})

</script>
<?php
} else{
echo <<< EOT
<link rel="stylesheet" href="./views/css/npage.css">
<div id="galeria" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
<section class="page_404">
	<div class="container">
		<div class="row">	
		<div class="col-sm-12 ">
		<div class="col-sm-10 col-sm-offset-1  text-center">
		<div class="four_zero_four_bg">
			<h1 class="text-center ">No tienes acceso</h1>
		
		
		</div>
		
		<div class="contant_box_404">
		<h3 class="h2">
		Consulta con un administrador de la pagina
		</h3>
		<a href="inicio" class="link_404">Inicio</a>
	</div>
		</div>
		</div>
		</div>
	</div>
</section>
</div>
EOT;
}
?>
<!--====  Fin de MENSAJES  ====-->