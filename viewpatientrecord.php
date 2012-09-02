<?php
include 'init.php';
if (!logged_in()){
	header('Location: index.php');
	exit();
}

if(!isset($_GET['pid']) || !isset($_GET['rid']) || empty($_GET['pid']) || empty($_GET['rid']) || checkRecord($_GET['pid'], $_GET['rid']) === false){
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
		$admit = $r["admit"];
	}
}
?>
<!DOCTYPE HTML>
<head>
	<title>Patient Record of OPD# <?php echo $opdnum;?> :: Bacnotan District Hospital - Patient Information System</title>
	<?php include 'templates/meta.php';?>
    <link rel="icon" href="favicon.ico" type="image/ico"/>
    <link href="css/styleMain.css" rel="stylesheet" type="text/css">
    <link href="css/styleRecord.css" rel="stylesheet" type="text/css">
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
			<div id="recHolder">
				<span class="pageTitle">Patient Record of OPD# <?php echo $opdnum;?></span>
    				<div id="ptRecHolder">
						<table class="recTable" width="100%">
						<?php
						if ($foradmission == "Yes"){
							if($admit=="Admitted" || $admit=="Discharged"){
								$admt = getAdmissionDet($pid, $rid);
								foreach ($admt as $adm){
									$bednumber = $adm["bednumber"];
									$status = $adm["status"];
									$dateadmitted = date('F d, Y', strtotime($adm["dateadmitted"]));
						?>
						<tr>
                	    	<td colspan="1" class="recHeader"><label for="date">Date Admitted:</label></td>
                	        <td colspan="5" class="recField"><span class="info"><?php echo $dateadmitted;?> :: Patient <?php echo $status;?> <?php if($status=="Admitted"){echo ' at Bed Number ' . $bednumber;}?></span></td>
						</tr>
						<?php
								}
							}else{
						?>
						<tr>
                	    	<td colspan="1" class="recHeader"><label for="date">Date Visited:</label></td>
                	        <td colspan="5" class="recField"><span class="info"><?php echo $dateofvisit;?> :: Patient waited to be admitted.</span></td>
						</tr>
						<?php
							}
						}else{
						?>
                		<tr>
                	    	<td colspan="1" class="recHeader"><label for="date">Date:</label></td>
                	        <td colspan="5" class="recField"><span class="info"><?php echo $dateofvisit;?></span></td>
						</tr>
						<?php } ?>
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
            	            <td colspan="5" class="recField" valign="top">
								<span class="info">
									<?php
									if(empty($remarks)){
										echo 'The patient was not yet examined or attended';
									}else{
										echo nl2br($remarks);
									}
									?>
								</span>
							</td>
                	    </tr>
                        <tr>
        	            	<td colspan="1" class="recHeader" valign="top"><label for="foradmission">For Admission:</label></td>
            	            <td colspan="5" class="recField" valign="top">
								<span class="info">
									<?php
									if (empty($foradmission)){
										echo 'The patient was not yet examined or attended';
									}else{
										if ($foradmission == "Yes"){
											if($admit=="Admitted"){
												echo $foradmission . " :: Patient is currently admitted.";
											}
											if ($admit=="Discharged"){
												echo $foradmission . " :: Patient was discharged.";
											}
											if($admit=="Pending"){
												echo $foradmission . " :: Waiting to be admitted";
											}
											if($admit=="Pending Discharge"){
												echo $formadmission . " :: Patient is waiting to be discharged";
											}
											if($admit=="Discharged"){
												echo "The patient is discharged.";
											}
										}else{
											echo $foradmission;
										}
									}
									?>
								</span>
							</td>
                	    </tr>
                        <tr>
                        	<td colspan="6" class="recField">
							<?php
								if ($foradmission=="Yes" && $admit=="Admitted" || $admit=="Discharge"){
							?>
								<input type="button" name="edit" class="greenbutton" onClick="window.location.href='viewpatientcharts.php?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>'" value="View Patient Charts" title="View Patient Charts"/>
							<?php
								}
								if(empty($_SERVER['HTTP_REFERER'])){
									$prevpage = "viewpatientinfo.php?ref=ptrecords&pid=".$pid;
								}else{
									$prevpage = $_SERVER['HTTP_REFERER'];
								}
							?>
								<?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?>
                            	<input type="button" name="edit" class="bluebutton" onClick="window.location.href='validate.php?loc=rec&type=edit&pid=<?php echo $pid;?>&rid=<?php echo $rid;?>'" value="Edit Record" title="Edit Record"/>
        	            		<input type="button" name="delete" class="redbutton" onClick="window.location.href='validate.php?loc=rec&type=delete&pid=<?php echo $pid;?>&rid=<?php echo $rid;?>'" value="Delete Record" title="Delete Record"/>
                                <?php } ?>
								<input type="button" name="edit" class="whitebutton" onClick="window.location.href='<?php echo $prevpage;?>'" value="Return" title="Return" style="float: right;"/>
							</td>
                        </tr>
	                </table>
					</div>
				</div>
			</div>                
        <div id="footer"><?php include 'templates/footer.php'?></div>
    </div> 
</body>
</html>