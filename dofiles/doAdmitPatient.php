<?php
include '../init.php';

sleep(3);

$errors = array();

$pid = $_POST["pid"];
$rid = $_POST["rid"];
$docid = $_POST["docid"];
$bednum = $_POST["bednum"];
$service = $_POST["service"];
$roomtype = $_POST["roomtype"];

$drpt = getDocAttend($rid, $pid);
foreach ($drpt as $d){
	$curr_doc = $d["did"];
}

if(empty($service)){
	$error[] = "Please select a service where the patient will be admitted.";
}
if(empty($roomtype)){
	$error[] = "Please select the type of room where the patient will be admitted.";
}
if(empty($bednum)){
	$error[] = "Please select a bed where the patient will be admitted.";
}
if(empty($docid)){
	$error[] = "Select the Admitting Doctor";
}else{
	if(checkPID($pid)===false){
		$error[] = "The patient does not exist. Please try again.";
	}
	if(checkRecord($pid, $rid)===false){
		$error[] = "The record that you've passed is not available. Please try again";
	}
	if(checkForAdmit($pid, $rid)===false){
		$error[] = "The patient is not for admission.";
	}
}

if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	if($curr_doc == $docid){
		admitPatientCurDoc($pid, $rid, $docid, $bednum, $service, $roomtype);
	}else{
		admitPatient($pid, $rid, $docid, $bednum, $service, $roomtype);
	}
	$return['error'] = false;
	$url = "admission.php?ref=admittedpt&ntf=success";
	$return['msg'] = $url;
}
echo json_encode($return);
?>