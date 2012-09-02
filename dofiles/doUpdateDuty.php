<?php
include '../init.php';

if(isset($_POST["updateDuty"])){
	if($_POST["upDuty"]=="On-Duty"){
		if(empty($_POST["did"]) || empty($_POST["upDuty"])){
			header ("Location: ../viewdoctorprofile.php?tab=docprof&did=" . $_POST["did"] . "&ntf=missing");
			exit();
		}else{
			updateDuty($_POST["did"], $_POST["upDuty"]);
			header ("Location: ../viewdoctorprofile.php?tab=docprof&did=" . $_POST["did"] . "&ntf=success");
			exit();
		}
	}
	if($_POST["upDuty"]=="On-Call"){
		if(empty($_POST["did"]) || empty($_POST["upDuty"])){
			header ("Location: ../viewdoctorprofile.php?tab=docprof&did=" . $_POST["did"] . "&ntf=missing");
			exit();
		}else{
			updateDuty($_POST["did"], $_POST["upDuty"]);
			header ("Location: ../viewdoctorprofile.php?tab=docprof&did=" . $_POST["did"] . "&ntf=success");
			exit();
		}
	}
	if($_POST["upDuty"]=="On-Leave" && isset($_POST["dutyLeave"])){
		if(empty($_POST["did"]) || empty($_POST["upDuty"])){
			header ("Location: ../viewdoctorprofile.php?tab=docprof&did=" . $_POST["did"] . "&ntf=missing");
			exit();
		}
		if(empty($_POST["dutyLeave"])){
			header ("Location: ../viewdoctorprofile.php?tab=docprof&did=" . $_POST["did"] . "&ntf=missdate");
			exit();
		}else{
			docDutyLeave($_POST["did"], $_POST["upDuty"], $_POST["dutyLeave"]);
			header ("Location: ../viewdoctorprofile.php?tab=docprof&did=" . $_POST["did"] . "&ntf=success");
			exit();
		}
	}
}else{
	header("Location: ../pagenotfound.php");
	exit();
}
?>