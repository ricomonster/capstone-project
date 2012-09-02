<?php
include '../init.php';

sleep(3);

$pid = $_POST["pid"];
$rid = $_POST["rid"];
$aid = $_POST["aid"];
$docrefer = $_POST["docrefer"];
$doctask = $_POST["doctask"];

$errors = array();

if (empty($docrefer)){
	$errors[] = "Please choose a doctor to add.";
}
if (empty($doctask)){
	$errors[] = "Please the task of the doctor";
}

$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	if(checkDocExistAtPatient($pid,$rid,$docrefer)===true){
		upReferDoctor($pid, $rid, $aid, $docrefer, $doctask);
	}else{
		 referDoctor($pid, $rid, $aid, $docrefer, $doctask);
	}
	$url = "viewpatientadmitted.php?pid=".$pid."&rid=".$rid."&tab=ptinforec&ntf=successrefer";
	$return['error'] = false;
	$return['msg'] = $url;
}
echo json_encode($return);
?>