<?php
include '../init.php';

sleep(3);

$newpass = $_POST["newpass"];
$connewpass = $_POST["connewpass"];
$uid = $_POST["uid"];

$errors = array();

if (empty($newpass) || empty($connewpass) || empty($uid)){
	$errors[] = "One or more fields are empty. Please fill them up.";
}else{
	if (strlen($newpass) > 20 || strlen($connewpass) > 20 || strlen($newpass) < 6 || strlen($connewpass) < 6){
		$errors[] = "Password should only 6 to 20 characters only.";
	}
	if ($newpass != $connewpass){
		$errors[] = "Password not the same.";
	}
}
$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	changePass($newpass, $uid);
	$return['error'] = false;
	$return['msg'] = "Success";
}
echo json_encode($return);
?>