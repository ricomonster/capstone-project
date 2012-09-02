<div id="drProfHolder">
	<span class="pageTitle">Doctor's Profile</span>
    <div id="profHolder">
		<div id="rowProf">
			<div id="leftField">Doctor's Name</div>
			<div id="rightField">Dr. <?php echo $firstname;?> <?php echo $lastname;?>, <?php echo $title;?></div>
		</div>
		<div id="rowProf">
			<div id="leftField">Doctor's Specialty</div>
			<div id="rightField"><?php echo $specialty;?></div>
		</div>
		<div id="rowProf">
			<div id="leftField">Doctor's Contact</div>
			<div id="rightField"><?php echo $contact;?></div>
		</div>
		<div id="rowProf">
			<div id="leftField">Doctor's Address</div>
			<div id="rightField"><?php echo $address;?></div>
		</div>
		<div id="rowProf">
			<div id="leftField">Doctor's Duty</div>
			<div id="rightField"><?php echo $duty;?></div>
		</div>
		<div id="rowProf">
			<div id="leftField" style="border-bottom: 1px solid #ccc;">Doctor's Professional Fee:</div>
			<div id="rightField" style="border-bottom: 1px solid #ccc;">Php <?php echo $professionalfee;?></div>
		</div>
		<?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?>
		<div id="rowProf">
			<div id="leftField" style="border-bottom: 1px solid #ccc; border-right: none; background-color: #fff; border-top:none;">&nbsp;</div>
			<div id="rightField" style="border-bottom: 1px solid #ccc; border-left: none; text-align: right; border-top:none;">
				<input type="button" id="dutyUp" name="dutyUp" value="Update Duty" class="bluebutton"/>
			</div>
		</div>
		<?php } ?>
	</div>
	<br/>
	<div id="dutyForm">
	<span class="pageTitle">Update Doctor's Duty</span><br/>
		<form id="upDutyForm" action="dofiles/doUpdateDuty.php" method="post">
				<div class="updateField">
					Select:
					<select name="upDuty" id="upDuty" class="selectDuty">
						<option value="On-Duty" <?php if($duty=="On-Duty"){echo 'selected="selected"';}?>>On-Duty</option>
						<option value="On-Call" <?php if($duty=="On-Call"){echo 'selected="selected"';}?>>On-Call</option>
						<option value="On-Leave" <?php if($duty=="On-Leave"){echo 'selected="selected"';}?>>On-Leave</option>
					</select>
				</div>
				<div class="updateField" id="dateLeave" style="display:none;">
					Input Date of Return: <input type="text" id="dutyLeave" name="dutyLeave" class="selectDuty"/>
				</div>
				<div class="updateField" style="text-align: right;">
					<input type="hidden" id="did" name="did" value="<?php echo $did;?>"/>
					<input type="submit" id="updateDuty" name="updateDuty" value="Update!" class="greenbutton"/>
					<input type="button" id="cancelDuty" name="cancelDuty" value="Cancel" class="redbutton"/>
				</div>
			</center>
		</form>
	</div>
	<div id="profForm">
	<span class="pageTitle">Update Doctor's Professional Fee</span><br/>
		<form id="prof-form">
				<div class="updateField">
					Update:
					<input type="text" name="proffee" id="proffee" class="selectDuty"/>
				</div>
				<div class="updateField" style="text-align: right;">
					<input type="hidden" id="did" name="did" value="<?php echo $did;?>"/>
					<input type="submit" id="upProfFee" name="upProfFee" value="Update!" class="greenbutton"/>
					<input type="button" id="cancelDuty" name="cancelDuty" value="Cancel" class="redbutton"/>
				</div>
			</center>
		</form>
	</div>
</div>
<script>
$('document').ready(function(){
	$('input#proffee').blur(function() {
		var amt = parseFloat(this.value);
		$(this).val(amt.toFixed(2));
	});
	$("#upProfFee").click(function(){
			$('body,html').animate({scrollTop:0},800);
			$('#waiting').slideDown(500);
			$('#message').hide(0);
		
			$.ajax({
				type : 'POST',
				url : 'dofiles/doUpProfFee.php',
				dataType : 'json',
				data: {
					did : $('#did').val(),
					proffee : $('#proffee').val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#prof-form').show(500);
						}else{
							$(':input','#prof-form')
							.not(':button, :submit, :reset, :hidden')
							.val('');
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#prof-form').show(500);
						}else{
							$(':input','#prof-form')
							.not(':button, :submit, :reset, :hidden')
							.val('');
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
});
</script>
<script>
$('document').ready(function(){
	$("#dutyForm").hide(0);
	$("#dutyUp").click(function(){
		$("#dutyForm").slideDown(500);
	});

	$("#upDuty").click(function(){
		var get = $("#upDuty").val();
	
		if (get == "On-Leave"){
			$("#dateLeave").fadeIn(500);
		}else{
			$("#dateLeave").fadeOut(500);
		}
	});
	
	$("#cancelDuty").click(function(){
		$("#dutyForm").slideUp(500);
	});
});
$(function() {
	$( "#dutyLeave").datepicker({
		changeMonth: true,
		changeYear: true,
			dateFormat: 'yy-mm-dd'
	});
});
</script>