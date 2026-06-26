<?php
	include("../../includes/validacion_rol_admin.php");

	include("../../includes/db2.php");

	if (isset($_POST['guardar_recomendacion'])) {
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];
		$id_area = $_GET['id'];
		$query = "INSERT INTO recomendaciones(titulo, descripcion, id_area) VALUES ('$titulo', '$descripcion', '$id_area')";
		$result = mysqli_query($con, $query);
		if (!$result) {
			die("Query Failed");
		}

		header("Location: lista_recomendaciones.php?id=$id_area");
	}

	include("../../includes/header2.php");

?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Recomendaciones
        <small>Crear recomendacion</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Recomendaciones</a></li>
        <li class="active">crear</li>
      </ol>
    </section>
 	<!-- /.Content Header (Page header) -->

  <section class="content">
  		<h2 class="page-header">Crear recomendación del área: <?php
                $query = "SELECT * FROM areas WHERE id = $_GET[id]";
                $resultado_area = mysqli_query($con, $query);

                while($row = mysqli_fetch_array($resultado_area)) { ?>
                    <?php echo $row['nombre'] ?>
                <?php } ?>
        </h2>
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
						<form action="crear_recomendacion.php?id=<?php echo $_GET['id']; ?>" method="POST">
							<label>Título</label>
							<div class="form-group">
								<input type="text" name="titulo" class="form-control" placeholder="Título de la recomendación" autofocus="" required="">
							</div>
							<label>Descripción</label>
							<div class="form-group">
								<textarea name="descripcion" rows="2" class="form-control" placeholder="Descripción de la recomendación" required=""></textarea>
							</div>
							<input type="submit" class="btn btn-success btn-block" name="guardar_recomendacion" value="Guardar">
						</form>
						<br>
					    <td>
					        <button onclick="location.href='lista_areas.php'">Regresar</button>
					    </td>
					</div>
				</div>

			</div>
		</div>

    </section>
    <!-- /.content -->


<?php include("../../includes/footer2.php") ?>

