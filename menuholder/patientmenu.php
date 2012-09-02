<div id="menu">
<span class="titleMenu">Patients</span>
<?php
	if (!empty($_GET['sk'])){
		$selected = $_GET["sk"];
		if ($selected == "patientlist"){
?>
<a href="?sk=patientlist" class="selected" title="View Patients">View Patients</a><a href="?sk=search" class="menu" title="Search">Search</a>
<?php
		}
		if ($selected == "search"){
?>
<a href="?sk=patientlist" class="menu" title="View Patients">View Patients</a><a href="?sk=search" class="selected" title="Search">Search</a>
<?php
		}
	}else{
?>
<a href="?sk=patientlist" class="selected" title="View Patients">View Patients</a><a href="?sk=search" class="menu" title="Search">Search</a>
<?php
	}
?>
</div>