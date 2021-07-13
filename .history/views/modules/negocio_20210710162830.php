<div class="row" id="articulos">
			
	<hr>

	<h1 class="text-center text-info"><b>NEGOCIO DE INTERÉS</b></h1>

	<hr>

	<ul>

		<?php

			$articulos = new Negocios();
			$articulos -> seleccionarNegocioModel();

		?>

	</ul>

</div>