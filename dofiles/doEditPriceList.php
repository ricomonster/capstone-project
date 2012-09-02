<?php
include '../init.php';

sleep(3);

$membership = $_POST["membership"];
$drugsandmedicines = $_POST["drugsandmedicines"];
$supplies = $_POST["supplies"];
$laboratory = $_POST["laboratory"];
$xray = $_POST["xray"];
$ultrasound = $_POST["ultrasound"];
$ecg = $_POST["ecg"];
$oxygen = $_POST["oxygen"];
$accomsubs = $_POST["accomsubs"];
$professionalfee = $_POST["professionalfee"];
$orfeedrfee = $_POST["orfeedrfee"];
$phid = $_POST["phid"];

if(empty($membership) || empty($drugsandmedicines) || empty($supplies) || empty($laboratory) || empty($xray) || empty($ultrasound) || empty($ecg) || empty($oxygen) || empty($accomsubs) || empty($professionalfee) || empty($orfeedrfee)){
	$errors[] = "One or more fields are empty. Please fill them up.";
}
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
updatePriceList($phid, $membership, $drugsandmedicines, $supplies, $laboratory, $xray, $ultrasound, $ecg, $oxygen, $accomsubs, $professionalfee, $orfeedrfee);
$return['error'] = false;
$return['msg'] = "Success. This window will close in 10 seconds";
}
echo json_encode($return);
?>