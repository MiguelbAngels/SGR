<?php
	include("../../includes/validacion_rol_admin.php");

	include("../../includes/db2.php");

	if(isset($_GET['id'])){
		$id = $_GET['id'];
		$query = "SELECT * FROM usuarios WHERE id = $id";
		$result = mysqli_query($con, $query);
		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$nombre = $row['nombre'];
			$correo = $row['username'];
			$password = null;
			if($row['id_rol'] == 1){
				$tipodecuenta = 'administrador';
			}else{
				$tipodecuenta = 'profesor';
			}
		}
	}
	if(isset($_POST['update'])){
		$id = $_GET['id'];
		$nombre = $_POST['nombre'];
		$correo = $_POST['correo'];
		$password = $_POST['password'];

		if($_POST['tipodecuenta'] == 'administrador'){
			$tipodecuenta = 1;
		}else{
			$tipodecuenta = 2;
		}


		if($password == null){
			$query = "UPDATE usuarios set nombre = '$nombre', username = '$correo', id_rol = '$tipodecuenta' WHERE id = $id";
			mysqli_query($con, $query);
		}else{
			$password = md5($password);
			$query = "UPDATE usuarios set nombre = '$nombre', username = '$correo', password = '$password', id_rol = '$tipodecuenta' WHERE id = $id";
			mysqli_query($con, $query);

		}

		header("Location: lista_usuarios.php");
	}

	include("../../includes/header2.php");
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuario
        <small>Editar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Usuario</a></li>
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
					<form action="editar_usuario.php?id=<?php echo $_GET['id']; ?>" method="POST">
						<br>
						<label>Nombre</label>
						<div class="form-group">
							<input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-contro" placeholder="Nuevo nombre" required="">
						</div>
						<br>
						<label>Correo</label>
						<div class="gorm-group">
							<input name="correo" rows="2" class="form-control" placeholder="Nueva Correo" required="" value="<?php echo $correo; ?>"></input>
						</div>
						<br>
						<label>Contraseña</label>
						<div class="gorm-group">
							<input name="password" rows="2" class="form-control" placeholder="Nueva contraseña" value="<?php echo $password; ?>"></input>
						</div>
						<br>
						<label>Tipo de cuenta</label>
						<div class="gorm-group">
							<input name="tipodecuenta" rows="2" class="form-control" placeholder="administrador/profesor" required="" pattern="administrador|profesor" value="<?php echo $tipodecuenta; ?>"></input>
						</div>
						<br>
						<center>
							<button class="btn btn-success" name="update">Guardar</button>
						</center>
					</form>
					<br>
					<br>
					<center>
						<button onclick="location.href='lista_usuarios.php'">Regresar</button>
					</center>
				</div>
			</div>
		</div>
	</div>
	<br>


<?php include("../../includes/footer2.php") ?>