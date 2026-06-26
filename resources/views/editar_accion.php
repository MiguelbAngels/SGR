<?php
	include("../../includes/validacion_rol_admin.php");

	include("../../includes/db2.php");

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$query = "SELECT * FROM acciones WHERE id_accion = $id";
		$result = mysqli_query($con, $query);
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$titulo = $row['titulo'];
			$descripcion = $row['descripcion'];
		}
	}
	if(isset($_POST['update'])){
		$id = $_GET['id'];
		$titulo = $_POST['titulo'];
		$descripcion = $_POST['descripcion'];

		$query = "UPDATE acciones set titulo = '$titulo', descripcion = '$descripcion' WHERE id_accion = $id";
		mysqli_query($con, $query);

		$query = "SELECT * FROM acciones WHERE id_accion = $id";
		$result = mysqli_query($con, $query);

		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$id_meta = $row['id_meta'];
		}

		header("Location: lista_acciones.php?id=$id_meta");

	}

	include("../../includes/header2.php");

?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Accion
        <small>Editar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Accion</a></li>
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
					<form action="editar_accion.php?id=<?php echo $_GET['id']; ?>" method="POST">
						<br>
						<label>Título</label>
						<div class="form-group">
							<input type="text" name="titulo" value="<?php echo $titulo; ?>" class="form-contro" placeholder="Nuevo título">
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
					<?php
						$id_accion = $_GET['id'];
						$query = "SELECT * FROM acciones WHERE id_accion = $id_accion";
						$result = mysqli_query($con, $query);

						if (mysqli_num_rows($result) == 1) {
							$row = mysqli_fetch_array($result);
							$id_meta = $row['id_meta'];
						}
					?>
					<br>
					<center>
					    <td>
					        <button onclick="location.href='lista_acciones.php?id=<?php echo $id_meta; ?>'">Regresar</button>
					    </td>
				    </center>
				</div>
			</div>
		</div>

	</div>



<?php include("../../includes/footer2.php") ?>