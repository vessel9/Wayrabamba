<!--=====================================
FORMULARIO DE INGRESO         
======================================-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<div id="backIngreso">
<div class="container py-5 h-100">
<div class="row d-flex align-items-center justify-content-center h-100">
	<form method="post" id="formIngreso" onsubmit="return validarIngreso()">
	<img src="views/images/logo1.png" class="img-responsive" alt="Image">

		<h2 id="tituloFormIngreso"><b>Ingresar</b></h2>

		<?php
		

			$ingreso = new Ingreso();
			$ingreso -> ingresoController();
			
		?>
        <div class="col-md-6 col-md-offset-3">
		<!-- <input class="form-control formIngreso btn btn-primary" type="submit" value="Enviar"> -->
		<!-- <a><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-arrow-right" style="color:white;"></span>&nbsp;</button></a> -->
		
		<button type="submit" class="button button5"><span class="glyphicon glyphicon-arrow-right"></span></button>

      </div>


	</form>

</div>
</div>
</div>
<script type="text/javascript">
window.onload=function(){
  document.querySelector('.campo a').addEventListener('click', e => {
    const passwordInput = document.querySelector('#passwordIngreso');
    if (e.target.classList.contains('show')) {
        e.target.classList.remove('show');
        e.target.textContent = '';
        passwordInput.type = 'text';
    } else {
        e.target.classList.add('show');
        e.target.textContent = '';
        passwordInput.type = 'password';
    }
});}
</script>

	



<!--====  Fin de FORMULARIO DE INGRESO  ====-->