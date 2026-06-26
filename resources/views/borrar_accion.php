<?php
	include("../../includes/db2.php");
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$query = "SELECT * FROM acciones WHERE id_accion = $id";
		$result = mysqli_query($con, $query);

		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$id_recomendacion = $row['id_recomendacion'];
		}

		$query = "DELETE FROM acciones WHERE id_accion = $id";
		$result = mysqli_query($con, $query);
		if(!$result){
			die("Query Failed");
		}

		header("Location: lista_acciones.php?id=$id_recomendacion");
		# code...
	}
?>