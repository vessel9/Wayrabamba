<!--=====================================
FORMULARIO DE INGRESO         
======================================-->
<div id="backIngres">

	<form method="post" id="formIngreso" onsubmit="return validarIngreso()">

		<h1 id="tituloFormIngreso">INGRESO AL PANEL DE CONTROLes</h1>

		<input class="form-control formIngreso" type="text" placeholder="Ingrese su Usuario" name="usuarioIngreso" id="usuarioIngreso">
		<input class="form-control formIngreso" type="password" placeholder="Ingrese su Contraseña" name="passwordIngreso" id="passwordIngreso">

		<?php

			$ingreso = new Ingreso();
			$ingreso -> ingresoController();
			
		?>

		<input class="form-control formIngreso btn btn-primary" type="submit" value="Enviar">

	</form>

</div>



<!--====  Fin de FORMULARIO DE INGRESO  ====-->