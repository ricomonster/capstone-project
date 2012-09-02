<?php
include '../init.php';

sleep(3);

date_default_timezone_set("Asia/Manila");
$db_date = date('Y-m-d', time());
$curr_time = date('h:i a', time());
$ctime = strtotime($curr_time);
$yesdate = strtotime('-1 day',strtotime ($db_date)) ;
$mdate = date ( 'Y-m-d' , $yesdate );

$nshift = strtotime("11:59 pm");
$nlshift = strtotime("6:59 AM");
$mnshift = strtotime("12:00 am");


$pid = $_POST["pid"];
$rid = $_POST["rid"];
$aid = $_POST["aid"];
$theraname = $_POST["theraname"];
$shift = $_POST["shift"];
$given = $_POST["given"];
$type = $_POST["type"];

$errors = array();

if (empty($shift) || empty($theraname) || empty($given)){
	$errors[] = "One or more fields are empty.";
}else{
	switch($shift){
		case "11 PM - 7 AM":
			if($nshift < $ctime || $nlshift > $ctime){
				$givendate = $mdate;
			}
			if($mnshift < $ctime && $nlshift > $ctime ){
				$givendate = $mdate;
			}
			break;
		case "7 AM - 3 PM":
			$givendate = $db_date;
			break;
		case "3 PM - 11 PM":
			$givendate = $db_date;
			break;
		default:
			$errors[] = "Please try again";
	}
}

$return['msg'] = array();
if (!empty($errors)){
	foreach ($errors as $error){
		$return['error'] = true;
		$return['msg'][]  = $error . "\n";
	}
}else{
	addTherapeutic($pid, $rid, $aid, $theraname, $shift, $given, $type, $givendate);
	switch($type){
		case 'Injection':
			$url = "viewpatientadmitted.php?pid=".$pid."&rid=".$rid."&tab=therapeutic&ntf=sinjection";
			break;
		case 'Oral':
			$url = "viewpatientadmitted.php?pid=".$pid."&rid=".$rid."&tab=therapeutic&ntf=soral";
			break;
		case 'Treatment':
			$url = "viewpatientadmitted.php?pid=".$pid."&rid=".$rid."&tab=therapeutic&ntf=streatment";
			break;
		default:
			break;
	}
	$return['error'] = false;
	$return['msg'] = $url;
}
echo json_encode($return)
?>