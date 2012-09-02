<div id="menu">
<span class="titleMenu">Patient ID: <?php echo $opdnum;?></span>
<?php
	if (!empty($_GET['ref'])){
		$selected = $_GET["ref"];
		if ($selected == "ptinfo"){
?>
<a href="?ref=ptinfo&pid=<?php echo $pid;?>" class="selected" title="Patient Information">Patient Information</a><a href="?ref=ptrecords&pid=<?php echo $pid;?>" class="menu" title="View Patient Records">View Patient Records</a><?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?><a href="?ref=addptrecord&pid=<?php echo $pid;?>" class="menu" title="Add Patient Record">Add Patient Record</a><?php } ?>

<a href="patients.php" class="menu">Back</a>
<?php
		}
		if ($selected == "ptrecords"){
?>
<a href="?ref=ptinfo&pid=<?php echo $pid;?>" class="menu" title="Patient Information">Patient Information</a><a href="?ref=ptrecords&pid=<?php echo $pid;?>" class="selected" title="View Patient Records">View Patient Records</a><?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?><a href="?ref=addptrecord&pid=<?php echo $pid;?>" class="menu" title="Add Patient Record">Add Patient Record</a><?php } ?>

<a href="patients.php" class="menu">Back</a>
<?php
		}
		if ($selected == "addptrecord"){
?>
<a href="?ref=ptinfo&pid=<?php echo $pid;?>" class="menu" title="Patient Information">Patient Information</a><a href="?ref=ptrecords&pid=<?php echo $pid;?>" class="menu" title="View Patient Records">View Patient Records</a><a href="?ref=addrecord&pid=<?php echo $pid;?>" class="selected" title="Add Patient Record">Add Patient Record</a>

<a href="patients.php" class="menu">Back</a>
<?php
		}
	}else{
?>
<a href="?ref=ptinfo&pid=<?php echo $pid;?>" class="selected" title="Patient Information">Patient Information</a><a href="?ref=ptrecords&pid=<?php echo $pid;?>" class="menu" title="View Patient Records">View Patient Records</a><?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?><a href="?ref=addptrecord&pid=<?php echo $pid;?>" class="menu" title="Add Patient Record">Add Patient Record</a><?php } ?>

<a href="patients.php" class="menu">Back</a>
<?php
	}
?>
</div>