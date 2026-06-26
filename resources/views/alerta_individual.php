<?php
	include("../../includes/validacion_rol_admin.php");

	include("../../includes/db2.php");

	include("../../includes/header2.php")
	?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Alertas individuales
        <small>Lista usuarios</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Alertas individuales</a></li>
        <li class="active">Lista usuarios</li>
      </ol>
    </section>
 	<!-- /.Content Header (Page header) -->
	<br />
	<center>
		<h2>Selecciona el destinatario</h2>
	</center>
	<br>
	<div class="col md 8">
		<table class="table table-bordered text-center">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Tipo de cuenta</th>
					<th>Área asignada</th>
					<th>Crear alerta</th>
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
							<?php
								$resultado_nombre_area = mysqli_query($con, "SELECT * FROM areas WHERE id_profesor_asignado = $row[id]");
								while ($nombres_areas = mysqli_fetch_array($resultado_nombre_area)) {
									echo "(".$nombres_areas['nombre'].")  ";
								}
							?>
						</td>
						<td>
							<form action="crear_alerta_individual.php?id=<?php echo $row['id']; ?>" method="POST">
								<button class="btn btn-success">Crear alerta</button>
							</form>
				<?php } ?>
			</tbody>
		</table>
	</div>

<?php include("../../includes/footer2.php") ?>

