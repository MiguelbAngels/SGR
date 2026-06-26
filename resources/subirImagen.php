<?php

	/*Incluyendo la conexion y enviando el Arreglo Files a la funcion*/
	include '../../includes/coneccion.php';
	if(isset($_POST['save']))
	{
		$DBImagen->uploadImage($_FILES);
	}

	include("../../includes/header2.php");
?>
	<div class="container col-lg-6 col-lg-offset-3">
		<div class="panel panel-default">
			<div class="panel-heading" style="background-color:#81BEF7;">
				<div class="panel-title">
					<center><h3>Guardar Imagen con PHP</h3></center>
				</div>
			</div>
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input type="file" name="imagen">
					</div>
					<input type="submit" name="save" class="btn btn-primary">
				</form>
				<br>
				<table class="table">
					<tr>
						<th>#</th>
						<th>Imagen</th>
					</tr>
					<?php
						/*Llamando a la función para visualizar las imagenes*/
						$DBImagen->viewImages();
					?>
				</table>
			</div>
		</div>
	</div>


	<script src="../lib/js/jquery.js"></script>
	<script src="../lib/js/bootstrap.min.js"></script>

<?php
	include("../../includes/footer2.php");
 ?>