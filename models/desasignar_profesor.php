<?php
	include("../includes/db2.php");
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "UPDATE areas set id_profesor_asignado = '' WHERE id = $id";
		$result = mysqli_query($con, $query);
		if(!$result){
			die("Query Failed");
		}

		header("Location: ../resources/views/lista_areas.php");
	}
