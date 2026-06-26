<?php
	include("../../includes/validacion_rol_admin.php");

	include("../../includes/db2.php");

	include("../../includes/header2.php");
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Destinatarios
        <small>Elegir</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Destinatarios</a></li>
        <li class="active">Elegir</li>
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
					<th>Correo</th>
					<th>Áreas asignadas</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$query = "SELECT * FROM usuarios WHERE id_rol = 2";
				$resultado_usuarios = mysqli_query($con, $query);

				while($row = mysqli_fetch_array($resultado_usuarios)) { ?>
					<tr>
						<td><?php echo $row['nombre'] ?></td>
						<td><?php echo $row['username'] ?></td>
						<td>
							<?php
								$resultado_nombre_area = mysqli_query($con, "SELECT * FROM areas WHERE id_profesor_asignado = $row[id]");
								while ($nombres_areas = mysqli_fetch_array($resultado_nombre_area)) {
									echo "(".$nombres_areas['nombre'].")  ";
								}
							?>
						</td>
						<td>
							<a href="enviar_correo.php?id=<?php echo $row['id']?>&correo=<?php echo $row['username']?>" class="btn btn-secondary">
							<i class="fa fa-envelope-o"></i>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>

<?php include("../../includes/footer2.php") ?>

