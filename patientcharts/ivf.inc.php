<div class="admittedHolder">
	<span class="pageTitle">IVF Consumption</span>
	<div id="ivfHolder">
		<div id="ivf-wrapper">
			<div class="ivf-row">
				<div class="titleCell ivf-title-dt">Date</div>
				<div class="titleCell ivf-title-sh">Shift</div>
				<div class="titleCell ivf-title-ts">Time Started</div>
				<div class="titleCell ivf-title-ivfbt">IVF / BT</div>
				<div class="titleCell ivf-title-dtc">Date - Time Consumed</div>
			</div>
		</div>
		<?php
		date_default_timezone_set("Asia/Manila");
		$curr_date = date('M d, Y', time());
		$curr_time = date('h:i A', time());
		$db_date = date('Y-m-d', time());
		$curr_ampm = date('A', time());
		?>
		<div id="ivf-content-wrapper"></div>
		<?php
		$ctime = strtotime($curr_time);

		$mshift = strtotime("7:00 AM");
		$mlshift = strtotime("2:59 PM");

		$ashift = strtotime("3:00 PM");
		$alshift = strtotime("10:59 PM");

		$nshift = strtotime("11:00 PM");
		$nlshift = strtotime("6:59 AM");
		?>
		<?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?>		
		<div id="ivf-form-wrapper">
			<form id="ivf-form">
				<input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
				<input type="hidden" name="rid" id="rid" value="<?php echo $rid;?>"/>
				<input type="hidden" name="aid" id="aid" value="<?php echo $aid;?>"/>
				
				<div class="ivf-row">
					<div class="contentCell ivf-form-dt">
						<?php echo $curr_date;?>
						<input type="hidden" name="datestarted" id="datestarted" value="<?php echo $db_date;?>"/>
					</div>
					<div class="contentCell ivf-form-sh">
						<select name="shift" id="shift" class="ivfselect">
							<option value="7 AM - 3 PM" <?php if($mshift < $ctime && $mlshift > $ctime){echo 'selected="selected"';}?>>7 AM - 3 PM</option>
							<option value="3 PM - 11 PM" <?php if($ashift < $ctime && $alshift > $ctime){echo 'selected="selected"';}?>>3 PM - 11 PM</option>
							<option value="11 PM - 7 AM" <?php if($nshift < $ctime || $nlshift > $ctime){echo 'selected="selected"';}?>>11 PM - 7 AM</option>
						</select>
					</div>
					<div class="contentCell ivf-form-ts">
						<input type="text" name="timestarted" id="timestarted" class="timeField"/>
						<select name="ampmsel" id="ampmsel" class="timeSlField">
							<option value="AM"<?php if($curr_ampm == "AM"){echo ' selected="selected"';}?>>AM</option>
							<option value="PM"<?php if($curr_ampm == "PM"){echo ' selected="selected"';}?>>PM</option>
						</select>
					</div>
					<div class="contentCell ivf-form-ivfbt">
						<input type="text" name="ivfbt" id="ivfbt" title="Input IVF / BT" class="ivfField"/>
					</div>
					<div class="contentCell ivf-form-dtc">
						<?php echo $curr_date;?>
						<input type="hidden" name="dateconsumed" id="dateconsumed" value="<?php echo $db_date;?>"/>
						
						<input type="text" name="timecon" id="timecon" class="timeField"/>
						<select name="ampmselcon" id="ampmselcon" class="timeSlField">
							<option value="AM"<?php if($curr_ampm == "AM"){echo ' selected="selected"';}?>>AM</option>
							<option value="PM"<?php if($curr_ampm == "PM"){echo ' selected="selected"';}?>>PM</option>
						</select>
					</div>
				</div>
				<div class="ivf-row">
					<div class="contentCell" style="border: none;"></div>
					<div class="contentCell" style="border: none;"></div>
					<div class="contentCell" style="border: none;"></div>
					<div class="contentCell" style="border: none;"></div>
					<div class="contentCell" style="border: none; text-align: right;">
						<input type="submit" id="subIvf" name="subIvf" value="Submit" class="disgbutton" disabled="disabled"/>
					</div>
				</div>
			</form>
		</div>
		<?php } ?>
	</div>
</div>
<script type="text/javascript" src="jquery/jquery.maskedinput.js"></script>
<script type="text/javascript">
$("document").ready(function(){
	$("#timestarted").mask("99:99",{placeholder:"_"});
	$("#timecon").mask("99:99",{placeholder:"_"});
	
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
<script type="text/javascript">
$("#timestarted, #ivfbt, #timecon").keyup(function (data) {              
	if ($("#timestarted").val() != "" && $("#ivfbt").val() != "" && $("#timecon").val() != ""){  
		$("#subIvf").removeAttr("disabled").removeClass().addClass("greenbutton"); 
	} else {  
		$("#subIvf").attr("disabled", "disabled").removeClass().addClass("disgbutton"); 
	}  
});
</script>
<script type="text/javascript">
$("document").ready(function(){
	$("#ivf-content-wrapper").load("reload/loadivfconsumption.php?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&aid=<?php echo $aid;?>").fadeIn(500);
	
	$("#subIvf").click(function(){
		$('#waiting').slideDown(500);
		$('#message').hide(0);
			
		$.ajax({
				type : 'POST',
				url : 'dofiles/doAddIvfCon.php',
				dataType : 'json',
				data: {
					pid : $('#pid').val(),
					rid : $('#rid').val(),
					aid : $('#aid').val(),
					datestarted : $('#datestarted').val(),
					shift : $('#shift').val(),
					timestarted : $('#timestarted').val(),
					ampmsel : $('#ampmsel').val(),
					ivfbt : $('#ivfbt').val(),
					dateconsumed : $('#dateconsumed').val(),
					timecon : $('#timecon').val(),
					ampmselcon : $('#ampmselcon').val(),
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#ivf-form').show(500);
						}else{
							$(':input','#ivf-form')
							.not(':button, :submit, :reset, :hidden')
							.val('');
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#ivf-form').show(500);
						}else{
							$(':input','#ivf-form')
							.not(':button, :submit, :reset, :hidden')
							.val('');
							
							$("#ivf-content-wrapper").load("reload/loadivfconsumption.php?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&aid=<?php echo $aid;?>").fadeIn(500);
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