<?php
	include("../../includes/db2.php");
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$query = "SELECT * FROM metas WHERE id_meta = $id";
		$result = mysqli_query($con, $query);

		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$id_recomendacion = $row['id_recomendacion'];
		}

		$query = "DELETE FROM metas WHERE id_meta = $id";
		$result = mysqli_query($con, $query);
		if(!$result){
			die("Query Failed");
		}

		header("Location: lista_metas.php?id=$id_recomendacion");
		# code...
	}
?>