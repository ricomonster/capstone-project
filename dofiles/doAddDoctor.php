<?php
include '../init.php';

sleep(3);

$firstname = $_POST["firstname"];
$middlename = $_POST["middlename"];
$lastname = $_POST["lastname"];
$title = $_POST["title"];
$position = $_POST["position"];
$specialization = $_POST["specialization"];
$contact = $_POST["contact"];
$address = $_POST["address"];
$duty = $_POST["duty"];

$errors = array();

if (empty($firstname) || empty($middlename) || empty($lastname) || empty($title) || empty($specialization) || empty($position) || empty($contact) || empty($address) || empty($duty)){
	$errors[] = "One or more fields are empty. Please fill them up.";
}else{
	if (checkDocName($firstname, $middlename, $lastname) === true){
		$errors[] = "That doctor already exists in our database.";
	}
}
$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	addDoctor($firstname, $middlename, $lastname, $title, $specialization, $position, $contact, $address, $duty);
	$return['error'] = false;
	$return['msg'] = "Success";
}
echo json_encode($return);
?>