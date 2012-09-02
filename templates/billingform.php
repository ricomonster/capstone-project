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

$exaccom = "";
$accalctot = $accom - $phaccom;
$accalc = number_format((float)$accalctot, 2, '.', '');
if($exaccom < 0){$exaccom = 0;}else{$exaccom = $accalc;}

$exprofessionalfee = "";
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
			<div class="cont-cell bill-cont-finaldiag" style="width: 100px; border-top: none;"><?php echo $lstnumber;?></div>
		</div>
	</div>	
<form id="bill-form">
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
				Php <input type="text" name="drugsandmedicine" id="drugsandmedicine" class="bill-field" style="width: 120px;" value="<?php echo number_format((float)$tottherafee, 2, '.', '');?>"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phdrugsandmedicine" id="phdrugsandmedicine" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exdrugsandmedicines" id="exdrugsandmedicines" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">SUPPLIES e.g. D/S 3cc..</div>
			<div class="cont-cell">
				Php <input type="text" name="supplies" id="supplies" class="bill-field" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phsupplies" id="phsupplies" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exsupplies" id="exsupplies" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">LABORATORY</div>
			<div class="cont-cell">
				Php <input type="text" name="laboratory" id="laboratory" class="bill-field" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phlaboratory" id="phlaboratory" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exlaboratory" id="exlaboratory" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">X-RAY</div>
			<div class="cont-cell">
				Php <input type="text" name="xray" id="xray" class="bill-field" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phxray" id="phxray" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exxray" id="exxray" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">ULTRASOUND</div>
			<div class="cont-cell">
				Php <input type="text" name="ultrasound" id="ultrasound" class="bill-field" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phultrasound" id="phultrasound" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exultrasound" id="exultrasound" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">ECG</div>
			<div class="cont-cell">
				Php <input type="text" name="ecg" id="ecg" class="bill-field" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phecg" id="phecg" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="execg" id="execg" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">OXYGEN</div>
			<div class="cont-cell">
				Php <input type="text" name="oxygen" id="oxygen" class="bill-field" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phoxygen" id="phoxygen" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exoxygen" id="exoxygen" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">ACCOM./SUBS.</div>
			<div class="cont-cell">
				Php <input type="text" name="accomsubs" id="accomsubs" class="bill-field" style="width: 120px;" value="<?php echo number_format((float)$accom, 2, '.', '');?>"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phaccomsubs" id="phaccomsubs" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exaccomsubs" id="exaccomsubs" class="bill-field" disabled="disabled" style="width: 120px;"/>
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
				Php <input type="text" name="professionalfee" id="professionalfee" class="bill-field" value="<?php echo number_format((float)$totprofee, 2, '.', '');?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phprofessionalfee" id="phprofessionalfee" class="bill-field" disabled="disabled" value="<?php echo $phprofessionalfee;?>" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exprofessionalfee" id="exprofessionalfee" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">O.R FEE/D.R. FEE</div>
			<div class="cont-cell">
				Php <input type="text" name="orfeedrfee" id="orfeedrfee" class="bill-field" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phorfeedrfee" id="phorfeedrfee" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exorfeedrfee" id="exorfeedrfee" class="bill-field" disabled="disabled" style="width: 120px;"/>
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
				Php <input type="text" name="admissionfee" id="admissionfee" class="bill-field" style="width: 120px;" value="100.00"/>
			</div>
			<div class="cont-cell">
				<input type="hidden" name="phadmissionfee" id="phadmissionfee" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exadmissionfee" id="exadmissionfee" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ward Service</div>
			<div class="cont-cell">
				Php <input type="text" name="wardservice" id="wardservice" class="bill-field" style="width: 120px;" value="112.00"/>
			</div>
			<div class="cont-cell">
				<input type="hidden" name="phwardservice" id="phwardservice" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exwardservice" id="exwardservice" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Neb. Fee</div>
			<div class="cont-cell">
				Php <input type="text" name="nebfee" id="nebfee" class="bill-field" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				<input type="hidden" name="phnebfee" id="phnebfee" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exnebfee" id="exnebfee" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ambulance Fee</div>
			<div class="cont-cell">
				Php <input type="text" name="ambulancefee" id="ambulancefee" class="bill-field" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				<input type="hidden" name="phambulancefee" id="phambulancefee" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="exambulancefee" id="exambulancefee" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
		</div>
		<div class="bill-row">
			<div class="cont-cell" style="text-align: center;">TOTAL:</div>
			<div class="cont-cell">
				Php <input type="text" name="total" id="total" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
			<div class="cont-cell">
				Php <input type="text" name="phtotal" id="phtotal" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
			<div class="cont-cell" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="extotal" id="extotal" class="bill-field" disabled="disabled" style="width: 120px;"/>
			</div>
		</div>
	</div>
	<div id="bill-form-holder">
		<div class="bill-row">
			<div class="cont-cell" style="width: 700px; border-right: 1px solid #ccc; text-align: right;">
				Status:
				<select name="status" id="status" class="bill-field" style="width: 100px;">
					<option value="Paid">Paid</option>
					<option value="Not Yet Paid">Not Yet Paid</option>
				</select>
			</div>
		</div>
	</div>
	<div id="bill-form-holder">
		<div class="bill-row">
		<?php
		if(empty($_SERVER['HTTP_REFERER'])){
			$prevpage = "billing.php";
		}else{
			$prevpage = $_SERVER['HTTP_REFERER'];
		}
		?>
			<div class="cont-cell" style="width: 700px; border-right: 1px solid #ccc; text-align: right;">
				<input type="hidden" name="nurseonduty" id="nurseonduty" value="<?php echo $persondischarged;?>"/>
				<input type="hidden" name="finaldiagnosis" id="finaldiagnosis" value="<?php echo $finaldiagnosis;?>"/>
				<input type="hidden" name="billingnumber" id="billingnumber" value="<?php echo $lstnumber;?>"/>
				<input type="hidden" name="membership" id="membership" value="<?php echo $membership;?>"/>
				<input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
				<input type="hidden" name="rid" id="rid" value="<?php echo $rid;?>"/>
				<input type="hidden" name="aid" id="aid" value="<?php echo $aid;?>"/>
				<input type="button" value="Cancel" title="Cancel" class="redbutton" onClick="window.location.href='<?php echo $prevpage;?>'"/>
				<input type="submit" name="subBillStat" id="subBillStat" value="Patient Ready for Discharge!" class="greenbutton"/>
			</div>
		</div>
	</div>
	</form>
</div>
<script>
$('document').ready(function(){
	<?php if(!empty($thera)){ ?>
	var dm = $('#drugsandmedicine').val();
	var phdm = <?php echo $phdrugsandmedicines;?>;
	var phdm = <?php echo $phdrugsandmedicines;?>;
	var exdm = (dm - phdm).toFixed(2);
	
	if(exdm < 0){
		$('#exdrugsandmedicines').val('0.00');
		$('#phdrugsandmedicine').val(phdm.toFixed(2));
	}else{
		$('#exdrugsandmedicines').val(exdm);
		$('#phdrugsandmedicine').val(phdm.toFixed(2));
	}
	<?php } ?>
	$('input#drugsandmedicine').blur(function() {
		var amt = parseFloat(this.value);
		if($('#drugsandmedicine').val() != 0 || $('#drugsandmedicine').val()!=''){
			$('#drugsandmedicine').val(amt.toFixed(2));
		}
	});
	$('input#drugsandmedicine').keyup(function() {
	if($('#drugsandmedicine').val() == 0 || $('#drugsandmedicine').val()==''){
			$('#drugsandmedicine').val('');
			$('#exdrugsandmedicines').val('');
			$('#phdrugsandmedicine').val('');
	}else{
		var dm = $('#drugsandmedicine').val();
		var phdm = <?php echo $phdrugsandmedicines;?>;
		var exdm = (dm - phdm).toFixed(2);
		
		if(exdm < 0){
			$('#exdrugsandmedicines').val('0');
			$('#phdrugsandmedicine').val(phdm.toFixed(2));
		}else{
			$('#exdrugsandmedicines').val(exdm);
			$('#phdrugsandmedicine').val(phdm.toFixed(2));
		}
	}
	});
	
	$('input#supplies').blur(function() {
		var amt = parseFloat(this.value);
		if($('#supplies').val() != 0 || $('#supplies').val()!=''){
			$('#supplies').val(amt.toFixed(2));
		}
	});
	$('input#supplies').keyup(function() {
	if($('#supplies').val() == 0 || $('#supplies').val()==''){
			$('#supplies').val('');
			$('#exsupplies').val('');
			$('#phsupplies').val('');
	}else{
		var dm = $('#supplies').val();
		var phdm = <?php echo $phsupplies;?>;
		var exdm = (dm - phdm).toFixed(2);
		
		if(exdm < 0){
			$('#exsupplies').val('0');
			$('#phsupplies').val(phdm.toFixed(2));
		}else{
			$('#exsupplies').val(exdm);
			$('#phsupplies').val(phdm.toFixed(2));
		}
	}
	});
	
	
	$('input#laboratory').blur(function() {
		var amt = parseFloat(this.value);
		if($('#laboratory').val() != 0 || $('#laboratory').val()!=''){
			$('#laboratory').val(amt.toFixed(2));
		}
	});
	$('input#laboratory').keyup(function() {
	if($('#laboratory').val() == 0 || $('#laboratory').val()==''){
			$('#laboratory').val('');
			$('#exlaboratory').val('');
			$('#phlaboratory').val('');
	}else{
		var dm = $('#laboratory').val();
		var phdm = <?php echo $phlaboratory;?>;
		var exdm = (dm - phdm).toFixed(2);
		
		if(exdm < 0){
			$('#exlaboratory').val('0');
			$('#phlaboratory').val(phdm.toFixed(2));
		}else{
			$('#exlaboratory').val(exdm);
			$('#phlaboratory').val(phdm.toFixed(2));
		}
	}
	});
	
	$('input#xray').blur(function() {
		var amt = parseFloat(this.value);
		if($('#xray').val() != 0 || $('#xray').val()!=''){
			$('#xray').val(amt.toFixed(2));
		}
	});
	$('input#xray').keyup(function() {
	if($('#xray').val() == 0 || $('#xray').val()==''){
			$('#xray').val('');
			$('#exxray').val('');
			$('#phxray').val('');
	}else{
		var dm = $('#xray').val();
		var phdm = <?php echo $phxray;?>;
		var exdm = (dm - phdm).toFixed(2);
		
		if(exdm < 0){
			$('#exxray').val('0');
			$('#phxray').val(phdm.toFixed(2));
		}else{
			$('#exxray').val(exdm);
			$('#phxray').val(phdm.toFixed(2));
		}
	}
	});
	
	$('input#ultrasound').blur(function() {
		var amt = parseFloat(this.value);
		if($('#ultrasound').val() != 0 || $('#ultrasound').val()!=''){
			$('#ultrasound').val(amt.toFixed(2));
		}
	});
	$('input#ultrasound').keyup(function() {
	if($('#ultrasound').val() == 0 || $('#ultrasound').val()==''){
			$('#ultrasound').val('');
			$('#exultrasound').val('');
			$('#phultrasound').val('');
	}else{
		var dm = $('#ultrasound').val();
		var phdm = <?php echo $phultrasound;?>;
		var exdm = (dm - phdm).toFixed(2);
		
		if(exdm < 0){
			$('#exultrasound').val('0');
			$('#phultrasound').val(phdm.toFixed(2));
		}else{
			$('#exultrasound').val(exdm);
			$('#phultrasound').val(phdm.toFixed(2));
		}
	}
	});
	
	$('input#ecg').blur(function() {
		var amt = parseFloat(this.value);
		if($('#ecg').val() != 0 || $('#ecg').val()!=''){
			$('#ecg').val(amt.toFixed(2));
		}
	});
	$('input#ecg').keyup(function() {
	if($('#ecg').val() == 0 || $('#ecg').val()==''){
			$('#ecg').val('');
			$('#execg').val('');
			$('#phecg').val('');
	}else{
		var dm = $('#ecg').val();
		var phdm = <?php echo $phecg;?>;
		var exdm = (dm - phdm).toFixed(2);
		
		if(exdm < 0){
			$('#execg').val('0');
			$('#phecg').val(phdm.toFixed(2));
		}else{
			$('#execg').val(exdm);
			$('#phecg').val(phdm.toFixed(2));
		}
	}
	});
	
	$('input#oxgen').blur(function() {
		var amt = parseFloat(this.value);
		if($('#oxygen').val() != 0 || $('#oxygen').val()!=''){
			$('#oxygen').val(amt.toFixed(2));
		}
	});
	$('input#oxygen').keyup(function() {
	if($('#oxygen').val() == 0 || $('#oxygen').val()==''){
			$('#oxygen').val('');
			$('#exoxygen').val('');
			$('#phoxygen').val('');
	}else{
		var dm = $('#oxygen').val();
		var phdm = <?php echo $phoxygen;?>;
		var exdm = (dm - phdm).toFixed(2);
		
		if(exdm < 0){
			$('#exoxygen').val('0');
			$('#phoxygen').val(phdm.toFixed(2));
		}else{
			$('#exoxygen').val(exdm);
			$('#phoxygen').val(phdm.toFixed(2));
		}
	}
	});
	var accomfee = $('#accomsubs').val();
	var phbenaccom = <?php echo $phaccom;?>;
	var exaccom = (accomfee - phbenaccom).toFixed(2);
	$('#exaccomsubs').val(exaccom);
	$('#phaccomsubs').val(phbenaccom.toFixed(2));
		
	$('input#accomsubs').blur(function() {	
		var amt = parseFloat(this.value);
		if($('#accomsubs').val() != 0 || $('#accomsubs').val()!=''){
			$('#accomsubs').val(amt.toFixed(2));
		}
	});
	$('input#accomsubs').keyup(function() {
	if($('#accomsubs').val() == 0 || $('#accomsubs').val()==''){
			$('#accomsubs').val('');
			$('#exaccomsubs').val('');
			$('#phaccomsubs').val('');
	}else{
		var dm = $('#accomsubs').val();
		var phdm = <?php echo $phaccom;?>;
		var exdm = (dm - phdm).toFixed(2);
		
		if(exdm < 0){
			$('#exaccomsubs').val('0');
			$('#phaccomsubs').val(phdm.toFixed(2));
		}else{
			$('#exaccomsubs').val(exdm);
			$('#phaccomsubs').val(phdm.toFixed(2));
		}
	}
	});
	
	var proffee = $('#professionalfee').val();
	var phben = <?php echo $phprofessionalfee;?>;
	var exprof = (proffee - phben).toFixed(2);
	$('#exprofessionalfee').val(exprof);
	
	$('input#professionalfee').blur(function() {
		var amt = parseFloat(this.value);
		if($('#professionalfee').val() != 0 || $('#professionalfee').val()!=''){
			$('#professionalfee').val(amt.toFixed(2));
		}
	});
	$('input#professionalfee').keyup(function() {
	if($('#professionalfee').val() == 0 || $('#professionalfee').val()==''){
			$('#professionalfee').val('');
			$('#exprofessionalfee').val('');
			$('#phprofessionalfee').val('');
	}else{
		var dm = $('#professionalfee').val();
		var phdm = <?php echo $phprofessionalfee;?>;
		var exdm = (dm - phdm).toFixed(2);
		
		if(exdm < 0){
			$('#exprofessionalfee').val('0');
			$('#phprofessionalfee').val(phdm.toFixed(2));
		}else{
			$('#exprofessionalfee').val(exdm);
			$('#phprofessionalfee').val(phdm.toFixed(2));
		}
	}
	});
	
	$('input#orfeedrfee').blur(function() {
		var amt = parseFloat(this.value);
		if($('#orfeedrfee').val() != 0 || $('#orfeedrfee').val()!=''){
			$('#orfeedrfee').val(amt.toFixed(2));
		}
	});
	$('input#orfeedrfee').keyup(function() {
	if($('#orfeedrfee').val() == 0 || $('#orfeedrfee').val()==''){
			$('#orfeedrfee').val('');
			$('#exorfeedrfee').val('');
			$('#phorfeedrfee').val('');
	}else{
		var dm = $('#orfeedrfee').val();
		var phdm = <?php echo $phorfeedrfee;?>;
		var exdm = (dm - phdm).toFixed(2);
		
		if(exdm < 0){
			$('#exorfeedrfee').val('0');
			$('#phorfeedrfee').val(phdm.toFixed(2));
		}else{
			$('#exorfeedrfee').val(exdm);
			$('#phorfeedrfee').val(phdm.toFixed(2));
		}
	}
	});
	var contad = $('#admissionfee').val();
	$('#exadmissionfee').val(contad);
	$('input#admissionfee').blur(function() {
		var amt = parseFloat(this.value);
		if($('#admissionfee').val() != 0 || $('#admissionfee').val()!=''){
			$('#admissionfee').val(amt.toFixed(2));
		}
	});
	$('#admissionfee').keyup(function(){
		var dm = $('#admissionfee').val();
		var phdm = $('#phadmissionfee').val();
		var exdm = (dm - phdm).toFixed(2);
		if(exdm < 0 || dm == ''){
			$('#exadmissionfee').val('0');
		}else{
			$('#exadmissionfee').val(exdm);
		}
	});
	
	var contward = $('#wardservice').val();
	$('#exwardservice').val(contward);
	
	$('input#wardservice').blur(function() {
		var amt = parseFloat(this.value);
		if($('#wardservice').val() != 0 || $('#wardservice').val()!=''){
			$('#wardservice').val(amt.toFixed(2));
		}
	});
	$('#wardservice').keyup(function(){
		var dm = $('#wardservice').val();
		var phdm = $('#phwardservice').val();
		var exdm = (dm - phdm).toFixed(2);
		if(exdm < 0 || dm == ''){
			$('#exwardservice').val('0');
		}else{
			$('#exwardservice').val(exdm);
		}
	});
	
	$('input#nebfee').blur(function() {
		var amt = parseFloat(this.value);
		if($('#nebfee').val() != 0 || $('#nebfee').val()!=''){
			$('#nebfee').val(amt.toFixed(2));
		}
	});
	$('#nebfee').keyup(function(){
		var dm = $('#nebfee').val();
		var phdm = $('#phnebfee').val();
		var exdm = (dm - phdm).toFixed(2);
		if(exdm < 0 || dm == ''){
			$('#exnebfee').val('0');
		}else{
			$('#exnebfee').val(exdm);
		}
	});
	
	$('input#ambulancefee').blur(function() {
		var amt = parseFloat(this.value);
		if($('#ambulancefee').val() != 0 || $('#ambulancefee').val()!=''){
			$('#ambulancefee').val(amt.toFixed(2));
		}
	});
	$('#ambulancefee').keyup(function(){
		var dm = $('#ambulancefee').val();
		var phdm = $('#phambulancefee').val();
		var exdm = (dm - phdm).toFixed(2);
		if(exdm < 0 || dm == ''){
			$('#exambulancefee').val('0');
		}else{
			$('#exambulancefee').val(exdm);
		}
	});
	
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
		var totalamt = parseFloat(total);
		if(total < 0){
			$('#total').val('0');
		}else{
			$('#total').val(totalamt.toFixed(2));
		}
	});
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
		var totalamt = parseFloat(total);
		if(total < 0){
			$('#total').val('0');
		}else{
			$('#total').val(totalamt.toFixed(2));
		}
	
	$('#drugsandmedicine, #supplies, #laboratory, #xray, #ultrasound, #ecg, #oxygen, #accomsubs, #professionalfee, #orfeedrfee, #admissionfee, #wardservice, #nebfee, #ambulancefee').keyup(function(){
		var exdrugsandmeds = $('#exdrugsandmedicines').val();
		var exsupplies = $('#exsupplies').val();
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
		
		var etotal = Number(exdrugsandmeds) + Number(exsupplies) + Number(exlaboratory) + Number(exxray) + Number(exultrasound) + Number(execg) + Number(exoxygen) + Number(exaccomsubs) + Number(exprofessionalfee) + Number(exorfeedrfee) + Number(exadmissionfee) + Number(exwardservice) + Number(exnebfee) + Number(exambulancefee);
		var extotal = parseFloat(etotal);
		if(etotal < 0){
			$('#extotal').val('0');
		}else{
			$('#extotal').val(extotal.toFixed(2));
		}
	});
	var exdrugsandmeds = $('#exdrugsandmedicines').val();
	var exsupplies = $('#exsupplies').val();
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
		
	var etotal = Number(exdrugsandmeds) + Number(exsupplies) + Number(exlaboratory) + Number(exxray) + Number(exultrasound) + Number(execg) + Number(exoxygen) + Number(exaccomsubs) + Number(exprofessionalfee) + Number(exorfeedrfee) + Number(exadmissionfee) + Number(exwardservice) + Number(exnebfee) + Number(exambulancefee);
	var extotal = parseFloat(etotal);
	if(etotal < 0){
		$('#extotal').val('0');
	}else{
		$('#extotal').val(extotal.toFixed(2));
	}
	
	$('#drugsandmedicine, #supplies, #laboratory, #xray, #ultrasound, #ecg, #oxygen, #accomsubs, #professionalfee, #orfeedrfee').keyup(function(){
		var phdrugsandmeds = $('#phdrugsandmedicine').val();
		var phsupplies = $('#phsupplies').val()
		var phlaboratory = $('#phlaboratory').val();
		var phxray = $('#phxray').val();
		var phultrasound = $('#phultrasound').val();
		var phecg = $('#phecg').val();
		var phoxygen = $('#phoxygen').val();
		var phaccomsubs = $('#phaccomsubs').val();
		var phprofessionalfee = $('#phprofessionalfee').val();
		var phorfeedrfee = $('#phorfeedrfee').val();
		
		var ephtotal = Number(phdrugsandmeds) + Number(phsupplies) + Number(phlaboratory) + Number(phxray) + Number(phultrasound) + Number(phecg) + Number(phoxygen) + Number(phaccomsubs) + Number(phprofessionalfee) + Number(phorfeedrfee);
		
		var phtotal = parseFloat(ephtotal);
		if(ephtotal < 0){
			$('#phtotal').val('0');
		}else{
			$('#phtotal').val(phtotal.toFixed(2));
		}
	});
	var phdrugsandmeds = $('#phdrugsandmedicine').val();
	var phsupplies = $('#phsupplies').val()
	var phlaboratory = $('#phlaboratory').val();
	var phxray = $('#phxray').val();
	var phultrasound = $('#phultrasound').val();
	var phecg = $('#phecg').val();
	var phoxygen = $('#phoxygen').val();
	var phaccomsubs = $('#phaccomsubs').val();
	var phprofessionalfee = $('#phprofessionalfee').val();
	var phorfeedrfee = $('#phorfeedrfee').val();
		
	var ephtotal = Number(phdrugsandmeds) + Number(phsupplies) + Number(phlaboratory) + Number(phxray) + Number(phultrasound) + Number(phecg) + Number(phoxygen) + Number(phaccomsubs) + Number(phprofessionalfee) + Number(phorfeedrfee);
		
	var phtotal = parseFloat(ephtotal);
	if(ephtotal < 0){
		$('#phtotal').val('0');
	}else{
		$('#phtotal').val(phtotal.toFixed(2));
	}
});
</script>
<script type="text/javascript" src="ajax/ajaxBillStatement.js"></script>