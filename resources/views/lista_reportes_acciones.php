<?php
	include("../../includes/validacion_rol_admin.php");

	include("../../includes/db2.php");

	include("../../includes/header2.php");
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Reportes de acciones
        <small>Lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Reportes de acciones</a></li>
        <li class="active">lista</li>
      </ol>
    </section>
 	<!-- /.Content Header (Page header) -->
 	<br>

 	<div class="row">
        <div class="col">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#lista_reportes" data-toggle="tab">  Lista de reportes  </a></li>
              <li><a href="#crear_reporte_por_rangos" data-toggle="tab">  Reporte por rango  </a></li>
            </ul>
            <div class="tab-content">
              	<div class="tab-pane active" id="lista_reportes">
					<center>
				 		<h2>
				 			<?php
								$resultado_nombres_areas = mysqli_query($con, "SELECT * FROM areas WHERE id = $_GET[id]");
								while ($nombres_areas = mysqli_fetch_array($resultado_nombres_areas)) {
									echo "Reportes del área: ".$nombres_areas['nombre'];
								}
							?>
				 		</h2>
				 	</center>
					<br>
					<div class="col md 8">
						<table class="table table-bordered text-center">
							<thead>
								<tr>
									<th>Titulo</th>
									<th>Recomendaciones involucradas</th>
									<th>Descripcion</th>
									<th>Tiempo empleado</th>
									<th>Evidencias</th>
									<th>fecha de creación</th>
									<th>Accion</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$id_area = $_GET['id'];
								$query = "SELECT * FROM reportes_acciones WHERE id_area = $id_area";
								$resultado_reporte_accion = mysqli_query($con, $query);

								while($row = mysqli_fetch_array($resultado_reporte_accion)) { ?>
									<tr>
										<td><?php echo $row['titulo'] ?></td>
										<td><?php echo $row['recomen_inv'] ?></td>
										<td><?php echo $row['descripcion'] ?></td>
										<td><?php echo $row['tiempo'] ?></td>
										<td>
											<a href="subirImagen.php?id=<?php echo $row['id_reporte_accion']?>" class="btn btn-secondary">
											<i class="fa fa-eye"></i>
										</td>
										<td><?php echo $row['fecha_creacion'] ?></td>
										<td>
											<a target="_blank" href="../../models/generar_pdf.php?id=<?php echo $row['id_reporte_accion']?>" class="btn btn-success">
												<i class="fa fa-file-pdf-o"></i>
											</a>
											<a href="editar_reporte_accion.php?id=<?php echo $row['id_reporte_accion']?>" class="btn btn-warning">
												<i class="fa fa-edit"></i>
											</a>
											<a href="borrar_reporte_accion.php?id=<?php echo $row['id_reporte_accion']?>" class="btn btn-danger">
												<i class="fa fa-trash"></i>
											</a>
								<?php } ?>
							</tbody>
						</table>
					</div>

				    <center>
					    <br>
						<td>
					        <button onclick="location.href='lista_areas.php'">Regresar</button>
					    </td>
					    <br>
					</center>
					<br>
              	</div>
              	<!-- /.tab-pane -->
              	<div class="tab-pane" id="crear_reporte_por_rangos">
					<div class="container col-lg-8 col-lg-offset-5">
						<h2> Generar reporte por rangos</h2>
						<div class="row">
							<div class="col-md-4 mx-auto">
								<div class="card card-body">
									<form target="_blank" action="../../models/generar_reporte_general.php?id=<?php echo $_GET['id']; ?>" method="POST">
										<br>
						                <label>Rango inicial:</label>
						                <div class="form-group">
                                             <input name="rango_inicial" type="date" class="form-control" placeholder="Rango inicial" required="">
                                        </div>
						                <br>
						                <label>Rango final:</label>
						                <div class="form-group">
                                             <input name="rango_final" type="date" class="form-control" placeholder="Rango final" required="">
                                        </div>
						                <br>
						                <br>
						                <center>
						                	<button class="btn btn-success" name="crear_reporte_rango"> Crear reporte </button>
						                </center>
									</form>
									<center>
									    <br>
										<td>
									        <button onclick="location.href='lista_areas.php'">Regresar</button>
									    </td>
									    <br>
									</center>
									<br>
								</div>
							</div>
						</div>
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

<?php include("../../includes/footer2.php") ?>

