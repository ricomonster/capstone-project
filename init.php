<?php
ob_start();
session_start();

mysql_connect('localhost','root','');
mysql_select_db('dbprojectcapstone');


include 'functions/user.func.php';
include 'functions/patient.func.php';
include 'functions/verification.func.php';
include 'functions/records.func.php';
include 'functions/doctor.func.php';
include 'functions/admission.func.php';
include 'functions/charts.func.php';
include 'functions/billing.func.php';
?>
