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
	
	foreach ($ptRec as $r){
		$rid = $r["rid"];
		$pid = $r["pid"];
		$dateofvisit = date('F d, Y', strtotime($r["dateofvisit"]));
		$age = $r["age"];
		$timein = $r["timein"];
		$timeout = $r["timeout"];
		$bp = $r["bp"];
		$cr = $r["cr"];
		$rr = $r["rr"];
		$temp = $r["temp"];
		$weight = $r["weight"];
		$complaint = $r["complaint"];
		$remarks = $r["remarks"];
		$foradmission = $r["foradmission"];
	}
}
?>
<!DOCTYPE HTML>
<head>
	<title>Deleting Patient Record of OPD# <?php echo $opdnum;?> | Bacnotan District Hospital - Patient Information System</title>
	<?php include 'templates/meta.php';?>
    <link rel="icon" href="favicon.ico" type="image/ico"/>
    <link href="css/styleMain.css" rel="stylesheet" type="text/css">
    <link href="css/styleDelete.css" rel="stylesheet" type="text/css">
    <link type="text/css" href="jquery/css/custom/jquery.custom.css" rel="Stylesheet" />
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" src="jquery/js/jquery.custom.min.js"></script>
    <script type="text/javascript" src="ajax/ajaxDeleteRecord.js"></script>
</head>
<body>
	<div id="pageContent">
    	<div id="header"><?php include 'templates/header.php'?></div>
        
        <div id="mainContent" class="clearfix" style="margin-top:30px;">
        
        <div id="message" style="display: none;"></div>
		<div id="waiting" style="display: none;"><div class="success">Deleting...</div></div>
			<div id="deleteHolder">
				<span class="pageTitle">Deleting Patient Record of OPD# <?php echo $opdnum;?></span>
    				<div id="deleteRecHolder">
						<table class="recTable" width="100%">
                        <tr>
            				<td colspan="6" class="recField">
                            	<form id="deleteInfo">
			                		You are about to delete the record of this patient.<br/>
                                	Do you want to proceed?
                                    <input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
                                    <input type="hidden" name="rid" id="rid" value="<?php echo $rid;?>"/>
                                	<input type="submit" name="subDeleteRec" id="subDeleteRec" class="redbutton" value="Yes" title="Delete Patient's Information"/>
    	        					<input type="button" name="no" class="bluebutton" value="No" onClick="window.location.href='viewpatientinfo.php?ref=ptrecords&pid=<?php echo $pid;?>'" title="Cancel in Deleting the Patient's Info"/>
                                </form>
                			</td>
            			</tr>
                		<tr>
                	    	<td colspan="1" class="recHeader"><label for="date">Date:</label></td>
                	        <td colspan="5" class="recField"><span class="info"><?php echo $dateofvisit;?></span></td>
						</tr>
	                    <tr>	
    	                	<td class="recHeader" width="15%"><label for="age">Age:</label></td>
        	                <td class="recField" width="18%"><span class="info"><?php echo $age;?> y/o</span></td>
            	        	<td class="recHeader" width="15%"><label for="timein">Time In:</label></td>
                	        <td class="recField" width="18%"><span class="info"><?php echo $timein;?></span></td>
                    	    <td class="recHeader" width="15%"><label for="timeout">Time Out:</label></td>
	                        <td class="recField" width="18%"><span class="info"><?php echo $timeout;?></span></td>
    	                </tr>
        	            <tr>
            	        	<td class="recHeader"><label for="bp">BP:</label></td>
                	        <td class="recField"><span class="info"><?php echo $bp;?> mmHg</span></td>
                    	    <td class="recHeader"><label for="cr">CR:</label></td>
	                        <td class="recField"><span class="info"><?php echo $cr;?> ppm</span></td>
    	                    <td class="recHeader"><label for="rr">RR:</label></td>
            	            <td class="recField"><span class="info"><?php echo $rr;?> breaths/m</span></td>
        	            </tr>
                	    <tr>
                    		<td class="recHeader"><label for="temp">Temp:</label></td>
	                        <td colspan="2" class="recField"><span class="info"><?php echo $temp;?>&deg; Celcius</span></td>
    	                    <td class="recHeader"><label for="weight">Weight:</label></td>
        	                <td colspan="2" class="recField"><span class="info"><?php echo $weight;?> kilograms</span></td>
            	        </tr>
                	    <tr>
                    		<td colspan="1" class="recHeader" valign="top"><label for="complaint">Chief Complaint:</label></td>
                        	<td colspan="5" class="recField" valign="top"><span class="info"><?php echo nl2br($complaint);?></span></td>
	                    </tr>
    	                <tr>
        	            	<td colspan="1" class="recHeader" valign="top"><label for="remarks">Remarks:</label></td>
            	            <td colspan="5" class="recField" valign="top"><span class="info"><?php echo nl2br($remarks);?></span></td>
                	    </tr>
                        <tr>
        	            	<td colspan="1" class="recHeader" valign="top"><label for="foradmission">For Admission:</label></td>
            	            <td colspan="5" class="recField" valign="top"><span class="info"><?php echo $foradmission;?></span></td>
                	    </tr>
	                </table>
					</div>
				</div>
			</div>                
        <div id="footer"><?php include 'templates/footer.php'?></div>
    </div>
<script>
	$(window).unload( function () { '<?php unset($_SESSION['scid']);?>' } );
</script>   
</body>
</html>