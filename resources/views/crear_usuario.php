<?php
	include("../../includes/validacion_rol_admin.php");

	include("../../includes/db2.php");

	if (isset($_POST['guardar_usuario'])){
		if($_POST['nombre'] == null || $_POST['password'] == null || $_POST['correo'] == null || $_POST['tipodecuenta'] == null ){
			header("Location: crear_usuario.php");
		}else{
			$nombre = $_POST['nombre'];
			$correo = $_POST['correo'];
			$password = md5($_POST['password']);

			if($_POST['tipodecuenta'] == 'administrador'){
				$tipodecuenta = 1;
			}else{
				$tipodecuenta = 2;
			}

			$query = "INSERT INTO usuarios(nombre, username, password, id_rol) VALUES ('$nombre', '$correo', '$password', '$tipodecuenta')";
			$result = mysqli_query($con, $query);

			if (!$result) {
				die("Query Failed");
			}

			header("Location: lista_usuarios.php");
		}
	}

	include("../../includes/header2.php");

?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuarios
        <small>Crear usuario</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Usuarios</a></li>
        <li class="active">crear</li>
      </ol>
    </section>
 	<!-- /.Content Header (Page header) -->
	<center>
		<h2>Ingresa los datos necesarios para crear un nuevo usuario</h2>
	</center>
	<section class="content ">
		<div class="container col-lg-8 col-lg-offset-5">
			<div class="row">
				<div class="col-md-4">
					<div class="card card-body">
						<form action="crear_usuario.php" method="POST">
							<label>Nombre de usuario</label>
							<div class="form-group">
								<input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus="" required="">
							</div>
							<label>Correo</label>
							<div class="form-group">
								<input type="email" name="correo" rows="2" class="form-control" placeholder="Correo" required="">
							</div>
							<label>Contraseña</label>
							<div class="form-group">
								<input type="text" name="password" class="form-control" placeholder="Contraseña" autofocus="" required="">
							</div>
							<label >Tipo de cuenta</label>
							<div class="form-group">
								<input type="text" name="tipodecuenta" class="form-control" placeholder="administrador/profesor" autofocus="" pattern="administrador|profesor" required="">
							</div>
							<input type="submit" class="btn btn-success btn-block" name="guardar_usuario" value="Guardar">
						</form>
					</div>
				</div>

			</div>
		</div>

    </section>
    <!-- /.content -->


<?php include("../../includes/footer2.php") ?>

