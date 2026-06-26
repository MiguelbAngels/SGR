<?php
	include("../../includes/validacion_rol_admin.php");

	include("../../includes/db2.php");

	if(isset($_POST['update'])){
		$id = $_GET['id'];
		$id_profesor = $_POST['id_profesor'];

		$query = "UPDATE areas set id_profesor_asignado = '$id_profesor' WHERE id = $id";
		mysqli_query($con, $query);

		header("Location: lista_areas.php");
	}

	include("../../includes/header2.php")
	?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Asignar profesores
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Asignar profesores</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>
 	<!-- /.Content Header (Page header) -->
	<br />

	<center>
 		<h1>
 			<?php
				$resultado_nombres_areas = mysqli_query($con, "SELECT * FROM areas WHERE id = $_GET[id]");
				while ($nombres_areas = mysqli_fetch_array($resultado_nombres_areas)) {
					echo "Asignar profesor al área: ".$nombres_areas['nombre'];
				}
			?>
 		</h1>
 	</center>
 	<center>
	<div class="col md 8">
		<table class="table table-bordered text-center">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Tipo de cuenta</th>
					<th>Asignar</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$query = "SELECT * FROM usuarios WHERE id_rol = '2'";
				$resultado_recomendaciones = mysqli_query($con, $query);

				while($row = mysqli_fetch_array($resultado_recomendaciones)) { ?>
					<tr>
						<td><?php echo $row['nombre'] ?></td>
						<td><?php if($row['id_rol'] == '1'){
							echo 'administrador';
						}else{ echo 'profesor';} ?>
						</td>
						<td>
							<form action="asignar_profesor.php?id=<?php echo $_GET['id']; ?>" method="POST">
								<input type="hidden" name='id_profesor' value= "<?php echo $row['id'] ?>"/>
								<button class="btn btn-success" name="update"> Asignar </button>
							</form>
				<?php } ?>
			</tbody>
		</table>
	</div>
	</center>
	<br>
	<center>
	    <td>
	        <button onclick="location.href='lista_areas.php'">Regresar</button>
	    </td>
    </center>

<?php include("../../includes/footer2.php") ?>

