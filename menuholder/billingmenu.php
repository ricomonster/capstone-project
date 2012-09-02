<div id="menu">
<span class="titleMenu">Billing</span>
<?php
	if (!empty($_GET['ref'])){
		$selected = $_GET["ref"];
		if ($selected == "fordischargept"){
?>
<a href="?ref=fordischargept" class="selected" title="View For Discharge Patients">View For Discharge Patients</a><a href="?ref=dischargedpt" class="menu" title="View Discharged Patients">View Discharged Patients</a>
<?php
		}
		if ($selected == "dischargedpt"){
?>
<a href="?ref=fordischargept" class="menu" title="View For Discharge Patients">View For Discharge Patients</a><a href="?ref=dischargedpt" class="selected" title="View Discharged Patients">View Discharged Patients</a>
<?php
		}
	}else{
?>
<a href="?ref=fordischargept" class="selected" title="View For Discharge Patients">View For Discharge Patients</a><a href="?ref=dischargedpt" class="menu" title="View Discharged Patients">View Discharged Patients</a>
<?php
	}
?>
</div>