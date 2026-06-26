<?php
	include("../../includes/validacion_rol_profesor.php");

	include("../../includes/db2.php");

	if (isset($_POST['guardar_meta'])) {
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];
		$id_recomendacion = $_GET['id'];
		$query = "INSERT INTO metas(titulo, descripcion, id_recomendacion) VALUES ('$titulo', '$descripcion', '$id_recomendacion')";
		$result = mysqli_query($con, $query);
		if (!$result) {
			die("Query Failed");
		}

		header("Location: lista_metas_usuario.php?id=$id_recomendacion");
	}

	include("../../includes/header.php");

?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Metas
        <small>Crear meta</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Metas</a></li>
        <li class="active">crear</li>
      </ol>
    </section>
 	<!-- /.Content Header (Page header) -->

  <section class="content">
  		<center>
	 		<h2>
	 			<?php
					$resultado_nombre_recomendacion = mysqli_query($con, "SELECT * FROM recomendaciones WHERE id_recomendacion = $_GET[id]");
					while ($nombre_recomendacion = mysqli_fetch_array($resultado_nombre_recomendacion)) {
						echo "Crear meta de la recomendación: ".$nombre_recomendacion['titulo'];
					}
				?>
	 		</h2>
	 	</center>
	 	<br>
		<div class="container col-lg-8 col-lg-offset-5">
			<div class="row">
				<div class="col-md-4">
					<?php if (isset($_SESSION['message'])) { ?>
					<div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
					<?= $_SESSION['message'] ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
					</div>

					<?php session_unset(); } ?>
					<div class="card card-body">
						<form action="crear_meta_usuario.php?id=<?php echo $_GET['id']; ?>" method="POST">
							<label>Título</label>
							<div class="form-group">
								<input type="text" name="titulo" class="form-control" placeholder="Título de la meta" autofocus="" required="">
							</div>
							<label>Descripción</label>
							<div class="form-group">
								<textarea name="descripcion" rows="2" class="form-control" placeholder="Descripción de la meta" required=""></textarea>
							</div>
							<input type="submit" class="btn btn-success btn-block" name="guardar_meta" value="Guardar">
						</form>
						<br>
						<?php
							$id_recomendacion = $_GET['id'];
							$query = "SELECT * FROM recomendaciones WHERE id_recomendacion = $id_recomendacion";
							$result = mysqli_query($con, $query);

							if (mysqli_num_rows($result) == 1) {
								$row = mysqli_fetch_array($result);
								$id_area = $row['id_area'];
							}
						?>
						<center>
						    <td>
						        <button onclick="location.href='area_asignada.php?id=<?php echo $id_area; ?>'">Regresar</button>
						    </td>
					    </center>
					</div>
				</div>

			</div>
		</div>

    </section>
    <!-- /.content -->



<?php include("../../includes/footer2.php") ?>

