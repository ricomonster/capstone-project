<?php
include 'init.php';

if (!logged_in()){
	header('Location: index.php');
	exit();
}

if(empty($_GET["rid"]) || empty($_GET["pid"]) || !isset($_GET["rid"]) || !isset($_GET["pid"])){
	header("Location: pagenotfound.php");
	exit();
}

$pid = $_GET["pid"];
$rid = $_GET["rid"];

$ptInfo = getPtInfo($pid);
foreach ($ptInfo as $pt){
	$opdnum = $pt["opdnum"];
	$ptfirstname = $pt["firstname"];
	$ptmiddlename = $pt["middlename"];
	$ptlastname = $pt["lastname"];
}
$getRc = getDocAttend($rid, $pid);
foreach ($getRc as $rc){
	$did = $rc["did"];
}
?>
<!DOCTYPE HTML>
<head>
	<title>Admitting Patient #<?php echo $opdnum;?>:: Bacnotan District Hospital - Patient Information System</title>
	<?php include 'templates/meta.php';?>
    <link rel="icon" href="favicon.ico" type="image/ico"/>
    <link href="css/styleMain.css" rel="stylesheet" type="text/css">
    <link href="css/styleAdmission.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" src="ajax/ajaxAdmitPatient.js"></script>
</head>
<body>
	<div id="pageContent">
    	<div id="header"><?php include 'templates/header.php'?></div>
        
        <div id="mainContent" class="clearfix" style="margin-top:30px;">
        
        <div id="message" style="display: none;"></div>
		<div id="waiting" style="display: none;"><div class="success">Verifying...</div></div>
        	
			<div class="admissionHolder">
				<span class="pageTitle">You're about to admit the Patient</span>
				<form>
					<div id="admHolder">
						<div id="formHolder">
							<div class="rowHold">
								<div class="cellTitle">OPD:</div>
								<div class="cellContent">#<?php echo $opdnum;?></div>
							</div>
							<div class="rowHold">
								<div class="cellTitle">Name:</div>
								<div class="cellContent"><?php echo $ptlastname;?>, <?php echo $ptfirstname;?> <?php echo $ptmiddlename;?></div>
							</div>
							<div class="rowHold">
								<div class="cellTitle">Admitting Doctor:</div>
								<div class="cellContent">
									<select name="docid" id="docid" class="drSelect">
										<option value="">Select</option>
								<?php
								$getAv = getAllAvDoctors();
								foreach ($getAv as $av){
								?>
										<option value="<?php echo $av["did"];?>" <?php if($av["did"] == $did){echo 'selected="selected"';}?>>Dr. <?php echo $av["firstname"];?> <?php echo $av["lastname"];?>, <?php echo $av["title"];?> - <?php echo $av["specialization"];?></option>
								<?php } ?>
									</select>
								</div>
							</div>
							<div class="rowHold">
								<div class="cellTitle">Select Service:</div>
								<div class="cellContent">
									<select name="service" id="service" class="bdSelect" style="width: 110px;">
										<option value="">Select:</option>
										<option value="Medical">Medical</option>
										<option value="Pediatric">Pediatrics</option>
										<option value="Orthopedic">Orthopedic</option>
										<option value="Surgical">Surgical</option>
									</select>
								</div>
							</div>
							<div class="rowHold">
								<div class="cellTitle">Select Room Type:</div>
								<div class="cellContent">
									<select name="roomtype" id="roomtype" class="bdSelect" style="width: 170px;">
										<option value="">Select:</option>
										<option value="Ward">Ward</option>
										<option value="Private Room">Private Room</option>
										<option value="Private Room w/ Air-Con">Private Room w/ Air-Con</option>
									</select>
								</div>
							</div>
							<div class="rowHold">
								<div class="cellTitle">Select Bed:</div>
								<div class="cellContent">
									<div id="wardroom">
										<select name="bednum_wd" id="bednum_wd" class="bdSelect">
											<option value="">Select:</option>
										<?php
										$bdList = getAvBed("Ward");
										foreach ($bdList as $bd){
										?>
											<option value="<?php echo $bd["bid"];?>"><?php echo $bd["bednumber"];?></option>
										<?php } ?>
										</select>
									</div>
									<div id="prroom">
										<select name="bednum_pr" id="bednum_pr" class="bdSelect">
											<option value="">Select:</option>
										<?php
										$bdList = getAvBed("Private Room");
										foreach ($bdList as $bd){
										?>
											<option value="<?php echo $bd["bid"];?>"><?php echo $bd["bednumber"];?></option>
										<?php } ?>
										</select>
									</div>
									<div id="praroom">
										<select name="bednum_pra" id="bednum_pra" class="bdSelect">
											<option value="">Select:</option>
										<?php
										$bdList = getAvBed("Private Room w/ Air-Con");
										foreach ($bdList as $bd){
										?>
											<option value="<?php echo $bd["bid"];?>"><?php echo $bd["bednumber"];?></option>
										<?php } ?>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="subRow" style="width: 390px;">
						<div id="subField">
							<input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
							<input type="hidden" name="rid" id="rid" value="<?php echo $rid;?>"/>
							<input type="submit" name="subAdmit" id="subAdmit" class="disgbutton" disabled="disabled" value="Admit Patient" title="Admit Patient"/>
							<input type="button" name="cancelAdmit" value="Cancel" class="redbutton" onClick="window.location.href='admission.php?ref=foradmission'" title="Cancel"/>
						</div>
					</div>
				</form>
			</div>
		</div>
        <div id="footer"><?php include 'templates/footer.php'?></div>
    </div>
<script type="text/javascript">
$(document).ready(function(){
	$("#wardroom").hide(0);
	$("#prroom").hide(0);
	$("#praroom").hide(0);
	
	$("#roomtype").click(function(){
		var get = $("#roomtype").val();
	
		if (get == "Ward"){
			$("#prroom").fadeOut(500);
			$("#praroom").fadeOut(500);
			$("#wardroom").delay(500).fadeIn(500);
		}
		else if (get == "Private Room"){
			$("#wardroom").fadeOut(500);
			$("#praroom").fadeOut(500);
			$("#prroom").delay(500).fadeIn(500);
		}
		else if (get == "Private Room w/ Air-Con"){
			$("#wardroom").fadeOut(500);
			$("#prroom").fadeOut(500);
			$("#praroom").delay(500).fadeIn(500);
		}
	});

	 $("#service, #roomtype").click(function (data) {              
		if ($("#service").val() != "" && $("#roomtype").val() !=""
		){  
			$("#subAdmit").removeAttr("disabled").removeClass().addClass("greenbutton"); 
		} else {  
			$("#subAdmit").attr("disabled", "disabled").removeClass().addClass("disgbutton"); 
		}  
	});
});
</script>	
</body>
</html> 