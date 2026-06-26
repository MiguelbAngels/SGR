<?php
	include("../../includes/validacion_rol_admin.php");

	include("../../includes/db2.php");

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$query = "SELECT * FROM areas WHERE id = $id";
		$result = mysqli_query($con, $query);
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$nombre = $row['nombre'];
			$descripcion = $row['descripcion'];
		}
	}
	if(isset($_POST['update'])){
		$id = $_GET['id'];
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];

		$query = "UPDATE areas set nombre = '$nombre', descripcion = '$descripcion' WHERE id = $id";
		mysqli_query($con, $query);

		header("Location: lista_areas.php");

	}

	include("../../includes/header2.php");
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Áreas
        <small>Editar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Áreas</a></li>
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
					<form action="editar_area.php?id=<?php echo $_GET['id']; ?>" method="POST">
						<br>
						<label>Titulo</label>
						<div class="form-group">
							<input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-contro" placeholder="Nuevo nombre">
						</div>
						<label>Descripción</label>
						<div class="gorm-group">
							<textarea name="descripcion" rows="2" class="form-control" placeholder="Nueva descripción"><?php echo $descripcion; ?></textarea>
						</div>
						<br>
						<center>
							<button class="btn btn-success" name="update"> Guardar </button>
						</center>
					</form>
					<br>
					<center>
					    <td>
					        <button onclick="location.href='lista_areas.php'">Regresar</button>
					    </td>
				    </center>
				</div>
			</div>
		</div>
	</div>



<?php include("../../includes/footer2.php") ?>