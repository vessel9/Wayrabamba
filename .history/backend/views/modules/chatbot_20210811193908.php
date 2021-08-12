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

<div id="crearPerfil" class="col-lg-5 col-md-12 col-sm-6 col-xs-12">
	
	<button id="btnAgregarChat" class="btn btn-success btn-lg"><a style="color:white;"><span class="fa fa-plus-square"></span>  Preguntas/Respuestas</a></button>

	<!--==== AGREGAR PREGUNTAS Y RESPUESTAS ====-->

	<div id="agregarChat" style="display:none">
		
		<form method="post" enctype="multipart/form-data">

			<input name="preguntaChat"  type="text" placeholder="Pregunta ?" class="form-control" required>
            <input name="respuestaChat"  type="text" placeholder="Respuesta =" class="form-control" required>

			<input type="submit" id="guardarChat" value="Guardar Tipo Pregunta/Respuesta" class="btn btn-primary">

		</form>

	</div>
	
	<?php

		$guardarTipoProductoServicio = new GestorChat();
		$guardarTipoProductoServicio -> guardarTipoProductoServicioController();
		$guardarTipoProductoServicio -> editarTipoProductoServicioController();
	?>
	<!--==== EDITAR ARTÍCULO  ====-->
	</hr>
	<div class="table-responsive">

	<table id="tablaSuscriptores2" class="table table-striped display">
    <thead>
      <tr>
        <th>Pregunta</th>
        <th>Respuesta</th>
        <th></th>
      </tr>
    </thead>
    <tbody>

    <?php

      $verTipoProductoServicio = new GestorChat();
	  $verTipoProductoServicio -> mostrarTipoProductoServicioController();
	  $verTipoProductoServicio -> confirmarBorrarTipoController();
	  $verTipoProductoServicio -> borrarTipoProductoServicioController();

    ?>
<hr>
    </tbody>
  </table>

  </div>
</div>