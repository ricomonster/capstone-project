<?php
include '../init.php';

sleep(3);

$complaint = $_POST["complaint"];
$presentill = $_POST["presentill"];

$measles = $_POST["measles"];
$tb = $_POST["tb"];
$malaria = $_POST["malaria"];
$arthritis = $_POST["arthritis"];
$syphillis = $_POST["syphillis"];
$drugs = $_POST["drugs"];

$mumps = $_POST["mumps"];
$asthma = $_POST["asthma"];
$rheumatic = $_POST["rheumatic"];
$typhoid = $_POST["typhoid"];
$diarrhea = $_POST["diarrhea"];
$alcoholism = $_POST["alcoholism"];

$mental = $_POST["mental"];
$diabetes = $_POST["diabetes"];
$cancer = $_POST["cancer"];
$hypertension = $_POST["hypertension"];
$blooddys = $_POST["blooddys"];
$allergies = $_POST["allergies"];

$others = $_POST["others"];
$prevop = $_POST["prevop"];
$children = $_POST["children"];

$fcancer = $_POST["fcancer"];
$ftb = $_POST["ftb"];
$fhypertension = $_POST["fhypertension"];
$fmental = $_POST["fmental"];
$fblooddys = $_POST["fblooddys"];

$heartdisease = $_POST["heartdisease"];
$fdiabetes = $_POST["fdiabetes"];
$fallergies = $_POST["fallergies"];
$familyplanning = $_POST["familyplanning"];

$genappearance = $_POST["genappearance"];
$skin = $_POST["skin"];
$headbent = $_POST["headbent"];
$headandlymph = $_POST["headandlymph"];
$chestbreast = $_POST["chestbreast"];
$hrate = $_POST["hrate"];
$hdia = $_POST["hdia"];
$hsys = $_POST["hsys"];
$rrate = $_POST["rrate"];

$stomach = $_POST["stomach"];
$liver = $_POST["liver"];
$gallbladder = $_POST["gallbladder"];
$spleen = $_POST["spleen"];

$kidneyblad = $_POST["kidneyblad"];
$genitalia = $_POST["genitalia"];
$spine = $_POST["spine"];
$neurological = $_POST["neurological"];
$impression = $_POST["impression"];

$pid = $_POST["pid"];
$rid = $_POST["rid"];
$aid = $_POST["aid"];
$docid = $_POST["docid"];

if (empty($complaint) || empty($presentill) || empty($others) || empty($prevop) || empty($children) || empty($genappearance) || empty($skin) || empty($headbent) || empty($headandlymph) || empty($chestbreast) || empty($hrate) || empty($hdia) || empty($hsys) || empty($rrate) || empty($kidneyblad) || empty($genitalia) || empty($spine) || empty($neurological) || empty($impression) || empty($pid) || empty($rid) || empty($aid) || empty($docid)){
	$errors[] = "One or more fields are empty. Please fill them up.";
}else{
	if (!is_numeric($hrate)){
		$errors[] = "The heart rate you've entered is not numeric";
	}
	if (!is_numeric($hdia)){
		$errors[] = "The diastolic pressure you've entered is not numeric";
	}
	if (!is_numeric($hsys)){
		$errors[] = "The systolic pressure you've entered is not numeric";
	}
	if (!is_numeric($rrate)){
		$errors[] = "The respiratory rate you've entered is not numeric";
	}
}
$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	addHistoPhys($pid, $rid, $aid, $docid, $complaint, $presentill, $measles, $tb, $malaria, $arthritis, $syphillis, $drugs, $mumps, $asthma, $rheumatic, $typhoid, $diarrhea, $alcoholism, $mental, $diabetes, $cancer, $hypertension, $blooddys, $allergies, $others, $prevop, $children, $fcancer, $ftb, $fhypertension, $fmental, $fblooddys, $heartdisease, $fdiabetes, $fallergies, $familyplanning, $genappearance, $skin, $headbent, $headandlymph, $chestbreast, $hrate, $hdia, $hsys, $rrate, $stomach, $liver, $gallbladder, $spleen, $kidneyblad, $genitalia, $spine, $neurological, $impression);
	$return['error'] = false;
	$return['msg'] = "Success";
}
echo json_encode($return);
?>