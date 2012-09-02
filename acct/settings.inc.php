<div id="accountHolder">
	<span class="pageTitle">Settings</span>
	<div class="field-wrapper">
		<span class="fieldTitle">Change Password</span>
		
		<div id="password-wrapper">
			<form id="changePassword">
				<div class="acct-row">
					<div class="title-cell pass-title" style="border-top: 1px solid #ccc; color: #dd4b39;">Input New Password:</div>
					<div class="content-cell pass-con" style="border-top: 1px solid #ccc;"><input type="password" name="newpass" id="newpass" title="Input New Password" class="regfield"/></div>
				</div>
				<div class="acct-row">
					<div class="title-cell pass-title" style="color: #dd4b39;">Confirm New Password:</div>
					<div class="content-cell pass-con"><input type="password" name="connewpass" id="connewpass" title="Confirm New Password" class="regfield"/></div>
				</div>
				<div class="acct-row">
					<div class="title-cell pass-title">&nbsp;</div>
						<div class="content-cell pass-con">
							<input type="hidden" id="uid" name="id" value="<?php echo $_SESSION['uid'];?>"/>
							<input type="submit" id="subChgPw" name="subChgPw" value="Update Password" class="disgbutton" title="Update Password"/>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	
	<div class="field-wrapper">
		<span class="fieldTitle" style="padding-left: 70px;">Login History</span>
		<div id="login-history">
			<div class="acct-row">
				<div class="title-cell" style="width: 210px; text-align: center; border-top: 1px solid #ccc; color: #dd4b39;">Date and Time</div>
				<div class="title-cell" style="width: 140px; text-align: center; border-top: 1px solid #ccc; color: #dd4b39;">Browser</div>
				<div class="title-cell" style="width: 100px; text-align: center; border-top: 1px solid #ccc; border-right: 1px solid #ccc; color: #dd4b39;">OS</div>
			</div>
	<?php
	$history = getLoginHistory($_SESSION["uid"]);
	if(empty($history)){
		echo '</div><div id="login-history"><div class="acct-row"><div class="content-cell" style="width: 473px; text-align: center; border-right: 1px solid #ccc;"><i>No Login History Recorded</i></div></div></div>';
	}else{
	foreach ($history as $h){		
	?>
			<div class="acct-row">
				<div class="content-cell"><?php echo date("F d, Y", strtotime($h["login"]));?> at <?php echo date("h:m:A", strtotime($h["login"]));?></div>
				<div class="content-cell"><?php echo $h["browser"];?></div>
				<div class="content-cell" style="border-right: 1px solid #ccc;"><?php echo $h["os"];?></div>
			</div>
	<?php
	}}
	?>
		</div>
		<div id="login-history">
			<div class="acct-row">
				<div class="content-cell" style="width: 473px; border: none; text-align: right;">
					<input type="button" name="del-login" id="del-login" value="Delete Login History" class="redbutton"/>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$("#newpass, #connewpass").keyup(function (data) {              
	if ($("#newpass").val() != "" && $("#connewpass").val() != ""){  
		$("#subChgPw").removeAttr("disabled").removeClass().addClass("greenbutton"); 
	} else {  
		$("#subChgPw").attr("disabled", "disabled").removeClass().addClass("disgbutton"); 
	}  
});
</script>
<script type="text/javascript">
$(function() {
	$("#del-login").click(function(){
		var info = 'uid=' + <?php echo $_SESSION["uid"];?>;
		if(confirm("Sure you want to delete your login history? There is NO undo!")){
		$('#waiting').slideDown(500);
		$('#message').hide(0);
		
			$.ajax({
				type: "GET",
				url: "dofiles/doDeleteLoginHistory.php",
				data: info,
				success: function(){
					window.location.href = "accountmgmt.php?acct=settings&msg=success";
   				}
			});
			
			//$(this).parents(".notesRow").animate({ backgroundColor: "#fbc7c7" }, "fast").animate({opacity: "hide" }, "slow");
		}
	return false;
	});
});
</script>
<script>
$("document").ready(function(){
	$("#subChgPw").click(function(){
		$('#waiting').slideDown(500);
		$('#message').hide(0);
		$('#newpass, #connewpass').blur();
		$("#subChgPw").removeClass().addClass("disgbutton").val("Changing..."); 
			
		$.ajax({
				type : 'POST',
				url : 'dofiles/doChangePass.php',
				dataType : 'json',
				data: {
					newpass : $("#newpass").val(),
					connewpass : $("#connewpass").val(),
					uid : $("#uid").val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
						
						$("#subChgPw").removeClass().addClass("greenbutton").val("Update Password"); 
			
						if (data.error === true){
							$('#changePassword').show(500);
						}else{
							$(':input','#changePassword')
							.not(':button, :submit, :reset, :hidden')
							.val('');
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
						
						$("#subChgPw").removeClass().addClass("disgbutton").val("Update Password"); 
			
						if (data.error === true){
							$('#changePassword').show(500);
						}else{
							$(':input','#changePassword')
							.not(':button, :submit, :reset, :hidden')
							.val('');
						}	
					}
				},

				error : function(XMLHttpRequest, textStatus, errorThrown) {
					$('#waiting').fadeOut(500);
					$('#message').removeClass().addClass('error').text('There was an error. Please try again later.').delay(500).fadeIn();
					$("#subChgPw").removeClass().addClass("greenbutton").val("Search"); 
				}
			});
			return false;
	});
});
</script>