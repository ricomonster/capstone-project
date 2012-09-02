<?php
include '../init.php';

sleep(3);

$did = $_POST["did"];
$proffee = $_POST["proffee"];

$errors = array();

if (empty($proffee)){
	$errors[] = "Please input the Professional Fee";
}
$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	updateProfFee($did, $proffee);
	$return['error'] = false;
	$return['msg'] = "Success";
}
echo json_encode($return);
?>