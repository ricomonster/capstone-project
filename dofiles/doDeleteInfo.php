<?php
include '../init.php';

sleep(3);

$pid = $_POST["pid"];

$errors = array();

if (empty($pid)){
	$errors[] = "There's something wrong in the system. Please try refreshing the page or try again later. If problem persists, contact the developer.";
}
$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	deletePatient($pid);
	$return['error'] = false;
	$url = "opd-er.php";
	$return['msg'] = $url;
	$_SESSION["msg"] = '<div class="success">You have successfully delete the information and records of the patient.</div>';
}
echo json_encode($return);
?>