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
	<script>
function bigImg(x) {
  x.style.height = "200px";
  x.style.width = "200px";
}

function normalImg(x) {
  x.style.height = "150px";
  x.style.width = "150px";
}
</script>

		<li class="botonesInicio" >
		
			<a href="slide">
			<div style="background-color:#4CF53A; color: white;border: 2px solid #4CF53A;" onMouseOver="bigImg(this)" onMouseOver="normalImg(this)" onMouseOver="this.style.backgroundColor='#40d41c'"  onMouseOut="this.style.backgroundColor = '#4CF53A'">
			<span class="fa fa-toggle-right"></span>
			<p>Slide</p>
			</div>
			</a>

		</li>

	        <li class="botonesInicio">
			<a href="articulos">
			<div style="background-color: #008CBA;color: white;border: 2px solid #008CBA;" 	onMouseOver="this.style.backgroundColor='#00888f'" onMouseOut="this.style.backgroundColor = '#008CBA'">
			<span class="fa fa-file-text-o"></span>
			<p>Artículos</p>
			</div>
			</a>
			</li>

		<li class="botonesInicio">
		
			<a href="galeria">
			<div style="background:#04E6DE;color: white;border: 2px solid #04E6DE;" onMouseOver="this.style.backgroundColor='#00c9bf'" onMouseOut="this.style.backgroundColor = '#04E6DE'">
			<span class="fa fa-image"></span>
			<p>Imágenes</p>
			</div>
			</a>

		</li>
		

		<!-- <li class="botonesInicio">
		
			<a href="videos">
			<div style="background:#1434AD"> 
			<span class="fa fa-film"></span>
			<p>Videos</p>
			</div>
			</a>

		</li> -->

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