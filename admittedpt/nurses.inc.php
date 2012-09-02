<div class="admittedHolder">
	<span class="pageTitle">Nurse's Notes</span>
	<div id="notesInfoHolder">
		<div id="nursePtHolder">
			<div class="info-notes-wrapper">
				<div class="notesRow">
					<div class="titleCell notes-title-name">Name:</div>
					<div class="contentCell notes-content-name"><?php echo $lastname;?>, <?php echo $firstname;?> <?php echo $middlename;?></div>
					<div class="titleCell notes-title-age">Age:</div>
					<div class="contentCell notes-content-age"><?php echo $age;?></div>
					<div class="titleCell notes-title-cs">Civil Status:</div>
					<div class="contentCell notes-content-cs"><?php echo $cs;?></div>
					<div class="titleCell notes-title-ward">Ward:</div>
					<div class="contentCell notes-content-ward"><?php echo $service;?></div>
					<div class="titleCell notes-title-room">Room#:</div>
					<div class="contentCell notes-content-room"><?php echo $roomno;?></div>
				</div>
			</div>
		</div>
	</div>
	<br/>
	<div id="nurseNotesHolder">
		<div id="nurseFormHolder">
			<div id="info-notes-wrapper">
				<div class="notesRow">
					<div class="titleCell notes-header-date">Date</div>
					<div class="titleCell notes-header-time">Time</div>
					<div class="titleCell notes-header-nurse">Nurse</div>
					<div class="titleCell notes-header-nursenotes">Notes</div>
				</div>
			</div>
			
			<div id="nurse-notes-wrapper"></div>
			<?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?>
			<div id="nurse-form-wrapper">
				<div class="notesRow">
					<form id="nurseForm">
						<input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
						<input type="hidden" name="rid" id="rid" value="<?php echo $rid;?>"/>
						<input type="hidden" name="aid" id="aid" value="<?php echo $aid;?>"/>
						<?php
						date_default_timezone_set("Asia/Manila");
						$curr_date = date('F d, Y', time());
						$curr_time = date('h:i a', time());
						?>
						<div class="contentCell notes-form-date">
							<?php echo $curr_date;?>
						</div>
						<div class="contentCell notes-form-time">
							<?php echo $curr_time;?>
						</div>
						<div class="contentCell notes-form-nurse">
							<input type="text" name="nurse" id="nurse" class="nurseNameField" required="required"/>
						</div>
						<div class="contentCell notes-form-nursenotes">
							<input type="text" name="nursenotes" id="nursenotes" class="nurseField" required="required"/>
							<input type="submit" name="subNurseNotes" id="subNurseNotes" value="Submit Note" title="Submit Note" class="disgbutton"/>
						</div>
					</div>
				</div>
			</div>
			<?php }?>
		</div>
	</div>
</div>
<script type="text/javascript">
$("#nursenotes, #nurse").keyup(function (data) {              
	if ($("#nursenotes").val() != "" && $("#nurse").val() != ""){  
		$("#subNurseNotes").removeAttr("disabled").removeClass().addClass("greenbutton"); 
	} else {  
		$("#subNurseNotes").attr("disabled", "disabled").removeClass().addClass("disgbutton"); 
	}  
});
</script>
<script type="text/javascript">
$("document").ready(function(){
	$("#nurse-notes-wrapper").load("reload/loadnursenotes.php?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&aid=<?php echo $aid;?>").fadeIn(500);
	
	$("#subNurseNotes").click(function(){
		$('#waiting').slideDown(500);
		$('#message').hide(0);
			
		$.ajax({
				type : 'POST',
				url : 'dofiles/doAddNurseNotes.php',
				dataType : 'json',
				data: {
					pid : $('#pid').val(),
					rid : $('#rid').val(),
					aid : $('#aid').val(),
					nurse : $('#nurse').val(),
					nursenotes : $('#nursenotes').val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#nurseForm').show(500);
						}else{
							$(':input','#nurseForm')
							.not(':button, :submit, :reset, :hidden')
							.val('');
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#nurseForm').show(500);
						}else{
							$(':input','#nurseForm')
							.not(':button, :submit, :reset, :hidden')
							.val('').removeAttr('required');
							$("#nurse-notes-wrapper").load("reload/loadnursenotes.php?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&aid=<?php echo $aid;?>").fadeIn(500);
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