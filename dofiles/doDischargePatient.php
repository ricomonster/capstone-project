<?php
include '../init.php';

sleep(3);

$errors = array();

$pid = $_POST["pid"];
$rid = $_POST["rid"];
$aid = $_POST["aid"];
$bednum = $_POST["bednum"];
$persondischarging = $_POST["persondischarging"];


if(empty($persondischarging)){
	$error[] = "Please select a service where the patient will be admitted.";
}

if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	dischargePatient($pid, $rid, $aid, $bednum, $persondischarging);
	$return['error'] = false;
	$url = "admission.php?ref=admittedpt&ntf=successdischarge";
	$return['msg'] = $url;
}
echo json_encode($return);
?>