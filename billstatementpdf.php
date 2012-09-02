<?php
include 'init.php';
require('functions/height_generator.php');

$pid = $_GET["pid"];
$rid = $_GET["rid"];

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
}

$ptRec = getRecords($pid);
foreach ($ptRec as $r){
	$dateofvisit = date('F d, Y', strtotime($r["dateofvisit"]));
	$age = $r["age"];
}

$adm = getAdmissionDet($pid, $rid);

foreach ($adm as $ad){
	$aid = $ad["aid"];
	$getdatead = $ad["dateadmitted"];
	$service = $ad["service"];
	$roomno = $ad["roomno"];
	$bednumber = $ad["bednumber"];
	$dayadmitted = date('d', strtotime($ad["dateadmitted"]));
	$undateadmitted = $ad["dateadmitted"];
	$dateadmitted = date('F d, Y', strtotime($ad["dateadmitted"]));
	$timeadmitted = date('h:m a', strtotime($ad["dateadmitted"]));
}

$cif = getClinicalFace($pid, $rid, $aid);
foreach ($cif as $c){
	$datedischarged = date('F d, Y', strtotime($c["datedischarged"]));
	$timedischarged = $c["timedischarged"];
	$persondischarged = $c["persondischarged"];
	$finaldiagnosis = $c["finaldiagnosis"];
	$noofhosdays = $c["noofhosdays"];
}

$bill = getBillStatement($pid, $rid, $aid);
foreach ($bill as $b){
	$membership = $b["membership"];
	$billingnumber = $b["billingnumber"];
	
	$drugsandmedicines = $b["drugsandmedicines"];
	$supplies = $b["supplies"];
	$laboratory = $b["laboratory"];
	$xray = $b["xray"];
	$ultrasound = $b["ultrasound"];
	$ecg = $b["ecg"];
	$oxygen = $b["oxygen"];
	$accomsubs = $b["accomsubs"];
	$professionalfee = $b["professionalfee"];
	$orfeedrfee = $b["orfeedrfee"];
	$admissionfee = $b["admissionfee"];
	$wardservice = $b["wardservice"];
	$nebfee = $b["nebfee"];
	$ambulancefee = $b["ambulancefee"];
	
	$phdrugsandmedicines = $b["phdrugsandmedicines"];
	$phsupplies = $b["phsupplies"];
	$phlaboratory = $b["phlaboratory"];
	$phxray = $b["phxray"];
	$phultrasound = $b["phultrasound"];
	$phecg = $b["phecg"];
	$phoxygen = $b["phoxygen"];
	$phaccom = $b["phaccomsubs"];
	$phprofessionalfee = $b["phprofessionalfee"];
	$phorfeedrfee = $b["phorfeedrfee"];
	
	$exdrugsandmedicines = $b["exdrugsandmedicines"];
	$exsupplies = $b["exsupplies"];
	$exlaboratory = $b["exlaboratory"];
	$exxray = $b["exxray"];
	$exultrasound = $b["exultrasound"];
	$execg = $b["execg"];
	$exoxygen = $b["exoxygen"];
	$exaccomsubs = $b["exaccomsubs"];
	$exprofessionalfee = $b["exprofessionalfee"];
	$exorfeedrfee = $b["exorfeedrfee"];
	$exadmissionfee = $b["exadmissionfee"];
	$exwardservice = $b["exwardservice"];
	$exnebfee = $b["exnebfee"];
	$exambulancefee = $b["exambulancefee"];
	
	$total = $b["total"];
	$phtotal = $b["phtotal"];
	$extotal = $b["extotal"];
}

//PDF GENERATOR
$pdf=new Height_Generator('P');
$pdf->AddPage();

$pdf->SetFont('Arial','B',9);
$pdf->Cell(80);
$pdf->Cell(30,10,"BACNOTAN DISTRICT HOSPITAL",0,0,'C');
$pdf->Ln(5);
    
$pdf->SetFont('Arial','B',8);
$pdf->Cell(80);
$pdf->Cell(30,10,"Bacnotan, La Union",0,0,'C');
$pdf->Ln(10);

$Y_Fields_Name_position = 25;


$pdf->SetFillColor(232,232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',8);
$pdf->SetY($Y_Fields_Name_position);

$pdf->SetX(10);
$pdf->Cell(20,5,'Patient:',1,0,'R',1);
$pdf->SetX(30);
$pdf->Cell(100,5, $lastname . ', ' . $firstname . ' ' . $middlename,1,0);

$pdf->SetX(130);
$pdf->Cell(15,5,'Age:',1,0,'R',1);
$pdf->SetX(145);
$pdf->Cell(20,5, $age,1,0);

$pdf->SetX(165);
$pdf->Cell(15,5,'Sex:',1,0,'R',1);
$pdf->SetX(180);
$pdf->Cell(20,5, $sex,1,0);
$pdf->Ln();

$pdf->SetX(10);
$pdf->Cell(20,5,'Room No.:',1,0,'R',1);
$pdf->SetX(30);
$pdf->Cell(20,5, $roomno,1,0);

$pdf->SetX(50);
$pdf->Cell(50,5,'Date/Time of Admission:',1,0,'R',1);
$pdf->SetX(100);
$pdf->Cell(50,5, $dateadmitted . ' at ' . $timeadmitted,1,0);

$pdf->SetX(150);
$pdf->Cell(23,5,'Membership:',1,0,'R',1);
$pdf->SetX(173);
$pdf->Cell(27,5, $membership,1,0);
$pdf->Ln();

$pdf->SetFont('Arial','B',9);
$pdf->Cell(80);
$pdf->Cell(30,10,"PATIENT WOULD LIKE TO CHECK OUT AS GIVEN BELOW",0,0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(15,5,'Date:',1,0,'R',1);
$pdf->SetX(25);
$pdf->Cell(40,5, $datedischarged,1,0);

$pdf->SetX(65);
$pdf->Cell(15,5,'Time:',1,0,'R',1);
$pdf->SetX(80);
$pdf->Cell(20,5, $timedischarged,1,0);

$pdf->SetX(100);
$pdf->Cell(50,5,'Nurse on Duty during Discharge:',1,0,'R',1);
$pdf->SetX(150);
$pdf->Cell(50,5, $persondischarged,1,0);
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(30,5,'FINAL DIAGNOSIS:',1,0,'R',1);
$pdf->SetX(40);
$pdf->Cell(160,5, $finaldiagnosis,1,0);
$pdf->Ln();
$pdf->Ln();

$pdf->SetX(155);
$pdf->Cell(20,5,'Bill No.:',1,0,'R', 1);
$pdf->SetX(175);
$pdf->Cell(25,5,$billingnumber,1,0);
$pdf->Ln();

$pdf->SetX(155);
$pdf->Cell(20,5,'Hos No.:',1,0,'R', 1);
$pdf->SetX(175);
$pdf->Cell(25,5, $opdnum,1,0);
$pdf->Ln();
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'SERVICES',1,0,'C',1);
$pdf->SetX(60);
$pdf->Cell(45,5, 'ACTUAL CHARGES',1,0,'C',1);
$pdf->SetX(105);
$pdf->Cell(50,5, 'PHILHEALTH BENEFITS',1,0,'C',1);
$pdf->SetX(155);
$pdf->Cell(45,5, 'EXCESS',1,0,'C',1);
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'DRUGS AND MEDICINES',1,0,'L');
$pdf->SetX(60);
$pdf->Cell(45,5, ' ',1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, ' ',1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5, ' ',1,0,'L');
$pdf->Ln();


$thera = getTheraConsumed($rid, $pid);
foreach ($thera as $t){
$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5, $t["theraname"].' :: '.date('M d, Y', strtotime($t["givendate"])),1,0,'R');
$pdf->SetX(60);
$pdf->Cell(45,5, 'Php ' .$t["price"],1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, ' ',1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5, ' ',1,0,'L');
$pdf->Ln();
}

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'Total Drugs and Meds',1,0,'L');
$pdf->SetX(60);
$pdf->Cell(45,5, 'Php ' .$drugsandmedicines,1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, 'Php ' . $phdrugsandmedicines,1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5, 'Php ' .$exdrugsandmedicines,1,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'SUPPLIES e.g. D/S 3cc..',1,0,'L');
$pdf->SetX(60);
$pdf->Cell(45,5, 'Php ' .$supplies,1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, 'Php '.$phsupplies,1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5, 'Php ' .$exsupplies,1,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'LABORATORY',1,0,'L');
$pdf->SetX(60);
$pdf->Cell(45,5, 'Php ' .$laboratory,1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, 'Php '.$phlaboratory,1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5, 'Php ' .$exlaboratory,1,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'X-RAY',1,0,'L');
$pdf->SetX(60);
$pdf->Cell(45,5, 'Php ' .$xray,1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, 'Php '.$phxray,1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5, 'Php ' .$exxray,1,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'ULTRASOUND',1,0,'L');
$pdf->SetX(60);
$pdf->Cell(45,5, 'Php ' .$ultrasound,1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, 'Php '.$phultrasound,1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5, 'Php ' .$exultrasound,1,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'ECG',1,0,'L');
$pdf->SetX(60);
$pdf->Cell(45,5, 'Php ' .$ecg,1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, 'Php ' . $phecg,1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5, 'Php ' .$execg,1,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'OXYGEN',1,0,'L');
$pdf->SetX(60);
$pdf->Cell(45,5, 'Php ' .$oxygen,1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, 'Php '.$phoxygen,1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5, 'Php ' .$exoxygen,1,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'ACCOM./SUBS.',1,0,'L');
$pdf->SetX(60);
$pdf->Cell(45,5, 'Php ' .$accomsubs,1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, 'Php '.$phaccom,1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5, 'Php ' .$exaccomsubs,1,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'PROFESSIONAL FEE',1,0,'L');
$pdf->SetX(60);
$pdf->Cell(45,5, ' ',1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, ' ',1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5, ' ',1,0,'L');
$pdf->Ln();

$totprofee = "";
$doctors = getDoctorsAttend($rid, $pid);
foreach ($doctors as $d){
$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'Dr.'.$d["firstname"].' '.$d["lastname"].', '.$d["title"],1,0,'R');
$pdf->SetX(60);
$pdf->Cell(45,5, 'Php ' .$d["professionalfee"],1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, ' ',1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5, ' ',1,0,'L');
$pdf->Ln();
}

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'Total',1,0,'L');
$pdf->SetX(60);
$pdf->Cell(45,5, 'Php ' .$professionalfee,1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, 'Php '.$phprofessionalfee,1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5, 'Php ' .$exprofessionalfee,1,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'O.R. FEE/D.R. FEE',1,0,'L');
$pdf->SetX(60);
$pdf->Cell(45,5, 'Php ' .$orfeedrfee,1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, 'Php '.$phorfeedrfee,1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5, 'Php ' .$exorfeedrfee,1,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'OTHERS',1,0,'L');
$pdf->SetX(60);
$pdf->Cell(45,5, ' ',1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, ' ',1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5, ' ',1,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'Admission Fee',1,0,'C');
$pdf->SetX(60);
$pdf->Cell(45,5, 'Php ' .$admissionfee,1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, ' ',1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5,'Php ' . $exadmissionfee,1,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'Ward Service',1,0,'C');
$pdf->SetX(60);
$pdf->Cell(45,5, 'Php ' .$wardservice,1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, ' ',1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5, 'Php ' .$exwardservice,1,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'Neb. Fee',1,0,'C');
$pdf->SetX(60);
$pdf->Cell(45,5, 'Php ' .$nebfee,1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, ' ',1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5, 'Php ' .$exnebfee,1,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'Ambulance Fee',1,0,'C');
$pdf->SetX(60);
$pdf->Cell(45,5, 'Php ' .$ambulancefee,1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, ' ',1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5, 'Php ' .$exambulancefee,1,0,'L');
$pdf->Ln();

$pdf->SetFont('Arial','B',8);
$pdf->SetX(10);
$pdf->Cell(50,5,'TOTAL',1,0,'C');
$pdf->SetX(60);
$pdf->Cell(45,5, 'Php ' .$total,1,0,'L');
$pdf->SetX(105);
$pdf->Cell(50,5, 'Php '.$phtotal,1,0,'L');
$pdf->SetX(155);
$pdf->Cell(45,5,'Php ' . $extotal,1,0,'L');
$pdf->Ln();
$pdf->Ln();
$pdf->Ln();

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
//foreach ($tick as $tck)
$pdf->Output();
?>
