<div class="admittedHolder">
	<span class="pageTitle">Progress Notes</span>
	<div id="progHolder">
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
	<br/>
	<div id="progNotesHolder">
		<div id="progDataHolder">
			<div id="progFormHeader">
				<div class="progInfoHolder">
					<div class="titleCell prog-header-date">Date</div>
					<div class="titleCell prog-header-prognotes">Progress Notes</div>
				</div>
			</div>
			
			<div id="progNotesRow">
				
			</div>
			<?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?>
			<div id="progFormRow">
				<form id="progressForm">
					<input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
					<input type="hidden" name="rid" id="rid" value="<?php echo $rid;?>"/>
					<input type="hidden" name="aid" id="aid" value="<?php echo $aid;?>"/>
					<div class="progFormHolder">
						<div class="contentCell prog-content-date">
							<?php
							date_default_timezone_set("Asia/Manila");
							echo date('F d, Y', time());
							?>
						</div>
						<div class="contentCell prog-content-prognotes">
							<input type="text" name="prognotes" id="prognotes" class="progTextField"/>
							<input type="submit" name="subProg" id="subProg" value="Submit Progress Note" class="disgbutton" disabled="disabled"/>
						</div>
					</div>
				</form>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<script type="text/javascript">
$("#prognotes").keyup(function (data) {              
		if ($("#prognotes").val() != ""){  
			$("#subProg").removeAttr("disabled").removeClass().addClass("greenbutton"); 
		} else {  
			$("#subProg").attr("disabled", "disabled").removeClass().addClass("disgbutton"); 
		}  
	});
</script>
<script type="text/javascript">
$("document").ready(function(){
	$("#progNotesRow").load("reload/loadprogressnotes.php?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&aid=<?php echo $aid;?>").fadeIn(500);
	
	$("#subProg").click(function(){
		$('#waiting').slideDown(500);
		$('#message').hide(0);
		$("#subProg").removeClass().addClass("disgbutton").val("Adding..."); 
			
		$.ajax({
				type : 'POST',
				url : 'dofiles/doAddProgressNotes.php',
				dataType : 'json',
				data: {
					pid : $('#pid').val(),
					rid : $('#rid').val(),
					aid : $('#aid').val(),
					prognotes : $('#prognotes').val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					
					
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#progressForm').show(500);
							$("#subProg").removeClass().addClass("greenbutton").val("Submit Progress Note");
						}else{
							$(':input','#progressForm')
							.not(':button, :submit, :reset, :hidden')
							.val('');
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#progressForm').show(500);
						}else{
							$(':input','#progressForm')
							.not(':button, :submit, :reset, :hidden')
							.val('');
							$("#progNotesRow").load("reload/loadprogressnotes.php?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&aid=<?php echo $aid;?>").fadeIn(500);
							$("#subProg").removeClass().addClass("disgbutton").attr('disabled', 'disabled').val("Submit Progress Note");
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