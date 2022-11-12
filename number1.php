<?php
require "vendor/autoload.php";
use Fpdf\Fpdf;


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(10,10,'Name: Castillano, Kane Erryl G.');
$pdf->ln();
$pdf->Cell(40,10,'Program: Bachelor of Science in Information Technology');
$pdf->ln();
$pdf->Cell(40,10,'Email Address: castillano.kaneerryl@auf.edu.ph');
$pdf->ln();
$pdf->Cell(40,10,'Student Number: 18-0165-372');
$pdf->Output();
?>