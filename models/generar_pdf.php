<?php
	require('../includes/fpdf/fpdf.php');
	require('../includes/db2.php');


	$id_reporte_accion = $_GET['id'];

	$query = "SELECT * FROM reportes_acciones WHERE id_reporte_accion = $id_reporte_accion";
	$result = mysqli_query($con, $query);
	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_array($result);
		$id_area = $row['id_area'];
	}

	$query = "SELECT * FROM areas WHERE id = $id_area";
	$result = mysqli_query($con, $query);
	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_array($result);
		$nombre_area = $row['nombre'];
	}

	$query = "SELECT * FROM reportes_acciones WHERE id_reporte_accion = $id_reporte_accion";
	$result = mysqli_query($con, $query);
	if (mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_array($result);
		$titulo = $row['titulo'];
		$recomen_inv = $row['recomen_inv'];
		$descripcion = $row['descripcion'];
		$tiempo = $row['tiempo'];
	}

	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->SetFont('Arial','B',18);
	$pdf->SetXY(50, 15);
	$pdf->Cell(100,10,utf8_decode($nombre_area), 0 /* borde de celda, 1 sí, 2 no*/, 1/* saltos de linea*/, 'C'/*tipo de alineacion, C - centrada, L - izquierda, R - derecha*/);
	$y = $pdf->GetY();
	$pdf->SetY($y+5);
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(100, 10, utf8_decode('Titulo:'), 0, 1, 'L');
	$pdf->SetFont('Arial','B',12);
	$pdf->MultiCell(200, 7.5, utf8_decode($titulo), 0, 'L', 0);
	$y = $pdf->GetY();
	$pdf->SetY($y+10);
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(100, 10, utf8_decode('Recomendaciones involucradas:'), 0, 1, 'L');
	$pdf->SetFont('Arial','B',12);
	$pdf->MultiCell(200, 7.5, utf8_decode($recomen_inv), 0, 'L', 0);
	$y = $pdf->GetY();
	$pdf->SetY($y+10);
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(100, 10, utf8_decode('Descripcion:'), 0, 1, 'L');
	$pdf->SetFont('Arial','B',12);
	$pdf->MultiCell(200, 7.5, utf8_decode($descripcion), 0, 'L', 0);
	$y = $pdf->GetY();
	$pdf->SetY($y+10);
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(100, 10, utf8_decode('Tiempo de duración:'), 0, 1, 'L');
	$pdf->SetFont('Arial','B',12);
	$pdf->MultiCell(200, 7.5, utf8_decode($tiempo), 0, 'L', 0);
	$y = $pdf->GetY();
	$pdf->SetY($y+10);
	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(100, 10, utf8_decode('Evidencias:'), 0, 1, 'L');

	$query = "SELECT * FROM imagenes_reporte WHERE id_reporte = $id_reporte_accion";
	$resultado_imagenes = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($resultado_imagenes)){
		$pdf->Image("sgr/$row[urlPhoto]");
	}
	$pdf->Output();
?>