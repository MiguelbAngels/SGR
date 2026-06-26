<?php
	include("../../includes/validacion_rol_admin.php");

	include("../../includes/db2.php");

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$query = "SELECT * FROM alertas_individuales WHERE id = $id";
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

		$query = "UPDATE alertas_individuales set titulo = '$titulo', descripcion = '$descripcion' WHERE id = $id";
		mysqli_query($con, $query);

		header("Location: lista_alertas.php");

	}

	include("../../includes/header2.php");
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Alerta individual
        <small>Editar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Alerta individual</a></li>
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
					<form action="editar_alerta_individual.php?id=<?php echo $_GET['id']; ?>" method="POST">
						<br>
						<label>titulo</label>
						<div class="form-group">
							<input type="text" name="titulo" value="<?php echo $titulo; ?>" class="form-contro" placeholder="Nuevo titulo" required="">
						</div>
						<br>
						<label>descripcion</label>
						<div class="gorm-group">
							<textarea name="descripcion" rows="2" class="form-control" placeholder="Nueva descripcion" required=""><?php echo $descripcion; ?></textarea>
						</div>
						<br>
						<center>
							<button class="btn btn-success" name="update">Guardar</button>
						</center>
						<br>
					</form>
					<center>
				    	<button onclick="location.href='lista_alertas.php'">Regresar</button>
				    </center>
				</div>
			</div>
		</div>
	</div>
	<br>

<?php include("../../includes/footer2.php") ?>