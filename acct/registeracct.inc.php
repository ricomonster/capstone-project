<?php
if (checkPriviledge($_SESSION["uid"]) === false){
	header("Location: accountmgmt.php");
	exit();
}
?>
<div id="accountHolder">
	<span class="pageTitle">Register an Account</span>
    <div id="formHolder">
    	<form id="addForm">
        	<div class="single-field">
                <label for="firstname">First Name:</label>
                <input type="text" name="firstname" id="firstname" class="regfield" title="Input your First Name"/>
            </div>
            <div class="single-field">
                <label for="lastname">Last Name:</label>
                <input type="text" name="lastname" id="lastname" class="regfield" title="Input your Last Name"/>
       		</div>
            <div class="single-field">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" class="regfield" title="Input your Userame"/>
       		</div>
            <div class="single-field">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" class="regfield" title="Input your desired password"/>
       		</div>
            <div class="single-field">
                <label for="confirm password">Confirm Password:</label>
                <input type="password" name="cpassword" id="cpassword" class="regfield" title="Please confirm your password"/>
       		</div>
            <div class="single-field">
                <label for="priviledge">Priviledge:</label>
                <select name="priviledge" id="priviledge" class="regfield" title="Please input the priviledge of the user"/>
                	<option value="">Select:</option>
                    <option value="Billing">Billing</option>
                    <option value="Administrator">Admin</option>
					<option value="Patient Care">Patient Care</option>
                </select>
       		</div>
            <div class="submit-field">
                <input type="submit" name="submitReg" id="submitReg" value="Register Account" class="disgbutton" disabled="disabled"/>
                <input type="reset" name="reset" value="Reset" class="bluebutton"/>
       		</div>
        </form>
    </div>
<script type="text/javascript">
$(document).ready(function(){
		$("#firstname, #lastname, #username, #password, #cpassword, #priviledge").blur(function (data) {              
		if ($("#firstname").val() != "" &&
			$("#lastname").val() != "" &&
			$("#username").val() != "" &&
			$("#password").val() != "" &&
			$("#cpassword").val() != "" &&
			$("#priviledge").val() != ""
		){  
			$("#submitReg").removeAttr("disabled").removeClass().addClass("greenbutton"); 
		} else {  
			$("#submitReg").attr("disabled", "disabled"); 
		}  
	});	
});

$(document).ready(function(){
	
	$("input").focus(function(){
		$(this).parent().addClass("curFocus").children("div").toggle();
	});
	$("input").blur(function() {
		$(this).parent().removeClass("curFocus").children("div").toggle();
	});
});
</script>
</div>