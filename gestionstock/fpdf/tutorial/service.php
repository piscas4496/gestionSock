<?php
require('../fpdf.php');
// require '../../config/database.php';
// $id=$_GET['id'];
// $req=$db->prepare('SELECT * FROM reservation WHERE id = ?');
// $req->execute(array($id));

class PDF extends FPDF
{
// Load data
function LoadData($file)
{
	// Read file lines
	$lines = file($file);
	$data = array();
	foreach($lines as $line)
		$data[] = explode(';',trim($line));
	return $data;
}

// Simple table
function BasicTable()
{
	// Header
	$this->Image('1.JPG',5,1,200);

	// foreach($header as $col)

	// $this->Cell(40,100,$col,100);
	$this->Ln(50);
	require 'config/database.php';
	
	$req=$db->query('SELECT * FROM service');
	// $this->Cell(190,12,'LES RESERVATIONS',1,0,'C');
		$this->Ln();
		$this->Cell(20,6,'#',1,0,'C');
		$this->Cell(120,6,'Nom du service',1,0,'C');
		$this->Cell(50,6,'Date creation',1,0,'C');
		// $this->Cell(30,6,'Categorie',1,0,'C');
		// $this->Cell(50,6,'Date achat',1,0,'C');
		// $this->Cell(50,6,'Date de passation',1,0,'C');
		$this->Ln();

	while ($row = $req->fetch(PDO::FETCH_OBJ)) {
		

		$this->Cell(20,8,$row->id,1,0,'C');
		$this->Cell(120,8,$row->nom,1,0,'C');
		// $this->Cell(25,8,$row->,1,0,'C');
		// $this->Cell(30,8,$row->categorie,1,0,'C');
		$this->Cell(50,8,$row->created_at,1,0,'C');
		// $this->Cell(50,8,$row->datej,1,0,'C');
		$this->Ln();
	}
	// Data
	// foreach($data as $row)
	// {
	// 	foreach($row as $col)
			
	// 		$this->Cell(40,6,$col,1);
	// 	$this->Ln();
	// }
}

// Better table
function ImprovedTable($data)
{
	// Column widths
	$w = array(40, 35, 40, 45);
	// Header
	// for($i=0;$i<count($header);$i++)
	// 	$this->Cell($w[$i],7,$header[$i],1,0,'C');
	// $this->Ln();
	// Data
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR');
		$this->Cell($w[1],6,$row[1],'LR');
		$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
		$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
		$this->Ln();
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}

// Colored table
function FancyTable($data)
{
	// Colors, line width and bold font
	$this->SetFillColor(255,0,0);
	$this->SetTextColor(255);
	$this->SetDrawColor(128,0,0);
	$this->SetLineWidth(.3);
	$this->SetFont('','B');
	// Header
	$w = array(40, 35, 40, 45);
	// for($i=0;$i<count($header);$i++)
	// 	$this->Cell($w[$i],7,$header[$i],1,0,'C',true);
	// $this->Ln();
	// Color and font restoration
	$this->SetFillColor(224,235,255);
	$this->SetTextColor(0);
	$this->SetFont('');
	// Data
	$fill = false;
	foreach($data as $row)
	{
		$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
		$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
		$this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
		$this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
		$this->Ln();
		$fill = !$fill;
	}
	// Closing line
	$this->Cell(array_sum($w),0,'','T');
}
}

$pdf = new PDF();
// Column headings
// $header = array('Nom', 'Date', 'Date fin', '');
// Data loading
// $data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable();
$pdf->AddPage();
// $pdf->ImprovedTable($data);
$pdf->AddPage();
// $pdf->FancyTable($data);
$pdf->Output();
?>
