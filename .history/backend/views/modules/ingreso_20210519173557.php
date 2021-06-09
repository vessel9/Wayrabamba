<!--=====================================
FORMULARIO DE INGRESO         
======================================-->


<div id="backIngreso">

	<form method="post" id="formIngreso" onsubmit="return validarIngreso()">
	<img src="views/images/logo2.png" class="img-responsive" alt="Image">

		<h2 id="tituloFormIngreso">Ingresar</h2>



		<input class="form-control formIngreso" type="text" placeholder="Ingrese su Usuario" name="usuarioIngreso" id="usuarioIngreso">
		<!-- <div class="campo">
		<input class="form-control formIngreso" type="password" placeholder="Ingrese su Contraseña" name="passwordIngreso" id="passwordIngreso"><span class="glyphicon glyphicon-arrow-right"></span>
		</div> -->

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
<script> 
document.querySelector('.campo span').addEventListener('click', e => {
    const passwordInput = document.querySelector('#password');
    if (e.target.classList.contains('show')) {
        e.target.classList.remove('show');
        e.target.textContent = 'Ocultar';
        passwordInput.type = 'text';
    } else {
        e.target.classList.add('show');
        e.target.textContent = 'Mostrar';
        passwordInput.type = 'password';
    }
});
</script>
<div class="row">
        <div id="content" class="col-lg-12">

            <div class="campo">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password">
                <span>Mostrar</span>
            </div>
            
            
        </div>
    </div>


<!--====  Fin de FORMULARIO DE INGRESO  ====-->