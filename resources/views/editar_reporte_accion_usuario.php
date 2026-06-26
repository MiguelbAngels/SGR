<?php
	include("../../includes/validacion_rol_profesor.php");

	include("../../includes/db2.php");

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$query = "SELECT * FROM reportes_acciones WHERE id_reporte_accion = $id";
		$result = mysqli_query($con, $query);
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$titulo = $row['titulo'];
			$recomen_inv = $row['recomen_inv'];
			$descripcion = $row['descripcion'];
			$tiempo = $row['tiempo'];
		}
	}

	if(isset($_POST['update'])){
		$id = $_GET['id'];
		$titulo = $_POST['titulo'];
		$recomen_inv = $_POST['recomen_inv'];
		$descripcion = $_POST['descripcion'];
		$tiempo = $_POST['tiempo'];

		$query = "UPDATE reportes_acciones set titulo = '$titulo', recomen_inv = '$recomen_inv',
		descripcion = '$descripcion', tiempo = '$tiempo' WHERE id_reporte_accion = $id";
		mysqli_query($con, $query);

		$query = "SELECT * FROM reportes_acciones WHERE id_reporte_accion = $id";
		$result = mysqli_query($con, $query);

		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$id_area = $row['id_area'];
		}

		header("Location: area_asignada.php?id=$id_area");

	}

	include("../../includes/header.php");
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reporte de acción
        <small>Editar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Reporte de acción</a></li>
        <li class="active">Editar</li>
      </ol>
    </section>
 	<!-- /.Content Header (Page header) -->

	<center>
		<h2>Modifica los campos que desees editar</h2>
	</center>

	<div class="container col-lg-8 col-lg-offset-5">
		<div class="row">
			<div class="col-md-4 mx-auto">
				<div class="card card-body">
					<form action="editar_reporte_accion_usuario.php?id=<?php echo $_GET['id']; ?>" method="POST">
						<br>
						<label>Titulo</label>
						<div class="form-group">
							<input type="text" name="titulo" value="<?php echo $titulo; ?>" class="form-contro" placeholder="Nuevo titulo">
						</div>
						<label>Recomendaciones involucradas</label>
						<div class="gorm-group">
							<textarea name="recomen_inv" rows="2" class="form-control" placeholder="Nuevas recomendaciones involucradas"><?php echo $recomen_inv; ?></textarea>
						</div>
						<label>Descripción</label>
						<div class="gorm-group">
							<textarea name="descripcion" rows="2" class="form-control" placeholder="Nueva descripción"><?php echo $descripcion; ?></textarea>
						</div>
						<label>Tiempo invertido</label>
						<div class="gorm-group">
							<textarea name="tiempo" rows="2" class="form-control" placeholder="Nuevo tiempo invertido"><?php echo $tiempo; ?></textarea>
						</div>
						<br>
						<center>
							<button class="btn btn-success" name="update"> Guardar </button>
						</center>
					</form>
					<?php
						$id_reporte_accion = $_GET['id'];
						$query = "SELECT * FROM reportes_acciones WHERE id_reporte_accion = $id_reporte_accion";
						$result = mysqli_query($con, $query);

						if (mysqli_num_rows($result) == 1) {
							$row = mysqli_fetch_array($result);
							$id_area = $row['id_area'];
						}
					?>
					<br>
					<center>
					    <td>
					        <button onclick="location.href='area_asignada.php?id=<?php echo $id_area; ?>'">Regresar</button>
					    </td>
				    </center>
				</div>
			</div>
		</div>
	</div>

<?php include("../../includes/footer.php") ?>