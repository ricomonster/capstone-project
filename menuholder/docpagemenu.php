<div id="menu">
<span class="titleMenu">Dr. <?php echo $firstname;?> <?php echo $lastname;?>, <?php echo $title;?></span>
<?php
	if (!empty($_GET['tab'])){
		$selected = $_GET["tab"];
		if ($selected == "docprof"){
?>
<a href="?tab=docprof&did=<?php echo $did;?>" class="selected" title="View Doctor's Profile">View Doctor's Profile</a><a href="?tab=viewdocpt&did=<?php echo $did;?>" class="menu" title="View Patients">View Patients</a><a href="?tab=prevdocpt&did=<?php echo $did;?>" class="menu" title="View Patients">View Previous Patients</a>
<a href="doctors.php" class="menu" title="Back">Back</a>
<?php
		}
		if ($selected == "viewdocpt"){
?>
<a href="?tab=docprof&did=<?php echo $did;?>" class="menu" title="View Doctor's Profile">View Doctor's Profile</a><a href="?tab=viewdocpt&did=<?php echo $did;?>" class="selected" title="View Patients">View Patients</a><a href="?tab=prevdocpt&did=<?php echo $did;?>" class="menu" title="View Patients">View Previous Patients</a>
<a href="doctors.php" class="menu" title="Back">Back</a>
<?php
		}
		if ($selected == "prevdocpt"){
?>
<a href="?tab=docprof&did=<?php echo $did;?>" class="menu" title="View Doctor's Profile">View Doctor's Profile</a><a href="?tab=viewdocpt&did=<?php echo $did;?>" class="menu" title="View Patients">View Patients</a><a href="?tab=prevdocpt&did=<?php echo $did;?>" class="selected" title="View Patients">View Previous Patients</a>
<a href="doctors.php" class="menu" title="Back">Back</a>
<?php
		}
	}else{
?>
<a href="?tab=docprof&did=<?php echo $did;?>" class="selected" title="View Doctor's Profile">View Doctor's Profile</a><a href="?tab=viewdocpt&did=<?php echo $did;?>" class="menu" title="View Patients">View Patients</a><a href="?tab=prevdocpt&did=<?php echo $did;?>" class="menu" title="View Patients">View Previous Patients</a>
<a href="doctors.php" class="menu" title="Back">Back</a>
<?php
	}
?>
</div>