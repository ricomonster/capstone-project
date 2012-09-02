<div id="drProfHolder">
	<span class="pageTitle">Doctor's Previous Patient List</span>
    <div id="ptlistHolder">
	<?php
	$docsPt = getDocPrevPatients($did);
	if(empty($docsPt)){
	?>
		<div id="ptInfoRec" class="ptInfoHolder">
				<div id="titleHolder">There are no records found!</div>
				<div class="ptInfo" id="emptyRecords" style="display: block; border: 1px solid #ccc; margin-top: 5px; padding: 10px;">
						Maybe Dr. <?php echo $firstname;?> <?php echo $lastname;?> is busy and hasn't start practicing. :)
				</div>
		</div>
	<?php
	}else{
		foreach ($docsPt as $docp){
	?>
		<div id="ptInfoRec" class="ptInfoHolder">
			<a id="<?php echo $docp["pid"];?>" class="open">
				<div id="titleHolder">#<?php echo $docp["opdnum"];?> : <?php echo $docp["lastname"];?>, <?php echo $docp["firstname"];?> <?php echo $docp["middlename"];?></div>
			</a>
			<div id="showPt_<?php echo $docp["pid"];?>" class="ptInfo">
			<?php
			$ptRec = getPrevPtRecords($docp["pid"], $did);
			foreach ($ptRec as $dp){
			?>
				<table class="recTable" id="record_<?php echo $docp["rid"];?>" width="100%">
                	<tr>
						<td colspan="1" class="recHeader"><label for="date">Date:</label></td>
						<td colspan="5" class="recField"><span class="info"><?php echo date('F d, Y', strtotime($dp["dateofvisit"]));?></span></td>
					</tr>
					<tr>	
						<td class="recHeader" width="15%"><label for="age">Age:</label></td>
						<td class="recField" width="18%"><span class="info"><?php echo $dp["age"];?></span></td>
						<td class="recHeader" width="15%"><label for="timein">Time In:</label></td>
						<td class="recField" width="18%"><span class="info"><?php echo $dp["timein"];?></span></td>
						<td class="recHeader" width="17%"><label for="timeout">Time Out:</label></td>
						<td class="recField" width="16%"><span class="info"><?php echo $dp["timeout"];?></span></td>
					</tr>
					<tr>
						<td class="recHeader"><label for="bp">BP:</label></td>
						<td class="recField"><span class="info"><?php echo $dp["bp"];?></span></td>
						<td class="recHeader"><label for="cr">CR:</label></td>
						<td class="recField"><span class="info"><?php echo $dp["cr"];?></span></td>
						<td class="recHeader"><label for="rr">RR:</label></td>
						<td class="recField"><span class="info"><?php echo $dp["rr"];?></span></td>
					</tr>
					<tr>
						<td class="recHeader"><label for="temp">Temp:</label></td>
						<td colspan="2" class="recField"><span class="info"><?php echo $dp["temp"];?></span></td>
						<td class="recHeader"><label for="weight">Weight:</label></td>
						<td colspan="2" class="recField"><span class="info"><?php echo $dp["weight"];?></span></td>
					</tr>
					<tr>
						<td colspan="1" class="recHeader" valign="top"><label for="complaint">Chief Complaint:</label></td>
                        <td colspan="5" class="recField" valign="top"><span class="info"><?php echo nl2br($dp["complaint"]);?></span></td>
					</tr>
					<tr>
        	            <td colspan="1" class="recHeader" valign="top"><label for="remarks">Remarks:</label></td>
						<td colspan="5" class="recField" valign="top"><span class="info"><?php echo nl2br($dp["remarks"]);?></span></td>
					</tr>
					<tr>
        	            <td colspan="1" class="recHeader" valign="top"><label for="foradmission">For Admission:</label></td>
						<td colspan="5" class="recField" valign="top"><span class="info"><?php echo $dp["foradmission"];?></span></td>
                	</tr>
					<tr>
						<td colspan="6" class="recField" style="text-align: right;">
							<input type="button" name="edit" class="greenbutton" onClick="window.location.href='viewpatientrecord.php?pid=<?php echo $dp["pid"];?>&rid=<?php echo $dp["rid"];?>'" value="View Record" title="View Record"/>
						<?php if ($dp["foradmission"]=="Yes"){?>
							<input type="button" name="edit" class="bluebutton" onClick="window.location.href='viewpatientcharts.php'" value="View Charts" title="View Charts"/>
						<?php } ?>
						</td>
					</tr>
				</table>
			<?php } ?>
			</div>
		</div>
	<?php
		}
	}
	?>
	</div>
</div>
<script>
$(document).ready(function(){
$(".open").click(function() {
		var ID = $(this).attr("id")
		$("#showPt_"+ID).slideToggle(1000);
	});
});
</script>