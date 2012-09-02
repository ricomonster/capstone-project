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
$tid = $_POST["tid"];
$shift = $_POST["shift"];
$given = $_POST["given"];
$ref = $_POST["ref"];
$cpage = $_POST["currpage"];

$errors = array();

if (empty($shift)){
	$errors[] = "One or more fields are empty.";
}else{

switch($shift){
		case "11 PM - 7 AM":
			if($nshift < $ctime || $nlshift > $ctime){
				$givendate = $mdate;
			}
			if($mnshift < $ctime && $nlshift > $ctime ){
				$givendate = $mdate;
			}else{
				$givendate = $db_date;
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
	addTheraConsumed($pid, $rid, $aid, $tid, $shift, $given, $givendate);
	$url = "viewpatientadmitted.php?pid=".$pid."&rid=".$rid."&aid=".$aid."&tab=".$ref."&page=".$cpage."&ntf=sthera";
	$return['error'] = false;
	$return['msg'] = $url;
}
echo json_encode($return)
?>