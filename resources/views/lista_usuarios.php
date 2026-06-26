<?php
	include("../../includes/validacion_rol_admin.php");

	include("../../includes/db2.php");

	include("../../includes/header2.php");

?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Usuarios
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Usuarios</a></li>
        <li class="active">Lista</li>
      </ol>
    </section>
 	<!-- /.Content Header (Page header) -->
	<br>

	<section class="content">
		<!-- tabla -->
		<div class="col md 8">
			<table class="table table-bordered text-center">
				<thead>
					<tr>
						<th>Nombre</th>

						<th>Correo</th>

						<th>Tipo de cuenta</th>

						<th>Areas asignadas</th>

						<th>Acciones</th>

					</tr>
				</thead>
				<tbody>
					<?php
					$query = "SELECT * FROM usuarios";
					$resultado_usuarios = mysqli_query($con, $query);

					while($row = mysqli_fetch_array($resultado_usuarios)) { ?>
						<tr>
							<td><?php echo $row['nombre'] ?></td>
							<td><?php echo $row['username'] ?></td>
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
								<a href="editar_usuario.php?id=<?php echo $row['id']?>" class="btn btn-warning">
									<i class="fa fa-edit"></i>
								</a>
								<a href="borrar_usuario.php?id=<?php echo $row['id']?>" class="btn btn-danger">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<!-- /.tabla -->
  	</section>

<?php include("../../includes/footer2.php") ?>

