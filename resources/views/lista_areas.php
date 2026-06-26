<?php
	include("../../includes/validacion_rol_admin.php");

	include("../../includes/db2.php");

	include("../../includes/header2.php");
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Áreas
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Áreas</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>
 	<!-- /.Content Header (Page header) -->
	<br />
	<div class="col md 8">
		<table class="table table-bordered text-center">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Recomendaciones</th>
					<th>Reportes de acciones</th>
					<th>Profesor asignado</th>
					<th>Asignar / Desasignar profesor</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$query = "SELECT * FROM areas";
				$resultado_areas = mysqli_query($con, $query);

				while($row = mysqli_fetch_array($resultado_areas)) { ?>
					<tr>
						<td><?php echo $row['nombre'] ?></td>
						<td><?php echo $row['descripcion'] ?></td>
						<td>
							<a href="lista_recomendaciones.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
							<i class="fa fa-eye"></i>
							<a href="crear_recomendacion.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
							<i class="fa fa-file-o"></i>
						</td>
						<td>
							<a href="lista_reportes_acciones.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
							<i class="fa fa-eye"></i>
							<a href="crear_reporte_accion.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
							<i class="fa fa-file-o"></i>
						</td>
						<td>
							<?php
								$resultado_nombre_profesor = mysqli_query($con, "SELECT * FROM usuarios WHERE id = $row[id_profesor_asignado]");
								while ($nombres_profesores = mysqli_fetch_array($resultado_nombre_profesor)) {
									echo "(".$nombres_profesores['nombre'].")  ";
								}
							?>
						</td>
						<td>
							<a href="asignar_profesor.php?id=<?php echo $row['id']?>" class="btn btn-warning">
								<i class="fa fa-check-square-o"></i>
							</a>
							<a href="../../models/desasignar_profesor.php?id=<?php echo $row['id']?>" class="btn btn-danger">
								<i class="fa fa-trash"></i>
							</a>
						</td>
						<td>
							<a href="editar_area.php?id=<?php echo $row['id']?>" class="btn btn-warning">
								<i class="fa fa-edit"></i>
							</a>
							<a href="borrar_area.php?id=<?php echo $row['id']?>" class="btn btn-danger">
								<i class="fa fa-trash"></i>
							</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

<?php include("../../includes/footer2.php") ?>

