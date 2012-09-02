<?php
include '../init.php';

sleep(3);

$pid = $_POST["pid"];
$rid = $_POST["rid"];
$aid = $_POST["aid"];
$docorders = $_POST["docorders"];

$errors = array();

if (empty($docorders)){
	$errors[] = "Please input the nurse's notes.";
}

$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	addDocOrders($pid, $rid, $aid, $docorders);
	$return['error'] = false;
	$return['msg'] = "Success";
}
echo json_encode($return)
?>