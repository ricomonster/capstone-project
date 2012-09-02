<?php
include '../init.php';

sleep(3);

$firstname = $_POST["firstname"];
$middlename = $_POST["middlename"];
$lastname = $_POST["lastname"];
$membership = $_POST["membership"];
$sex = $_POST["sex"];
$cs = $_POST["cs"];
$birthdate = $_POST["birthdate"];
$opdnum = $_POST["opdnum"];
$address = $_POST["address"];
$placeofbirth = $_POST["placeofbirth"];
$occupation = $_POST["occupation"];
$contactno = $_POST["contactno"];
$religion = $_POST["religion"];
$nationality = $_POST["nationality"];
$dateofvisit = $_POST["dateofvisit"];
$age = $_POST["age"];
$timein = $_POST["timein"];
$inampm = $_POST["inampm"];
$sys = $_POST["sys"];
$dia = $_POST["dia"];
$cr = $_POST["cr"];
$rr = $_POST["rr"];
$temp = $_POST["temp"];
$weight = $_POST["weight"];
$complaint = $_POST["complaint"];

$errors = array();

if (empty($firstname) || empty($middlename) || empty($lastname) || empty($membership) || empty($sex) || empty($cs) || empty($birthdate) || empty($opdnum) || empty($address) || empty($placeofbirth) || empty($occupation) || empty($contactno) || empty($religion) || empty($nationality) || empty($dateofvisit) || empty($age) || empty($timein) || empty($sys) || empty($dia) || empty($cr) || empty($rr) || empty($temp) || empty($weight) || empty($complaint)){
	$errors[] = "One or more fields are empty. Please fill them up.";
}else{
	
	if(checkOPD($opdnum) === true){
		$errors[] = "OPD Number already exists.";
	}
	
	$checkPt = checkPatient($firstname, $middlename, $lastname);
	if($checkPt === true){
		$errors[] = "Patient Name already exists in our database.";
	}
	else{
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
		if (!is_numeric($sys)){
			$errors[] = "The systolic pressure of the patient is not a number";
		}
		if (!is_numeric($dia)){
			$errors[] = "The diastolic pressure of the patient is not a number";
		}
		if (!is_numeric($cr)){
			$errors[] = "The circulation of the patient is not a number";
		}
		if (!is_numeric($rr)){
			$errors[] = "The respiration rate of the patient is not a number";
		}
		if (!is_numeric($temp)){
			$errors[] = "The temperature of the patient is not a number";
		}
		if (!is_numeric($weight)){
			$errors[] = "The weight of the patient is not a number";
		}
	}
}
$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	addPatient($firstname, $middlename, $lastname, $membership, $sex, $cs, $birthdate, $opdnum, $address, $placeofbirth, $occupation, $contactno, $religion, $nationality,$dateofvisit, $age, $timein, $inampm, $sys, $dia, $cr, $rr, $temp, $weight, $complaint);
	$return['error'] = false;
	$return['msg'] = "Success";
}
echo json_encode($return);
?>