<div id="opdHolder">
<?php
$lastOPD = lastOPD();

foreach ($lastOPD as $lo){
	$lst = $lo["opdnum"];
}
if(empty($lst)){
	$lst = "00-00-00";
}
$lastNumber = incOPD($lst);
?>
	<span class="pageTitle">Add Patient</span>
    <div id="ptformInfoHolder">
    	<form id="addPtForm" onSubmit="return false">
        	<table class="tblAddPt" width="100%">
        		<tr>
            		<td colspan="1" class="addHeader"><label>OPD #:</label></td>
	                <td colspan="3" class="addField">
						<div class="patient-field" align="left" style="margin-left: 18px;">
							<input type="text" name="opdnum" id="opdnum" class="ptField" title="Patient's OPD Number" maxlength="9" value="<?php echo $lastNumber;?>" disabled="disabled"/>
						</div>
                    </td>
    	        </tr>
        		<tr>
            		<td class="addHeader"><label>First Name:</label></td>
                	<td class="addField">
                    	<div class="patient-field">
							<input type="text" name="firstname" id="firstname" class="ptField" title="Input Patient's First Name" maxlength="50" required="required"/>
						</div>
                    </td>
	                <td class="addHeader"><label>Middle Name:</label></td>
    	            <td class="addField">
                    	<div class="patient-field">
							<input type="text" name="middlename" id="middlename" class="ptField" title="Input Patient's Last Name" maxlength="50" required="required">
						</div>
                    </td>
	            </tr>
    	        <tr>
                	<td class="addHeader"><label>Last Name:</label></td>
            	    <td class="addField">
                    	<div class="patient-field">
							<input type="text" name="lastname" id="lastname" class="ptField" title="Input Patient's Last Name" maxlength="50" required="required"/>
						</div>
                    </td>
        	    	<td class="addHeader"><label>Membership:</label></td>
            	    <td class="addField">
                    	<div class="patient-field">
							<select name="membership" id="membership" class="ptField">
                            	<option value="">Select</option>
                                <?php
								$membershiptype = getAllPriceList();
								foreach ($membershiptype  as $m){
									echo '<option value='.$m["membership"].'>'.$m["membership"].'</option>';
								}
								?>
                            </select>
						</div>
                    </td>
				</tr>
				<tr>
	            	<td class="addHeader"><label>Sex:</label></td>
    	            <td class="addField">
                    	<div class="patient-field">
							<select name="sex" id="sex" class="ptField">
            			    	<option value="">Select</option>
								<option value="Female">Female</option>
			                    <option value="Male">Male</option>
            			    </select>
						</div>
                    </td>
        	        <td class="addHeader"><label>Civil Status:</label></td>
            	    <td class="addField">
                    	<div class="patient-field">
                            <select name="cs" id="cs" class="ptField" title="Input Patient's Civil Status">
                            	<option value="">Select:</option>
                                <option value="Single">Single</option>
                                <option value="Married">Married</option>
                                <option value="Seperated">Seperated</option>
                                <option value="Widowed">Widowed</option>
                            </select>
						</div>
                    </td>
	            </tr>
    	        <tr>
        	    	<td class="addHeader" colspan="1"><label>Date of Birth:</label></td>
            	    <td class="addField" colspan="3" align="left">
                    	<div class="patient-field" align="left" style="margin-left: 18px;">
							<input type="text" name="birthdate" id="birthdate" class="ptField" title="A datepicker will show and select the patients birthdate"/>
						</div>
                    </td>
	            </tr>
    	        <tr>
        	    	<td colspan="1" class="addHeader"><label>Address:</label></td>
            	    <td colspan="3" class="addField">
                    	<div class="patient-field">
							<input type="text" name="address" id="address" class="ptField" title="Input Patient's Address" style="width: 550px;" maxlength="250" required="required"/>
						</div>
                    </td>
            	</tr>
				<tr>
					<td colspan="1" class="addHeader"><label>Place of Birth</label></td>
					<td colspan="3" class="addField">
						<div class="patient-field">
							<input type="text" name="placeofbirth" id="placeofbirth" class="ptField" title="Input Patient's Place of Birth" style="width: 550px;" required="required"/>
						</div>
					</div>
				</tr>
				<tr>
					<td class="addHeader"><label>Occupation</label></td>
					<td class="addField">
						<div class="patient-field">
							<input type="text" name="occupation" id="occupation" class="ptField" title="Input Patient's Occupation" required="required"/>
						</div>
					</td>
					<td class="addHeader"><label>Contact #:</label></td>
					<td class="addField">
						<div class="patient-field">
							<input type="text" name="contactno" id="contactno" class="ptField" title="Input Patient's Contact Number" required="required"/>
						</div>
					</td>
				</tr>
				<tr>
					<td class="addHeader"><label>Religion</label></td>
					<td class="addField">
						<div class="patient-field">
							<input type="text" name="religion" id="religion" class="ptField" title="Input Patient's Religion" required="required"/>
						</div>
					</td>
					<td class="addHeader"><label>Nationality:</label></td>
					<td class="addField">
						<div class="patient-field">
							<input type="text" name="nationality" id="nationality" class="ptField" title="Input Patient's Nationality" required="required"/>
						</div>
					</td>
				</tr>
	        </table>
            <br/>
            <table class="tblAddPtRec" width="100%">
                <tr>
                   	<td colspan="1" class="addHeader"><label for="date">Date:</label></td>
                    <td colspan="5" class="addField">
                    	<div class="patient-field" align="left" style="margin-left: 12px;">
							<input type="text" name="dateofvisit" id="dateofvisit" class="ptField" value="<?php echo date("Y");?>-<?php echo date("m");?>-<?php echo date("d");?>" disabled="disabled"/>
						</div>
                    </td>
				</tr>
	            <tr>	
					<td class="addHeader"  width="15%"><label for="age">Age:</label></td>
					<td class="addField" colspan="2">
                    	<div class="info-field">
							<input type="text" name="age" id="age" class="ptField" title="Patient's Age" style="width:80px;" maxlength="2" disabled="disabled"/>
						</div>
                    </td>
					<td class="addHeader" width="20%"><label for="timein">Time In:</label></td>
					<td class="addField" colspan="2">
                    	<div class="patient-field" style="text-align: left;">
							<input type="text" name="timein" id="timein" class="ptField" title="Input Patient's Time In" style="width:50px;" />
            			    <?php $ampm = date('A'); ?>
			                <select name="inampm" id="inampm" style="height: 20px;">
            			    	<option value="">Select:</option>
			                    <option value="AM"<?php if($ampm == "AM"){echo 'selected="selected"';} ?>>AM</option>
            			        <option value="PM"<?php if($ampm == "PM"){echo 'selected="selected"';} ?>>PM</option>
			                </select>
						</div>
                    </td>
					
				</tr>
				<tr>
					<td class="addHeader"><label for="bp">BP:</label></td>
					<td class="addField">
                    	<div class="patient-field">
							<input type="text" name="sys" id="sys" class="ptField" title="Input Patient's Systolic Pressure" style="width:30px;" maxlength="3" onKeyPress="return checkIt(event)" required="required"/> / <input type="text" name="dia" id="dia" class="ptField" title="Input Patient's Diastolic Pressure" style="width:30px;" maxlength="3" onKeyPress="return checkIt(event)" required="required"/>
						</div>
                    </td>
					<td class="addHeader"><label for="cr">CR:</label></td>
					<td class="addField">
                    	<div class="patient-field" align="left" style="margin-left: 15px;">
							<input type="text" name="cr" id="cr" class="ptField" title="Input Patient's Circulation Rate" style="width:50px;" maxlength="3" onKeyPress="return checkIt(event)" required="required"/> PPM
						</div>
                    </td>
					<td class="addHeader" width="10%"><label for="rr">RR:</label></td>
					<td class="addField">
                    	<div class="patient-field" align="left" style="margin-left: 17px;">
							<input type="text" name="rr" id="rr" class="ptField" title="Input Patient's Respiratory Rate" style="width:50px;" maxlength="3" onKeyPress="return checkIt(event)" required="required"/> BPM
						</div>
                    </td>
				</tr>
				<tr>
					<td class="addHeader"><label for="temp">Temp:</label></td>
					<td colspan="2" class="addField">
                    	<div class="patient-field" align="left" style="margin-left: 10px;">
							<input type="text" name="temp" id="temp" class="ptField" title="Input Patient's Temperature" style="width:50px;" maxlength="3" onKeyPress="return checkIt(event)" required="required"/>&deg;C
						</div>
                    </td>
					<td class="addHeader"><label for="weight">Weight:</label></td>
					<td colspan="2" class="addField">
                    	<div class="patient-field" align="left" style="margin-left: 17px;">
							<input type="text" name="weight" id="weight" class="ptField" title="Input Patient's Weight Rate" style="width:50px;" maxlength="3" onKeyPress="return checkIt(event)" required="required"/> kg
						</div>
                    </td>
				</tr>
				<tr>
					<td colspan="1" class="addHeader" valign="top"><label for="complaint">Chief Complaint:</label></td>
					<td colspan="5" class="addField" valign="top">
                    	<div class="patient-field">				
							<textarea name="complaint" id="complaint" class="ptFieldTxt" style="width: 550px;" required="required"></textarea>
						</div>
                    </td>
				</tr>
				<?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?>
				<tr>
					<td colspan="6" class="addField" align="right">
                        <div class="patient-field" align="right" style="margin-right: 20px;">
							<input type="submit" id="submitAddPt" name="submitAddPt" class="disgbutton" disabled="disabled" value="Add Patient Record"/>
						</div>    	
					</td>
				</tr>
				<?php } ?>
			</table>
        </form>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	 $("#firstname, #middlename, #lastname, #membership, #sex, #cs, #birthdate, #address, #placeofbirth, #occupation, #contactno, #religion, #nationality, #dateofvisit, #age, #timein, #inampm, #dia, #sys, #cr, #rr, #temp, #weight").keyup(function (data) {              
		if ($("#firstname").val() != "" &&
			$("#middlename").val() != "" &&
			$("#lastname").val() != "" &&
			$("#membership").val() != "" &&
			$("#sex").val() != "" &&
			$("#cs").val() != "" &&
			$("#birthdate").val() != "" &&
			$("#address").val() != "" &&
			$("#placeofbirth").val() != "" &&
			$("#occupation").val() != "" &&
			$("#contactno").val() != "" &&
			$("#religion").val() != "" &&
			$("#nationality").val() != "" &&
			$("#dateofvisit").val() != "" &&
			$("#age").val() != "" &&
			$("#timein").val() != "" &&
			$("#inampm").val() != "" &&
			$("#dia").val() != "" &&
			$("#sys").val() != "" &&
			$("#cr").val() != "" &&
			$("#rr").val() != "" &&
			$("#temp").val() != "" &&
			$("#weight").val() != ""
		){  
			$("#submitAddPt").removeAttr("disabled").removeClass().addClass("greenbutton"); 
		} else {  
			$("#submitAddPt").attr("disabled", "disabled").removeClass().addClass("disgbutton"); 
		}  
	});
	
	/*$("#birthdate").live("blur", function(){
		
	});*/
});
</script>
<script language="javascript">
function checkIt(evt) {
    evt = (evt) ? evt : window.event
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        status = "This field accepts numbers only."
        return false
    }
    status = ""
    return true
}
</script>
<script type="text/javascript">
$(document).ready(function(){
	$("#timein").mask("99:99",{placeholder:"_"});
	$("#timeout").mask("99:99",{placeholder:"_"});
	
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
	
	$("textarea").focus(function(){
		$(this).parent().addClass("curFocus").children("div").toggle();
	});
	$("textarea").blur(function() {
		$(this).parent().removeClass("curFocus").children("div").toggle();
	});
});
</script>    
<script type="text/javascript">
$('textarea#complaint').autoResize({
    onResize : function() {
        $(this).css({opacity:0.8});
    },
    animateCallback : function() {
        $(this).css({opacity:1});
    },
    animateDuration : 300,
    extraSpace : 40
});

$(function() {
	$( "#dateofvisit" ).datepicker({
		changeMonth: true,
		changeYear: true,
			dateFormat: 'yy-mm-dd'
	});
	$("#birthdate").datepicker({
		onSelect: function(value, ui) {
			var bday = value;
			myArray = bday.split('-'); 
			
			var month = myArray[1];
			var day = myArray[2];
			var year = myArray[0];
			
			var d = new Date();
			var curr_day = d.getDate();
			var curr_month = d.getMonth()+1;
			var curr_year = d.getFullYear();
			
			var ydiff = curr_year - year;
			var mdiff = curr_month - month;
			var ddiff = curr_day - day;
			
			
			if (year == curr_year){
				if(month < curr_month){
					if(mdiff < 1){
						var msg = mdiff + " months old";
						$('#age').val(msg);
					}else{
						var msg = mdiff + " month old";
						$('#age').val(msg);
					}
				}else if(month == curr_month){
					if(ddiff == 1){
						var msg = ddiff + " day old";
						$('#age').val(msg);
					}else{
						var msg = ddiff + " days old";
						$('#age').val(msg);
					}
				}
			}else if(year < curr_year){
				if(ydiff == 1){
					var diff = (12 - month) + curr_month;
					
					if (diff >= 12 && curr_day >= day){
						var msg = "1 year old";
						$('#age').val(msg);
					}else{
						var msg = diff + " months old"
						$('#age').val(msg);
					}
				}else{
					if((curr_month > month) || (curr_month == month & curr_day >= day)){
						var msg = ydiff + " years old";
						$('#age').val(msg);
					}else{
						var my = ydiff - 1;
						var msg = my + " years old";
						$('#age').val(msg);
					}
				}
			}
		},
		 yearRange: '1920:<?php echo date("Y");?>',
		changeMonth: true,
		changeYear: true,
			dateFormat: 'yy-mm-dd'
	});
});
</script>
</div>