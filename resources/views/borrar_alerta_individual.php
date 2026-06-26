<?php
	include("../../includes/db2.php");
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$query = "DELETE FROM alertas_individuales WHERE id = $id";
		$result = mysqli_query($con, $query);
		if(!$result){
			die("Query Failed");
		}

		header("Location: lista_alertas.php");
	}
?>