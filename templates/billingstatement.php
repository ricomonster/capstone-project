<?php
$ln= lastBillNum();
foreach ($ln as $l){
	$ln = $l["billingnumber"];
}
if(empty($ln)){
	$lstnumber = 1000;
}else{
	$lstnumber = $ln + 1;
}
$bill = getBillStatement($pid, $rid, $aid);
foreach ($bill as $b){
?>
<div id="form-holder">
<span class="pageTitle">Billing Statement of <?php echo $lastname;?>, <?php echo $firstname;?> <?php echo $middlename;?></span>
	<div id="patient-info-holder" style="margin-top: 10px;">
		<div class="bill-row">
			<div class="cont-cell bill-title-name">Patient Name:</div>
			<div class="cont-cell bill-cont-name"><?php echo $lastname;?>, <?php echo $firstname;?> <?php echo $middlename;?></div>
			<div class="cont-cell bill-title-age">Age:</div>
			<div class="cont-cell bill-cont-age"><?php echo $age;?></div>
			<div class="cont-cell bill-title-sex">Sex:</div>
			<div class="cont-cell bill-cont-sex"><?php echo $sex;?></div>
		</div>
	</div>
	<div id="patient-info-holder" style="margin-bottom: 10px;">
		<div class="bill-row">
			<div class="cont-cell bill-title-room">Room No.:</div>
			<div class="cont-cell bill-cont-room"><?php echo $roomno;?></div>
			<div class="cont-cell bill-title-datetime">Date/Time of Admission:</div>
			<div class="cont-cell bill-cont-datetime">
				<?php echo $dateadmitted;?> at <?php echo $timeadmitted;?>
				<input type="hidden" name="datetimeadmitted" id="datetimeadmitted" value="<?php echo $undateadmitted;?>"/>
			</div>
			<div class="cont-cell bill-title-membership">Membership:</div>
			<div class="cont-cell bill-cont-membership">
				<?php echo $membership;?>
			</div>
		</div>
	</div>
	<center>
		<span style="font-weight: bold; color: font-family: Arial,sans-serif; color: #585858; font-size: 13px;">PATIENT WOULD LIKE TO CHECK-OUT AS GIVEN BELOW</span>
	</center>
	<div id="patient-info-holder" style="margin-top: 10px;">
		<div class="bill-row">
			<div class="cont-cell bill-title-date">Date:</div>
			<div class="cont-cell bill-cont-date"><?php echo $datedischarged;?></div>
			<div class="cont-cell bill-title-time">Time:</div>
			<div class="cont-cell bill-cont-time"><?php echo $timedischarged;?></div>
			<div class="cont-cell bill-title-nurseonduty">Nurse on Duty during Discharge:</div>
			<div class="cont-cell bill-cont-nurseonduty"><?php echo $persondischarged;?></div>
		</div>
	</div>
	<div id="patient-info-holder" style="margin-top: 10px; margin-bottom: 10px;">
		<div class="bill-row">
			<div class="cont-cell bill-title-finaldiag">FINAL DIAGNOSIS:</div>
			<div class="cont-cell bill-cont-finaldiag"><?php echo $finaldiagnosis;?></div>
		</div>
	</div>
	
	<div id="patient-info-holder" style="text-align: right; margin-left:auto; margin-right: 0;">
		<div class="bill-row">
			<div class="cont-cell bill-title-finaldiag" style="width: 150px;">Patient ID:</div>
			<div class="cont-cell bill-cont-finaldiag" style="width: 100px;"><?php echo $opdnum;?></div>
		</div>
		<div class="bill-row">
			<div class="cont-cell bill-title-finaldiag" style="width: 150px; border-top: none;">Billing Number:</div>
			<div class="cont-cell bill-cont-finaldiag" style="width: 100px; border-top: none;"><?php echo $b["billingnumber"];?></div>
		</div>
	</div>	

	<div id="bill-form-holder" style="margin-top: 10px;">
		<div class="bill-row">
			<div class="cont-cell bill-title-services">SERVICES</div>
			<div class="cont-cell bill-title-actual">ACTUAL CHARGES</div>
			<div class="cont-cell bill-title-philhealth">PHILHEALTH BENEFIT</div>
			<div class="cont-cell bill-title-excess">EXCESS</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">
				DRUGS AND MEDICINES
			</div>
			<div class="cont-cell">&nbsp;</div>
			<div class="cont-cell">&nbsp;</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">&nbsp;</div>
		</div>
		<?php
		$tottherafee = "";
		$thera = getTheraConsumed($rid, $pid);
		foreach ($thera as $t){
			echo '<div class="bill-row">';
			echo '<div class="cont-cell" style="text-align: right;">'.$t["theraname"].' :: '.date('M d, Y', strtotime($t["givendate"])).'</div>';
			echo '<div class="cont-cell">Php <input type="text" class="bill-field" value="'.$t["price"].'"  style="width: 120px;"/></div>';
			echo '<div class="cont-cell">&nbsp;</div>';
			echo '<div class="cont-cell" style="border-right: 1px solid #ccc;">&nbsp;</div>';
			echo '</div>';
			$tottherafee += $t["price"];
			}
		?>
		<div class="bill-row">
			<div class="cont-cell">
				Total Drugs and Meds
			</div>
			<div class="cont-cell">
				Php <input type="text" name="drugsandmedicine" id="drugsandmedicine" class="bill-field" style="width: 120px;" value="<?php echo $b["drugsandmedicines"];?>"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phdrugsandmedicine" id="phdrugsandmedicine" class="bill-field" disabled="disabled" style="width: 120px;" value="<?php echo $b["phdrugsandmedicines"];?>"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exdrugsandmedicines" id="exdrugsandmedicines" class="bill-field" disabled="disabled" style="width: 120px;" value="<?php echo $b["exdrugsandmedicines"];?>"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">SUPPLIES e.g. D/S 3cc..</div>
			<div class="cont-cell">
				Php <input type="text" name="supplies" id="supplies" class="bill-field" value="<?php echo $b["supplies"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phsupplies" id="phsupplies" class="bill-field" disabled="disabled" value="<?php echo $b["phsupplies"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exsupplies" id="exsupplies" class="bill-field" disabled="disabled" value="<?php echo $b["exsupplies"];?>" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">LABORATORY</div>
			<div class="cont-cell">
				Php <input type="text" name="laboratory" id="laboratory" class="bill-field" value="<?php echo $b["laboratory"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phlaboratory" id="phlaboratory" class="bill-field" disabled="disabled" value="<?php echo $b["phlaboratory"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exlaboratory" id="exlaboratory" class="bill-field" disabled="disabled" value="<?php echo $b["exlaboratory"];?>" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">X-RAY</div>
			<div class="cont-cell">
				Php <input type="text" name="xray" id="xray" class="bill-field" value="<?php echo $b["xray"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phxray" id="phxray" class="bill-field" disabled="disabled" value="<?php echo $b["phxray"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exxray" id="exxray" class="bill-field" disabled="disabled" value="<?php echo $b["exxray"];?>" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">ULTRASOUND</div>
			<div class="cont-cell">
				Php <input type="text" name="ultrasound" id="ultrasound" class="bill-field" value="<?php echo $b["ultrasound"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phultrasound" id="phultrasound" class="bill-field" disabled="disabled" value="<?php echo $b["phultrasound"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exultrasound" id="exultrasound" class="bill-field" disabled="disabled" value="<?php echo $b["exultrasound"];?>" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">ECG</div>
			<div class="cont-cell">
				Php <input type="text" name="ecg" id="ecg" class="bill-field" value="<?php echo $b["ecg"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phecg" id="phecg" class="bill-field" disabled="disabled" value="<?php echo $b["phecg"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="execg" id="execg" class="bill-field" disabled="disabled" value="<?php echo $b["execg"];?>" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">OXYGEN</div>
			<div class="cont-cell">
				Php <input type="text" name="oxygen" id="oxygen" class="bill-field" value="<?php echo $b["oxygen"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phoxygen" id="phoxygen" class="bill-field" disabled="disabled" value="<?php echo $b["phoxygen"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exoxygen" id="exoxygen" class="bill-field" disabled="disabled" value="<?php echo $b["exoxygen"];?>" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">ACCOM./SUBS.</div>
			<div class="cont-cell">
				Php <input type="text" name="accomsubs" id="accomsubs" class="bill-field" value="<?php echo $b["accomsubs"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phaccomsubs" id="phaccomsubs" class="bill-field" disabled="disabled" value="<?php echo $b["phaccomsubs"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exaccomsubs" id="exaccomsubs" class="bill-field" disabled="disabled" value="<?php echo $b["accomsubs"];?>" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">
				PROFESSIONAL FEE
			</div>
			<div class="cont-cell">&nbsp;</div>
			<div class="cont-cell">&nbsp;</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">&nbsp;</div>
		</div>
		<?php
		$totprofee = "";
		$doctors = getDoctorsAttend($rid, $pid);
		foreach ($doctors as $d){
			echo '<div class="bill-row">';
			echo '<div class="cont-cell" style="text-align: right;">Dr. '.$d["firstname"].' '.$d["lastname"].', '.$d["title"].'</div>';
			echo '<div class="cont-cell">Php <input type="text" class="bill-field" value="'.$d["professionalfee"].'"  style="width: 120px;"/></div>';
			echo '<div class="cont-cell">&nbsp;</div>';
			echo '<div class="cont-cell" style="border-right: 1px solid #ccc;">&nbsp;</div>';
			echo '</div>';
			$totprofee += $d["professionalfee"];
			}
		?>
		<div class="bill-row">
			<div class="cont-cell">
				Total Professional Fee
			</div>
			<div class="cont-cell">
				Php <input type="text" name="professionalfee" id="professionalfee" class="bill-field" value="<?php echo $b["professionalfee"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phprofessionalfee" id="phprofessionalfee" class="bill-field" disabled="disabled" value="<?php echo $b["phprofessionalfee"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exprofessionalfee" id="exprofessionalfee" class="bill-field" disabled="disabled" value="<?php echo $b["exprofessionalfee"];?>" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">O.R FEE/D.R. FEE</div>
			<div class="cont-cell">
				Php <input type="text" name="orfeedrfee" id="orfeedrfee" class="bill-field" value="<?php echo $b["orfeedrfee"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phorfeedrfee" id="phorfeedrfee" class="bill-field" disabled="disabled" value="<?php echo $b["phorfeedrfee"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exorfeedrfee" id="exorfeedrfee" class="bill-field" disabled="disabled" value="<?php echo $b["exorfeedrfee"];?>" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">OTHERS:</div>
			<div class="cont-cell">&nbsp;</div>
			<div class="cont-cell">&nbsp;</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">&nbsp;</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admission Fee</div>
			<div class="cont-cell">
				Php <input type="text" name="admissionfee" id="admissionfee" class="bill-field" value="<?php echo $b["admissionfee"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				<input type="hidden" name="phadmissionfee" id="phadmissionfee" class="bill-field" disabled="disabled"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exadmissionfee" id="exadmissionfee" class="bill-field" disabled="disabled" value="<?php echo $b["exadmissionfee"];?>" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ward Service</div>
			<div class="cont-cell">
				Php <input type="text" name="wardservice" id="wardservice" class="bill-field" value="<?php echo $b["wardservice"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				<input type="hidden" name="phwardservice" id="phwardservice" class="bill-field" disabled="disabled"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exwardservice" id="exwardservice" class="bill-field" disabled="disabled" value="<?php echo $b["exwardservice"];?>" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Neb. Fee</div>
			<div class="cont-cell">
				Php <input type="text" name="nebfee" id="nebfee" class="bill-field" value="<?php echo $b["nebfee"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				<input type="hidden" name="phnebfee" id="phnebfee" class="bill-field" disabled="disabled"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exnebfee" id="exnebfee" class="bill-field" disabled="disabled" value="<?php echo $b["exnebfee"];?>" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ambulance Fee</div>
			<div class="cont-cell">
				Php <input type="text" name="ambulancefee" id="ambulancefee" class="bill-field" value="<?php echo $b["ambulancefee"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				<input type="hidden" name="phambulancefee" id="phambulancefee" class="bill-field" disabled="disabled"/style="width: 120px;">
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exambulancefee" id="exambulancefee" class="bill-field" disabled="disabled" value="<?php echo $b["exambulancefee"];?>" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell" style="text-align: center;">TOTAL:</div>
			<div class="cont-cell">
				Php <input type="text" name="total" id="total" class="bill-field" disabled="disabled" value="<?php echo $b["total"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phtotal" id="phtotal" class="bill-field" disabled="disabled" value="<?php echo $b["phtotal"];?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="extotal" id="extotal" class="bill-field" disabled="disabled" value="<?php echo $b["extotal"];?>" style="width: 120px;"/>
			</div>
		</div>
	</div>
	<div id="bill-form-holder">
		<div class="bill-row">
			<div class="cont-cell" style="width: 700px; border-right: 1px solid #ccc; text-align: right;">
				Status:
				<select name="status" id="status" class="bill-field" style="width: 100px;">
					<option value="Paid"<?php if($b["status"]=="Paid"){echo ' selected="selected"';}?>>Paid</option>
					<option value="Not Yet Paid"<?php if($b["status"]=="Not Yet Paid"){echo ' selected="selected"';}?>>Not Yet Paid</option>
				</select>
			</div>
		</div>
	</div>
	<div id="bill-form-holder">
		<div class="bill-row">
			<div class="cont-cell" style="width: 700px; border-right: 1px solid #ccc; text-align: right;">
				<input type="hidden" name="nurseonduty" id="nurseonduty" value="<?php echo $persondischarged;?>"/>
				<input type="hidden" name="finaldiagnosis" id="finaldiagnosis" value="<?php echo $finaldiagnosis;?>"/>
				<input type="hidden" name="billingnumber" id="billingnumber" value="<?php echo $lstnumber;?>"/>
				<input type="hidden" name="membership" id="membership" value="<?php echo $membership;?>"/>
				<input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
				<input type="hidden" name="rid" id="rid" value="<?php echo $rid;?>"/>
				<input type="hidden" name="aid" id="aid" value="<?php echo $aid;?>"/>
				<input type="button" value="Generate PDF Report" class="bluebutton" onclick="window.open('pdfbillstatement.php?pbid=<?php echo $b["pbid"];?>&pid=<?php echo $rid;?>&pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&aid=<?php echo $aid;?>', '_blank'); return false;"/>
				<input type="button" value="Cancel" title="Cancel" class="redbutton" onClick="window.location.href='billing.php?ref=dischargedpt'"/>
			</div>
		</div>
	</div>
</div>
<?php }?>
<script>
$('document').ready(function(){
	$('#drugsandmedicine, #supplies, #laboratory, #xray, #ultrasound, #ecg, #oxygen, #accomsubs, #professionalfee, #orfeedrfee, #admissionfee, #wardservice, #nebfee, #ambulancefee').keyup(function(){
		var drugsandmeds = $('#drugsandmedicine').val();
		var supplies = $('#supplies').val();
		var lab = $('#laboratory').val();
		var xray = $('#xray').val();
		var ultrasound = $('#ultrasound').val();
		var ecg = $('#ecg').val();
		var oxygen = $('#oxygen').val();
		var accomsubs = $('#accomsubs').val();
		var proffee = $('#professionalfee').val();
		var ordr = $('#orfeedrfee').val();
		var admission = $('#admissionfee').val();
		var ward = $('#wardservice').val();
		var neb = $('#nebfee').val();
		var ambulance = $('#ambulancefee').val();
		
		var total = Number(drugsandmeds) + Number(supplies) + Number(lab) + Number(xray) + Number(ultrasound) + Number(ecg) + Number(oxygen) + Number(accomsubs) + Number(proffee) + Number(ordr) + Number(admission) + Number(ward) + Number(neb) + Number(ambulance);
		
		if(total < 0){
			$('#total').val('0');
		}else{
			$('#total').val(total);
		}
	});
	
	$('#drugsandmedicine, #supplies, #laboratory, #xray, #ultrasound, #ecg, #oxygen, #accomsubs, #professionalfee, #orfeedrfee, #admissionfee, #wardservice, #nebfee, #ambulancefee').keyup(function(){
		var exdrugsandmeds = $('#exdrugsandmedicines').val();
		var exsupplies = $('#exsupplies').val()
		var exlaboratory = $('#exlaboratory').val();
		var exxray = $('#exxray').val();
		var exultrasound = $('#exultrasound').val();
		var execg = $('#execg').val();
		var exoxygen = $('#exoxygen').val();
		var exaccomsubs = $('#exaccomsubs').val();
		var exprofessionalfee = $('#exprofessionalfee').val();
		var exorfeedrfee = $('#exorfeedrfee').val();
		var exadmissionfee = $('#exadmissionfee').val();
		var exwardservice = $('#exwardservice').val();
		var exnebfee = $('#exnebfee').val();
		var exambulancefee = $('#exambulancefee').val();
		
		var extotal = Number(exdrugsandmeds) + Number(exsupplies) + Number(exlaboratory) + Number(exxray) + Number(exultrasound) + Number(execg) + Number(exoxygen) + Number(exaccomsubs) + Number(exprofessionalfee) + Number(exorfeedrfee) + Number(exadmissionfee) + Number(exwardservice) + Number(exnebfee) + Number(exambulancefee);
		
		if(extotal < 0){
			$('#extotal').val('0');
		}else{
			$('#extotal').val(extotal);
		}
	});
});
</script>
<!--<script type="text/javascript" src="ajax/ajaxBillStatement.js"></script>-->