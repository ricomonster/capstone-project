<?php
include '../init.php';

sleep(3);

$errormsg = "";

$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$username = $_POST["username"];
$password = $_POST["password"];
$cpassword = $_POST["cpassword"];
$priviledge = $_POST["priviledge"];

$errors = array();

if (empty($firstname) || empty($lastname) || empty($username) || empty($password) || empty($cpassword) || empty($priviledge)){
	$errors[] = "One or more fields are empty. Please fill them up.";
}else{
	if (strlen($firstname) > 20 || strlen($lastname) > 20 || strlen($username) > 20){
		$errors[] = "One of the fields contains too many characters.";
	}
	if (strlen($password) > 20 || strlen($cpassword) > 20 || strlen($password) < 6 || strlen($cpassword) < 6){
		$errors[] = "Password should only 6 to 20 characters only.";
	}
	if ($password != $cpassword){
		$errors[] = "Your passwords should be the same.";
	}
	if (checkUser($username) === true){
			$errors[] = "Username already being used.";
	}
}
$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	addUser($firstname, $lastname, $username, $password, $priviledge);
	$return['error'] = false;
	$return['msg'] = 'Account is ready to be used!<a href="index.php">Homepage</a>';
}
echo json_encode($return);
?>