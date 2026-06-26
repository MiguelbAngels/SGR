<?php
  include("../../includes/validacion_rol_profesor.php");

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
  }

  include("../../includes/header.php");
?>
  <!-- Vista Total -->

    <!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Vista de control
    <small>Área asignada</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i>Vista de control</a></li>
    <li class="active">Área asignada</li>
  </ol>
</section>
<!-- Titulo -->
  <center>
      <h1>
        <?php
          $resultado_nombres_areas = mysqli_query($con, "SELECT * FROM areas WHERE id = $_GET[id]");
          while ($nombres_areas = mysqli_fetch_array($resultado_nombres_areas)) {
            echo "Vista de control - área: ".$nombres_areas['nombre'];
          }
        ?>
      </h1>
  </center>
  <!-- /itulo -->
  <section>
    <br>
    <center>
      <h2>Lista de reportes</h2>
    </center>
    <br>
    <div class="box box-default">
      <!-- reportes -->
      <div class="col md 8">
        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th>Título</th>
              <th>Descripción</th>
              <th>Fecha creación</th>
              <th>Evidencias</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
              <?php
              $id_area = $_GET['id'];
              $query = "SELECT * FROM reportes_acciones WHERE id_area = $id_area";
              $resultado_reportes = mysqli_query($con, $query);

              while($row = mysqli_fetch_array($resultado_reportes)) { ?>
                <tr>
                  <td><?php echo $row['titulo'] ?></td>
                  <td><?php echo $row['descripcion'] ?></td>
                  <td><?php echo $row['fecha_creacion'] ?></td>
                  <td>
                    <a href="subirImagen_usuario.php?id=<?php echo $row['id_reporte_accion']?>" class="btn btn-secondary">
                    <i class="fa fa-eye"></i>

                  </td>
                  <td>
                    <a target="_blank" href="../../models/generar_pdf.php?id=<?php echo $row['id_reporte_accion']?>" class="btn btn-success">
                      <i class="fa fa-file-pdf-o"></i>
                    </a>
                    <a href="editar_reporte_accion_usuario.php?id=<?php echo $row['id_reporte_accion']?>" class="btn btn-warning">
                      <i class="fa fa-edit"></i>
                    </a>
                    <a href="borrar_reporte_accion.php?id=<?php echo $row['id_reporte_accion']?>" class="btn btn-danger">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
              <?php } ?>
            </tbody>
          </table>
          <!-- /.reportes -->
      </div>
    </div>
  </section>
<!-- /.content -->
<!-- Panel de biventanas-->
  <div class="row">
    <div class="col-md-6">
      <div class="box box-default">
        <div class="box-header with-border">
          <i class="fa fa-bullhorn"></i>
          <h3 class="box-title">Recomendaciones</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="col md 8">
            <table class="table table-bordered text-center">
              <thead>
                <tr>
                  <th>Título</th>
                  <th>Descripción</th>
                  <th>Metas</th>
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
                      <a href="lista_metas_usuario.php?id=<?php echo $row['id_recomendacion']?>" class="btn btn-secondary">
                      <i class="fa fa-eye"></i>
                      <a href="crear_meta_usuario.php?id=<?php echo $row['id_recomendacion']?>" class="btn btn-secondary">
                      <i class="fa fa-file-o"></i>
                    </td>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->

    <div class="col-md-6">
      <div class="box box-default">
        <div class="box-header with-border">
          <i class="fa fa-bullhorn"></i>

          <h3 class="box-title">Acciones reportes</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Reporte por rango</a></li>
              <li><a href="#tab_2" data-toggle="tab">Crear reporte de acción</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
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
                          <button class="btn btn-success" name="crear_reporte_rango"> Crear reporte </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="container col-lg-30 col-lg-offset-1">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="card card-body">
                        <form action="area_asignada.php?id=<?php echo $_GET['id']; ?>" method="POST">
                          <br>
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
                          <br>
                        </form>
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
        <!-- /.box-body -->
        </div>
      <!-- /.box -->
      </div>
    <!-- /.col -->
    </div>
  <!-- /.row -->
  <!-- END Panel de biventanas -->
  <br>
  <center>
    <td>
      <button onclick="location.href='areas_asignadas.php'">Regresar</button>
    </td>
  </center>
  <br>


<?php include("../../includes/footer2.php") ?>