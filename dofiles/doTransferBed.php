<?php
include '../init.php';

sleep(3);

$pid = $_POST["pid"];
$rid = $_POST["rid"];
$aid = $_POST["aid"];
$bednum = $_POST["bednum"];
$roomtype = $_POST["roomtype"];
$prevbed = $_POST["prevbed"];
$dateadmitted = $_POST["dateadmitted"];

$errors = array();

if (empty($roomtype)){
	$errors[] = "Please select which type of room will the patient be transferred.";
}
if (empty($bednum)){
	$errors[] = "Please select which bed will the patient be transferred.";
}

$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	transferBed($pid, $rid, $aid, $prevbed, $bednum, $roomtype, $dateadmitted);
	$url = "viewpatientadmitted.php?pid=".$pid."&rid=".$rid."&tab=ptinforec&ntf=successtrans";
	$return['error'] = false;
	$return['msg'] = $url;
}
echo json_encode($return);
?>