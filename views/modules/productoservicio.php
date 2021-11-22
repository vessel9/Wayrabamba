<div class="row" id="productoservicio">
	
<div  id="articulos">

	<hr>

	<h1 class="text-center text-info" style="color:#D6D455;"><b><span class="fa fa-shopping-bag" ></span> PRODUCTOS O SERVICIO DE INTERÉS</b></h1>

	<hr>

	<ul>

		<?php

			$verProductoServicio = new ProductoServicio();
			$verProductoServicio -> seleccionarProductoServicioController();

		?>

	</ul>
	</div>
</div>