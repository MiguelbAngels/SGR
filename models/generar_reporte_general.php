<?php
	require('../includes/fpdf/fpdf.php');
	require('../includes/db2.php');


	$id_area = $_GET['id'];

	$query = "SELECT * FROM areas WHERE id = $id_area";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$nombre_area = $row['nombre'];
	$descripcion_area = $row['descripcion'];
	$id_profesor_asignado = $row['id_profesor_asignado'];

	$query = "SELECT * FROM usuarios WHERE id = $id_profesor_asignado";
	$result = mysqli_query($con, $query);
	$row = mysqli_fetch_array($result);
	$nombre_profesor = $row['nombre'];

	if($nombre_profesor == null){
		$nombre_profesor = "No hay profesor asignado";
	}

	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',18);
	$pdf->SetXY(50, 15);
	$pdf->Cell(100,10,utf8_decode($nombre_area), 0 /* borde de celda, 1 sí, 2 no*/, 1/* saltos de linea*/, 'C'/*tipo de alineacion, C - centrada, L - izquierda, R - derecha*/);


	$query = "SELECT * FROM reportes_acciones WHERE id_area = $id_area";
	$resultado_reporte_accion = mysqli_query($con, $query);

	$contador = 1;

	while($row = mysqli_fetch_array($resultado_reporte_accion)) {
		if($row['fecha_creacion'] >= $_POST['rango_inicial'] && $row['fecha_creacion'] <= $_POST['rango_final']){
			if($contador > 1){
				$pdf->AddPage();
			}
			$y = $pdf->GetY();
			$pdf->SetY($y+10);
			$pdf->SetFont('Arial','B',16);
			$pdf->Cell(100, 10, utf8_decode('Reporte número: '.$contador), 0, 1, 'L');
			$y = $pdf->GetY();
			$pdf->SetY($y+5);
			$pdf->SetFont('Arial','B',16);
			$pdf->Cell(100, 10, utf8_decode('Titulo:'), 0, 1, 'L');
			$pdf->SetFont('Arial','B',12);
			$pdf->MultiCell(200, 7.5, utf8_decode($row['titulo']), 0, 'L', 0);
			$y = $pdf->GetY();
			$pdf->SetY($y+5);
			$pdf->SetFont('Arial','B',16);
			$pdf->Cell(100, 10, utf8_decode('Recomendaciones involucradas:'), 0, 1, 'L');
			$pdf->SetFont('Arial','B',12);
			$pdf->MultiCell(200, 7.5, utf8_decode($row['recomen_inv']), 0, 'L', 0);
			$y = $pdf->GetY();
			$pdf->SetY($y+5);
			$pdf->SetFont('Arial','B',16);
			$pdf->Cell(100, 10, utf8_decode('Descripcion:'), 0, 1, 'L');
			$pdf->SetFont('Arial','B',12);
			$pdf->MultiCell(200, 7.5, utf8_decode($row['descripcion']), 0, 'L', 0);
			$y = $pdf->GetY();
			$pdf->SetY($y+5);
			$pdf->SetFont('Arial','B',16);
			$pdf->Cell(100, 10, utf8_decode('Tiempo de duración:'), 0, 1, 'L');
			$pdf->SetFont('Arial','B',12);
			$pdf->MultiCell(200, 7.5, utf8_decode($row['tiempo']), 0, 'L', 0);

			$query = "SELECT * FROM imagenes_reporte WHERE id_reporte = $row[id_reporte_accion]";
			$resultado_imagenes = mysqli_query($con, $query);

			while($imagenes = mysqli_fetch_array($resultado_imagenes)){
				$y = $pdf->GetY();
				$pdf->SetY($y+5);
				$pdf->Image("sgr/$imagenes[urlPhoto]");
			}

			$contador = $contador + 1;
		}

	}
		$y = $pdf->GetY();
		$pdf->SetY($y+5);
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(100, 10, utf8_decode('Profesor asignado a esta área:'), 0, 1, 'L');
		$pdf->SetFont('Arial','B',12);
		$pdf->MultiCell(200, 7.5, utf8_decode($nombre_profesor), 0, 'L', 0);

	$pdf->Output();
?>