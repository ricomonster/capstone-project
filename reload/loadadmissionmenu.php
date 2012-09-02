<?php include '../init.php'; ?>
<span class="titleMenu">Admission</span>
<?php
	if (!empty($_GET['ref'])){
		$selected = $_GET["ref"];
		if ($selected == "admittedpt"){
?>
<a href="?ref=admittedpt" class="selected" title="View Admitted Patients">View Admitted Patients</a><a href="?ref=foradmission" class="menu" title="View For Admission Patients" id="update">View For Admission Patients<?php echo countForAdmission();?></a>
<?php
		}
		if ($selected == "foradmission"){
?>
<a href="?ref=admittedpt" class="menu" title="View Admitted Patients">View Admitted Patients</a><a href="?ref=foradmission" class="selected" title="View For Admission Patients" id="update">View For Admission Patients<?php echo countForAdmission();?></a>
<?php
		}
	}else{
?>
<a href="?ref=admittedpt" class="selected" title="View Admitted Patients">View Admitted Patients</a><a href="?ref=foradmission" class="menu" title="View For Admission Patients" id="update">View For Admission Patients<?php echo countForAdmission();?></a>
<?php
	}
?>