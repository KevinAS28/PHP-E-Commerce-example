<?php
include("fpdf.php");
include("database.php");
$db = new Database();
// Page header
class PDF extends FPDF{
public function Header()
{
    /*
    $this->Image('logo.png',10,-1,70);

    $this->SetFont('Arial','B',13);

    // Move to the right

    $this->Cell(80);

    // Title
    $this->Cell(80,10,'Employee List',1,0,'C');
    // Line break
    $this->Ln(20);
*/
}

// Page footer

function Footer()

{

    // Position at 1.5 cm from bottom
	/*
    $this->SetY(-15);

    // Arial italic 8

    $this->SetFont('Arial','I',8);

    // Page number

    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C';
*/
}

}

$display_heading = array('id'=>'ID', 'id_user'=> 'ID_USER', 'id_barang'=> 
'ID_BARANG','jumlah'=> 'JUMLAH', 'tanggal_beli'=>'Tanggal Beli', "tanggal_bayar"=>"Tanggal Bayar", "invoice"=>"Invoice", "file_bukti_bayar"=>"Bukti Bayar", "resi"=>"Resi");

$result = $db->cusq("select * from transaksi");

$header = $db->header_tb("transaksi");
 

$pdf = new PDF();

//header

$pdf->AddPage();

//foter page

$pdf->AliasNbPages();

$pdf->SetFont('Arial','B',12);

foreach($header as $heading) {

$pdf->Cell(40,12,$display_heading[$heading['Field']],1);

}

foreach($result as $row) {

$pdf->Ln();

foreach($row as $column)

$pdf->Cell(40,12,$column,1);

}

$pdf->Output();

?>