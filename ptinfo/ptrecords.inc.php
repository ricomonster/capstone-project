<div id="ptRecordHolder">
	<span class="pageTitle">Patient Records of OPD#: <?php echo $opdnum;?></span>
    <span style="float: right;"><input type="button" id="print-med-history" name="print-med-history" value="Print Patient's Medical History" class="whitebutton" onclick="window.open('pdfpatientmedicalhistory.php?pid=<?php echo $pid;?>', '_blank'); return false;"/></span>
    <div id="recordHolder" style="padding-top:10px;">
    <?php
		$ptRec = getRecords($pid);
		//$count = countRecords($pid);
		$count = 1;
		if(empty($ptRec)){
			echo '<span class="errormsg">There are no records available for this patient.</span>';
		}else{
			foreach ($ptRec as $r){
	?>
    		<div id="patientRecord_<?php echo $r["rid"];?>" class="rdHolder">
				<?php
				if($r["foradmission"] == "Yes"){
					$admt = getAdmissionDet($pid, $r["rid"]);
						foreach ($admt as $adm){
							$bednumber = $adm["bednumber"];
							$dateadmitted = date('F d, Y', strtotime($adm["dateadmitted"]));
						}
					if($r["admit"]=="Admitted"){
				?>
				<a style="cursor: pointer;" id="<?php echo $r["rid"];?>" class="records">
    				<div id="titleHolder" id="<?php echo $r["rid"];?>">
            			Record #<?php echo $count;?> - <?php echo $dateadmitted;?> :: Patient at Bed Number <?php echo $bednumber;?>
            		</div>
            	</a>
				<?php		
					}
					if($r["admit"]=="Pending"){
				?>
				<a style="cursor: pointer;" id="<?php echo $r["rid"];?>" class="records">
    				<div id="titleHolder" id="<?php echo $r["rid"];?>">
            			Record #<?php echo $count;?> - <?php echo date('F d, Y', strtotime($r["dateofvisit"]));?> :: Patient on Waiting List to be Admitted
            		</div>
            	</a>
				<?php
					}
					if($r["admit"]=="Pending Discharge"){
				?>
				<a style="cursor: pointer;" id="<?php echo $r["rid"];?>" class="records">
					<div id="titleHolder" id="<?php echo $r["rid"];?>">
						Record #<?php echo $count;?> - <?php echo date('F d, Y', strtotime($r["dateofvisit"]));?> :: Patient waiting to be discharged.
					</div>
				</a>
				<?php
					}
					if($r["admit"]=="Discharged"){
				?>
				<a style="cursor: pointer;" id="<?php echo $r["rid"];?>" class="records">
					<div id="titleHolder" id="<?php echo $r["rid"];?>">
						Record #<?php echo $count;?> - <?php echo date('F d, Y', strtotime($r["dateofvisit"]));?> :: Patient is Discharged.
					</div>
				</a>
				<?php
					}
				}else{
				?>
            	<a style="cursor: pointer;" id="<?php echo $r["rid"];?>" class="records">
    				<div id="titleHolder" id="<?php echo $r["rid"];?>">
            			Record #<?php echo $count;?> - <?php echo date('F d, Y', strtotime($r["dateofvisit"]));?> :: Walk-in
            		</div>
            	</a>
				<?php } ?>
				<div id="ptRecord_<?php echo $r["rid"];?>" class="ptRecord">
            		<table class="recTable" width="100%">
						<?php
						if($r["foradmission"] == "Yes"){
							if($r["admit"]=="Admitted"){
						?>
                		<tr>
                	    	<td colspan="1" class="recHeader"><label for="date">Date Admitted:</label></td>
                	        <td colspan="5" class="recField"><span class="info"><?php echo $dateadmitted;?> :: Patient at Bed Number <?php echo $bednumber;?></span></td>
						</tr>
						<?php
								}
								if($r["admit"]=="Pending"){
						?>
						<tr>
                	    	<td colspan="1" class="recHeader"><label for="date">Date Entered:</label></td>
                	        <td colspan="5" class="recField"><span class="info"><?php echo date('F d, Y', strtotime($r["dateofvisit"]))?> :: Patient waiting to be admitted</span></td>
						</tr>
						<?php
								}
								if($r["admit"]=="Pending Discharge"){
						?>
						<tr>
							<td colspan="1" class="recHeader"><label for="date">Date Entered:</label></td>
							<td colspan="5" class="recField"><span class="info"><?php echo date('F d, Y', strtotime($r["dateofvisit"]))?> :: Patient waiting to be discharged</span></td>
						</tr>
						<?php
								}
							}else{
						?>
						<tr>
                	    	<td colspan="1" class="recHeader"><label for="date">Date:</label></td>
                	        <td colspan="5" class="recField"><span class="info"><?php echo date('F d, Y', strtotime($r["dateofvisit"]));?></span></td>
						</tr>
						<?php } ?>
	                    <tr>	
    	                	<td class="recHeader" width="15%"><label for="age">Age:</label></td>
        	                <td class="recField" width="18%"><span class="info"><?php echo $r["age"];?> y/o</span></td>
            	        	<td class="recHeader" width="15%"><label for="timein">Time In:</label></td>
                	        <td class="recField" width="18%"><span class="info"><?php echo $r["timein"];?></span></td>
                    	    <td class="recHeader" width="15%"><label for="timeout">Time Out:</label></td>
	                        <td class="recField" width="18%"><span class="info"><?php echo $r["timeout"];?></span></td>
    	                </tr>
        	            <tr>
            	        	<td class="recHeader"><label for="bp">BP:</label></td>
                	        <td class="recField"><span class="info"><?php echo $r["bp"];?> mmHg</span></td>
                    	    <td class="recHeader"><label for="cr">CR:</label></td>
	                        <td class="recField"><span class="info"><?php echo $r["cr"];?> pulse/min</span></td>
    	                    <td class="recHeader"><label for="rr">RR:</label></td>
            	            <td class="recField"><span class="info"><?php echo $r["rr"];?> b/min</span></td>
        	            </tr>
                	    <tr>
                    		<td class="recHeader"><label for="temp">Temp:</label></td>
	                        <td colspan="2" class="recField"><span class="info"><?php echo $r["temp"];?> &deg;C</span></td>
    	                    <td class="recHeader"><label for="weight">Weight:</label></td>
        	                <td colspan="2" class="recField"><span class="info"><?php echo $r["weight"];?> kg</span></td>
            	        </tr>
                	    <tr>
                    		<td colspan="1" class="recHeader" valign="top"><label for="complaint">Chief Complaint:</label></td>
                        	<td colspan="5" class="recField" valign="top"><span class="info"><?php echo nl2br($r["complaint"]);?></span></td>
	                    </tr>
    	                <tr>
        	            	<td colspan="1" class="recHeader" valign="top"><label for="remarks">Remarks:</label></td>
            	            <td colspan="5" class="recField" valign="top">
								<span class="info">
									<?php
									if(empty($r["remarks"])){
										echo 'The patient was not yet examined or attended';
									}else{
										echo nl2br($r["remarks"]);
									}
									?>
								</span>
							</td>
                	    </tr>
                        <tr>
        	            	<td colspan="1" class="recHeader" valign="top"><label for="doctor">Doctor:</label></td>
            	            <td colspan="5" class="recField" valign="top">
								<span class="info">
								<?php
								$doctor = getDocAttend($r["rid"], $r["pid"]);
								if(empty($doctor)){
									echo 'The patient was not yet examined or attended';
								}else{
									foreach ($doctor as $d){
										echo 'Dr. '.$d["firstname"].' '.$d["lastname"].', '.$d["title"].' ('.$d["task"].')';
									}
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
									if (empty($r["foradmission"])){
										echo 'The patient was not yet examined or attended';
									}else{
										echo $r["foradmission"];
									}
									?>
								</span>
							</td>
                	    </tr>
                        <tr>
                        	<td colspan="6" class="recField" align="right">
								<?php
								if($r["foradmission"] == "Yes"){
									if ($r["admit"]=="Admitted" || $r["admit"]=="Pending Discharge" || $r["admit"]=="Discharged"){
								?>
								<input type="button" name="charts" class="whitebutton" value="View Patient Charts" title="View Patient Charts" onClick="window.location.href='viewpatientcharts.php?pid=<?php echo $pid;?>&rid=<?php echo $r["rid"];?>'"/>
								<?php } } ?>
                            	<input type="button" name="edit" class="greenbutton" onClick="window.location.href='viewpatientrecord.php?pid=<?php echo $pid;?>&rid=<?php echo $r["rid"];?>'" value="View Record" title="View Record"/>
								<?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?>
                            	<input type="button" name="edit" class="bluebutton" onClick="window.location.href='validate.php?loc=rec&type=edit&pid=<?php echo $pid;?>&rid=<?php echo $r["rid"];?>'" value="Edit Record" title="Edit Record"/>
        	            		<input type="button" name="delete" class="redbutton" onClick="window.location.href='validate.php?loc=rec&type=delete&pid=<?php echo $pid;?>&rid=<?php echo $r["rid"];?>'" value="Delete Record" title="Delete Record"/>
                                <?php } ?>
                            </td>
                        </tr>
	                </table>
    	        </div>
			</div>
	<?php	
			$count += 1;	
			}
		}
	?>	
    </div>
<script>
$(document).ready(function(){
$(".records").click(function() {
		var ID = $(this).attr("id")
		
		$("#ptRecord_"+ID).slideToggle(1000);
	});
});
</script>
</div>