<?php
include 'init.php';
if (!logged_in()){
	header('Location: index.php');
	exit();
}

if(!isset($_GET['pid']) || !isset($_GET["scid"]) || empty($_GET['pid']) ||empty($_GET["scid"]) || checkPID($_GET['pid']) === false || $_SESSION["scid"] != $_GET["scid"]){
	header ('Location: pagenotfound.php');
	exit();
}

$pid = $_GET["pid"];
$ptInfo = getPtInfo($pid);

if(empty($ptInfo)){
	header("Location: pagenotfound.php");
	exit();
}else{
	foreach ($ptInfo as $in){
		$pid = $in["pid"];
		$firstname = $in["firstname"];
		$middlename = $in["middlename"];
		$lastname = $in["lastname"];
		$membership = $in["membership"];
		$sex = $in["sex"];
		$cs = $in["cs"];
		$dob = $in["dateofbirth"];
		$dateofbirth = date('F d, Y', strtotime($in["dateofbirth"]));
		$opdnum = $in["opdnum"];
		$address = $in["address"];
		$placeofbirth = $in["placeofbirth"];
		$occupation = $in["occupation"];
		$contactno = $in["contactno"];
		$religion = $in["religion"];
		$nationality = $in["nationality"];
	}
}

$dates = explode('-', $dob);
$year = $dates[0];
$month = $dates[1];
$day = $dates[2];
?>
<!DOCTYPE HTML>
<head>
	<title>Edit Patient Information <?php echo $opdnum;?> :: Bacnotan District Hospital - Patient Information System</title>
	<?php include 'templates/meta.php';?>
    <link rel="icon" href="favicon.ico" type="image/ico"/>
    <link href="css/styleMain.css" rel="stylesheet" type="text/css">
    <link href="css/styleEditInfo.css" rel="stylesheet" type="text/css">
    <link type="text/css" href="jquery/css/custom/jquery.custom.css" rel="Stylesheet" />
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" src="jquery/js/jquery.custom.min.js"></script>
    <script type="text/javascript" src="ajax/ajaxEditPt.js"></script>
</head>
<body>
	<div id="pageContent">
    	<div id="header"><?php include 'templates/header.php'?></div>
        
        <div id="mainContent" class="clearfix" style="margin-top:30px;">
        
        <div id="message" style="display: none;"></div>
		<div id="waiting" style="display: none;"><div class="success">Verifying...</div></div>
        	
			<div id="editHolder">
				<span class="pageTitle">Edit Patient Information <?php echo $opdnum;?></span>
    				<div id="editformHolder">
    					<form id="editPtForm">
							<table class="tblEditInfo" width="100%" border="1">
								<tr>
									<td colspan="1" class="editHeader"><label>OPD #:</label></td>
									<td colspan="3" class="editField">
										<div class="patient-field" align="left" style="margin-left: 18px;">
											<input type="text" name="opdnum" id="opdnum" class="ptField" title="Patient's OPD Number" maxlength="9" value="<?php echo $opdnum;?>" disabled="disabled"/>
										</div>
									</td>
								</tr>
								<tr>
									<td class="editHeader"><label>First Name:</label></td>
									<td class="editField">
										<div class="patient-field">
											<input type="text" name="firstname" id="firstname" class="ptField" title="Patient's First Name" maxlength="50" value="<?php echo $firstname;?>"/>
										</div>
									</td>
									<td class="editHeader"><label>Middle Name:</label></td>
									<td class="editField">
										<div class="patient-field">
											<input type="text" name="middlename" id="middlename" class="ptField" title="Patient's Last Name" maxlength="50" value="<?php echo $middlename;?>"/>
										</div>
									</td>
								</tr>
								<tr>
									<td class="editHeader"><label>Last Name:</label></td>
									<td class="editField">
										<div class="patient-field">
											<input type="text" name="lastname" id="lastname" class="ptField" title="Patient's Last Name" maxlength="50" value="<?php echo $lastname;?>"/>
										</div>
									</td>
									<td class="editHeader"><label>Membership:</label></td>
									<td class="editField">
										<div class="patient-field">
											<select name="membership" id="membership" class="ptField">
												<option value="">Select</option>
												<option value="Member"<?php if($membership == "Member"){echo ' selected="selected"';}?>>Member</option>
												<option value="Dependent"<?php if($membership == "Dependent"){echo ' selected="selected"';}?>>Dependent</option>
												<option value="No PhilHealth"<?php if($membership == "No PhilHealth"){echo ' selected="selected"';}?>>No PhilHealth</option>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td class="editHeader"><label>Sex:</label></td>
									<td class="editField">
										<div class="patient-field">
											<select name="sex" id="sex" class="ptField">
												<option value="">Select</option>
												<option value="Female"<?php if($sex=="Female"){echo ' selected="selected"';}?>>Female</option>
												<option value="Male"<?php if($sex=="Male"){echo ' selected="selected"';}?>>Male</option>
											</select>
										</div>
									</td>
									<td class="editHeader"><label>Civil Status:</label></td>
									<td class="editField">
										<div class="patient-field">
											<select name="cs" id="cs" class="ptField" title="Input Patient's Civil Status">
												<option value="">Select:</option>
												<option value="Single"<?php if($cs == "Single"){echo ' selected="selected"';}?>>Single</option>
												<option value="Married"<?php if($cs == "Married"){echo ' selected="selected"';}?>>Married</option>
												<option value="Seperated"<?php if($cs == "Seperated"){echo ' selected="selected"';}?>>Seperated</option>
												<option value="Widowed"<?php if($cs == "Widowed"){echo ' selected="selected"';}?>>Widowed</option>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td class="editHeader" colspan="1"><label>Date of Birth:</label></td>
									<td class="editField" colspan="3" align="left">
										<div class="patient-field" align="left" style="margin-left: 18px;">
											<select name="bdMonth" id="bdMonth" class="ptBmonth">
												<option value="1"<?php if ($month = "1"){?> selected="selected"<?php } ?>>Jan</option>
												<option value="2"<?php if ($month = "2"){?> selected="selected"<?php } ?>>Feb</option>
												<option value="3"<?php if ($month = "3"){?> selected="selected"<?php } ?>>Mar</option>
												<option value="4"<?php if ($month = "4"){?> selected="selected"<?php } ?>>Apr</option>
												<option value="5"<?php if ($month = "5"){?> selected="selected"<?php } ?>>May</option>
												<option value="6"<?php if ($month = "6"){?> selected="selected"<?php } ?>>Jun</option>
												<option value="7"<?php if ($month = "7"){?> selected="selected"<?php } ?>>Jul</option>
												<option value="8"<?php if ($month = "8"){?> selected="selected"<?php } ?>>Aug</option>
												<option value="9"<?php if ($month = "9"){?> selected="selected"<?php } ?>>Sep</option>
												<option value="10"<?php if ($month = "10"){?> selected="selected"<?php } ?>>Oct</option>
												<option value="11"<?php if ($month = "11"){?> selected="selected"<?php } ?>>Nov</option>
												<option value="12"<?php if ($month = "12"){?> selected="selected"<?php } ?>>Dec</option>
											</select>
											<select name="bdDay" id="bdDay" class="ptBday">
												<?php
												for ($d = 1; $d <= 31; $d++) {
												?>
												<option value="<?php echo $d;?>"<?php if ($day == $d){?> selected="selected"<?php } ?>><?php echo $d;?></option>
												<?php } ?>
											</select>
											<select name="dbYear" id="bdYear" class="ptByear">
											<?php
											$yearTod = date("Y");
											for ($y = $yearTod; $y >= 1950; $y--) {
											?>
											<option value="<?php echo $y;?>"<?php if ($year == $y){?> selected="selected"<?php } ?>><?php echo $y;?></option>
											<?php } ?>
											</select>
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="1" class="editHeader"><label>Address:</label></td>
									<td colspan="3" class="editField">
										<div class="patient-field">
											<input type="text" name="address" id="address" class="ptField" title="Patient's Address" style="width: 550px;" maxlength="250" value="<?php echo $address;?>"/>
										</div>
									</td>
								</tr>
								<tr>
									<td colspan="1" class="editHeader"><label>Place of Birth</label></td>
									<td colspan="3" class="editField">
										<div class="patient-field">
											<input type="text" name="placeofbirth" id="placeofbirth" class="ptField" title="Patient's Place of Birth" style="width: 550px;" value="<?php echo $placeofbirth;?>"/>
										</div>
									</td>
								</tr>
								<tr>
									<td class="editHeader"><label>Occupation:</label></td>
									<td class="editField">
										<div class="patient-field">
											<input type="text" name="occupation" id="occupation" class="ptField" title="Patient's Occupation" value="<?php echo $occupation;?>"/>
										</div>
									</td>
									<td class="editHeader"><label>Contact No.:</label></td>
									<td class="editField">
										<div class="patient-field">
											<input type="text" name="contactno" id="contactno" class="ptField" title="Patient's Contact Number" value="<?php echo $contactno;?>"/>
										</div>
									</td>
								</tr>
								<tr>
									<td class="editHeader"><label>Religion:</label></td>
									<td class="editField">
										<div class="patient-field">
											<input type="text" name="religion" id="religion" class="ptField" title="Patient's Religion" value="<?php echo $religion;?>"/>
										</div>
									</td>
									<td class="infoHeader"><label>Nationality:</label></td>
									<td colspan="2" class="infoField">
										<div class="patient-field">
											<input type="text" name="nationality" id="nationality" class="ptField" title="Patient's Nationality" value="<?php echo $nationality;?>"/>
										</div>
									</td>
								</tr>
								</tr>
								<tr>
									<td colspan="4" class="editField">
										<div class="patient-field" style="float: left;">
											<input type="hidden" id="pid" name="pid" value="<?php echo $pid;?>"/>
											<input type="submit" id="submitEditInfo" name="submitEditInfo" value="Update Patient Information" class="greenbutton"/>
											<input type="button" value="Back" onClick="window.location.href='viewpatientinfo.php?pid=<?php echo $pid;?>'" class="redbutton"/>
										</div>
									</td>
								</tr>
							</table>
						</form>
					</div>
				</div>
			</div>                
        <div id="footer"><?php include 'templates/footer.php'?></div>
    </div>
<script language="javascript">
function checkIt(evt) {
    evt = (evt) ? evt : window.event
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        status = "This field accepts numbers only."
        return false
    }
    status = ""
    return true
}
</script>
<script type="text/javascript">
$(document).ready(function(){
	
	$("input").focus(function(){
		$(this).parent().addClass("curFocus").children("div").toggle();
	});
	$("input").blur(function() {
		$(this).parent().removeClass("curFocus").children("div").toggle();
	});
	
	$("select").focus(function(){
		$(this).parent().addClass("curFocus").children("div").toggle();
	});
	$("select").blur(function() {
		$(this).parent().removeClass("curFocus").children("div").toggle();
	});
});
</script>    
<script type="text/javascript">
$(function() {
	$( "#dateofvisit" ).datepicker({
		changeMonth: true,
		changeYear: true,
			dateFormat: 'yy-mm-dd'
	});
});
</script>
<script>
	$(window).unload( function () { '<?php unset($_SESSION['scid']);?>' } );
</script>   
</body>
</html>