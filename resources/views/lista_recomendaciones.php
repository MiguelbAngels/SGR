<?php
	include("../../includes/validacion_rol_admin.php");

	include("../../includes/db2.php");

	include("../../includes/header2.php");
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Recomendaciones
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Recomendaciones</a></li>
        <li class="active">lista</li>
      </ol>
    </section>
 	<!-- /.Content Header (Page header) -->
	<center>
 		<h1>
 			<?php
				$resultado_nombres_areas = mysqli_query($con, "SELECT * FROM areas WHERE id = $_GET[id]");
				while ($nombres_areas = mysqli_fetch_array($resultado_nombres_areas)) {
					echo "Recomendaciones del área: ".$nombres_areas['nombre'];
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
					<th>Metas</th>
					<th>Accion</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$id_area = $_GET['id'];
				$query = "SELECT * FROM recomendaciones WHERE id_area = $id_area";
				$resultado_recomendaciones = mysqli_query($con, $query);

				while($row = mysqli_fetch_array($resultado_recomendaciones)) { ?>
					<tr>
						<td><?php echo $row['titulo'] ?></td>
						<td><?php echo $row['descripcion'] ?></td>
						<td>
							<a href="lista_metas.php?id=<?php echo $row['id_recomendacion']?>" class="btn btn-secondary">
							<i class="fa fa-eye"></i>
							<a href="crear_meta.php?id=<?php echo $row['id_recomendacion']?>" class="btn btn-secondary">
							<i class="fa fa-file-o"></i>
						</td>
						<td>
							<a href="editar_recomendacion.php?id=<?php echo $row['id_recomendacion']?>" class="btn btn-warning">
								<i class="fa fa-edit"></i>
							</a>
							<a href="borrar_recomendacion.php?id=<?php echo $row['id_recomendacion']?>" class="btn btn-danger">
								<i class="fa fa-trash"></i>
							</a>
				<?php } ?>
			</tbody>
		</table>
	</div>

    <br>
    <center>
	    <td>
	        <button onclick="location.href='lista_areas.php'">Regresar</button>
	    </td>
	</center>
	<br>

<?php include("../../includes/footer2.php") ?>

