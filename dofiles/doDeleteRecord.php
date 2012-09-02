<?php
include '../init.php';

sleep(3);

$pid = $_POST["pid"];
$rid = $_POST["rid"];

$errors = array();

if (empty($pid) || empty($rid)){
	$errors[] = "There's something wrong in the system. Please try refreshing the page or try again later. If problem persists, contact the developer.";
}
$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	deleteRecord($pid, $rid);
	$return['error'] = false;
	$url = "viewpatientinfo.php?ref=ptrecords&pid=" . $pid;
	$return['msg'] = $url;
	$_SESSION["msg"] = '<div class="success">You have successfully deleted the record.</div>';
}
echo json_encode($return);
?>