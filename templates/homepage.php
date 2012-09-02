<?php
if (!logged_in()){
	header('Location: index.php');
	exit();
}
?>
<!DOCTYPE HTML>
<head>
	<title>Welcome to Bacnotan District Hospital Information System</title>
	<?php include 'templates/meta.php';?>
    <link rel="icon" href="favicon.ico" type="image/ico"/>
    <link href="css/styleMain.css" rel="stylesheet" type="text/css">
	<link href="css/styleHome.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="jquery/jquery.min.js"></script>
</head>
<body>
	<div id="pageContent">
    	<div id="header"><?php include 'templates/header.php'?></div>
        
        <div id="menuholder">
			<div id="menu">
				<span class="titleMenu">Bacnotan District Hospital Information System</span>
			</div>
		</div>
        
        <div id="mainContent">
			<div id="homeContent">
			<span class="welcome"><h3>Welcome to the Bacnotan District Hospital Information System.</h3><p>
			It is designed to enhance and fasten the process of patient recording in the hospital.</p></span>
				<div id="menuCategory">
					<div id="menuCat">
						<a style="cursor: pointer;" id="1" class="trigger">
							<div id="menu_1" class="menuTitle">Out Patient Department</div>
						</a>
						<div id="catContent" class="ct1">
							<a href="opd-er.php?sk=patients" class="menu" title="View Patients">View Patients</a>
							<?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?>
							<a href="opd-er?sk=addpatient" class="menu" title="Add Patient">Add Patient</a>
							<?php } ?>
							<a href="opd-er.php?sk=search" class="menu" title="Search">Search</a>
						</div>
					</div>
					
					<div id="menuCat">
						<a style="cursor: pointer;" id="2" class="trigger">
							<div id="menu_2" class="menuTitle">Admission Department</div>
						</a>
						<div id="catContent" class="ct2">
							<a href="admission.php?ref=admittedpt" class="menu" title="View Admitted Patients">View Admitted Patients</a>
							<a href="admission.php?ref=foradmission" class="menu" title="Add Patient">View For Admission Patients</a>
						</div>
					</div>
					
					<div id="menuCat">
						<a style="cursor: pointer;" id="3" class="trigger">
							<div id="menu_3" class="menuTitle">Billing Department</div>
						</a>
						<div id="catContent" class="ct3">
							<a href="billing.php?ref=fordischargept" class="menu" title="View For Discharge Patients">View For Discharge Patients</a>
							<a href="billing.php?ref=dischargedpt" class="menu" title="View Discharged Patients">View Discharged Patients</a>
						</div>
					</div>
					<?php if(checkPriviledgePatientCare($_SESSION["uid"])===false){?>
					<div id="menuCat">
						<a style="cursor: pointer;" id="4" class="trigger">
							<div id="menu_4" class="menuTitle">Doctors Page</div>
						</a>
						<div id="catContent" class="ct4">
							<a href="doctors.php?ref=listavdoctors" class="menu" title="List of Available Doctors">List of Available Doctors</a>
							<a href="doctors.php?ref=listdoctors" class="menu" title="List of All Doctors">List of All Doctors</a>
							<?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?>
							<a href="doctors.php?ref=adddoctor" class="menu" title="Add a Doctor">Add a Doctor</a>
							<?php } ?>
						</div>
					</div>
					
					<div class="menuCat">
						<a style="cursor: pointer;" id="5" class="trigger">
							<div id="menu_5" class="menuTitle">Patients</div>
						</a>
						<div id="catContent" class="ct5">
							<a href="patients.php?sk=patientlist" class="menu" title="View Patients">View Patients</a>
							<a href="patients.php?sk=search" class="menu" title="Search">Search</a>
						</div>
					</div>
					
					<div class="menuCat" style="margin-top:10px;">
						<a style="cursor: pointer;" id="6" class="trigger">
							<div id="menu_6" class="menuTitle">Account Management</div>
						</a>
						<div id="catContent" class="ct6">
							<a href="accountmgmt.php?acct=myaccount" class="menu" title="My Account">My Account</a>
							<a href="accountmgmt.php?acct=settings" class="menu" title="Account Settings">Account Settings</a>
							<?php if (checkPriviledge($_SESSION["uid"]) === true){?>
							<a href="accountmgmt.php?acct=registeracct" class="menu" title="Register Account">Register Account</a>
							<a href="accountmgmt.php?acct=manageacct" class="menu" title="Manage Accounts">Manage Accounts</a>
							<?php } ?>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
        </div>
        
        <div id="footer"><?php include 'templates/footer.php'?></div>
    </div>
<script>
$(document).ready(function(){
$(".trigger").click(function() {
		var ID = $(this).attr("id")
		$(".ct"+ID).slideToggle(500);
	});
});
</script>
</body>
</html>