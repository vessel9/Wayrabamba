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
        <div class="col-md-6 col-md-offset-2">
		<!-- <input class="form-control formIngreso btn btn-primary" type="submit" value="Enviar"> -->
		<!-- <a><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-arrow-right" style="color:white;"></span>&nbsp;</button></a> -->
		<a type="submit" > 
		<div  style="background:#04E6DE;color: white;border: 2px solid #04E6DE;"  onMouseOver="this.style.width='150px';this.style.height='150px';this.style.backgroundColor='#00c9bf'" onMouseOut="this.style.width='100px';this.style.height='100px';this.style.backgroundColor = '#04E6DE'">
		<span class="glyphicon glyphicon-arrow-right"></span>
		</div>
   
      </div>
   <button class="button button4">12px</button>

</a>

	</form>

</div>



<!--====  Fin de FORMULARIO DE INGRESO  ====-->