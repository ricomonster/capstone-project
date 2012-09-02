<div id="accountHolder">
	<span class="pageTitle">System Settings</span>
	<?php
	$pricelist = getAllPriceList();
	?>
	<br/>
	<span class="pageTitle" style="padding-left: 100px;">PhilHealth Price List</span>
	<div id="phil-health-pricing-list">
		<div class="phil-row">
			<div class="phil-cell-header" style="border-top:1px solid #ccc;">Type</div>
			<?php foreach($pricelist as $pr){?>
			<div class="phil-cell-header" style="border-left: none;border-top:1px solid #ccc;"><?php echo $pr["membership"];?><span style="float: right;"><a onClick='window.open( "editphilhealthpricing.php?phid=<?php echo $pr['phid'];?>&membershiptype=<?php echo $pr['membership'];?>", "myWindow", 
			"status = 1, height = 700, width = 700, resizable = 1" )'>[Edit]</a></span></div>
			<?php } ?>
		</div>
		<div class="phil-row">
			<div class="phil-cell-header">D/M</div>
			<?php foreach($pricelist as $pr){?>
			<div class="phil-cell-cont">Php <?php echo $pr["drugsandmedicines"];?></div>
			<?php } ?>
		</div>
		<div class="phil-row">
			<div class="phil-cell-header">Supplies</div>
			<?php foreach($pricelist as $pr){?>
			<div class="phil-cell-cont">Php <?php echo $pr["supplies"];?></div>
			<?php } ?>
		</div>
		<div class="phil-row">
			<div class="phil-cell-header">Lab</div>
			<?php foreach($pricelist as $pr){?>
			<div class="phil-cell-cont">Php <?php echo $pr["laboratory"];?></div>
			<?php } ?>
		</div>
		<div class="phil-row">
			<div class="phil-cell-header">X-Ray</div>
			<?php foreach($pricelist as $pr){?>
			<div class="phil-cell-cont">Php <?php echo $pr["xray"];?></div>
			<?php } ?>
		</div>
		<div class="phil-row">
			<div class="phil-cell-header">Ultrasound</div>
			<?php foreach($pricelist as $pr){?>
			<div class="phil-cell-cont">Php <?php echo $pr["ultrasound"];?></div>
			<?php } ?>
		</div>
		<div class="phil-row">
			<div class="phil-cell-header">ECG</div>
			<?php foreach($pricelist as $pr){?>
			<div class="phil-cell-cont">Php <?php echo $pr["ecg"];?></div>
			<?php } ?>
		</div>
		<div class="phil-row">
			<div class="phil-cell-header">Oxygen</div>
			<?php foreach($pricelist as $pr){?>
			<div class="phil-cell-cont">Php <?php echo $pr["oxygen"];?></div>
			<?php } ?>
		</div>
		<div class="phil-row">
			<div class="phil-cell-header">Accom/Subs</div>
			<?php foreach($pricelist as $pr){?>
			<div class="phil-cell-cont">Php <?php echo $pr["accomsubs"];?></div>
			<?php } ?>
		</div>
		<div class="phil-row">
			<div class="phil-cell-header">Prof Fee</div>
			<?php foreach($pricelist as $pr){?>
			<div class="phil-cell-cont">Php <?php echo $pr["professionalfee"];?></div>
			<?php } ?>
		</div>
		<div class="phil-row">
			<div class="phil-cell-header">OR Fee/ DR Fee</div>
			<?php foreach($pricelist as $pr){?>
			<div class="phil-cell-cont">Php <?php echo $pr["orfeedrfee"];?></div>
			<?php } ?>
		</div>
	</div>
	<div id="phil-health-pricing-list" style="margin-top: 5px;">
		<div class="phil-row">
			<div class="phil-button-cont" style="width: 281px;">
				<input type="button" value="Add PhilHealth Pricing List" class="greenbutton" onClick='window.open( "addphilhealthpricing.php", "myWindow", 
			"status = 1, height = 700, width = 700, resizable = 1" )'/>
			</div>
		</div>
	</div>
	
	<div id="list-of-therapeutics" style="margin-top:10px;">
	<span class="pageTitle">Add Therapeutics to the System</span>
		<div class="thera-row">
			<div class="thera-cell-header" style="width: 208px;">Therapeutic Name</div>
			<div class="thera-cell-header" style="width: 104px;">Type</div>
			<div class="thera-cell-header" style="border-right: 1px solid #ccc;">Price</div>
		</div>
	</div>
	
	<div id="thera-wrapper"></div>
	
	<div id="list-of-therapeutics">
		<form id="thera-row-form">
			<div class="thera-cell-cont">
				<input type="text" name="theraname" id="theraname" class="regfield">
			</div>
			<div class="thera-cell-cont">
				<select name="type" id="type" class="selfield">
					<option value="">Select:</option>
					<option value="Injection">Injection</option>
					<option value="Oral">Oral</option>
					<option value="Treatment">Treatment</option>
				</select>
			</div>
			<div class="thera-cell-cont" style="border-right: 1px solid #ccc;">
				Php <input type="text" name="price" id="price" class="regfield" style="width: 120px;">
				<input type="submit" id="subThera" name="subThera" class="disgbutton" disabled="disabled" value="Submit"/>
			</div>
		</form>
	</div>
</div>
<script type="text/javascript">
$("document").ready(function(){
	$("#theraname, #type, #price").keyup(function (data) {              
		if ($("#theraname").val() != "" && $("#type").val() != "" && $("#price").val() != ""){  
			$("#subThera").removeAttr("disabled").removeClass().addClass("greenbutton"); 
		} else {  
			$("#subThera").attr("disabled", "disabled").removeClass().addClass("disgbutton"); 
		}  
	});
	$('input#price').blur(function() {
		var amt = parseFloat(this.value);
		$(this).val(amt.toFixed(2));
	});
	$("#thera-wrapper").load("reload/loadtherapeutics.php").fadeIn(500);
	
	$("#subThera").click(function(){
		$('#waiting').slideDown(500);
		$('#message').hide(0);
			
		$.ajax({
				type : 'POST',
				url : 'dofiles/doAddThera.php',
				dataType : 'json',
				data: {
					theraname : $('#theraname').val(),
					type : $('#type').val(),
					price : $('#price').val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#thera-row-form').show(500);
						}else{
							$(':input','#thera-row-form')
							.not(':button, :submit, :reset, :hidden')
							.val('');
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#thera-row-form').show(500);
						}else{
							$(':input','#thera-row-form')
							.not(':button, :submit, :reset, :hidden')
							.val('').removeAttr('required');
							$("#thera-wrapper").load("reload/loadtherapeutics.php").fadeIn(500);
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