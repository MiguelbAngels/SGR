<?php
	include("../includes/db2.php");

	if (isset($_POST['iniciar_sesion'])) {
		$correo = $_POST['correo'];
		$password = $_POST['password'];
		if($password != null){
			$password = md5($password);
			$query = "SELECT * FROM usuarios WHERE correo = $correo, password = $password";
			$result = mysqli_query($con, $query);

			if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_array($result);
				$nombre = $row['nombre'];
				$tipo_usuario = $row['tipo_usuario'];
				if($tipo_usuario == "administrador" ){
					header("Location: ../resources/views/inicio2.php");
				}else{
					$id = $row['id'];
					header("Location: ../resources/views/inicio_profesor.php");
				}
			}else{
				header("Location: ../index.php");
			}
		}else{
			header("Location: ../index.php");
		}


	}


?>
