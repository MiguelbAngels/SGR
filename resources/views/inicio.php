<?php
  include("../../includes/validacion_rol_profesor.php");

  include("../../includes/db2.php");

  include("../../includes/header.php");
?>
  <!-- Vista Total -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Página de inicio
        <small>Bienvenido</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Portal</a></li>
        <li class="active">Principal</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- START ALERTS AND CALLOUTS -->
      <div class="row">
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-warning"></i>

              <h3 class="box-title">Alertas generales activas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Alertas -->
              <?php
                $query = "SELECT * FROM alertas";
                $resultado_alerta = mysqli_query($con, $query);

                while($row = mysqli_fetch_array($resultado_alerta)) { ?>
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> <?php echo $row['titulo'] ?></h4>
                    <?php echo $row['descripcion'] ?>
                  </div>
                <?php } ?>
                <!-- /.Alertas -->
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

              <h3 class="box-title">Historial de reportes subidos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col md 8">
                <table class="table table-bordered text-center">
                  <thead>
                    <tr>
                      <th>Titulo</th>
                      <th>Fecha de creación</th>
                      <th>Accion</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $query = "SELECT * FROM reportes_acciones";
                      $resultado_reporte_accion = mysqli_query($con, $query);

                      while($row = mysqli_fetch_array($resultado_reporte_accion)) { ?>
                        <tr>
                          <td><?php echo $row['titulo'] ?></td>
                          <td><?php echo $row['fecha_creacion'] ?></td>
                          <td>
                            <a target="_blank" href="../../models/generar_pdf.php?id=<?php echo $row['id_reporte_accion']?>" class="btn btn-success">
                              <i class="fa fa-file-pdf-o"></i>
                            </a>
                            <a href="borrar_reporte_accion.php?id=<?php echo $row['id_reporte_accion']?>" class="btn btn-danger">
                              <i class="fa fa-trash"></i>
                            </a>
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
      </div>
      <!-- /.row -->

      <!-- END ALERTS AND CALLOUTS -->

      <!-- Alertas individuales -->
      <div class="row">
        <div class="col-md-6">
          <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-warning"></i>

              <h3 class="box-title">Alertas personales activas</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- Alertas -->
              <?php
                $query = "SELECT * FROM alertas_individuales WHERE id_profesor = $_SESSION[id]";
                $resultado_alerta_individual = mysqli_query($con, $query);

                while($alerta = mysqli_fetch_array($resultado_alerta_individual)) { ?>
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-warning"></i> <?php echo $alerta['titulo'] ?></h4>
                    <?php echo $alerta['descripcion'] ?>
                  </div>
                <?php } ?>
                <!-- /.Alertas -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- END ALERTS AND CALLOUTS -->

    </section>
    <!-- /.content -->


<?php include("../../includes/footer2.php") ?>