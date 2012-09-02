<?php
date_default_timezone_set("Asia/Manila");
$curr_date = date('F d, Y', time());
$db_date = date('Y-m-d', time());
$curr_time = date('h:i a', time());
$curr_ampm = date('A', time());
$curr_day = date('d', time());
$c_day = strtotime(date('Y-n-j', time()));
$addate = strtotime($getdatead);

$no_of_hos = date('d', $c_day - $addate);
?>
<div class="admittedHolder">
	<span class="pageTitle">Clinical Face Sheet</span>
	<div id="clinical-face-sheet-holder">
		<?php if(checkClinicalFace($pid, $rid, $aid)===false){?>
		<div id="clinical-face-sheet-wrapper">
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-name">Name:</div>
					<div class="titleCell clinical-header-birth">Date of Birth:</div>
					<div class="titleCell clinical-header-place">Place of Birth:</div>					
					<div class="titleCell clinical-header-membership">Membership:</div>
					<div class="titleCell clinical-header-category">Category:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-cont-name" style="vertical-align: top;"><?php echo $lastname;?>, <?php echo $firstname;?> <?php echo $middlename;?></div>
					<div class="contentCell clinical-cont-birth" style="vertical-align: top;"><?php echo $dateofbirth;?></div>
					<div class="contentCell clinical-cont-place">
						<?php echo $placeofbirth;?>
					</div>
					<div class="contentCell clinical-cont-membership" style="vertical-align: top;"><?php echo $membership;?></div>
					<div class="contentCell clinical-cont-category" style="vertical-align: top;">
						<?php
						if($membership == "Member" || $membership == "Dependent"){
							echo 'CH';
							echo '<input type="hidden" name="category" id="category" value="CH"/>';
						}else{
							echo 'NMCH';
							echo '<input type="hidden" name="category" id="category" value="NMCH"/>';
						}
						?>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-address">Home Address:</div>
					<div class="titleCell clinical-header-occupation">Occupation:</div>
					<div class="titleCell clinical-header-telno">Tel No.:</div>					
					<div class="titleCell clinical-header-sex">Sex:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-cont-address"><?php echo $address;?></div>
					<div class="contentCell clinical-cont-occupation">
						<?php echo $occupation;?>
					</div>
					<div class="contentCell clinical-cont-telno">
						<?php echo $contactno;?>
					</div>
					<div class="contentCell clinical-cont-sex"><?php echo $sex;?></div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-age">Age:</div>
					<div class="titleCell clinical-header-cs">Civil Status:</div>
					<div class="titleCell clinical-header-religion">Religion:</div>
					<div class="titleCell clinical-header-nationality">Nationality:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-cont-age"><?php echo $age;?></div>
					<div class="contentCell clinical-cont-cs"><?php echo $cs;?></div>
					<div class="contentCell clinical-cont-religion">
						<?php echo $religion;?>
					</div>
					<div class="contentCell clinical-cont-nationality">
						<?php echo $nationality;?>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-kin">Name of Next Kin:</div>
					<div class="titleCell clinical-header-relt">Relationship:</div>
					<div class="titleCell clinical-header-kinadd">Address:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-cont-kin">
						<input type="text" name="namekin" id="namekin" class="c-text" style="width: 295px;"/>
					</div>
					<div class="contentCell clinical-cont-relt">
						<input type="text" name="kinrelationship" id="kinrelationship" class="c-text" style="width: 145px;"/>
					</div>
					<div class="contentCell clinical-cont-kinadd">
						<input type="text" name="kinaddress" id="kinaddress" class="c-text" style="width: 290px;"/>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-dateadd">Date Admitted:</div>
					<div class="titleCell clinical-header-timeadd">Time:</div>
					<div class="titleCell clinical-header-datedis">Date Discharge:</div>
					<div class="titleCell clinical-header-timedis">Time:</div>
					<div class="titleCell clinical-header-hosdays">No. of Hospital Days:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-cont-dateadd">
						<?php echo $dateadmitted;?>
						<input type="hidden" id="dateadmitted" name="dateadmitted" value="<?php echo $getdatead;?>"/>
					</div>
					<div class="contentCell clinical-cont-timeadd">
						<?php echo $timeadmitted;?>
						<input type="hidden" name="timeadmitted" id="timeadmitted" value="<?php echo $timeadmitted;?>"/>
					</div>
					<div class="contentCell clinical-cont-datediss">
						<?php echo $curr_date;?>
						<input type="hidden" name="datedischarge" id="datedischarge" value="<?php echo $db_date;?>"/>
					</div>
					<div class="contentCell clinical-cont-timedis">
						<input type="text" name="timedischarge" id="timedischarge" class="c-text" style="width: 50px;"/>
						<select name="ampmdis" id="ampmdis" class="c-text" style="width: 50px;">
							<option value="AM"<?php if($curr_ampm=="AM"){echo ' selected="selected"';}?>>AM</option>
							<option value="PM"<?php if($curr_ampm=="PM"){echo ' selected="selected"';}?>>PM</option>
						</select>
					</div>
					<div class="contentCell clinical-cont-hosdays">
						<?php echo $no_of_hos; if($no_of_hos < 1){echo ' day';}else{echo ' days';}?>
						<input type="hidden" name="no-of-hosdays" id="no-of-hosdays" value="<?php echo $no_of_hos;?>"/>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-serdept">Service / Department:</div>
					<div class="titleCell clinical-header-ward">Ward:</div>
					<div class="titleCell clinical-header-serdeptatt">Service / Department:</div>
					<div class="titleCell clinical-header-attphys">Attending Physician:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-cont-serdept">
						<input type="text" name="serdept" id="serdept" class="c-text" style="width: 195px;" value="<?php echo $service;?>"/>
					</div>
					<div class="contentCell clinical-cont-ward">
						<input type="text" name="ward" id="ward" class="c-text" style="width: 105px;" value="<?php echo $roomtype;?>"/>
					</div>
					<div class="contentCell clinical-cont-serdeptatt">
						<?php
						$doc = getDocAttend($rid, $pid);
						foreach ($doc as $d){
							$did = $d["did"];
							$docname = "Dr. ".$d["firstname"]." ".$d["lastname"].", ".$d["title"];
							$specialty = $d["specialization"];
						}
						?>
						<input type="text" name="serdeptat" id="serdeptat" class="c-text" style="width: 195px;" value="<?php echo $specialty;?>"/>
					</div>
					<div class="contentCell clinical-cont-attphys">
						<?php
						echo $docname;
						?>
						<input type="hidden" name="did" id="did" value="<?php echo $did;?>"/>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-addiagnosis">Admitting Diagnosis</div>
					<div class="titleCell clinical-header-disposition">Disposition:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-cont-addiagnosis">
						<textarea name="ad-diagnosis" id="ad-diagnosis" class="c-tarea" style="width: 305px; height: 125px;"></textarea>
					</div>
					<div class="contentCell clinical-cont-disposition" style="vertical-align: top;">
						<div id="disposition1">
							<p><input type="checkbox" name="wb" id="wb" value="Yes" class="c-check"/> WB - Well Baby</p>
							<p><input type="checkbox" name="imp" id="imp" value="Yes" class="c-check"/> IMP - Improved</p>
							<p><input type="checkbox" name="unmp" id="unmp" value="Yes" class="c-check"/> UNMP - Unimproved</p>
							<p><input type="checkbox" name="exp" id="exp" value="Yes" class="c-check"/> EXP - Expired</p>
							<p><input type="checkbox" name="ref" id="ref" value="Yes" class="c-check"/> REF - Referred</p>
						</div>
						<div id="disposition2">
							<p><input type="checkbox" name="trans" id="trans" value="Yes" class="c-check"/>TRANS - Transferred</p>
							<p><input type="checkbox" name="hama" id="hama" value="Yes" class="c-check"/>HAMA - Home Against Medical Advice</p>
							<p><input type="checkbox" name="abs" id="abs" value="Yes" class="c-check"/>ABS - Absconded</p>
							<p><input type="checkbox" name="others" id="others" class="c-check"/>Others:</p>
							<p><input type="text" name="othersval" id="othersval" class="c-text" style="width: 215px;" disabled="disabled"/></p>
						</div>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-adphysician">Admitting Physician:</div>
					<div class="titleCell clinical-header-adclerk">Admitting Clerk:</div>
					<div class="titleCell clinical-header-dispo">Disposition:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-cont-adphysician">
						<input type="text" name="adphysician" id="adphysician" class="c-text" style="width: 240px;"/>
					</div>
					<div class="contentCell clinical-cont-adclerk">
						<input type="text" name="adclerk" id="adclerk" class="c-text" style="width: 245px;"/>
					</div>
					<div class="contentCell clinical-cont-dispo">
						<input type="text" name="disposition" id="disposition" class="c-text" style="width: 245px;"/>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-finaldiag">Final Diagnosis:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-content-finaldiag">
						<textarea name="finaldiagnosis" id="finaldiagnosis" class="c-tarea" style="width: 760px;"></textarea>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-complications">Complications:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-content-complications">
						<textarea name="complications" id="complications" class="c-tarea" style="width: 760px;"></textarea>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-surgdone">Surgical Done:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-content-surgdone">
						<textarea name="surgical-done" id="surgical-done" class="c-tarea" style="width: 760px;"></textarea>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-patreport">Pathological Report:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-content-patreport">
						<textarea name="patreport" id="patreport" class="c-tarea" style="width: 760px;"></textarea>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-ric">Resident-in-Charge:</div>
					<div class="titleCell clinical-header-medspec">Medical Specialist:</div>
					<div class="titleCell clinical-header-senreshead">Senior Resident/Head:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-cont-ric">
						<input type="text" name="resident-in-charge" id="resident-in-charge" class="c-text" style="width: 240px;"/>
					</div>
					<div class="contentCell clinical-cont-medspec">
						<input type="text" name="med-spec" id="med-spec" class="c-text" style="width: 245px;"/>
					</div>
					<div class="contentCell clinical-cont-senreshead">
						<input type="text" name="sen-res-head" id="sen-res-head" class="c-text" style="width: 245px;"/>
					</div>
				</div>
			</div>
			<?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="contentCell clinical-content-submit">
						<input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
						<input type="hidden" name="rid" id="rid" value="<?php echo $rid;?>"/>
						<input type="hidden" name="aid" id="aid" value="<?php echo $aid;?>"/>
						<input type="submit" name="submitClinical" id="submitClinical" value="Submit Clinical Face Sheet" title="Submit Clinical Face Sheet" class="greenbutton"/>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
		
		
		<?php }else{ ?>
		<?php
		$cinfo = getClinicalFace($pid, $rid, $aid);
		foreach ($cinfo as $cf){
		?>
		<div id="clinical-face-sheet-wrapper">
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-name">Name:</div>
					<div class="titleCell clinical-header-birth">Date of Birth:</div>
					<div class="titleCell clinical-header-place">Place of Birth:</div>					
					<div class="titleCell clinical-header-membership">Membership:</div>
					<div class="titleCell clinical-header-category">Category:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-cont-name" style="vertical-align: top;"><?php echo $lastname;?>, <?php echo $firstname;?> <?php echo $middlename;?></div>
					<div class="contentCell clinical-cont-birth" style="vertical-align: top;"><?php echo $dateofbirth;?></div>
					<div class="contentCell clinical-cont-place"><?php echo $placeofbirth;?></div>
					<div class="contentCell clinical-cont-membership" style="vertical-align: top;"><?php echo $membership;?></div>
					<div class="contentCell clinical-cont-category" style="vertical-align: top;"><?php echo $cf["category"];?></div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-address">Home Address:</div>
					<div class="titleCell clinical-header-occupation">Occupation:</div>
					<div class="titleCell clinical-header-telno">Tel No.:</div>					
					<div class="titleCell clinical-header-sex">Sex:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-cont-address"><?php echo $address;?></div>
					<div class="contentCell clinical-cont-occupation">
						<?php echo $occupation;?>
					</div>
					<div class="contentCell clinical-cont-telno">
						<?php echo $contactno;?>
					</div>
					<div class="contentCell clinical-cont-sex"><?php echo $sex;?></div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-age">Age:</div>
					<div class="titleCell clinical-header-cs">Civil Status:</div>
					<div class="titleCell clinical-header-religion">Religion:</div>
					<div class="titleCell clinical-header-nationality">Nationality:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-cont-age"><?php echo $age;?></div>
					<div class="contentCell clinical-cont-cs"><?php echo $cs;?></div>
					<div class="contentCell clinical-cont-religion">
						<?php echo $religion;?>
					</div>
					<div class="contentCell clinical-cont-nationality">
						<?php echo $nationality;?>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-kin">Name of Next Kin:</div>
					<div class="titleCell clinical-header-relt">Relationship:</div>
					<div class="titleCell clinical-header-kinadd">Address:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-cont-kin">
						<?php echo $cf["nameofnextkin"];?>
					</div>
					<div class="contentCell clinical-cont-relt">
						<?php echo $cf["relationshipkin"];?>
					</div>
					<div class="contentCell clinical-cont-kinadd">
						<?php echo $cf["addresskin"];?>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-dateadd">Date Admitted:</div>
					<div class="titleCell clinical-header-timeadd">Time:</div>
					<div class="titleCell clinical-header-datedis">Date Discharge:</div>
					<div class="titleCell clinical-header-timedis">Time:</div>
					<div class="titleCell clinical-header-hosdays">No. of Hospital Days:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-cont-dateadd">
						<?php echo date('F j, Y', strtotime($cf["dateadmitted"]));?>
						<input type="hidden" id="dateadmitted" name="dateadmitted" value="<?php echo $getdatead;?>"/>
					</div>
					<div class="contentCell clinical-cont-timeadd">
						<?php echo $cf["timeadmitted"];?>
					</div>
					<div class="contentCell clinical-cont-datediss">
						<?php echo date('F j, Y', strtotime($cf["datedischarged"]));?>
					</div>
					<div class="contentCell clinical-cont-timedis">
						<?php echo $cf["timedischarged"];?>
					</div>
					<div class="contentCell clinical-cont-hosdays">
						<?php echo $cf["noofhosdays"]; if($cf["noofhosdays"] > 1){echo ' days';}else{echo ' day';};?>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-serdept">Service / Department:</div>
					<div class="titleCell clinical-header-ward">Ward:</div>
					<div class="titleCell clinical-header-serdeptatt">Service / Department:</div>
					<div class="titleCell clinical-header-attphys">Attending Physician:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-cont-serdept">
						<?php echo $cf["servicedept"];?>
					</div>
					<div class="contentCell clinical-cont-ward">
						<?php echo $cf["ward"];?>
					</div>
					<div class="contentCell clinical-cont-serdeptatt">
						<?php echo $cf["servicedept2"];?>
					</div>
					<div class="contentCell clinical-cont-attphys">
						<?php
						$doctor = getDocProf($cf["did"]);
						foreach ($doctor as $d){
							$docname = $docname = "Dr. ".$d["firstname"]." ".$d["lastname"].", ".$d["title"];
						}
						echo $docname;
						?>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-addiagnosis">Admitting Diagnosis</div>
					<div class="titleCell clinical-header-disposition">Disposition:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-cont-addiagnosis">
						<?php echo $cf["admittingdiagnosis"];?>
					</div>
					<div class="contentCell clinical-cont-disposition" style="vertical-align: top;">
						<div id="disposition1">
							<p><input type="checkbox" name="wb" id="wb" value="Yes" class="c-check" <?php if($cf["wb"] != "N/A"){echo ' checked="checked"';}?>/> WB - Well Baby</p>
							<p><input type="checkbox" name="imp" id="imp" value="Yes" class="c-check" <?php if($cf["imp"] != "N/A"){echo ' checked="checked"';}?>/> IMP - Improved</p>
							<p><input type="checkbox" name="unmp" id="unmp" value="Yes" class="c-check" <?php if($cf["unmp"] != "N/A"){echo ' checked="checked"';}?>/> UNMP - Unimproved</p>
							<p><input type="checkbox" name="exp" id="exp" value="Yes" class="c-check" <?php if($cf["exp"] != "N/A"){echo ' checked="checked"';}?>/> EXP - Expired</p>
							<p><input type="checkbox" name="ref" id="ref" value="Yes" class="c-check" <?php if($cf["ref"] != "N/A"){echo ' checked="checked"';}?>/> REF - Referred</p>
						</div>
						<div id="disposition2">
							<p><input type="checkbox" name="trans" id="trans" value="Yes" class="c-check" <?php if($cf["trans"] != "N/A"){echo ' checked="checked"';}?>/>TRANS - Transferred</p>
							<p><input type="checkbox" name="hama" id="hama" value="Yes" class="c-check" <?php if($cf["hama"] != "N/A"){echo ' checked="checked"';}?>/>HAMA - Home Against Medical Advice</p>
							<p><input type="checkbox" name="abs" id="abs" value="Yes" class="c-check" <?php if($cf["abs"] != "N/A"){echo ' checked="checked"';}?>/>ABS - Absconded</p>
							<p><input type="checkbox" name="others" id="others" class="c-check" <?php if($cf["others"] != "N/A"){echo ' checked="checked"';}?>/>Others:</p>
							<p><input type="text" name="othersval" id="othersval" class="c-text" style="width: 215px;" disabled="disabled" <?php if($cf["others"] != "N/A"){echo ' value="' . $cf["others"] . '"';}?>/></p>
						</div>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-adphysician">Admitting Physician:</div>
					<div class="titleCell clinical-header-adclerk">Admitting Clerk:</div>
					<div class="titleCell clinical-header-dispo">Disposition:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-cont-adphysician">
						<?php echo $cf["admittingphysician"];?>
					</div>
					<div class="contentCell clinical-cont-adclerk">
						<?php echo $cf["admittingclerk"];?>
					</div>
					<div class="contentCell clinical-cont-dispo">
						<?php echo $cf["disposition"];?>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-finaldiag">Final Diagnosis:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-content-finaldiag" style="width: 770px;">
						<?php echo $cf["finaldiagnosis"];?>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-complications">Complications:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-content-complications" style="width: 770px;">
						<?php echo $cf["complications"];?>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-surgdone">Surgical Done:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-content-surgdone" style="width: 770px;">
						<?php echo $cf["surgicaldone"];?>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-patreport">Pathological Report:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-content-patreport" style="width: 770px;">
						<?php echo $cf["pathologicalreport"];?>
					</div>
				</div>
			</div>
			<div class="sheet-holder">
				<div class="clinical-row">
					<div class="titleCell clinical-header-ric">Resident-in-Charge:</div>
					<div class="titleCell clinical-header-medspec">Medical Specialist:</div>
					<div class="titleCell clinical-header-senreshead">Senior Resident/Head:</div>
				</div>
				<div class="clinical-row">
					<div class="contentCell clinical-cont-ric">
						<?php echo $cf["residentincharge"];?>
					</div>
					<div class="contentCell clinical-cont-medspec">
						<?php echo $cf["medicalspecialist"];?>
					</div>
					<div class="contentCell clinical-cont-senreshead">
						<?php echo $cf["seniorresidenthead"];?>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<?php } ?>
	</div>
</div>
<script type="text/javascript" src="ajax/ajaxAddClinicalFace.js"></script>
<script type="text/javascript">
$('document').ready(function(){
	$("#timedischarge").mask("99:99",{placeholder:"_"});

	$("#others").click(function(){
		if ($(this).attr('checked')){
			$("#othersval").removeAttr("disabled"); 
		}else{
			$("#othersval").attr("disabled", "disabled");
			$("#othersval").val("");
		}
	});
});
</script>
<script>
$(function() {
	$( "#datedischarge" ).datepicker({
		changeMonth: true,
		changeYear: true,
			dateFormat: 'yy-mm-dd'
	});
});
</script>
