<?php
include '../init.php';

sleep(3);

$pid = $_POST["pid"];
$rid = $_POST["rid"];
$aid = $_POST["aid"];
$datestarted = $_POST["datestarted"];
$shift = $_POST["shift"];
$timestarted = $_POST["timestarted"];
$ampmsel = $_POST["ampmsel"];
$ivfbt = $_POST["ivfbt"];
$dateconsumed = $_POST["dateconsumed"];
$timecon = $_POST["timecon"];
$ampmselcon = $_POST["ampmselcon"];

$errors = array();

if (empty($shift) || empty($timestarted) || empty($ivfbt) || empty($dateconsumed)){
	$errors[] = "One or more fields are empty.";
}

$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	addIvfConsumption($pid, $rid, $aid, $datestarted, $shift, $timestarted, $ampmsel, $ivfbt, $dateconsumed, $timecon, $ampmselcon);
	$return['error'] = false;
	$return['msg'] = "Success";
}
echo json_encode($return)
?>