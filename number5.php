<?php
require "vendor/autoload.php";
use Fpdf\Fpdf;


$pdf = new FPDF();
$pdf->AddFont('PartyConfetti','','partyconfetti.php');
$pdf->AddPage();
$pdf->SetFont('PartyConfetti','',35);
$pdf->Cell(1, 30, 'Castillano, Kane Erryl G.');
$pdf->Cell(1, 50, 'BSIT-3');
$pdf->Cell(1, 70, 'PDC10');
$pdf->Output();
?>