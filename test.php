<?php
include 'init.php';

sleep(3);

$test1 = $_POST["testbox1"];
$test2 = $_POST["testbox2"];
$test3 = $_POST["testbox3"];
$test4 = $_POST["testbox4"];

$errors = array();

if (empty($test1)){
	$errors[] = "Empty test box 1.";
}
if (empty($test2)){
	$errors[] = "Empty test box 2.";
}
if (empty($test3)){
	$errors[] = "Empty test box 3.";
}
if (empty($test4)){
	$errors[] = "Empty test box 4.";
}

if (!empty($test1)){
	$errors[] = $test1;
}
if (!empty($test2)){
	$errors[] = $test2;
}
if (!empty($test3)){
	$errors[] = $test3;
}
if (!empty($test4)){
	$errors[] = $test4;
}

$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	$return['error'] = false;
	$url = "yes i did!";
	$return['msg'] = $url;
}
echo json_encode($return);
?>