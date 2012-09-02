<?php
include '../init.php';

sleep(3);

$rid = $_POST["rid"];
$pid = $_POST["pid"];
$dateofvisit = $_POST["dateofvisit"];
$age = $_POST["age"];
$timein = $_POST["timein"];
$inampm = $_POST["inampm"];
$timeout = $_POST["timeout"];
$outampm = $_POST["outampm"];
$sys = $_POST["sys"];
$dia = $_POST["dia"];
$cr = $_POST["cr"];
$rr = $_POST["rr"];
$temp = $_POST["temp"];
$weight = $_POST["weight"];
$complaint = $_POST["complaint"];
$remarks = $_POST["remarks"];
$foradmission = $_POST["foradmission"];

$errors = array();

if (empty($pid) || empty($dateofvisit) || empty($age) || empty($timein) || empty($timeout) || empty($sys) || empty($dia) || empty($cr) || empty($rr) || empty($temp) || empty($weight) || empty($complaint) || empty($remarks)){
	$errors[] = "One or more fields are empty. Please fill them up.";
}else{
	if (!is_numeric($sys)){
			$errors[] = "The systolic pressure of the patient is not a number";
	}
	if (!is_numeric($dia)){
		$errors[] = "The diastolic pressure of the patient is not a number";
	}
	if (!is_numeric($cr)){
		$errors[] = "The circulation of the patient is not a number";
	}
	if (!is_numeric($rr)){
		$errors[] = "The respiration rate of the patient is not a number";
	}
	if (!is_numeric($temp)){
		$errors[] = "The temperature of the patient is not a number";
	}
	if (!is_numeric($weight)){
		$errors[] = "The weight of the patient is not a number";
	}
}
$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	if($foradmission == "Yes"){
		$admit = "Pending";
	}else{
		$admit = "N/A";
	}

	editRecord($rid, $pid, $dateofvisit, $age, $timein, $inampm, $timeout, $outampm, $sys, $dia, $cr, $rr, $temp, $weight, $complaint, $remarks, $foradmission, $admit);
	$return['error'] = false;
	$return['msg'] = "You have successfully updated the patient's record.";
}
echo json_encode($return);
?>