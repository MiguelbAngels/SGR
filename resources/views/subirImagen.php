<?php
	include("../../includes/validacion_session.php");
	include("../../includes/db2.php");

	/*Incluyendo la conexion y enviando el Arreglo Files a la funcion*/
	include '../../includes/coneccion.php';
	if(isset($_POST['save']))
	{
		$DBImagen->uploadImage($_FILES);
	}

	if (isset($_GET['imagen_id'])) {
		$id = $_GET['imagen_id'];
		$query = "DELETE FROM imagenes_reporte WHERE id = $id";
		$result = mysqli_query($con, $query);
		if(!$result){
			die("Query Failed");
		}
	}

	include("../../includes/header2.php");
?>
	<section>
		<div class="container col-lg-6 col-lg-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<center><h3>
							<?php
								$resultado_nombre_reporte = mysqli_query($con, "SELECT * FROM reportes_acciones WHERE id_reporte_accion = $_GET[id]");
								while ($nombre = mysqli_fetch_array($resultado_nombre_reporte)) {
									echo "Guardar archivo en: ".$nombre['titulo'];
								}
							?>

						</h3></center>
					</div>
				</div>
				<div class="panel-body">
					<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<input type="file" name="imagen" required="">
						</div>
						<div>
							<input type="hidden" name="id" value="$id">
						</div>
						<input type="submit" class="btn btn-primary" name="save" value="Subir archivo">
					</form>
					<br>
					<table class="table">
						<tr>
							<th>#</th>
							<th>Archivo</th>
						</tr>
						<?php
							/*Llamando a la función para visualizar las imagenes*/
							$DBImagen->viewImages($_GET['id']);
						?>
					</table>
				</div>
			</div>
			<td>
	        	<button onclick="location.href='lista_reportes_acciones.php?id=<?php
								$resultado_nombre_reporte = mysqli_query($con, "SELECT * FROM reportes_acciones WHERE id_reporte_accion = $_GET[id]");
								while ($nombre = mysqli_fetch_array($resultado_nombre_reporte)) {
									echo $nombre['id_area'];
								}
				?>'">Regresar</button>
	    	</td>
		</div>


	</section>

	<script src="../lib/js/jquery.js"></script>
	<script src="../lib/js/bootstrap.min.js"></script>


<?php
	include("../../includes/footer2.php");
 ?>