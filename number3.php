<?php
require "vendor/autoload.php";
use Fpdf\Fpdf;

class PDF extends FPDF
{
function Header()
{
    global $title;

    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Calculate width of title and position
    $w = $this->GetStringWidth($title)+6;
    $this->SetX((210-$w)/2);
    // Colors of frame, background and text
    $this->SetDrawColor(0,80,180);
    $this->SetFillColor(200,162,35);
    $this->SetTextColor(17,99,127);
    // Thickness of frame (1 mm)
    $this->SetLineWidth(1);
    // Title
    $this->Cell($w,9,$title,1,1,'C',true);
    // Line break
    $this->Ln(10);
}

function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Text color in gray
    $this->SetTextColor(128);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}

function ChapterTitle($num, $label)
{
    $this->SetTextColor(255,255,255);
    // Arial 12
    $this->SetFont('Arial','B',12);
    // Background color
    $this->SetFillColor(0,0,0);
    
    // Title
    $this->Cell(0,6,"Chapter $num : $label",0,1,'L',true);
    // Line break
    $this->Ln(4);
}

function ChapterBody($file)
{
    // Read text file
    $txt = file_get_contents($file);
    // Times 12
    $this->SetFont('Times','',12);
    $this->SetTextColor(0,0,0);
    // Output justified text
    $this->MultiCell(0,5,$txt);
    // Line break
    $this->Ln();
    // Mention in italics
    $this->SetFont('','I');
    $this->Cell(0,5,'(end of excerpt)');
}

function PrintChapter($num, $title, $file)
{
    $this->AddPage();
    $this->ChapterTitle($num,$title);
    $this->ChapterBody($file);
}
}

$pdf = new PDF();
$title = 'Harry Potter and the Sorcerers Stone';
$pdf->SetTitle($title);
$pdf->SetAuthor('J. K. Rowling');
$pdf->PrintChapter(1,'THE BOY WHO LIVED','chap1.txt');
$pdf->PrintChapter(2,'THE VANISHING GLASS','chap2.txt');
$pdf->PrintChapter(3,'THE LETTERS FROM NO ONE','chap3.txt');
$pdf->PrintChapter(4,'THE KEEPER OF THE KEYS','chap4.txt');
$pdf->PrintChapter(5,'DIAGON ALLEY','chap5.txt');
$pdf->SetFillColor(200,162,35);
$pdf->Output();
?>