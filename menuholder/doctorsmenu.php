<div id="menu">
<span class="titleMenu">Doctors Page</span>
<?php
	if (!empty($_GET['ref'])){
		$selected = $_GET["ref"];
		if ($selected == "listavdoctors"){
?>
<a href="?ref=listavdoctors" class="selected" title="List of Available Doctors">List of Available Doctors</a><a href="?ref=listdoctors" class="menu" title="List of all Doctors">List of all Doctors</a><?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?><a href="?ref=adddoctor" class="menu" title="Add a Doctor">Add a Doctor</a><?php } ?>
<?php
		}
		if ($selected == "listdoctors"){
?>
<a href="?ref=listavdoctors" class="menu" title="List of Available Doctors">List of Available Doctors</a><a href="?ref=listdoctors" class="selected" title="List of all Doctors">List of all Doctors</a><?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?><a href="?ref=adddoctor" class="menu" title="Add a Doctor">Add a Doctor</a><?php } ?>
<?php
		}
		if ($selected == "adddoctor"){
?>
<a href="?ref=listavdoctors" class="menu" title="List of Available Doctors">List of Available Doctors</a><a href="?ref=listdoctors" class="menu" title="List of all Doctors">List of all Doctors</a><a href="?ref=adddoctor" class="selected" title="Add a Doctor">Add a Doctor</a>
<?php
		}
	}else{
?>
<a href="?ref=listavdoctors" class="selected" title="List of Available Doctors">List of  Available Doctors</a><a href="?ref=listdoctors" class="menu" title="List of all Doctors">List of all Doctors</a><?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?><a href="?ref=adddoctor" class="menu" title="Add a Doctor">Add a Doctor</a><?php } ?>
<?php
	}
?>
</div>