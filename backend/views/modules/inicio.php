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
INICIO       
======================================-->

<div id="inicio" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">

	<div class="jumbotron" style="background-image: url('https://static.vecteezy.com/system/resources/previews/001/226/022/non_2x/background-blue-and-white-squares-vector.jpg');background-repeat: no-repeat;background-size: cover;font-family: Ginebra;" class="img-responsive">

	    <h1>Bienvenidos</h1>
	    <p>Al panel de control "Wayrabamba".</p>
	</div>

		<hr>
	
	<ul>


		<li class="botonesInicio" >
		
			<a href="slide">
			<div style="background-color:#4CF53A; color: white;border: 2px solid #4CF53A;" onMouseOver="this.style.width='181px';this.style.height='181px';this.style.backgroundColor='#40d41c'" onMouseOut="this.style.width='150px';this.style.height='150px';this.style.backgroundColor = '#4CF53A'" >
			<span class="fa fa-toggle-right"></span>
			<p>Publicaciones</p>
			</div>
			</a>

		</li>

	        <li class="botonesInicio">
			<a href="articulos">
			<div style="background-color: #008CBA;color: white;border: 2px solid #008CBA;" onMouseOver="this.style.width='181px';this.style.height='181px';this.style.backgroundColor='#00888f'" onMouseOut="this.style.width='150px';this.style.height='150px';this.style.backgroundColor = '#008CBA'">
			<span class="fa fa-file-text-o"></span>
			<p>Artículos</p>
			</div>
			</a>
			</li>

		<li class="botonesInicio">
		
			<a href="galeria">
			<div style="background:#04E6DE;color: white;border: 2px solid #04E6DE;"  onMouseOver="this.style.width='181px';this.style.height='181px';this.style.backgroundColor='#00c9bf'" onMouseOut="this.style.width='150px';this.style.height='150px';this.style.backgroundColor = '#04E6DE'">
			<span class="fa fa-image"></span>
			<p>Imágenes</p>
			</div>
			</a>

		</li>
		

		<li class="botonesInicio">
		
			<a href="videos">
			<div style="background:#1434AD;color: white;border: 2px solid #1434AD;" onMouseOver="this.style.width='181px';this.style.height='181px';this.style.backgroundColor='#0004ff'" onMouseOut="this.style.width='150px';this.style.height='150px';this.style.backgroundColor = '#1434AD'"> 
			<span class="fa fa-film"></span>
			<p>Videos</p>
			</div>
			</a>

		</li>
		<li class="botonesInicio">
		
		<a href="negocios">
		<div style="background:#17202A;color: white;border: 2px solid #71899F;" onMouseOver="this.style.width='181px';this.style.height='181px';this.style.backgroundColor='#000000'" onMouseOut="this.style.width='150px';this.style.height='150px';this.style.backgroundColor = '#17202A'"> 
		<span class="fa fa-briefcase"></span>
		<p>Negocios</p>
		</div>
		</a>

	   </li>
	   <li class="botonesInicio">
		
		<a href="productoservicios">
		<div style="background:#D6D455;color: white;border: 2px solid #D6D455;" onMouseOver="this.style.width='181px';this.style.height='181px';this.style.backgroundColor='#ECE80E'" onMouseOut="this.style.width='150px';this.style.height='150px';this.style.backgroundColor = '#D6D455'"> 
		<span class="fa fa-shopping-bag"></span>
		<p>Productos</p>
		</div>
		</a>

	</li>

		<?php 

	  	// if($_SESSION["rol"] == 0){

		// 	echo '<li class="botonesInicio">
			
		// 		<a href="suscriptores">
		// 		<div style="background:#ED3E3E">
		// 		<span class="fa fa-users"></span>
		// 		<p>Suscriptores</p>
		// 		</div>
		// 		</a>

		// 	</li>';

		// }
		?>

	</ul>

</div>


<!--====  Fin de INICIO  ====-->