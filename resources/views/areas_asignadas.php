<?php
  include("../../includes/validacion_rol_profesor.php");

  include("../../includes/db2.php");

  include("../../includes/header.php");
?>
  <!-- Vista Total -->

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Áreas asignadas
        <small>lista</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Áreas asignadas</a></li>
        <li class="active">lista</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <center>
        <h2>Lista de áreas asignadas</h2>
      </center>
      <br>
        <!-- START ALERTS AND CALLOUTS -->
        <!-- tabla -->
      <div class="col md 8">
        <table class="table table-bordered text-center">
          <thead>
            <tr>
              <th>Nombre</th>

              <th>Descripción</th>

              <th>Acciones</th>

            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT * FROM areas WHERE id_profesor_asignado = $_SESSION[id]";
            $resultado_areas = mysqli_query($con, $query);

            while($row = mysqli_fetch_array($resultado_areas)) { ?>
              <tr>
                <td><?php echo $row['nombre'] ?></td>
                <td><?php echo $row['descripcion'] ?></td>
                <td>
                  <form action="area_asignada.php?id=<?php echo $row['id']; ?>" method="POST">
                      <button class="btn btn-success" name=""> Ingresar </button>
                  </form>
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