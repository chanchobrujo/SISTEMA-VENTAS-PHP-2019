<?php
require('../FPDF/fpdf.php');
require('../conn.php');
class PDF extends FPDF{
	// Cabecera de página
	function Header(){
	    // Arial bold 15
	    $this->SetFont('Arial','B',20);
	    // Movernos a la derecha
	    $this->Cell(45);
	    // Título
	    $this->Cell(110,15,utf8_decode('REPORTE DE INGRESOS POR CLIENTE'),0,0,'C');
	    // Salto de línea
	    $this->Ln(20);
	}

	// Pie de página
	function Footer(){
	    // Posición: a 1,5 cm del final
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',10);
	    // Número de página
	    $this->Cell(0,10,utf8_decode('PÁGINA ').$this->PageNo().'/{nb}',0,0,'C');
	}
}
$dni = $_GET['dni'];
$t=0;
$sql = "call procedimiento_reporte1('$dni')";
$r = mYsqli_query($con,$sql)or die("error: ".mysqli_error($con));
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',10);
$pdf->cell(50,9,'CLIENTE',1,0,'C');
$pdf->cell(36,9,'DATO DE LA VENTA',1,0,'C');
$pdf->cell(40,9,'PRODUCTO',1,0,'C');
$pdf->cell(20,9,'PRECIO',1,0,'C');
$pdf->cell(22,9,'CANTIDAD',1,0,'C');
$pdf->cell(22,9,'SUBTOTAL',1,1,'C');
while ($row = $r->fetch_assoc()) {
	$pdf->cell(50,9,$row['CLIENTE'],1,0,'C');
	$pdf->cell(36,9,$row['DATO DE LA VENTA'],1,0,'C');
	$pdf->cell(40,9,$row['PRODUCTO'],1,0,'C');
	$pdf->cell(20,9,$row['PRECIO'],1,0,'C');
	$pdf->cell(22,9,$row['CANTIDAD'],1,0,'C');
	$pdf->cell(22,9,$row['SUBTOTAL'],1,1,'C');
	$t = $row['SUBTOTAL']+$t;
}
$pdf->cell(22,9,'TOTAL:',1,0,'C');
$pdf->cell(22,9,$t,1,1,'C');
$pdf->Output();

?>