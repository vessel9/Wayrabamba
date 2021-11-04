<!--=====================================
FORMULARIO DE INGRESO         
======================================-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<div id="backIngreso">
<div class="py-5 h-20">
<div class="row text-center login-page">
	<form method="post" id="formIngreso" onsubmit="return validarIngreso()">
	<img src="views/images/logo1.png" class="img-responsive" alt="Image">

		<h2 id="tituloFormIngreso"><b>Ingresar</b></h2>

		<div class="row">
		<label for="usuario"></label>
		<div class="col-md-10 col-md-offset-1">
		<input class="form-control formIngreso" type="text" placeholder="Ingrese su Usuario" name="usuarioIngreso" id="usuarioIngreso">
		</div>
        </div>
		<!-- <div class="campo">
		<input class="form-control formIngreso" type="password" placeholder="Ingrese su Contraseña" name="passwordIngreso" id="passwordIngreso"><span ></span>
		</div> -->
		<div class="row">
        <div class="col-md-10 col-md-offset-1">

            <div class="campo">
                <label for="password"></label>
                <input class="form-control formIngreso"placeholder="Ingrese su Contraseña"type="password" name="passwordIngreso" id="passwordIngreso">
                <a><span class="glyphicon glyphicon-eye-open"></span></a>
            </div>
            
            
        </div>
        </div>
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