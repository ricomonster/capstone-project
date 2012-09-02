<?php if(checkPriviledgeBilling($_SESSION['uid'])===true){header("Location: pagenotfound.php");exit();}?>
<div id="doctorHolder">
	<span class="pageTitle">Add a Doctor</span>
    <div id="addHolder">
		<form id="addDrForm">
			<div class="add-field">
				<label for="doctorfirstname">Doctor's First Name:</label>
				<input type="text" id="firstname" name="firstname" class="drField"/>
			</div>
			<div class="add-field">
				<label for="doctormiddlename">Doctor's Middle Name:</label>
				<input type="text" id="middlename" name="middlename" class="drField"/>
			</div>
			<div class="add-field">
				<label for="doctorlastname">Doctor's Last Name:</label>
				<input type="text" id="lastname" name="lastname" class="drField"/>
			</div>
			<div class="add-field">
				<label for="doctormd">Doctor's Title:</label>
				<input type="text" id="title" name="title" class="drField" value="MD"/>
			</div>
			<div class="add-field">
				<label for="doctormd">Doctor's Specialization:</label>
				<input type="text" id="specialization" name="specialization" class="drField"/>
			</div>
			<div class="add-field">
				<label for="postion">Doctor's Duty:</label>
				<select name="position" id="position" class="drField">
					<option value="Resident-On-Duty">Resident-On-Duty</option>
					<option value="Attending">Attending</option>
				</select>
			</div>
			<div class="add-field">
				<label for="doctorcontact">Doctor's Contact #:</label>
				<input type="text" id="contact" name="contact" class="drField"/>
			</div>
			<div class="add-field">
				<label for="doctoraddress" style="float: none; text-align: left; margin-bottom: 5px;">Doctor's Address:</label>
					<input type="text" id="address" name="address" class="drField" style="width: 370px;"/>
			</div>
			<div class="add-field">
				<label for="doctorduty">Doctor's Duty:</label>
				<select name="duty" id="duty" class="drField">
					<option value="On-Duty">On-Duty</option>
					<option value="On-Call">On-Call</option>
					<option value="On-Leave">On-Leave</option>
				</select>
			</div>
			<div class="add-field" style="border-bottom: 1px solid #ccc;">
				<input type="submit" name="submitDoc" id="submitDoc" value="Add Doctor" class="disgbutton" disabled="disabled"/>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$("#contact").mask("0999-999-9999",{placeholder:"_"});
	
	$("#firstname, #middlename, #lastname, #title, #contact, #address, #duty").keyup(function (data) {              
		if ($("#firstname").val() != "" &&
			$("#middlename").val() != "" &&
			$("#lastname").val() != "" &&
			$("#title").val() != "" &&
			$("#contact").val() != "" &&
			$("#address").val() != "" &&
			$("#duty").val() != ""
		){  
			$("#submitDoc").removeAttr("disabled").removeClass().addClass("greenbutton"); 
		} else {  
			$("#submitDoc").attr("disabled", "disabled").removeClass().addClass("disgbutton"); 
		}  
	});


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
});
</script> 