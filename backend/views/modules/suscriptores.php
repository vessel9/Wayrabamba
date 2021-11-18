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
SUSCRIPTORES         
======================================-->
<?php 
if($_SESSION["rol"] == 0){
	?>
<div id="suscriptores" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
 
 <div>

	<table id="tablaSuscriptores" class="table table-striped dt-responsive nowrap">
    <thead>
      <tr>
        <th>Nombre</th>
        <th>Email</th>
        <th>Acciones</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
  
      <?php

      $suscriptores = new SuscriptoresController();
      $suscriptores -> mostrarSuscriptoresController();
      $suscriptores -> borrarSuscriptoresController();

      ?>

    </tbody>
  </table>

  <!-- <a href="tcpdf/pdf/suscriptores.php" target="blank">
  <button class="btn btn-warning pull-right" style="margin:20px;">Imprimir Suscriptores</button>
  </a> -->
  </div>

</div>

<script>
  
$(window).load(function(){

  var datos = new FormData();

  datos.append("revisionSuscriptores", 1);

  $.ajax({
      url:"views/ajax/gestorRevision.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      success: function(respuesta){}

    });
})

</script>
<?php
} else{
echo <<< EOT
<link rel="stylesheet" href="./views/css/npage.css">
<div id="galeria" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
<section class="page_404">
	<div class="container">
		<div class="row">	
		<div class="col-sm-12 ">
		<div class="col-sm-10 col-sm-offset-1  text-center">
		<div class="four_zero_four_bg">
			<h1 class="text-center ">No tienes acceso</h1>
		
		
		</div>
		
		<div class="contant_box_404">
		<h3 class="h2">
		Consulta con un administrador de la pagina
		</h3>
		<a href="inicio" class="link_404">Inicio</a>
	</div>
		</div>
		</div>
		</div>
	</div>
</section>
</div>
EOT;
}
?>

<!--====  Fin de SUSCRIPTORES  ====-->