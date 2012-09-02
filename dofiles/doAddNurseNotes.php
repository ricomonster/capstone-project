<?php
include '../init.php';

sleep(3);

$pid = $_POST["pid"];
$rid = $_POST["rid"];
$aid = $_POST["aid"];
$nurse = $_POST["nurse"];
$nursenotes = $_POST["nursenotes"];

$errors = array();

if (empty($nursenotes)){
	$errors[] = "Please input the nurse's notes.";
}
if (empty($nurse)){
	$errors[] = "Please input the name of the nurse.";
}

$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	addNurseNotes($pid, $rid, $aid, $nurse,$nursenotes);
	$return['error'] = false;
	$return['msg'] = "Success";
}
echo json_encode($return);
?>