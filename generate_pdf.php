
<?php


//include connection file 
include_once("connection.php");
include_once('libs/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',10,3,35);
    $this->Image('tomas.png',168,6,25);
    $this->SetFont('Arial','',13);
    // Move to the right

    $this->Cell(63);
    // Title
    $this->Cell(80,0,'Republic of the Philippines',0,1,'B');
    // Line break
    $this->Ln(5);

    $this->Cell(53);
    // Title
    $this->Cell(80,0,'NATIONAL POLICE COMMISSION',0,1,'B');
    // Line break
    $this->Ln(5);

    
    $this->SetFont('Arial','B',13);
     $this->Cell(46);
    // Title
    $this->Cell(80,0,'PAMPANGA POLICE PROVINCIAL OFFICE',0,1,'B');
    // Line break
    $this->Ln(5);

     $this->Cell(45.5);
    // Title
    $this->Cell(80,0,'STO TOMAS MUNICIPAL POLICE STATION',0,1,'B');
    // Line break
    $this->Ln(5);

    $this->Cell(65);
    $this->SetFont('Arial','',13);
    $this->Cell(80,0,'Santo Tomas, Pampanga',0,1,'B');
    // Line break
    $this->Ln(20);


}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',10);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$db = new dbObj();
$connString =  $db->getConnstring();
$display_heading = array('blotterno'=>'Incident', 'incitype'=> 'Date', 'status'=> '','barangay'=> '','datereported'=>'Barangay','isitcrime'=>'','narrativerep'=>'','placeofinci'=>'','timereported'=>'Status','dateincident'=>'','timeincident'=>'','municipality'=>'','province'=>'','id'=>'Investigation No.');

$result = mysqli_query($connString, "SELECT blotterno, incitype,datereported , barangay, status   FROM tbl_irf") or die("database error:". mysqli_error($connString));
$header = mysqli_query($connString, "SHOW columns FROM tbl_irf");

$pdf = new PDF();
//header
$pdf->Cell(-10);
$pdf->AddPage();
//foter page
$pdf->AliasNbPages();

$pdf->SetFont('Arial','B',12);
foreach($header as $heading) {
$pdf->Cell(40,8,$display_heading[$heading['Field']],1);
}
foreach($result as $row) {
$pdf->Ln();
foreach($row as $column)
$pdf->Cell(40,8,$column,1);
}
$pdf->Output();
?>