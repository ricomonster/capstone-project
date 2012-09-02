<?php
include '../init.php';

sleep(3);

$pid = $_POST["pid"];
$dateofvisit = $_POST["dateofvisit"];
$age = $_POST["age"];
$timein = $_POST["timein"];
$inampm = $_POST["inampm"];
$sys = $_POST["sys"];
$dia = $_POST["dia"];
$cr = $_POST["cr"];
$rr = $_POST["rr"];
$temp = $_POST["temp"];
$weight = $_POST["weight"];
$complaint = $_POST["complaint"];

$errors = array();

if (empty($pid) || empty($dateofvisit) || empty($age) || empty($timein) || empty($sys) || empty($dia) || empty($cr) || empty($rr) || empty($temp) || empty($weight) || empty($complaint)){
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
	addPatientRecord($pid, $dateofvisit, $age, $timein, $inampm, $sys, $dia, $cr, $rr, $temp, $weight, $complaint);
	$return['error'] = false;
	$return['msg'] = "Success";
}
echo json_encode($return);
?>