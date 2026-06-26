<?php
	include("../../includes/db2.php");
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		$query = "SELECT * FROM reportes_acciones WHERE id_reporte_accion = $id";
		$result = mysqli_query($con, $query);

		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$id_area = $row['id_area'];
		}

		$query = "DELETE FROM reportes_acciones WHERE id_reporte_accion = $id";
		$result = mysqli_query($con, $query);
		if(!$result){
			die("Query Failed");
		}

		header("Location: lista_reportes_acciones.php?id=$id_area");
	}
?>