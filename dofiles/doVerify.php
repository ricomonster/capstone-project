<?php
include '../init.php';

sleep(3);

$username = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$loc = $_POST["loc"];
$type = $_POST["type"];
$pid = $_POST["pid"];
$rid = $_POST["rid"];
$uid = $_POST["uid"];

$errors = array();

if (empty($username) || empty($password) || empty($cpassword)){
	$errors[] = "One or more fields are empty. Please fill them up.";
}else{
	if ($password != $cpassword){
		$errors[] = "Passwords should be the same.";
	}
	
	if (checkUserReal($username, $uid) === false){
		$errors[] = "That is not your username.";
	}
	$passCheck = checkPasswordTrue($username, $password, $uid);
	if ($passCheck === false){
		$errors[] = "Your password is incorrect. Please try again.";
	}
}
$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	$random = rand(1000000000, 9999999999);
	$sec = sha1(base64_encode($random));
	$_SESSION['secid'] = $sec;
	
	switch($type){
		case 'edit':
			switch($loc){
				case 'pt':
					$location = "editpatientinfo.php?scid=" . $sec . "&pid=".$pid;
					break;
				case 'rec':
					$location = "editpatientrecord.php?scid=" . $sec . "&pid=" . $pid . "&rid=" . $rid;
					break;
				default:
					$location = "pagenotfound.php";
				}
			break;
		case 'delete':
			switch($loc){
				case 'pt':
					$location = "deletepatientinfo.php?scid=" . $sec . "&pid=".$pid;
					break;
				case 'rec':
					$location = "deletepatientrecord.php?scid=" . $sec . "&pid=" . $pid . "&rid=" . $rid;
					break;
				default:
					$location = "pagenotfound.php";
				}
			break;
		default:
			$location = "pagenotfound.php";
		}
	
	$_SESSION['scid'] = $sec;
	$return['error'] = false;
	$return['msg'] = $location;
}
echo json_encode($return);
?>