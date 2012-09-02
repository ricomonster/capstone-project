<?php
include '../init.php';

sleep(3);

$pid = $_POST["pid"];
$rid = $_POST["rid"];
$aid = $_POST["aid"];
$prognotes = $_POST["prognotes"];

$errors = array();

if (empty($prognotes)){
	$errors[] = "Please input the patient's progress.";
}

$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	addProgNotes($pid, $rid, $aid, $prognotes);
	$return['error'] = false;
	$return['msg'] = "Success";
}
echo json_encode($return);
?>