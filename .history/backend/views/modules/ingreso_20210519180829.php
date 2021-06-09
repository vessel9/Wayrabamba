<!--=====================================
FORMULARIO DE INGRESO         
======================================-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<div id="backIngreso">

	<form method="post" id="formIngreso" onsubmit="return validarIngreso()">
	<img src="views/images/logo2.png" class="img-responsive" alt="Image">

		<h2 id="tituloFormIngreso">Ingresar</h2>



		<input class="form-control formIngreso" type="text" placeholder="Ingrese su Usuario" name="usuarioIngreso" id="usuarioIngreso">
		<!-- <div class="campo">
		<input class="form-control formIngreso" type="password" placeholder="Ingrese su Contraseña" name="passwordIngreso" id="passwordIngreso"><span class="glyphicon glyphicon-arrow-right"></span>
		</div> -->
		<div class="row">
        <div id="content" class="col-md-10 col-md-offset-1">

            <div class="campo">
                <label for="password">Contraseña</label>
                <input class="form-control formIngreso"placeholder="Ingrese su Contraseña"type="password" name="passwordIngreso" id="passwordIngreso">
                <span>Mostrar</span>
            </div>
            
            
        </div>
        </div>
		<?php
		

			$ingreso = new Ingreso();
			$ingreso -> ingresoController();
			
		?>
        <div class="col-md-6 col-md-offset-4">
		<!-- <input class="form-control formIngreso btn btn-primary" type="submit" value="Enviar"> -->
		<!-- <a><button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-arrow-right" style="color:white;"></span>&nbsp;</button></a> -->
		
		<button type="submit" class="button button5"><span class="glyphicon glyphicon-arrow-right"></span></button>

      </div>


	</form>

</div>
<script type="text/javascript">
window.onload=function(){
  document.querySelector('.campo span').addEventListener('click', e => {
    const passwordInput = document.querySelector('#passwordIngreso');
    if (e.target.classList.contains('show')) {
        e.target.classList.remove('show');
        e.target.textContent = 'Ocultar';
        passwordInput.type = 'text';
    } else {
        e.target.classList.add('show');
        e.target.textContent = 'Mostrar';
        passwordInput.type = 'password';
    }
});}
</script>

	



<!--====  Fin de FORMULARIO DE INGRESO  ====-->