<?php
include 'init.php';
require('functions/height_generator.php');

$pdf=new Height_Generator('P');
$pdf->AddPage();

$pid = $_GET["pid"];

$ptInfo = getPtInfo($pid);

foreach ($ptInfo as $in){
	$pid = $in["pid"];
	$firstname = $in["firstname"];
	$middlename = $in["middlename"];
	$lastname = $in["lastname"];
	$membership = $in["membership"];
	$sex = $in["sex"];
	$cs = $in["cs"];
	$dob = $in["dateofbirth"];
	$dateofbirth = date('F d, Y', strtotime($in["dateofbirth"]));
	$opdnum = $in["opdnum"];
	$address = $in["address"];
	$address = $in["address"];
	$placeofbirth = $in["placeofbirth"];
	$occupation = $in["occupation"];
	$contactno = $in["contactno"];
	$religion = $in["religion"];
	$nationality = $in["nationality"];
}

$Y_Fields_Name_position = 25;
$pdf->SetFont('Arial','B',9);
$pdf->SetX(10);
$pdf->Cell(190,5,"BACNOTAN DISTRICT HOSPITAL",0,0,'C');
$pdf->Ln(4);
	
$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(190,5, 'Bacnotan, La Union',0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',9);
$pdf->SetX(10);
$pdf->Cell(190,5,"PATIENT MEDICAL HISTORY",0,0,'C');
$pdf->Ln(10);

$pdf->SetFillColor(232,232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',8);

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(20,5,'Patient ID:',1,0,'R',1);
$pdf->SetX(30);
$pdf->Cell(25,5, '#'.$opdnum,1,0,'L');
$pdf->Ln();

$pdf->SetX(10);
$pdf->Cell(20,5,'Patient Name:',1,0,'R',1);
$pdf->SetX(30);
$pdf->Cell(170,5, $lastname.', '.$firstname.' '.$middlename,1,0,'L');
$pdf->Ln();

$pdf->SetX(10);
$pdf->Cell(15,5,'Sex:',1,0,'R',1);
$pdf->SetX(25);
$pdf->Cell(20,5, $sex,1,0,'L');
$pdf->SetX(45);
$pdf->Cell(20,5,'Date of Birth:',1,0,'R',1);
$pdf->SetX(65);
$pdf->Cell(35,5, $dateofbirth,1,0,'L');
$pdf->SetX(95);
$pdf->Cell(20,5,'Civil Status:',1,0,'R',1);
$pdf->SetX(115);
$pdf->Cell(25,5, $cs,1,0,'L');
$pdf->SetX(135);
$pdf->Cell(20,5,'Occupation:',1,0,'R',1);
$pdf->SetX(155);
$pdf->Cell(45,5, $occupation,1,0,'L');
$pdf->Ln();

$pdf->SetX(10);
$pdf->Cell(20,5,'Contact #:',1,0,'R',1);
$pdf->SetX(30);
$pdf->Cell(30,5, $contactno,1,0,'L');
$pdf->SetX(60);
$pdf->Cell(15,5,'Religion:',1,0,'R',1);
$pdf->SetX(75);
$pdf->Cell(40,5, $religion,1,0,'L');
$pdf->SetX(115);
$pdf->Cell(20,5,'Nationality:',1,0,'R',1);
$pdf->SetX(135);
$pdf->Cell(65,5, $nationality,1,0,'L');
$pdf->Ln();

$pdf->SetX(10);
$pdf->Cell(20,5,'Address:',1,0,'R',1);
$pdf->SetX(30);
$pdf->Cell(170,5, $address,1,0,'L');
$pdf->Ln();

$pdf->SetX(10);
$pdf->Cell(20,5,'Place of Birth:',1,0,'R',1);
$pdf->SetX(30);
$pdf->Cell(170,5, $placeofbirth,1,0,'L');
$pdf->Ln(10);

$pdf->SetFont('Arial','B',9);
$pdf->SetX(10);
$pdf->Cell(100,5,'Medical History of '. $lastname.', '.$firstname.' '.$middlename,1,0,'L',1);
$pdf->Ln(7);

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(30,5,'Date Visited',1,0,'C',1);
$pdf->SetX(40);
$pdf->Cell(21,5,'BP',1,0,'C',1);
$pdf->SetX(61);
$pdf->Cell(12,5,'CR',1,0,'C',1);
$pdf->SetX(73);
$pdf->Cell(12,5,'RR',1,0,'C',1);
$pdf->SetX(85);
$pdf->Cell(10,5,'Temp.',1,0,'C',1);
$pdf->SetX(95);
$pdf->Cell(15,5,'Weight',1,0,'C',1);
$pdf->SetX(110);
$pdf->Cell(45,5,'Chief Complaint',1,0,'C',1);
$pdf->SetX(155);
$pdf->Cell(45,5,'Remarks',1,0,'C',1);
$pdf->Ln();

$ptRec = getRecordsForMedHx($pid);
if(empty($ptRec)){
	$pdf->SetFont('Arial','B',9);
	$pdf->SetX(10);
	$pdf->Cell(190,5,"Patient has no existing records",1,0,'C');
	$pdf->Ln(10);
}else{
	foreach ($ptRec as $r){
		$pdf->SetWidths(array(30, 21, 12, 12, 10, 15, 45, 45));
		$pdf->Row(array(date('F d, Y', strtotime($r["dateofvisit"])), $r["bp"].' mmHg', $r["cr"].' ppm', $r["rr"].' bpm', $r["temp"].' C', $r["weight"].' kg', $r["complaint"], $r["remarks"]));
	}
}
$pdf->Ln(5);

$ptLastRec = getLastRecord($pid);
foreach ($ptLastRec as $l){
	$dateofvisit = date('F d, Y', strtotime($l["dateofvisit"]));
	$age = $l["age"];
	$timein = $l["timein"];
	$bp = $l["bp"];
	$cr = $l["cr"];
	$rr = $l["rr"];
	$temp = $l["temp"];
	$weight = $l["weight"];
	$complaint = $l["complaint"];
}
if(empty($ptLastRec)){

}else{
$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(15,5,'Date:',1,0,'R',1);
$pdf->SetX(25);
$pdf->Cell(50,5, $dateofvisit,1,0,'L');
$pdf->SetX(75);
$pdf->Cell(15,5,'Time In:',1,0,'R',1);
$pdf->SetX(90);
$pdf->Cell(25,5, $timein,1,0,'L');
$pdf->SetX(115);
$pdf->Cell(15,5,'Age:',1,0,'R',1);
$pdf->SetX(130);
$pdf->Cell(30,5, $age,1,0,'L');
$pdf->Ln();

$pdf->SetX(10);
$pdf->Cell(15,5,'BP:',1,0,'R',1);
$pdf->SetX(25);
$pdf->Cell(25,5, $bp.' mmHg',1,0,'L');
$pdf->SetX(50);
$pdf->Cell(10,5,'CR:',1,0,'R',1);
$pdf->SetX(60);
$pdf->Cell(20,5, $cr.' pulse/min',1,0,'L');
$pdf->SetX(80);
$pdf->Cell(10,5,'RR:',1,0,'R',1);
$pdf->SetX(90);
$pdf->Cell(25,5, $rr.' breathes/min',1,0,'L');
$pdf->SetX(115);
$pdf->Cell(10,5,'Temp:',1,0,'R',1);
$pdf->SetX(125);
$pdf->Cell(10,5, $temp.' C',1,0,'L');
$pdf->SetX(135);
$pdf->Cell(15,5,'Weight:',1,0,'R',1);
$pdf->SetX(150);
$pdf->Cell(10,5, $weight.' kg',1,0,'L');
$pdf->Ln();

$pdf->SetX(10);
$pdf->Cell(30,40,"Doctor's Remarks:",1,0,'R',1);
$pdf->SetX(40);
$pdf->Cell(160,40, ' ',1,0,'L');
$pdf->Ln();

$pdf->SetX(10);
$pdf->Cell(30,5,"For Admission:",1,0,'R',1);
$pdf->SetX(40);
$pdf->Cell(30,5, ' ',1,0,'L');
$pdf->SetX(70);
$pdf->Cell(20,5,"Doctor:",1,0,'R',1);
$pdf->SetX(90);
$pdf->Cell(50,5, ' ',1,0,'L');
$pdf->Ln();
}

$fl = getUserInfo($_SESSION["uid"]);
foreach ($fl as $r){
	$ufirstname = $r["firstname"];
	$ulastname = $r["lastname"];
}

date_default_timezone_set("Asia/Manila");
$curr_date = date('F d, Y', time());
$curr_time = date('h:i a', time());
//$tick = GenerateSentence();
$pdf->SetFont('Arial','B',7);
$pdf->SetX(10);
$pdf->Cell(50,5,'Generated by: ' . $ufirstname . ' ' .$ulastname . ' at ' . $curr_date . ', '.$curr_time,0,0,'L');
$pdf->Ln(5);

$pdf->Output();
?>