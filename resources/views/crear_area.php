<?php
	include("../../includes/validacion_rol_admin.php");

	include("../../includes/db2.php");

	if (isset($_POST['guardar_area'])) {
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$query = "INSERT INTO areas(nombre, descripcion) VALUES ('$nombre', '$descripcion')";
		$result = mysqli_query($con, $query);
		if (!$result) {
			die("Query Failed");
		}

		header("Location: lista_areas.php");
	}

	include("../../includes/header2.php");

?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Áreas
        <small>Crear área</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Áreas</a></li>
        <li class="active">crear</li>
      </ol>
    </section>
 	<!-- /.Content Header (Page header) -->
	<center>
		<h2>Ingresa los datos necesarios para crear una nueva área</h2>
	</center>
  <section class="content">
		<div class="container col-lg-8 col-lg-offset-5">
			<div class="row">
				<div class="col-md-4">
					<div class="card card-body">
						<form action="crear_area.php" method="POST">
							<label>Nombre</label>
							<div class="form-group">
								<input type="text" name="nombre" class="form-control" placeholder="Nombre del área" autofocus="" required="">
							</div>
							<label>Descripción</label>
							<div class="form-group">
								<textarea name="descripcion" rows="2" class="form-control" placeholder="Descripción del área" required=""></textarea>
							</div>
							<input type="submit" class="btn btn-success btn-block" name="guardar_area" value="Guardar">
						</form>
					</div>
				</div>

			</div>
		</div>

    </section>
    <!-- /.content -->


<?php include("../../includes/footer2.php") ?>

