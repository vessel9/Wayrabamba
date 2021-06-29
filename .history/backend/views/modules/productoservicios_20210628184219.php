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
TIPO DE SERVICIO ADMINISTRABLE          
======================================-->
<div id="seccionArticulos" class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
	
	<button id="btnAgregarProductoServicio" class="btn btn-info btn-lg">Agregar Servicio/Producto</button>

	<!--==== AGREGAR TIPO SERVICIO  ====-->

	<div id="agregarProductoServicio" style="display:none">
		
		<form method="post" enctype="multipart/form-data">

			<input name="nombreProductoServicio" type="text" placeholder="Nombre producto" class="form-control" required>
			
			<input type="file" name="imagen" class="btn btn-default" id="subirFoto" required>

            <p>Tamaño recomendado: 800px * 400px, peso máximo 2MB</p>
			<div id="arrastreImagenProductoServicio"></div>	
			<input name="descripcion" type="text" placeholder="descripcion" class="form-control" required>
            <input name="precio" type="text" placeholder="precio" class="form-control" required>
			<input name="cantidad" type="text" placeholder="cantidad" class="form-control" required>
			<input name="disponibles" type="text" placeholder="disponibles" class="form-control" required>

			

			<select name="idCategoria" class="form-control" required>
            <option value="">Nombre Tipo Categoria</option>
            <option value="0">Administrador</option>
            <option value="1">Editor</option>
            </select>
			<select name="idNegocio" class="form-control" required>
            <option value="">Nombre Tipo Producto/Servicio</option>
            <option value="0">Administrador</option>
            <option value="1">Editor</option>
            </select>


			<input type="submit" id="guardarProductoServicio" value="Guardar Productoservicio" class="btn btn-primary">

		</form>
		
		<?php

        $odb=new PDO("mysql:host=localhost;dbname=cms","root","");
        $sql  = "SELECT idTipoProductoServicio, nombreTipo FROM productoservicio ORDER BY idTipoProductoServicio ASC";
        $stmt = $conn->prepare($sql);
        $stmt ->execute();
        $data = $stmt->fetchAll(PDO::FETCH_COLUMN);
		?>
        <?php foreach($data as $row) { ?> 
		<select name="idTipoProductoServicio" id = "idTipoProductoServicio"> 
		<option value=""><?php echo $row['idTipoProductoServicio'];?></option>
        <!-- echo '<option value="'.$row['idTipoProductoServicio'].'">'.$row['idTipoProductoServicio'].'</option>';
        //print_r($row);  -->
		<?php
    }
	endforeach?>
 </select>

	</div>

	<?php

		$guardarProductoServicio = new GestorProductoServicio();
		$guardarProductoServicio -> guardarProductoServicioController();
	?>

	<hr>

	<!--==== EDITAR ARTÍCULO  ====-->

	<ul id="editarArticulo">

	<?php
	    $mostrarProductoServicio = new GestorProductoServicio(); 
		$mostrarProductoServicio -> mostrarProductoServicioController();

		// $mostrarCategoria = new gestorCategorias();
		// $mostrarCategoria -> mostrarCategoriaController();
		// $mostrarArticulo -> borrarArticuloController();
		// $mostrarArticulo -> editarArticuloController();

	?>

	</ul>
</div>