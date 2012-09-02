<?php
include '../init.php';

sleep(3);

$category = $_POST['category'];
					
$nameofnextkin = $_POST['nameofnextkin'];
$relationshipkin = $_POST['relationshipkin'];
$addresskin = $_POST['addresskin'];
					
$dateadmitted = $_POST['dateadmitted'];
$timeadmitted = $_POST['timeadmitted'];
$datedischarge = $_POST['datedischarge'];
$timedischarge = $_POST['timedischarge'];
$ampmdis = $_POST['ampmdis'];
$noofhosdays  = $_POST['noofhosdays'];
					
$servicedept  = $_POST['servicedept'];
$ward = $_POST['ward'];
$serdeptat = $_POST['serdeptat'];
					
$admittingdiagnosis  = $_POST['admittingdiagnosis'];
$wb = $_POST['wb'];
$imp = $_POST['imp'];
$unmp = $_POST['unmp'];
$exp = $_POST['exp'];
$ref = $_POST['ref'];
					
$trans = $_POST['trans'];
$hama = $_POST['hama'];
$abs = $_POST['abs'];
$others = $_POST['others'];
					
$admittingphysician = $_POST['admittingphysician'];
$admittingclerk = $_POST['admittingclerk'];
$disposition = $_POST['disposition'];
					
$finaldiagnosis = $_POST['finaldiagnosis'];
$complications = $_POST['complications'];
$surgicaldone = $_POST['surgicaldone'];
$pathologicalreport = $_POST['pathologicalreport'];
					
$residentincharge = $_POST['residentincharge'];
$medicalspecialist = $_POST['medicalspecialist'];
$seniorresidenthead = $_POST['seniorresidenthead'];

$pid = $_POST["pid"];
$rid = $_POST["rid"];
$aid = $_POST["aid"];
$did = $_POST["did"];

if (empty($nameofnextkin) || empty($relationshipkin) || empty($addresskin) || empty($datedischarge) || empty($timedischarge) || empty($ampmdis) || empty($noofhosdays) || empty($servicedept) || empty($ward) || empty($serdeptat) || empty($admittingdiagnosis) || empty($admittingphysician) || empty($admittingclerk) || empty($disposition) || empty($finaldiagnosis) || empty($complications) || empty($surgicaldone) || empty($pathologicalreport) || empty($residentincharge) || empty($medicalspecialist) || empty($seniorresidenthead) || empty($pid) || empty($rid) || empty($aid) || empty($did)){
	$errors[] = "One or more fields are empty. Please fill them up.";
}else{
	
}
$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	addClinicalFace($category, $nameofnextkin, $relationshipkin, $addresskin, $dateadmitted, $timeadmitted, $datedischarge, $timedischarge, $ampmdis, $noofhosdays, $servicedept, $ward, $serdeptat, $admittingdiagnosis, $wb, $imp, $unmp, $exp, $ref, $trans, $hama, $abs, $others, $admittingphysician, $admittingclerk, $disposition, $finaldiagnosis, $complications, $surgicaldone, $pathologicalreport, $residentincharge, $medicalspecialist, $seniorresidenthead, $pid, $rid, $aid, $did);
	$return['error'] = false;
	$return['msg'] = "Success";
}
echo json_encode($return);
?>