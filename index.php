<?php
include 'init.php';

if (logged_in()){
	include 'templates/homepage.php';
}else{
	include 'templates/loginpage.php';
}
?>