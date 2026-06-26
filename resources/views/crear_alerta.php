<?php
	include("../../includes/validacion_rol_admin.php");

	include("../../includes/db2.php");

	if (isset($_POST['guardar_alerta'])) {
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];

		$query = "INSERT INTO alertas(titulo, descripcion) VALUES ('$titulo', '$descripcion')";
		$result = mysqli_query($con, $query);

		if (!$result) {
			die("Query Failed");
		}

		header("Location: lista_alertas.php");

	}

	include("../../includes/header2.php");

?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Alertas
        <small>Crear alerta</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Alertas</a></li>
        <li class="active">crear</li>
      </ol>
    </section>
 	<!-- /.Content Header (Page header) -->

	<center>
		<h2>Ingresa los datos para crear alerta grupal</h2>
	</center>
 	<section class="content">
		<div class="container col-lg-8 col-lg-offset-5">
			<div class="row">
				<div class="col-md-4">
					<div class="card card-body">
						<form action="crear_alerta.php" method="POST">
							<label>Título de la alerta</label>
							<div class="form-group">
								<input type="text" name="titulo" class="form-control" placeholder="Título" autofocus="" required="">
							</div>
							<label>Descripción</label>
							<div class="form-group">
								<textarea type="text" name="descripcion" rows="2" class="form-control" placeholder="Descripción" required=""></textarea>
							</div>
							<input type="submit" class="btn btn-success btn-block" name="guardar_alerta" value="Guardar">
						</form>
					</div>
				</div>

			</div>
		</div>

    </section>
    <!-- /.content -->


<?php include("../../includes/footer2.php") ?>

