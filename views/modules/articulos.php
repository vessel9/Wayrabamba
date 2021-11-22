<div class="row" id="articulos">
			
	<hr>

	<h1 class="text-center text-info" style="color:#6CBB0E;"><b><span class="fa fa-newspaper-o" ></span> ARTÍCULOS DE INTERÉS</b></h1>

	<hr>

	<ul>

		<?php

			$articulos = new Articulos();
			$articulos -> seleccionarArticulosController();

		?>

	</ul>

</div>