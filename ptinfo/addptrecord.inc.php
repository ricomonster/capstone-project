<?php
date_default_timezone_set("Asia/Manila");
$dates = explode('-', $dob);
$year = $dates[0];
$month = $dates[1];
$day = $dates[2];

$curAge = countAge($month, $day, $year);

function countAge($month, $day, $year){
	$month = $month;
	$day = $day;
	$year = $year;
	
	$curr_day = date("d");
	$curr_month = date("m");
	$curr_year = date("Y");
	
	$ydiff = $curr_year - $year;
	$mdiff = $curr_month - $month;
	$ddiff = $curr_day - $day;
	
	if ($year == $curr_year){
			if($month < $curr_month){
				if($mdiff < 1){
					$msg = $mdiff . " months old";
					return $msg;
				}else{
					$msg = $mdiff . " month old";
					return $msg;
				}
			}else if($month == $curr_month){
				if($ddiff == 1){
					$msg = $ddiff . " day old";
					return $msg;
				}else{
					$msg = $ddiff . " days old";
					return $msg;
				}
			}
		}else if($year < $curr_year){
			if($ydiff == 1){
				$diff = (12 - $month) + $curr_month;
				
				if ($diff >= 12 && $curr_day >= $day){
					$msg = "1 year old";
					return $msg;
				}else{
					$msg = $diff . " months old";
					return $msg;
				}
			}else{
				if(($curr_month > $month) || ($curr_month == $month & $curr_day >= $day)){
					$msg = $ydiff . " years old";
					return $msg;
				}else{
					$my = $ydiff - 1;
					$msg = $my . " years old";
					return $msg;
				}
			}
		}
	}

?>
<div id="ptRecordHolder">
	<span class="pageTitle">Add Patient Record</span>
    <div id="ptInfoHolder">
    	<table class="ptInfoTable" width="100%">
        	<tr>
            	<td colspan="1" class="infoHeader"><label>OPD #:</label></td>
                <td colspan="5" class="infoField"><span class="info"><?php echo $opdnum;?></span></td>
            </tr>
        	<tr>
            	<td width="14%" class="infoHeader"><label>First Name:</label></td>
                <td width="19%" class="infoField"><span class="info"><?php echo $firstname;?></span></td>
                <td width="14%" class="infoHeader"><label>Middle Name:</label></td>
                <td width="19%" class="infoField"><span class="info"><?php echo $middlename;?></span></td>
                <td width="13%" class="infoHeader"><label>Last Name:</label></td>
                <td width="19%" class="infoField"><span class="info"><?php echo $lastname;?></span></td>
            </tr>
            <tr>
            	<td class="infoHeader"><label>Membership:</label></td>
                <td class="infoField"><span class="info"><?php echo $membership;?></span></td>
            	<td class="infoHeader"><label>Sex:</label></td>
                <td class="infoField"><span class="info"><?php echo $sex;?></span></td>
                <td class="infoHeader"><label>Civil Status:</label></td>
                <td class="infoField"><span class="info"><?php echo $cs;?></span></td>
            </tr>
            <tr>
            	<td colspan="1" class="infoHeader"><label>Date of Birth:</label></td>
                <td colspan="5" class="infoField"><span class="info"><?php echo $dateofbirth;?></span></td>
            </tr>
            <tr>
            	<td colspan="1" class="infoHeader"><label>Address:</label></td>
                <td colspan="5" class="infoField"><span class="info"><?php echo $address;?></span></td>
            </tr>
			<tr>
				<td colspan="1" class="infoHeader"><label>Place of Birth</label></td>
				<td colspan="5" class="infoField"><span class="info"><?php echo $placeofbirth;?></span></td>
			</tr>
			<tr>
				<td class="infoHeader"><label>Occupation:</label></td>
				<td colspan="2" class="infoField"><span class="info"><?php echo $occupation;?></span></td>
				<td class="infoHeader"><label>Contact No.:</label></td>
				<td colspan="2" class="infoField"><span class="info"><?php echo $contactno;?></span></td>
			</tr>
			<tr>
				<td class="infoHeader"><label>Religion:</label></td>
				<td colspan="2" class="infoField"><span class="info"><?php echo $religion;?></span></td>
				<td class="infoHeader"><label>Nationality:</label></td>
				<td colspan="2" class="infoField"><span class="info"><?php echo $nationality;?></span></td>
			</tr>
        </table>
    </div>
	
    <div id="ptformHolder">
    	<form id="addRecForm">
        	<table class="formTable" width="100%">
                <tr>
                   	<td colspan="1" class="recHeader"><label for="date">Date:</label></td>
                    <td colspan="5" class="recField">
                    	<div class="info-field">
							<input type="text" name="dateofvisit" id="dateofvisit" class="ptField" title="Input Patient's Date of Visit" value="<?php echo date("Y");?>-<?php echo date("m");?>-<?php echo date("d");?>" disabled="disabled"/>
						</div>
                    </td>
				</tr>
	            <tr>	
					<td class="recHeader" width="15%"><label for="age">Age:</label></td>
					<td class="recField" colspan="2">
                    	<div class="info-field">
							<input type="text" name="age" id="age" class="ptField" title="Patient's Age" style="width:100px;" maxlength="2" value="<?php echo $curAge;?>" disabled="disabled"/>
						</div>
                    </td>
					<td class="recHeader" width="20%"><label for="timein">Time In:</label></td>
					<td class="recField" colspan="2">
                    	<div class="info-field">
							<input type="text" name="timein" id="timein" class="ptField" title="Input Patient's Time In" required="required" style="width:50px;"/>
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
					<td class="recHeader"><label for="bp">BP:</label></td>
					<td class="recField">
                    	<div class="info-field">
							<input type="text" name="sys" id="sys" class="ptField" title="Input Patient's Systolic Pressure" style="width:30px;" maxlength="3" onKeyPress="return checkIt(event)" required="required"/> / <input type="text" name="dia" id="dia" class="ptField" title="Input Patient's Diastolic Pressure" style="width:30px;" maxlength="3" onKeyPress="return checkIt(event)" required="required"/>
						</div>
                    </td>
					<td class="recHeader"><label for="cr">CR:</label></td>
					<td class="recField">
                    	<div class="info-field">
							<input type="text" name="cr" id="cr" class="ptField" title="Input Patient's Circulation Rate" style="width:50px;" maxlength="3" onKeyPress="return checkIt(event)" required="required"/> PPM
						</div>
                    </td>
					<td class="recHeader"><label for="rr">RR:</label></td>
					<td class="recField">
                    	<div class="info-field">
							<input type="text" name="rr" id="rr" class="ptField" title="Input Patient's Respiratory Rate" style="width:50px;" maxlength="3" onKeyPress="return checkIt(event)" required="required"/> BPM
						</div>
                    </td>
				</tr>
				<tr>
					<td class="recHeader"><label for="temp">Temp:</label></td>
					<td colspan="2" class="recField">
                    	<div class="info-field">
							<input type="text" name="temp" id="temp" class="ptField" title="Input Patient's Temperature" style="width:50px;" maxlength="3" onKeyPress="return checkIt(event)" required="required"/>&deg;C
						</div>
                    </td>
					<td class="recHeader"><label for="weight">Weight:</label></td>
					<td colspan="2" class="recField">
                    	<div class="info-field">
							<input type="text" name="weight" id="weight" class="ptField" title="Input Patient's Weight Rate" style="width:50px;" maxlength="3" onKeyPress="return checkIt(event)" required="required"/> kg
						</div>
                    </td>
				</tr>
				<tr>
					<td colspan="1" class="recHeader" valign="top"><label for="complaint">Chief Complaint:</label></td>
					<td colspan="5" class="recField" valign="top">
                    	<div class="info-field">				
							<textarea name="complaint" id="complaint" class="ptFieldTxt" style="width: 600px;" required="required"></textarea>
						</div>
                    </td>
				</tr>
				<tr>
					<td colspan="6" class="recField" align="right">
                        <div class="info-field">
             				<input type="hidden" id="pid" name="pid" value="<?php echo $pid;?>"/>
							<input type="submit" id="submitAddRec" name="submitAddRec" class="disgbutton" disabled="disabled" value="Add Patient Record"/>
						</div>    	
					</td>
				</tr>
			</table>
        </form>
	</div>
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
	$("#dateofvisit, #timein, #inampm, #dia, #sys, #cr, #rr, #temp, #weight, #complaint").keyup(function (data) {              
		if ($("#dateofvisit").val() != "" &&
			$("#timein").val() != "" &&
			$("#inampm").val() != "" &&
			$("#dia").val() != "" &&
			$("#sys").val() != "" &&
			$("#cr").val() != "" &&
			$("#rr").val() != "" &&
			$("#temp").val() != "" &&
			$("#weight").val() != "" &&
			$("#complaint").val() != ""
		){  
			$("#submitAddRec").removeAttr("disabled").removeClass().addClass("greenbutton"); 
		} else {  
			$("#submitAddRec").attr("disabled", "disabled").removeClass().addClass("disgbutton"); 
		}  
	});
	
	$("#opdnum").mask("99-99-99",{placeholder:"_"});
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

$('textarea#remarks').autoResize({
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
});
</script>
</div>