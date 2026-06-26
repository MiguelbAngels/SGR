<?php
	include("../../includes/validacion_rol_admin.php");

	include("../../includes/db2.php");

	if (isset($_POST['guardar_reporte_accion'])) {
		$titulo = $_POST['titulo'];
		$recomen_inv = $_POST['recomen_inv'];
		$descripcion = $_POST['descripcion'];
		$tiempo = $_POST['tiempo'];
		$id_area = $_GET['id'];

		$query = "INSERT INTO reportes_acciones(titulo, recomen_inv, descripcion, tiempo, id_area) VALUES ('$titulo', '$recomen_inv',
		'$descripcion', '$tiempo','$id_area')";
		$result = mysqli_query($con, $query);

		if (!$result) {
			die("Query Failed");
		}

		header("Location: lista_reportes_acciones.php?id=$id_area");
	}

	include("../../includes/header2.php");

?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reporte de acciones
        <small>Crear reporte</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Reporte de acciones</a></li>
        <li class="active">crear</li>
      </ol>
    </section>
 	<!-- /.Content Header (Page header) -->

  <section class="content">
  	<!-- START CUSTOM TABS -->
      	<h2 class="page-header">Crear reporte del área: <?php
                $query = "SELECT * FROM areas WHERE id = $_GET[id]";
                $resultado_area = mysqli_query($con, $query);

                while($row = mysqli_fetch_array($resultado_area)) { ?>
                    <?php echo $row['nombre'] ?>
                <?php } ?>
        </h2>

      <div class="row">
        <div class="col-md-6">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#crear_reporte" data-toggle="tab">Crear reporte</a></li>
              <li><a href="#recomendaciones" data-toggle="tab">Recomendaciones del área</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="crear_reporte">
					<div class="container col-lg-30 col-lg-offset-1">
						<div class="row">
							<div class="col-md-4">
								<div class="card card-body">
									<form action="crear_reporte_accion.php?id=<?php echo $_GET['id']; ?>" method="POST">
										<label>Título</label>
										<div class="form-group">
											<input type="text" name="titulo" class="form-control" placeholder="Título del reporte de acción" autofocus="" required="">
										</div>
										<label>Recomendaciones involucradas</label>
										<div class="form-group">
											<textarea name="recomen_inv" rows="3" class="form-control" placeholder="- Recomendaciones involucradas" required=""></textarea>
										</div>
										<label>Descripción</label>
										<div class="form-group">
											<textarea name="descripcion" rows="2" class="form-control" placeholder="Descripción de la acción realizada" required=""></textarea>
										</div>
										<label>Tiempo empleado</label>
										<div class="form-group">
											<textarea name="tiempo" rows="2" class="form-control" placeholder="Tiempo empleado" required=""></textarea>
										</div>
										<input type="submit" class="btn btn-success btn-block" name="guardar_reporte_accion" value="Guardar">
									</form>
										<br>
									    <td>
									        <button onclick="location.href='lista_areas.php'">Regresar</button>
									    </td>
								</div>
							</div>

						</div>
					</div>
              	</div>
              	<!-- /.tab-pane -->
              	<div class="tab-pane" id="recomendaciones">
					<div class="col md 8">
						<table class="table table-bordered text-center">
							<thead>
								<tr>
									<th>Título</th>
									<th>Descripción</th>
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
								<?php } ?>
							</tbody>
						</table>
					</div>
              	</div>
              	<!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- END CUSTOM TABS -->

    </section>
    <!-- /.content -->



<?php include("../../includes/footer2.php") ?>

