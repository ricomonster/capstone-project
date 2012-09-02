<?php
include '../init.php';

sleep(3);

$username = $_POST["username"];
$password = $_POST["password"];

$errors = array();

if (empty($username) && empty($password)){
	$errors[] = "Please input your username and password";
}else{
	if (empty($username)){
		$errors[] = "Please input your username";
	}	
	if (checkUser($username) === false){
		$errors[] = "That username does not exist in our database.";
	}
	$passCheck = checkPassword($username, $password);
	if ($passCheck === false){
		$errors[] = "Your password is incorrect. Please try again.";
	}
}
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'] = $error;
	}
}else{
	$ua=getBrowser();
	$browser = $ua['name'] . ' ' .$ua['version'];
	$os = $ua['platform'];
	
	loginCheck($username);
	loginLog($passCheck, $browser, $os);
	$random = rand(1000000000, 9999999999);
	$sec = sha1(base64_encode($random));
	$_SESSION['securedid'] = $sec;
	$_SESSION['uid'] = $passCheck;
	$url = "index.php";
	$return['error'] = false;
	$return['msg'] = $url;
}
echo json_encode($return);
?>
