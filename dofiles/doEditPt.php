<?php
include '../init.php';

sleep(3);

$pid = $_POST["pid"];
$firstname = $_POST["firstname"];
$middlename = $_POST["middlename"];
$lastname = $_POST["lastname"];
$membership = $_POST["membership"];
$sex = $_POST["sex"];
$cs = $_POST["cs"];
$bdMonth = $_POST["bdMonth"];
$bdDay = $_POST["bdDay"];
$bdYear = $_POST["bdYear"];
$opdnum = $_POST["opdnum"];
$address = $_POST["address"];
$placeofbirth = $_POST["placeofbirth"];
$occupation = $_POST["occupation"];
$contactno = $_POST["contactno"];
$religion = $_POST["religion"];
$nationality = $_POST["nationality"];

$errors = array();

if (empty($pid) || empty($firstname) || empty($middlename) || empty($lastname) || empty($membership) || empty($sex) || empty($cs) || empty($bdMonth) || empty($bdDay) || empty($bdYear) || empty($opdnum) || empty($address) || empty($placeofbirth) || empty($occupation) || empty($contactno) || empty($religion) || empty($nationality)){
	$errors[] = "One or more fields are empty. Please fill them up.";
}else{
	if (strlen($firstname) > 50){
		$errors[] = "First Name contains too many characters.";
	}
	if (strlen($middlename) > 50){
		$errors[] = "Middle Name contains too many characters.";
	}
	if (strlen($middlename) > 50){
		$errors[] = "Last Name contains too many characters.";
	}
	if (strlen($cs) > 50){
		$errors[] = "Civil Status contains too many letters.";
	}
	if (!is_numeric($bdMonth)){
		$errors[] = "The birth month of the patient is not a number";
	}
	if (!is_numeric($bdDay)){
		$errors[] = "The birth day of the patient is not an year";
	}
	if (!is_numeric($bdYear)){
		$errors[] = "The birth year of the patient is not a number";
	}
}
$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{

	editPatient($pid, $firstname, $middlename, $lastname, $membership, $sex, $cs, $bdMonth, $bdDay, $bdYear, $opdnum, $address, $placeofbirth, $occupation, $contactno, $religion, $nationality);
	$return['error'] = false;
	$return['msg'] = "You have successfully updated the patient's information.";
}
echo json_encode($return);
?>