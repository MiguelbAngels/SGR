<?php
	include("../../includes/db2.php");
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "DELETE FROM usuarios WHERE id = $id";
		$result = mysqli_query($con, $query);
		if(!$result){
			die("Query Failed");
		}

		$_SESSION['message'] = 'Usuario removido correctamente';
		$_SESSION['message_type'] = 'danger';
		header("Location: lista_usuarios.php");
		# code...
	}
?>