<?php
	include("../../includes/validacion_rol_admin.php");

	include("../../includes/db2.php");

	include("../../includes/header2.php");
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Metas
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Metas</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>
 	<!-- /.Content Header (Page header) -->
 	<center>
 		<h1>
 			<?php
				$resultado_nombre_recomendacion = mysqli_query($con, "SELECT * FROM recomendaciones WHERE id_recomendacion = $_GET[id]");
				while ($nombre_recomendacion = mysqli_fetch_array($resultado_nombre_recomendacion)) {
					echo "Metas de la recomendación: ".$nombre_recomendacion['titulo'];
				}
			?>
 		</h1>
 	</center>
	<br>
	<div class="col md 8">
		<table class="table table-bordered text-center">
			<thead>
				<tr>
					<th>Titulo</th>
					<th>Descripcion</th>
					<th>Acciones</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$id_recomendacion = $_GET['id'];
				$query = "SELECT * FROM metas WHERE id_recomendacion = $id_recomendacion";
				$resultado_metas = mysqli_query($con, $query);

				while($row = mysqli_fetch_array($resultado_metas)) { ?>
					<tr>
						<td><?php echo $row['titulo'] ?></td>
						<td><?php echo $row['descripcion'] ?></td>
						<td>
							<a href="lista_acciones.php?id=<?php echo $row['id_meta']?>" class="btn btn-secondary">
							<i class="fa fa-eye"></i>
							<a href="crear_accion.php?id=<?php echo $row['id_meta']?>" class="btn btn-secondary">
							<i class="fa fa-file-o"></i></td>
						<td>
							<a href="editar_meta.php?id=<?php echo $row['id_meta']?>" class="btn btn-warning">
								<i class="fa fa-edit"></i>
							</a>
							<a href="borrar_meta.php?id=<?php echo $row['id_meta']?>" class="btn btn-danger">
								<i class="fa fa-trash"></i>
							</a>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<?php
		$query = "SELECT * FROM recomendaciones WHERE id_recomendacion = $id_recomendacion";
		$result = mysqli_query($con, $query);

		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$id_area = $row['id_area'];
		}
	?>

    <br>
    <center>
	    <td>
	        <button onclick="location.href='lista_recomendaciones.php?id=<?php echo $id_area; ?>'">Regresar</button>
	    </td>
	</center>
	<br>

<?php include("../../includes/footer2.php") ?>

