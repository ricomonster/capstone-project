<?php
include '../init.php';

sleep(3);

$priviledge = $_POST["priviledge"];
$uid = $_POST["uid"];

$errors = array();

if (empty($priviledge)){
	$errors[] = "One or more fields are empty. Please fill them up.";
}
$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	changePriv($priviledge, $uid);
	$return['error'] = false;
	$return['msg'] = "Success";
}
echo json_encode($return);
?>