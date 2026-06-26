<?php
	include("../../includes/validacion_rol_admin.php");

	include("../../includes/db2.php");

	include("../../includes/header2.php");
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Alertas
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Alertas</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>
 	<!-- /.Content Header (Page header) -->
	<br>
	<center><h1>Alertas grupales</h1></center>
	<!-- tabla -->
	<div class="col md 8">
		<table class="table table-bordered text-center">
			<thead>
				<tr>
					<th>Titulo</th>

					<th>Descripción</th>

					<th>Acciones</th>

				</tr>
			</thead>
			<tbody>
				<?php
				$query = "SELECT * FROM alertas";
				$resultado_alerta = mysqli_query($con, $query);

				while($row = mysqli_fetch_array($resultado_alerta)) { ?>
					<tr>
						<td><?php echo $row['titulo'] ?></td>
						<td><?php echo $row['descripcion'] ?></td>
						<td>
							<a href="editar_alerta.php?id=<?php echo $row['id']?>" class="btn btn-warning">
								<i class="fa fa-edit"></i>
							</a>
							<a href="borrar_alerta.php?id=<?php echo $row['id']?>" class="btn btn-danger">
								<i class="fa fa-trash"></i>
							</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<!-- /.tabla -->
	<center><h1>Alertas individuales</h1></center>
	<!-- tabla -->
	<div class="col md 8">
		<table class="table table-bordered text-center">
			<thead>
				<tr>
					<th>Destinatario</th>

					<th>Áreas asignadas</th>

					<th>Titulo</th>

					<th>Descripción</th>

					<th>Acciones</th>

				</tr>
			</thead>
			<tbody>
				<?php
				$query = "SELECT * FROM alertas_individuales";
				$resultado_alerta = mysqli_query($con, $query);

				while($row = mysqli_fetch_array($resultado_alerta)) { ?>
					<tr>
						<td><?php
								$resultado_nombre_profesor = mysqli_query($con, "SELECT * FROM usuarios WHERE id = $row[id_profesor]");
								while ($nombre_profesor = mysqli_fetch_array($resultado_nombre_profesor)) {
									echo $nombre_profesor['nombre'];
								}
							?>
						</td>
						<td>
							<?php
								$resultado_nombres_areas = mysqli_query($con, "SELECT * FROM areas WHERE id_profesor_asignado = $row[id_profesor]");
								while ($nombres_areas = mysqli_fetch_array($resultado_nombres_areas)) {
									echo "( ".$nombres_areas['nombre']." )";
								}
							?>
						</td>
						<td><?php echo $row['titulo'] ?></td>
						<td><?php echo $row['descripcion'] ?></td>
						<td>
							<a href="editar_alerta_individual.php?id=<?php echo $row['id']?>" class="btn btn-warning">
								<i class="fa fa-edit"></i>
							</a>
							<a href="borrar_alerta_individual.php?id=<?php echo $row['id']?>" class="btn btn-danger">
								<i class="fa fa-trash"></i>
							</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
<!-- /.tabla -->

<?php include("../../includes/footer2.php") ?>

