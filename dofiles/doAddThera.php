<?php
include '../init.php';

sleep(3);

$theraname = $_POST["theraname"];
$type = $_POST["type"];
$price = $_POST["price"];

$errors = array();

if (empty($theraname)){
	$errors[] = "Please input the therapeutic name.";
}
if (empty($type)){
	$errors[] = "Please select type of the therapeutic.";
}
if (empty($price)){
	$errors[] = "Please input the price.";
}

$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	addTheraName($theraname, $type, $price);
	$return['error'] = false;
	$return['msg'] = "Success";
}
echo json_encode($return);
?>