<?php
  include("../../includes/validacion_rol_profesor.php");

  include("../../includes/db2.php");

  include("../../includes/header.php");
?>
  <!-- Vista Total -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Todos los reportes
        <small>lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Todos los reportes</a></li>
        <li class="active">lista</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <center>
        <h2>Lista de todos los reportes realizados</h2>
      </center>
      <br>
        <!-- START ALERTS AND CALLOUTS -->
        <!-- tabla -->
      <div class="col md 8">
        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th>Título</th>

              <th>Descripción</th>

              <th>Área</th>

              <th>Profesor asignado</th>

              <th>Acciones</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT * FROM reportes_acciones";
            $resultado_reportes = mysqli_query($con, $query);

            while($row = mysqli_fetch_array($resultado_reportes)) { ?>
              <tr>
                <td><?php echo $row['titulo'] ?></td>
                <td><?php echo $row['descripcion'] ?></td>
                <td>
                    <?php
                      $query = "SELECT * FROM areas WHERE id = $row[id_area]";
                      $resultado_areas = mysqli_query($con, $query);

                      while($area = mysqli_fetch_array($resultado_areas)) {
                        echo $area['nombre'];
                      }
                    ?>
                </td>
                <td>
                  <?php
                      $query = "SELECT * FROM areas WHERE id = $row[id_area]";
                      $resultado_areas = mysqli_query($con, $query);

                      while($area = mysqli_fetch_array($resultado_areas)) {
                        $query = "SELECT * FROM usuarios WHERE id = $area[id_profesor_asignado]";
                        $resultado_profesores = mysqli_query($con, $query);

                        while($profesor = mysqli_fetch_array($resultado_profesores)) {
                          echo $profesor['nombre'];
                        }
                      }
                    ?>
                </td>
                <td>
                  <a href="../../models/generar_pdf.php?id=<?php echo $row['id_reporte_accion']?>" class="btn btn-success">
                        <i class="fa fa-file-pdf-o"></i>
                  </a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.tabla -->
    </section>
    <!-- /.content -->


<?php include("../../includes/footer2.php") ?>