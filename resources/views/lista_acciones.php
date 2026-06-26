<?php
	include("../../includes/validacion_rol_admin.php");

	include("../../includes/db2.php");

	include("../../includes/header2.php");
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Acciones
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Acciones</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>
 	<!-- /.Content Header (Page header) -->
 	<center>
 		<h1>
 			<?php
				$resultado_nombre_meta = mysqli_query($con, "SELECT * FROM metas WHERE id_meta = $_GET[id]");
				while ($nombre_meta = mysqli_fetch_array($resultado_nombre_meta)) {
					echo "Plan de acciones para la meta: ".$nombre_meta['titulo'];
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
				</tr>
			</thead>
			<tbody>
				<?php
				$id_meta = $_GET['id'];
				$query = "SELECT * FROM acciones WHERE id_meta = $id_meta";
				$resultado_acciones = mysqli_query($con, $query);

				while($row = mysqli_fetch_array($resultado_acciones)) { ?>
					<tr>
						<td><?php echo $row['titulo'] ?></td>
						<td><?php echo $row['descripcion'] ?></td>
						<td>
							<a href="editar_accion.php?id=<?php echo $row['id_accion']?>" class="btn btn-warning">
								<i class="fa fa-edit"></i>
							</a>
							<a href="borrar_accion.php?id=<?php echo $row['id_accion']?>" class="btn btn-danger">
								<i class="fa fa-trash"></i>
							</a>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<?php
		$query = "SELECT * FROM metas WHERE id_meta = $id_meta";
		$result = mysqli_query($con, $query);

		if (mysqli_num_rows($result) == 1) {
			$row = mysqli_fetch_array($result);
			$id_recomendacion = $row['id_recomendacion'];
		}
	?>

	<br>
    <center>
	    <td>
	        <button onclick="location.href='lista_metas.php?id=<?php echo $id_recomendacion; ?>'">Regresar</button>
	    </td>
	</center>
	<br>

<?php include("../../includes/footer2.php") ?>

