<?php
include '../init.php';

sleep(3);

$remarks = $_POST["remarks"];
$foradmission = $_POST["foradmission"];
$doctor = $_POST["doctor"];
$rid = $_POST["rid"];
$pid = $_POST["pid"];

$errors = array();

if (empty($remarks)){
	$errors[] = "Please input remarks.";
}
if (empty($foradmission)){
	$errors[] = "Please input if the patient if for admission or not";
}
if (empty($doctor)){
	$errors[] = "Please input the doctor who examined the patient.";
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
	addRemarks($remarks, $foradmission, $doctor, $pid, $rid, $admit);
	$return['error'] = false;
	$return['msg'] = "Success";
}
echo json_encode($return);
?>