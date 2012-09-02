<div id="menu">
<span class="titleMenu">Out Patient Department - Emergency Room</span>
<?php
	if (!empty($_GET['sk'])){
		$selected = $_GET["sk"];
		if ($selected == "patients"){
?>
<a href="?sk=patients" class="selected" title="View Patients">View Patients</a><?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?><a href="?sk=addpatient" class="menu" title="Add Patient">Add Patient</a><?php } ?><a href="?sk=search" class="menu" title="Search">Search</a>
<?php
		}
		if ($selected == "addpatient"){
?>
<a href="?sk=patients" class="menu" title="View Patients">View Patients</a><?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?><a href="?sk=addpatient" class="selected" title="Add Patient">Add Patient</a><?php } ?><a href="?sk=search" class="menu" title="Search">Search</a>
<?php
		}
		if ($selected == "search"){
?>
<a href="?sk=patients" class="menu" title="View Patients">View Patients</a><?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?><a href="?sk=addpatient" class="menu" title="Add Patient">Add Patient</a><?php } ?><a href="?sk=search" class="selected" title="Search">Search</a>
<?php
		}
	}else{
?>
<a href="?sk=patients" class="selected" title="View Patients">View Patients</a><?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?><a href="?sk=addpatient" class="menu" title="Add Patient">Add Patient</a><?php } ?><a href="?sk=search" class="menu" title="Search">Search</a>
<?php
	}
?>
</div>