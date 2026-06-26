<?php
	include("../../includes/validacion_rol_admin.php");
	include("../../includes/db2.php");

	if(isset($_POST['enviar_correo'])){
		$asunto = $_POST['asunto'];
		$nombre = $_POST['nombre'];
		$mensaje = $_POST['mensaje'];
		$destino = $_GET['correo'];
		$contenido = "Remitente: ".$nombre."\nMensaje: ".$mensaje;
		mail($destino, $asunto, $contenido);

		header("Location: lista_destinatarios.php");

	}

	include("../../includes/header2.php");
?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Correo
        <small>enviar</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Correos</a></li>
        <li class="active">enviar</li>
      </ol>
    </section>
 	<!-- /.Content Header (Page header) -->

	<center>
 		<h2 class="page-header">Enviar un correo a
 			<?php

                $query = "SELECT * FROM usuarios WHERE id = $_GET[id]";
                $resultado_usuario = mysqli_query($con, $query);
                while($row = mysqli_fetch_array($resultado_usuario)){
                     echo $row['nombre'];
                }
            ?>
        </h2>
    </center>

	<div class="container col-lg-8 col-lg-offset-5">
		<div class="row">
			<div class="col-md-4 mx-auto">
				<div class="card card-body">
					<form action="enviar_correo.php?correo=<?php echo $_GET['correo']; ?>" method="POST">
						<br>
						<label>Nombre del remitente</label>
						<div class="form-group">
							<input type="text" name="nombre" value="" class="form-control" placeholder="Nombre" required="">
						</div>
						<label>Asunto</label>
						<div class="form-group">
							<input type="text" name="asunto" value="" class="form-control" placeholder="Asunto" required="">
						</div>
						<label>Mensaje</label>
						<div class="gorm-group">
							<textarea name="mensaje" rows="6" class="form-control" placeholder="Mensaje" required=""></textarea>
						</div>
						<br>
						<button class="btn btn-success" name="enviar_correo"> Enviar </button>
						<br>
						<br>
						<button onclick="location.href='lista_destinatarios.php'">Regresar</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<br>
    <td>

    </td>
<?php include("../../includes/footer2.php") ?>