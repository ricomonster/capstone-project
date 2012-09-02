<div class="admittedHolder">
	<span class="pageTitle">Patient Information and Record</span>
	<div id="ptInfo">
		<div id="infoPtHolder">
			<div class="infoHolderLong">
				<div class="infoRowLong">
					<div class="titleCell long-title" style="border-top: 1px solid #ccc;">Patient ID:</div>
					<div class="contentCell long" style="border-top: 1px solid #ccc;"><?php echo $opdnum;?></div>
				</div>
			</div>
			<div class="infoHolder">
				<div class="infoRow">
					<div class="titleCell">First Name:</div>
					<div class="contentCell normal"><?php echo $firstname;?></div>
					<div class="titleCell">Middle Name:</div>
					<div class="contentCell normal"><?php echo $middlename;?></div>
					<div class="titleCell">Last Name:</div>
					<div class="contentCell normal-border-right"><?php echo $lastname;?></div>
				</div>
				<div class="infoRow">
					<div class="titleCell">Membership:</div>
					<div class="contentCell normal"><?php echo $membership;?></div>
					<div class="titleCell">Sex:</div>
					<div class="contentCell normal"><?php echo $sex;?></div>
					<div class="titleCell">Civil Status:</div>
					<div class="contentCell normal-border-right"><?php echo $cs;?></div>
				</div>
			</div>
			<div class="infoHolderLong">
				<div class="infoRowLong">
					<div class="titleCell long-title">Date of Birth:</div>
					<div class="contentCell long"><?php echo $dateofbirth;?></div>
				</div>
			</div>
		</div>
		
		<div id="recPtHolder">
			<div class="infoHolderLong">
				<div class="infoRowLong">
					<div class="titleCell long-title" style="border-top: 1px solid #ccc;">Date Admitted:</div>
					<div class="contentCell long" style="border-top: 1px solid #ccc;"><?php echo $dateadmitted;?></div>
				</div>
			</div>
			<div class="infoHolderLong">
				<div class="infoRowLong">
					<div class="titleCell long-title-doc">Doctor/s:</div>
					<div class="contentCell long-doc">
						<?php
						$doctors = getDoctorsAttend($rid, $pid);
						foreach ($doctors as $d){
							echo 'Dr. '.$d["firstname"].' '.$d["lastname"].', '.$d["title"] . '('.$d["task"].')<br/>';
						}
						?>
					</div>
				</div>
			</div>
			<div class="infoHolderLong">
				<div class="infoRowLong">
					<div class="titleCell long-title">Room No.:</div>
					<div class="contentCell long"><?php echo $roomno;?></div>
				</div>
			</div>
			<div class="infoHolder">
				<div class="infoRow">
					<div class="titleCell">Age:</div>
					<div class="contentCell normal"><?php echo $age;?></div>
					<div class="titleCell">Time In:</div>
					<div class="contentCell normal"><?php echo $timein;?></div>
					<div class="contentCell">&nbsp;</div>
					<div class="contentCell normal-border-right">&nbsp;</div>
				</div>
				<div class="infoRow">
					<div class="titleCell">BP:</div>
					<div class="contentCell normal"><?php echo $bp;?> mmHg</div>
					<div class="titleCell">CR:</div>
					<div class="contentCell normal"><?php echo $cr;?> pulse/min</div>
					<div class="titleCell">RR:</div>
					<div class="contentCell normal-border-right"><?php echo $rr;?> breathes/min</div>
				</div>
			</div>
			<div class="infoHolderLong">
				<div class="infoRowDual">
					<div class="titleCell dual-title">Temp:</div>
					<div class="contentCell dual"><?php echo $temp;?>&deg;C</div>
					<div class="titleCell dual-title">Weight:</div>
					<div class="contentCell dual-border-right"><?php echo $weight;?> kg</div>
				</div>
			</div>
			<div class="infoHolderLong">
				<div class="infoRowLong">
					<div class="titleCell long-title">Chief Complaint:</div>
					<div class="contentCell long"><?php echo nl2br($complaint);?></div>
				</div>
			</div>
			<div class="infoHolderLong">
				<div class="infoRowLong">
					<div class="titleCell long-title">Remarks:</div>
					<div class="contentCell long"><?php echo nl2br($remarks);?></div>
				</div>
			</div>
		</div>
		<?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?>
		<div id="buttonHolder">
			<!--<input type="button" id="forsurgery" name="forsurgery" value="Patient is for Surgery" class="redbutton"/>-->
			<input type="button" id="transfer-bed" name="transfer-bed" value="Transfer Room" class="whitebutton"/>
			<input type="button" id="referPt" name="referPt" value="Add Doctor" class="bluebutton"/>
			<?php
			if (checkPatientForDischarge($pid, $rid)===true){
			?>
			<input type="button" id="dischargePt" name="dischargePt" value="Discharge Patient" class="greenbutton"/>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
	
	<!--<div id="patient-surgery-holder" style="display: none;">
		<div id="patient-surgery-wrapper">
			<span class="pageTitle">Patient will Undergo Surgery</span>
			<form id="surgery-form">
				<div class="infoHolderLong">
					<div class="infoRowLong">
						<div class="titleCell" style="border-top: 1px solid #ccc;">Procedure to be Done:</div>
						<div class="contentCell" style="border-top: 1px solid #ccc; border-right:1px solid #ccc;">
							<select name="procedure" class="sel-refer" style="width: 100px;">
								<option value="">Select:</option>
								<option value="Abortion">Abortion</option>
								<option value="Euthanasia">Euthanasia</option>
							</select>
						</div>
					</div>
					<div class="infoRowLong">
						<div class="titleCell">Surgeon:</div>
						<div class="contentCell" style="border-right:1px solid #ccc;"></div>
					</div>
				</div>
			</form>
		</div>
	</div>-->
	
	<div id="refer-to-doc" style="display: none;">
		<div id="refer-to-doc-wrapper">
			<span class="pageTitle">Add Doctor:</span>
			<form id="select-doctor">
				<div class="infoHolderLong">
					<div class="infoRowLong">
						<div class="titleCell" style="border-top: 1px solid #ccc; width: 230px;">
							Choose Doctor to Add:
						</div>
						<div class="contentCell" style="border-top: 1px solid #ccc; border-right: 1px solid #ccc; width: 450px;">
							<select name="doc-refer" id="doc-refer" class="sel-refer" style="width: 200px;">
								<?php
								$getAv = getAllAvDoctors();
								foreach ($getAv as $av){
								?>
								<option value="<?php echo $av["did"];?>">Dr. <?php echo $av["firstname"];?> <?php echo $av["lastname"];?>, <?php echo $av["title"];?></option>
								<?php } ?>
							</select>
							<select name="doc-task" id="doc-task" class="sel-refer" style="width: 170px;">
								<option value="">Select Doctor's Task</option>
								<option value="Surgeon">Surgeon</option>
								<option value="Attending">Attending</option>
								<option value="Admitting">Admitting</option>
								<option value="Anesthesiologist">Anesthesiologist</option>
								<option value="Medical Specialist">Medical Specialist</option>
								<option value="Resident-in-Charge">Resident-in-Charge</option>
								<option value="Senior Resident/Head">Senior Resident/Head</option>
								<option value="Cleared the Patient for Surgery">Cleared the Patient for Surgery</option>
								<option value="Cleared Patient for Discharge">Cleared Patient for Discharge</option>
							</select>
						</div>
					</div>
					<div class="infoRowLong">
						<div class="contentCell">
							&nbsp;
							<input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
							<input type="hidden" name="rid" id="rid" value="<?php echo $rid;?>"/>
							<input type="hidden" name="aid" id="aid" value="<?php echo $aid;?>"/>
						</div>
						<div class="contentCell long" style="border-left:none; text-align: right;">
							<input type="submit" id="subRefer" name="subRefer" value="Add" title="Add Doctor" class="greenbutton"/>
							<input type="button" id="cancelRef" name="cancelRef" value="Cancel" title="Cancel" class="redbutton"/>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	<div id="transfer-bed-holder">
		<div id="transfer-bed-wrapper">
			<span class="pageTitle">Transfer Patient:</span>
			<form id="transfer-bed-form" style="width: 450px; margin:auto;">
				<input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
				<input type="hidden" name="rid" id="rid" value="<?php echo $rid;?>"/>
				<input type="hidden" name="aid" id="aid" value="<?php echo $aid;?>"/>
				<input type="hidden" name="dateadmitted" id="dateadmitted" value="<?php echo $getdatead;?>"/>
				<input type="hidden" name="prevbed" id="prevbed" value="<?php echo $bednum;?>"/>
			
				<div class="infoHolderLong">
					<div class="infoRowLong">
						<div class="titleCell" style="width: 160px; border-top: 1px solid #ccc;">Transfer Patient to Room:</div>
						<div class="contentCell" style="width: 265px; border-top: 1px solid #ccc; border-right: 1px solid #ccc;">
							<select name="roomtype" id="roomtype" class="bed-sel" style="width: 170px;">
								<option value="Ward">Ward</option>
								<option value="Private Room">Private Room</option>
								<option value="Private Room w/ Air-con">Private Room w/ Aircon</option>
							</select>
						</div>
					</div>
					<div class="infoRowLong">
						<div class="titleCell" style="width: 160px;">Transfer Patient to Bed:</div>
						<div class="contentCell" style="width: 265px; border-right: 1px solid #ccc;">
							<div id="wardroom">
										<select name="bednum_wd" id="bednum_wd" class="bed-sel">
											<option value="">Select:</option>
										<?php
										$wdbdList = getAvBed("Ward");
										if (empty($wdbdList)){
											echo 'The are no available Private Rooms';
										}else{
										foreach ($wdbdList as $bd){
										?>
											<option value="<?php echo $bd["bid"];?>"><?php echo $bd["bednumber"];?></option>
										<?php } }?>
										</select>
									</div>
									
									<div id="prroom">
										<select name="bednum_pr" id="bednum_pr" class="bed-sel">
											<option value="">Select:</option>
										<?php
										$prbdList = getAvBed("Private Room");
										if (empty($prbdList)){
											echo 'The are no available Private Rooms';
										}else{
										foreach ($prbdList as $bd){
										?>
											<option value="<?php echo $bd["bid"];?>"><?php echo $bd["bednumber"];?></option>
										<?php } } ?>
										</select>
									</div>
									
									<div id="praroom">
										<select name="bednum_pra" id="bednum_pra" class="bed-sel">
											<option value="">Select:</option>
										<?php
										$prabdList = getAvBed("Private Room w/ Air-Con");
										if (empty($prabdList)){
											echo 'The are no available Private Rooms';
										}else{
											foreach ($prabdList as $bd){
										?>
											<option value="<?php echo $bd["bid"];?>"><?php echo $bd["bednumber"];?></option>
										<?php } } ?>
										</select>
									</div>
								</div>
						</div>
					</div>
					<div class="infoRowLong">
						<div class="contentCell" style="width: 160px;">&nbsp;</div>
						<div class="contentCell" style="width: 265px; border-right: 1px solid #ccc;">
								<input type="submit" name="sub-trans-pt" id="sub-trans-pt" title="Transfer Patient" value="Transfer Patient" class="greenbutton"/>
								<input type="button" id="cancel-trans" name="cancel-trans" value="Cancel" title="Cancel" class="redbutton"/>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	<div id="discharge-pt-holder">
		<div id="discharge-pt-wrapper">
			<span class="pageTitle">Discharging Patient</span>
			<?php if(checkExistingHxPt($pid, $rid, $aid)===false || checkExistingThera($pid, $rid, $aid)===false || checkClinicalFace($pid, $rid, $aid)===false || checkDocOrders($pid, $rid, $aid)===false || checkProgNotes($pid, $rid, $aid)===false || checkNurseNotes($pid, $rid, $aid)===false || checkIvf($pid, $rid, $aid)===false){?>
			<div id="msgbox" style="text-align:left; width: 330px; margin: auto; padding: 5px; color:#dd4b39;">
				<?php if(checkExistingHxPt($pid, $rid, $aid)===false){echo '&bull; History and Physical Examination Form is not filled up<br/>';}?>
				<?php if(checkExistingThera($pid, $rid, $aid)===false){echo '&bull; Therapeutics Form is not filled up<br/>';}?>
				<?php if(checkClinicalFace($pid, $rid, $aid)===false){echo '&bull; The Clinical Face sheet is not yet filled up.<br/>';} ?>
				<?php if(checkDocOrders($pid, $rid, $aid)===false){echo '&bull; The Doctors Orders Form is not filled up.<br/>';}?>
				<?php if(checkProgNotes($pid, $rid, $aid)===false){echo '&bull; The Progress Notes Forms is not filled up.<br/>';}?>
				<?php if(checkNurseNotes($pid, $rid, $aid)===false){echo '&bull; The Nurse Notes is not filled up.<br/>';}?>
				<?php if(checkIvf($pid, $rid, $aid)===false){echo '&bull; The IVF Consumption Forms is not filled up.<br/>';}?>
			</div>
			<?php }else{ ?>
			<div id="msgbox" style="text-align:left; width: 330px; margin: auto; padding: 5px; font-weight: bold;">
				You are about to discharge the patient.
			</div>
			<?php } ?>
			<form id="transfer-bed-form" style="width: 290px; margin:auto;">
				<input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
				<input type="hidden" name="rid" id="rid" value="<?php echo $rid;?>"/>
				<input type="hidden" name="aid" id="aid" value="<?php echo $aid;?>"/>
				<input type="hidden" name="bednum" id="bednum" value="<?php echo $bednum;?>"/>
			
				<div class="infoHolderLong">
					<div class="infoRowLong">
						<div class="titleCell" style="width: 300px; border-top: 1px solid #ccc; border-right: 1px solid #ccc; text-align: left;">
								Person who will Discharge:
						</div>
					</div>
				</div>
				<div class="infoHolderLong">
					<div class="infoRowLong">
						<div class="contentCell" style="width: 300px; border-right: 1px solid #ccc;">
							<input type="text" name="persondischarging" id="persondischarging" class="c-text" style="width: 275px;"/>
						</div>
					</div>
				</div>
				<div class="infoHolderLong">
					<div class="infoRowLong">
						<div class="contentCell" style="width: 300px; border-right: 1px solid #ccc; text-align: right;">
								<input type="submit" name="discharge-pt" id="discharge-pt" title="Discharge Patient" value="Discharge Patient" class="greenbutton"/>
								<input type="button" id="cancel-dis" name="cancel-dis" value="Cancel" title="Cancel" class="redbutton"/>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
$("#wardroom").hide(0);
$("#prroom").hide(0);
$("#praroom").hide(0);
$(document).ready(function(){
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
		else if (get == "Private Room w/ Air-con"){
			$("#wardroom").fadeOut(500);
			$("#prroom").fadeOut(500);
			$("#praroom").delay(500).fadeIn(500);
		}
	});
	
	$("#referPt").click(function() {		
		$("#ptInfo").slideUp(1000);
		$("#refer-to-doc").slideDown(1000);
		$('body,html').animate({scrollTop:0},800);
	});
	
	$("#cancelRef").click(function() {		
		$("#refer-to-doc").slideUp(1000);
		$("#ptInfo").slideDown(1000);
	});
});
</script>
<script>
$(document).ready(function(){
	$("#transfer-bed-holder").hide(0);
	$("#transfer-bed").click(function() {		
		$("#ptInfo").slideUp(1000);
		$("#transfer-bed-holder").slideDown(1000);
		$('body,html').animate({scrollTop:0},800);
	});
	
	$("#cancel-trans").click(function() {		
		$("#transfer-bed-holder").slideUp(1000);
		$("#ptInfo").slideDown(1000);
	});
});
</script>
<script>
$(document).ready(function(){
	$("#discharge-pt-holder").hide(0);
	$("#dischargePt").click(function() {		
		$("#ptInfo").slideUp(1000);
		$("#discharge-pt-holder").slideDown(1000);
		$('body,html').animate({scrollTop:0},800);
	});
	
	$("#cancel-dis").click(function() {		
		$("#discharge-pt-holder").slideUp(1000);
		$("#ptInfo").slideDown(1000);
	});
});
</script>
<script type="text/javascript">
$("document").ready(function(){	
	$("#subRefer").click(function(){
		$('#waiting').slideDown(500);
		$('#message').hide(0);
			
		$.ajax({
				type : 'POST',
				url : 'dofiles/doReferDoctor.php',
				dataType : 'json',
				data: {
					pid : $('#pid').val(),
					rid : $('#rid').val(),
					aid : $('#aid').val(),
					docrefer : $('#doc-refer').val(),
					doctask : $('#doc-task').val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#select-doctor').show(500);
						}else{
							window.location.href = data.msg;
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#select-doctor').show(500);
						}else{
							window.location.href = data.msg;
						}	
					}
				},

				error : function(XMLHttpRequest, textStatus, errorThrown) {
					$('#waiting').fadeOut(500);
					$('#message').removeClass().addClass('error').text('There was an error. Please try again later.').delay(500).fadeIn();
				}
			});
			return false;
	});
	
	$("#sub-trans-pt").click(function(){
		$('.success').slideUp(500);
		$('#waiting').slideDown(500);
		$('#message').hide(0);
		
		var pid = $('#pid').val();
		var rid = $('#rid').val();
		var aid = $('#aid').val();
		var dateadmitted = $('#dateadmitted').val();
		var prevbed = $('#prevbed').val();
		var roomtype = $('#roomtype').val();
			
		if(roomtype == 'Ward'){var bednum = $('#bednum_wd').val();}
		if(roomtype == 'Private Room'){var bednum = $('#bednum_pr').val();}
		if(roomtype == 'Private Room w/ Air-con'){var bednum = $('#bednum_pra').val();}
			
		var datastring = 'pid='+pid+'&rid='+rid+'&aid='+aid+'&roomtype='+roomtype+'&bednum='+bednum+'&dateadmitted='+dateadmitted+'&prevbed='+prevbed;
			
		$.ajax({
				type : 'POST',
				url : 'dofiles/doTransferBed.php',
				dataType : 'json',
				data: datastring,
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#transfer-bed-form').show(500);
						}else{
							window.location.href = data.msg;
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#transfer-bed-form').show(500);
						}else{
							window.location.href = data.msg;
						}	
					}
				},

				error : function(XMLHttpRequest, textStatus, errorThrown) {
					$('#waiting').fadeOut(500);
					$('#message').removeClass().addClass('error').text('There was an error. Please try again later.').delay(500).fadeIn();
				}
			});
			return false;
	});
	
	$("#discharge-pt").click(function(){
		$('.success').slideUp(500);
		$('#waiting').slideDown(500);
		$('#message').hide(0);
		
		var pid = $('#pid').val();
		var rid = $('#rid').val();
		var aid = $('#aid').val();
		var bednum = $('#bednum').val();
		var persondischarging = $('#persondischarging').val();
			
		var datastring = 'pid='+pid+'&rid='+rid+'&aid='+aid+'&persondischarging='+persondischarging + '&bednum='+bednum;
			
		$.ajax({
				type : 'POST',
				url : 'dofiles/doDischargePatient.php',
				dataType : 'json',
				data: datastring,
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#transfer-bed-form').show(500);
						}else{
							window.location.href = data.msg;
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#transfer-bed-form').show(500);
						}else{
							window.location.href = data.msg;
						}	
					}
				},

				error : function(XMLHttpRequest, textStatus, errorThrown) {
					$('#waiting').fadeOut(500);
					$('#message').removeClass().addClass('error').text('There was an error. Please try again later.').delay(500).fadeIn();
				}
			});
			return false;
	});
	
	$("input").focus(function(){
		$(this).parent().addClass("curFocus").children("div").toggle();
	});
	$("input").blur(function() {
		$(this).parent().removeClass("curFocus").children("div").toggle();
	});
});
</script>