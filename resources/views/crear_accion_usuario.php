<?php
	include("../../includes/validacion_rol_profesor.php");

	include("../../includes/db2.php");

	if (isset($_POST['guardar_accion'])) {
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];
		$id_meta = $_GET['id'];
		$query = "INSERT INTO acciones(titulo, descripcion, id_meta) VALUES ('$titulo', '$descripcion', '$id_meta')";
		$result = mysqli_query($con, $query);
		if (!$result) {
			die("Query Failed");
		}

		header("Location: lista_acciones_usuario.php?id=$id_meta");
	}

	include("../../includes/header.php");

?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Acciones
        <small>Crear accion</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Acciones</a></li>
        <li class="active">crear</li>
      </ol>
    </section>
 	<!-- /.Content Header (Page header) -->

  	<section class="content">
	 	<center>
	 		<h2>
	 			<?php
					$resultado_nombre_meta = mysqli_query($con, "SELECT * FROM metas WHERE id_meta = $_GET[id]");
					while ($nombre_meta = mysqli_fetch_array($resultado_nombre_meta)) {
						echo "Crear acción para la meta: ".$nombre_meta['titulo'];
					}
				?>
	 		</h2>
		</center>
		<br>
		<br>
		<div class="container col-lg-8 col-lg-offset-5">
			<div class="row">
				<div class="col-md-4">
					<div class="card card-body">
						<form action="crear_accion_usuario.php?id=<?php echo $_GET['id']; ?>" method="POST">
							<label>Título</label>
							<div class="form-group">
								<input type="text" name="titulo" class="form-control" placeholder="Título de la acción" autofocus="" required="">
							</div>
							<label>Descripción</label>
							<div class="form-group">
								<textarea name="descripcion" rows="2" class="form-control" placeholder="Descripción de la acción" required=""></textarea>
							</div>
							<input type="submit" class="btn btn-success btn-block" name="guardar_accion" value="Guardar">
						</form>
						<br>
						<?php
							$id_meta = $_GET['id'];
							$query = "SELECT * FROM metas WHERE id_meta = $id_meta";
							$result = mysqli_query($con, $query);

							if (mysqli_num_rows($result) == 1) {
								$row = mysqli_fetch_array($result);
								$id_recomendacion = $row['id_recomendacion'];
							}
						?>
						<center>
						    <td>
						        <button onclick="location.href='lista_metas_usuario.php?id=<?php echo $id_recomendacion; ?>'">Regresar</button>
						    </td>
					    </center>
					</div>
				</div>
			</div>
		</div>
    </section>
    <!-- /.content -->



<?php include("../../includes/footer2.php") ?>

