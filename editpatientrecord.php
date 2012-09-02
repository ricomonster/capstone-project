<?php
include 'init.php';
if (!logged_in()){
	header('Location: index.php');
	exit();
}

if(!isset($_GET['pid']) || !isset($_GET['rid']) || !isset($_GET['scid']) || empty($_GET['pid']) || empty($_GET['rid']) || empty($_GET["scid"]) || checkRecord($_GET['pid'], $_GET['rid']) === false || $_SESSION["scid"] != $_GET["scid"]){
	header ('Location: pagenotfound.php');
	exit();
}

$pid = $_GET["pid"];
$rid = $_GET["rid"];

$ptInfo = getPtInfo($pid);
$ptRec = getPtRecord($pid, $rid);

if(empty($ptRec)){
	header("Location: pagenotfound.php");
	exit();
}else{
	foreach ($ptInfo as $i){
		$opdnum = $i["opdnum"];
	}
	
	foreach ($ptRec as $rc){
		$rid = $rc["rid"];
		$dateofvisit = $rc["dateofvisit"];
		$age = $rc["age"];
		$timein = $rc["timein"];
		$timeout = $rc["timeout"];
		$bp = $rc["bp"];
		$cr = $rc["cr"];
		$rr = $rc["rr"];
		$temp = $rc["temp"];
		$weight = $rc["weight"];
		$complaint = $rc["complaint"];
		$remarks = $rc["remarks"];
		$foradmission = $rc["foradmission"];
	}
}

$it = explode(' ', $timein);
$intime = $it[0];
$inampm = $it[1];

$ot = explode(' ', $timeout);
$outtime = $ot[0];
$outampm = $ot[1];

$pr = explode('/', $bp);
$sys = $pr[0];
$dia = $pr[1];
?>
<!DOCTYPE HTML>
<head>
	<title>Edit Patient Record OPD# <?php echo $opdnum;?> :: Bacnotan District Hospital - Patient Information System</title>
    <link rel="icon" href="favicon.ico" type="image/ico"/>
    <link href="css/styleMain.css" rel="stylesheet" type="text/css">
    <link href="css/styleEditRec.css" rel="stylesheet" type="text/css">
    <link type="text/css" href="jquery/css/custom/jquery.custom.css" rel="Stylesheet" />
	<?php include 'templates/meta.php';?>
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" src="jquery/js/jquery.custom.min.js"></script>
    <script type="text/javascript" src="jquery/jquery.autoresize.js"></script>
    <script type="text/javascript" src="jquery/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="ajax/ajaxEditRec.js"></script>
</head>
<body>
	<div id="pageContent">
    	<div id="header"><?php include 'templates/header.php'?></div>
        
        <div id="mainContent" class="clearfix" style="margin-top:30px;">
        
        <div id="message" style="display: none;"></div>
		<div id="waiting" style="display: none;"><div class="success">Verifying...</div></div>
        	
			<div id="editHolder">
				<span class="pageTitle">Edit Patient Record OPD# <?php echo $opdnum;?></span>
    				<div id="editformHolder">
    					<form id="editRecForm">
                        	<table class="editTable">
								<tr>
                                	<td colspan="1" class="editHead"><label for="dateofvisit">Date:</label></td>
    				            	<td colspan="5">
                    					<div class="patient-field">
											<input type="text" name="dateofvisit" id="dateofvisit" class="ptField" title="Patient's Date of Visit" value="<?php echo $dateofvisit;?>"/>
										</div>
				                    </td>
                				</tr>
			            	    <tr>
                                	<td class="editHead" width="14%"><label for="age">Age:</label></td>
                            		<td width="19%">
										<div class="patient-field">
											<input type="text" name="age" id="age" class="ptField" title="Patient's Age" style="width:50px;" maxlength="2" onKeyPress="return checkIt(event)" value="<?php echo $age;?>"/> y/o
										</div>
									</td>
                                    <td class="editHead" width="14%"><label for="timein">Time In:</label></td>
                                	<td width="19%">
										<div class="patient-field">
											<input type="text" name="timein" id="timein" class="ptField" title="Patient's Time In" style="width:60px;" value="<?php echo $intime;?>"/>
												<select name="inampm" id="inampm" style="height: 20px;">
	                								<option value="">Select:</option>
			           			        			<option value="AM"<?php if($inampm == "AM"){echo 'selected="selected"';} ?>>AM</option>
								                    <option value="PM"<?php if($inampm == "PM"){echo 'selected="selected"';} ?>>PM</option>
            								    </select>
										</div>
									</td>
                                    <td class="editHead" width="14%"><label for="timeout">Time Out:</label></td>
									<td width="19%">
										<div class="patient-field">
											<input type="text" name="timeout" id="timeout" class="ptField" title="Patient's Time Out" style="width:60px;" value="<?php echo $outtime;?>"/>
				                				<select name="outampm" id="outampm" style="height: 20px;">
		   				            				<option value="">Select:</option>
				        				            <option value="AM"<?php if($outampm == "AM"){echo 'selected="selected"';} ?>>AM</option>
													<option value="PM"<?php if($outampm == "PM"){echo 'selected="selected"';} ?>>PM</option>
											</select>
										</div>	
									</td>
								</tr>	
                				<tr>
                                	<td class="editHead"><label for="bp">BP:</label></td>
									<td>
                                		<div class="patient-field">
											<input type="text" name="sys" id="sys" class="ptField" title="Patient's Systolic Pressure" style="width:30px;" maxlength="3" onKeyPress="return checkIt(event)" value="<?php echo $sys;?>"/> / <input type="text" name="dia" id="dia" class="ptField" title="Patient's Diastolic Pressure" style="width:30px;" maxlength="3" onKeyPress="return checkIt(event)" value="<?php echo $dia;?>"/>
										</div>
									</td>
                                    <td class="editHead"><label for="cr">CR:</label></td>
									<td>
                                		<div class="patient-field">
														<input type="text" name="cr" id="cr" class="ptField" title="Patient's Circulation Rate" style="width:50px;" maxlength="3" onKeyPress="return checkIt(event)" value="<?php echo $cr;?>"/> PPM
										</div>
									</td>
                                    <td class="editHead"><label for="rr">RR:</label></td>
									<td>
										<div class="patient-field">
											<input type="text" name="rr" id="rr" class="ptField" title="Patient's Respiratory Rate" style="width:50px;" maxlength="3" onKeyPress="return checkIt(event)" value="<?php echo $rr;?>"/> BPM
										</div>
				                    </td>
                				</tr>
				                <tr>
                                	<td class="editHead"><label for="temp">Temp:</label></td>
                					<td colspan="2">
				                    	<div class="patient-field">
											<input type="text" name="temp" id="temp" class="ptField" title="Patient's Temperature" style="width:50px;" maxlength="3" onKeyPress="return checkIt(event)" value="<?php echo $temp;?>"/>&deg;C
										</div>
				                    </td>
                                    <td class="editHead"><label for="weight">Weight:</label></td>
                				    <td colspan="2">
				                    	<div class="patient-field">
											<input type="text" name="weight" id="weight" class="ptField" title="Patient's Weight Rate" style="width:50px;" maxlength="3" onKeyPress="return checkIt(event)" value="<?php echo $weight;?>"/> kg
										</div>
				                    </td>
                				</tr>
				                <tr>
                                	<td class="editHead"><label for="complaint">Chief Complaint:</label></td>
                					<td colspan="5">
				                    	<div class="patient-field" style="width: 635px;">
											<textarea name="complaint" id="complaint" class="ptFieldTxt" style="width: 490px;"><?php echo nl2br($complaint);?></textarea>
										</div>
				                    </td>
								</tr>
				                <tr>
                                	<td class="editHead"><label for="remarks">Remarks:</label></td>
                				    <td colspan="5">
				                    	<div class="patient-field" style="width: 635px;">
											<textarea name="remarks" id="remarks" class="ptFieldTxt" style="width: 520px;"><?php echo nl2br($remarks);?></textarea>
										</div>
				                    </td>
                				</tr>
				                <tr>
                                	<td colspan="1" class="editHead"><label for="foradmission">For Admission:</label></td>
                					<td colspan="5">
				                    	<div class="patient-field">
											<select name="foradmission" id="foradmission">
							                	<option value="">Select:</option>
            							        <option value="Yes"<?php if($foradmission=="Yes"){echo 'selected="selected"';}?>>Yes</option>
							                    <option value="No"<?php if($foradmission=="No"){echo ' selected="selected"';}?>>No</option>
            							    </select>
										</div>	
                				    </td>
				                </tr>
                				<tr>
                                	<td colspan="6">
	        			        		<div class="patient-field" style="width:635px;">
                                        	<input type="hidden" name="rid" id="rid" value="<?php echo $rid;?>"/>
                                            <input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
											<input type="submit" id="submitEditRec" name="submitEditRec" class="greenbutton" value="Update Patient's Record"/>
                                            <input type="button" value="Back" onClick="window.location.href='viewpatientinfo.php?ref=ptrecords&pid=<?php echo $pid;?>'" class="redbutton"/>
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
	$("#timein").mask("99:99",{placeholder:"_"});
	$("#timeout").mask("99:99",{placeholder:"_"});
	
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
	
	$("textarea").focus(function(){
		$(this).parent().addClass("curFocus").children("div").toggle();
	});
	$("textarea").blur(function() {
		$(this).parent().removeClass("curFocus").children("div").toggle();
	});
});
</script>    
<script type="text/javascript">
$('textarea#complaint').autoResize({
    onResize : function() {
        $(this).css({opacity:0.8});
    },
    animateCallback : function() {
        $(this).css({opacity:1});
    },
    animateDuration : 300,
    extraSpace : 40
});

$('textarea#remarks').autoResize({
    onResize : function() {
        $(this).css({opacity:0.8});
    },
    animateCallback : function() {
        $(this).css({opacity:1});
    },
    animateDuration : 300,
    extraSpace : 40
});

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