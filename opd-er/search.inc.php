<div id="opdHolder">
	<span class="pageTitle">Search Patient</span><br/>
	<div id="searchHolder">
    	<form id="searchForm">
        	<table class="srchTable">
            <tr>
            	<td><label for="opdnum">Hospital Number:</label></td>
                <td>
                	<div class="patient-field">
	                    <input type="text" name="opdnum" id="opdnum" class="ptField" title="Input Patient's Hospital Number"/>
					</div>
                </td>
            </tr>
            <tr>
            	<td><label for="lastname">Last Name:</label></td>
                <td>
                	<div class="patient-field">
	                    <input type="text" name="lastname" id="lastname" class="ptField" title="Input Patient's Last Name" maxlength="50"/>
					</div>
                </td>
            </tr>
        	<tr>
            	<td width="30%"><label for="firstname">First Name:</label></td>
                <td>
                	<div class="patient-field">
	                    <input type="text" name="firstname" id="firstname" class="ptField" title="Input Patient's First Name" maxlength="50"/>
					</div>
				</td>
            </tr>
            <tr>
            	<td><label for="middlename">Middle Name:</label></td>
                <td>
               		<div class="patient-field">
	                    <input type="text" name="middlename" id="middlename" class="ptField" title="Input Patient's Middle Name" maxlength="50"/>
					</div>
                </td>
            </tr>
			<tr>
            	<td><label for="dateofbirth">Birthday:</label></td>
                <td>
                	<div class="patient-field">
						<select name="bdMonth" id="bdMonth" class="ptBmonth">
							<option value="">Month:</option>
							<option value="1">Jan</option>
							<option value="2">Feb</option>
							<option value="3">Mar</option>
							<option value="4">Apr</option>
							<option value="5">May</option>
							<option value="6">>Jun</option>
							<option value="7">Jul</option>
							<option value="8">Aug</option>
							<option value="9">Sep</option>
							<option value="10">Oct</option>
							<option value="11">Nov</option>
							<option value="12">Dec</option>
						</select>
            		    <select name="bdDay" id="bdDay" class="ptBday">
                        	<option value="">Day</option>
						<?php
						for ($d = 1; $d <= 31; $d++) {
						?>
							<option value="<?php echo $d;?>"><?php echo $d;?></opion>
						
                       	<?php } ?>
						</select>
						<select name="dbYear" id="bdYear" class="ptByear">
                        	<option value="">Year</option>
						<?php
						$yearTod = date("Y");
						for ($y = $yearTod; $y >= 1950; $y--) {
						?>
							<option value="<?php echo $y;?>"><?php echo $y;?></option>
						<?php } ?>
						</select>
					</div>
                </td>
            </tr>
			<tr>
            	<td><label for="cs">Civil Status:</label></td>
                <td>
                	<div class="patient-field">
						<input type="text" name="cs" id="cs" class="ptField" title="Input Patient's Civil Status"/>
					</div>
                </td>
            </tr>
            <tr>
            	<td><label for="address">Address:</label></td>
                <td>
                	<div class="patient-field">
						<input type="text" name="address" id="address" class="ptField" title="Input Patient's Address"  maxlength="250"/>
					</div>
                </td>
            </tr>
            <tr>
            	<td colspan="2">
                	<div class="patient-field">
							<input type="submit" id="submitSearch" name="submitSearch" class="disgbutton" disabled="disabled" value="Search"/>
					</div>
                </td>
            </tr>
	    </table>
        </form>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
		$("#opdnum, #lastname, #firstname, #middlename, #bdDay, #bdMonth, #bdYear, #cs, #address").keyup(function (data) {              
		if ($("#opdnum").val() != "" ||
			$("#lastname").val() != "" ||
			$("#firstname").val() != "" ||
			$("#middlename").val() != "" ||
			$("#bdDay").val() != "" ||
			$("#bdMonth").val() != "" ||
			$("#bdYear").val() != "" ||
			$("#cs").val() != "" ||
			$("#address").val() != ""
		){  
			$("#submitSearch").removeAttr("disabled").removeClass().addClass("greenbutton"); 
		} else {  
			$("#submitSearch").attr("disabled", "disabled").removeClass().addClass("disgbutton"); 
		}  
	});	
});

$(document).ready(function(){
	$("#opdnum").mask("99-99-99",{placeholder:"_"});
	
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