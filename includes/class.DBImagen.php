<?php

class DBImagen
{

	private $DBConexion;

	function __construct($Conexion)
	{
		$this->DBConexion = $Conexion;
	}

	/**********************************
	Función para guardar la ruta de la
	   Imagen en la base de datos
	**********************************/
	public function uploadImage($Imagen)
	{
		$id_reporte = $_GET['id'];
		$ruta = '../../imagenes/'.$Imagen['imagen']['name'];
		move_uploaded_file($Imagen['imagen']['tmp_name'],$ruta);
		$SQLStatement = $this->DBConexion->prepare("INSERT INTO imagenes_reporte (urlPhoto, id_reporte) VALUES (:url, $id_reporte)");
		$SQLStatement->bindParam(":url",$ruta);
		$SQLStatement->execute();
	}

	/**********************************
	Función visualizar las imagenes
	que estan en la ruta guardada en la
	BD
	**********************************/
	public function viewImages($id)
	{
		$SQLStatement = $this->DBConexion->prepare("SELECT * FROM imagenes_reporte WHERE id_reporte = $id");
		$SQLStatement->execute();

		while($img = $SQLStatement->fetch(PDO::FETCH_ASSOC))
		{
		?>
		<tr>
			<td>
				<a href="?id=<?php echo $img['id_reporte']?>&imagen_id=<?php echo $img['id']?>" class="btn btn-danger">
					<i class="fa fa-trash"></i>
				</a>
			</td>
			<td><center><img src="<?php print($img['urlPhoto']); ?>" width="100"></center></td>
		</tr>
		<?php
		}
	}

}

?>