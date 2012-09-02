<div class="admittedHolder">
	<span class="pageTitle">Doctor's Orders</span>
	
	<div id="progWrapper">
			<div class="progInfoHolder">
				<div class="progRow">
					<div class="titleCell prog-title-name">Name:</div>
					<div class="contentCell prog-content-name"><?php echo $lastname;?>, <?php echo $firstname;?> <?php echo $middlename;?></div>
					<div class="titleCell prog-title-age">Age:</div>
					<div class="contentCell prog-content-age"><?php echo $age;?></div>
					<div class="titleCell prog-title-sex">Sex:</div>
					<div class="contentCell prog-content-sex"><?php echo $sex;?></div>
					<div class="titleCell prog-title-cs">Civil Status:</div>
					<div class="contentCell prog-content-cs"><?php echo $cs;?></div>
				</div>
			</div>
		</div>
		<div id="progWrappered">
			<div class="progInfoHolder">
				<div class="progRow">
					<div class="titleCell prog-title-ward">Ward:</div>
					<div class="contentCell prog-content-ward"><?php echo $service;?></div>
					<div class="titleCell prog-title-bn">Bed No.:</div>
					<div class="contentCell prog-content-bn"><?php echo $bednum;?></div>
					<div class="titleCell prog-title-opd">Hospital No.:</div>
					<div class="contentCell prog-content-opd">#<?php echo $opdnum;?></div>
				</div>
			</div>
		</div>
	</div>
	<?php
	date_default_timezone_set("Asia/Manila");
	$curr_date = date('F d, Y', time());
	$curr_time = date('h:i a', time());
	?>
	<div id="doc-holder">
		<div id="guide-order-holder">
			<div class="doc-row">
				<div class="titleCell doc-guide-opt">C - Carried</div>
				<div class="titleCell doc-guide-opt">A - Administered</div>
				<div class="titleCell doc-guide-opt">R - Request Made</div>
				<div class="titleCell doc-guide-opt">E - Endorsed</div>
				<div class="titleCell doc-guide-opt" style="border-right: 1px solid #ccc;">D - Discontinued</div>
			</div>
		</div>
		<div id="doc-order-holder">
			<div class="doc-row">
				<div class="titleCell doc-header-dt">Date/Time</div>
				<div class="titleCell doc-header-order">Order</div>
				<div class="titleCell doc-header-opt">C</div>
				<div class="titleCell doc-header-opt">A</div>
				<div class="titleCell doc-header-opt">R</div>
				<div class="titleCell doc-header-opt">E</div>
				<div class="titleCell doc-header-opt" style="border-right: 1px solid #ccc;">D</div>
			</div>
		</div>
		<div id="row-holder"></div>
		<?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?>
		<div id="form-doc-holder">
			<div class="doc-row">
				<form id="doc-form">
					<input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
					<input type="hidden" name="rid" id="rid" value="<?php echo $rid;?>"/>
					<input type="hidden" name="aid" id="aid" value="<?php echo $aid;?>"/>
					
					<div class="contentCell doc-form-dt"><?php echo $curr_date;?> <?php echo $curr_time;?></div>
					<div class="contentCell doc-form-order">
						<input type="text" name="docorders" id="docorders" class="docOrdField"/>
					</div>
					<div class="contentCell doc-content-submit">
						<input type="submit" name="subDocOrders" id="subDocOrders" class="disgbutton" disabled="disabled" value="Submit Doc Orders"/>
					</div>
				</form>
			</div>
		</div>
		<?php } ?>
	</div>
</div>
<script type="text/javascript">
$("#docorders").keyup(function (data) {              
	if ($("#docorders").val() != ""){  
		$("#subDocOrders").removeAttr("disabled").removeClass().addClass("greenbutton"); 
	} else {  
		$("#subDocOrders").attr("disabled", "disabled").removeClass().addClass("disgbutton"); 
	}  
});
</script>
<script type="text/javascript">
$("document").ready(function(){
	$("#row-holder").load("reload/loaddocorders.php?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&aid=<?php echo $aid;?>").fadeIn(500);
	
	
	$("#subDocOrders").click(function(){
		$('#waiting').slideDown(500);
		$('#message').hide(0);
			
		$.ajax({
				type : 'POST',
				url : 'dofiles/doAddDoctorsOrder.php',
				dataType : 'json',
				data: {
					pid : $('#pid').val(),
					rid : $('#rid').val(),
					aid : $('#aid').val(),
					docorders : $('#docorders').val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#doc-form').show(500);
						}else{
							$(':input','#doc-form')
							.not(':button, :submit, :reset, :hidden')
							.val('');
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#doc-form').show(500);
						}else{
							$(':input','#doc-form')
							.not(':button, :submit, :reset, :hidden')
							.val('');
							
							$("#row-holder").load("reload/loaddocorders.php?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&aid=<?php echo $aid;?>").fadeIn(500);
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