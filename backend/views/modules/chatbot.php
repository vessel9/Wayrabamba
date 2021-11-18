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
GESTOR DE PREGUNTAS Y RESPUESTAS PARA EL CHATBOT        
======================================-->
<?php 
if($_SESSION["rol"] == 0){
	?>
<div id="crearPerfil" class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
	
	<button id="btnAgregarChat" class="btn btn-success btn-lg"><a style="color:white;"><span class="fa fa-plus-square"></span>  Preguntas/Respuestas</a></button>

	<!--==== AGREGAR PREGUNTAS Y RESPUESTAS ====-->

	<div id="agregarChat" style="display:none">
		
		<form method="post" enctype="multipart/form-data">
		<br>
			<input name="preguntaChat"  type="text" placeholder="Pregunta ?" class="form-control" required>
			<br>
            <input name="respuestaChat"  type="text" placeholder="Respuesta =" class="form-control" required>
			<br>
			<input type="submit" id="guardarChat" value="Guardar Pregunta/Respuesta" class="btn btn-primary">

		</form>

	</div>
	
	<?php

		$guardarChat = new GestorChat();
		$guardarChat -> guardarChatController();
		$guardarChat -> editarChatController();
	?>
	<!--==== EDITAR ARTÍCULO  ====-->
	</hr>
	<div class="table-responsive">

	<table id="tablaSuscriptores2" class="table table-striped display">
    <thead>
      <tr>
        <th>Id</th>
        <th>Pregunta</th>
        <th>Respuesta</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

    <?php

      $verChatbot = new GestorChat();
	  $verChatbot -> mostrarChatController();
	  $verChatbot -> confirmarBorrarChatController();
	  $verChatbot -> borrarChatController();

    ?>
<hr>
    </tbody>
  </table>

  </div>
</div>
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