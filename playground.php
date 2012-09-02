<?php
include 'init.php';

if (!logged_in()){
	header('Location: index.php');
	exit();
}

$unique_key = substr(md5(rand(0, 1000000)), 0, 30);


$random = rand(1000000000, 9999999999);
	$sec = sha1(base64_encode($random));
	
	echo $sec;
?>
