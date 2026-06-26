<?php
	include("../../includes/db2.php");
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$query = "SELECT * FROM recomendaciones WHERE id_recomendacion = $id";
		$result = mysqli_query($con, $query);

		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$id_area = $row['id_area'];
		}

		$query = "DELETE FROM recomendaciones WHERE id_recomendacion = $id";
		$result = mysqli_query($con, $query);
		if(!$result){
			die("Query Failed");
		}

		header("Location: lista_recomendaciones.php?id=$id_area");
		# code...
	}
?>