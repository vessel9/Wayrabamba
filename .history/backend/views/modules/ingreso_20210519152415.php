<!--=====================================
FORMULARIO DE INGRESO         
======================================-->
<div id="backIngreso">

	<form method="post" id="formIngreso" onsubmit="return validarIngreso()">
	<img src="views/images/logo2.png" class="img-responsive" alt="Image">

		<h1 id="tituloFormIngreso">INGRESO AL PANEL DE CONTROL</h1>

		<input class="form-control formIngreso" type="text" placeholder="Ingrese su Usuario" name="usuarioIngreso" id="usuarioIngreso">
		<input class="form-control formIngreso" type="password" placeholder="Ingrese su Contraseña" name="passwordIngreso" id="passwordIngreso">

		<?php

			$ingreso = new Ingreso();
			$ingreso -> ingresoController();
			
		?>

		<input class="form-control formIngreso btn btn-primary" type="submit" value="Envia"><span class=" glyphicon glyphicon-arrow-right"></span>
		<a href="../index.php" target="_blank"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-globe" style="color:white;"></span>&nbsp;Ir al sitio</button></a>

	</form>

</div>



<!--====  Fin de FORMULARIO DE INGRESO  ====-->