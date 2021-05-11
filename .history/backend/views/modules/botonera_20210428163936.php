<!--=====================================
COLUMNA BOTONERA           
======================================-->

	<div class="col-lg-2 col-md-2 col-sm-3 col-xs-12" id="col1">
		
		<div id="logo" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				
			<img src="views/images/WayrabambaLogo.png" class="img-responsive" alt="Image">



		</div>

		<!--=====================================
		BOTONERA MOVIL            
		======================================-->

		<div id="botoneraMovil" class="navbar-header navbar-inverse">

			<button type="button" class="navbar-toggle pull-left" data-toggle="collapse" data-target="#botonera">

				<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
       			<span class="icon-bar"></span>

			</button>
		
		</div>

		<!--====  Fin de BOTONERA MOVIL  ====-->

		<nav id="botonera" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 collapse navbar-collapse text-center">
					
			<ul class="nav navbar">

				<li><a href="inicio" style="color:white;">Inicio <span class="glyphicon glyphicon-home text-info" style="color:white;"></span></a></li>
				<li><a href="slide" style="color:white;">Slide <span class="glyphicon glyphicon-sound-stereo" style="color:white;"></span></a></li>
				<li><a href="articulos" style="color:white;">Artículos <span class="glyphicon glyphicon-list-alt" style="color:white;"></span></a></li>
				<li><a href="galeria" style="color:white;">Imágenes <span class="glyphicon glyphicon-picture" style="color:white;"></span></a></li>
				<!-- <li><a href="videos" style="color:white;">Videos <span class="glyphicon glyphicon-expand" style="color:white;"></span></a></li> -->
				
				<?php 

	  		// if($_SESSION["rol"] == 0){
				
			// 	echo '<li><a href="suscriptores" style="color:white;">Suscriptores <span class="glyphicon glyphicon glyphicon-user" style="color:white;"></span></a></li>';

			// 	}	
				?>

			</ul>

		</nav>
		<!-- <div class="col-md-6 col-md-offset-3 contenedor">
            <button class="centrado">Boton centrado</button>
        </div> -->

        <div class="col-md-6 col-md-offset-3">
		<a href="../index.php" target="_blank"><button type="button" class="btn btn-success"><span class="glyphicon glyphicon-globe" style="color:white;"></span>&nbsp;Ir al sitio</button></a>
		</div>

	</div>

<!--====  FIn de COLUMNA BOTONERA  ====-->