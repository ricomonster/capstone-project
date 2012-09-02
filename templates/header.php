<span class="leftMenu">
	<a href="index.php" id="headerTitle"><b>+Hospital Information System</b></a>
<?php if (logged_in()){ ?>
    <a href="opd-er.php">OPD - ER</a>
    <a href="admission.php">Admission</a>
	<?php if(checkPriviledgePatientCare($_SESSION["uid"])===false){?>
    <a href="billing.php">Billing</a>
    <a href="doctors.php">Doctors</a>
	<?php } ?>
	<a href="patients.php">Patients</a>
<?php }?>
</span>
<?php
if (logged_in()){ 
	$fl = getUserInfo($_SESSION["uid"]);
	foreach ($fl as $r){
		$ufirstname = $r["firstname"];
		$ulastname = $r["lastname"];
	}
?>
<span class="rightMenu">
	Welcome <?php echo $ufirstname;?> <?php echo $ulastname;?>!
	<a href="accountmgmt.php">Account Management</a>
	<a href="logout.php">Log Out</a>
</span>
<?php }?>