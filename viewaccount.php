<?php
include 'init.php';
if (!logged_in()){
	header('Location: index.php');
	exit();
}

if(!isset($_GET["uid"]) || empty($_GET["uid"]) || checkUserExists($_GET["uid"])===false){
	header("Location: pagenotfound.php");
	exit();
}
$uid = $_GET["uid"];

$getInfo = getUserInfo($uid);
foreach ($getInfo as $info){
	$afirstname = $info["firstname"];
	$alastname = $info["lastname"];
	$ausername = $info["username"];
	$apriviledge = $info["priviledge"];
	$adatereg = date('F j, Y', strtotime($info['dateregistered']));
	$atimereg = date('h:i A T', strtotime($info['dateregistered']));
	$adatecurr = date('F j, Y', strtotime($info['lastlogin']));
	$atimecurr = date('h:i A T', strtotime($info['lastlogin']));
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Account Information of <?php echo $afirstname;?> <?php echo $alastname;?> :: Bacnotan District Hospital Information System</title>
	<?php include 'templates/meta.php';?>
    <link rel="icon" href="favicon.ico" type="image/ico"/>
    <link href="css/styleMain.css" rel="stylesheet" type="text/css">
    <link href="css/styleViewAccount.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
</head>
<body>
	<div id="pageContent">
    	<div id="header"><?php include 'templates/header.php'?></div>
        
        <div id="mainContent" class="clearfix" style="margin-top:30px;">
        
			<div id="message" style="display: none;"></div>
			<div id="waiting" style="display: none;"><div class="success">Verifying...</div></div>
        	
			<div id="account-wrapper">
				<span class="pageTitle">Account Information of <?php echo $afirstname;?> <?php echo $alastname;?></span>
    			<div id="accountHolder">
					<div class="field-wrapper">
						<span class="fieldTitle">Reset Password</span>
						<form id="changePassword">
							<div id="password-wrapper">
								<div class="acct-row">
									<div class="title-cell pass-title" style="border-top: 1px solid #ccc;">Input New Password:</div>
									<div class="content-cell pass-con" style="border-top: 1px solid #ccc;"><input type="password" name="newpass" id="newpass" title="Input New Password" class="regfield"/></div>
								</div>
								<div class="acct-row">
									<div class="title-cell pass-title">Confirm New Password:</div>
									<div class="content-cell pass-con"><input type="password" name="connewpass" id="connewpass" title="Confirm New Password" class="regfield"/></div>
								</div>
								<div class="acct-row">
									<div class="title-cell pass-title">&nbsp;</div>
									<div class="content-cell pass-con">
										<input type="hidden" id="uid" name="id" value="<?php echo $uid;?>"/>
										<input type="submit" id="subChgPw" name="subChgPw" value="Update Password" class="disgbutton" title="Update Password"/>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="field-wrapper">
						<span class="fieldTitle">Change Priviledge</span>
						<form id="changePriviledge">
							<div id="priviledge-wrapper">
								<div class="acct-row">
									<div class="title-cell pass-title" style="border-top: 1px solid #ccc;">Change Priviledge:</div>
									<div class="content-cell pass-con" style="border-top: 1px solid #ccc;">
										<select name="priviledge" id="priviledge" class="regfield">
											<option value="Billing" <?php if($apriviledge == "Billing"){echo 'selected="selected"';}?>>Billing</option>
											<option value="Administrator" <?php if($apriviledge == "Administrator"){echo 'selected="selected"';}?>>Admin</option>
											<option value="Patient Care" <?php if($apriviledge == "Patient Care"){echo 'selected="selected"';}?>>Patient Care</option>
										</select>
									</div>
								</div>
								<div class="acct-row">
									<div class="title-cell pass-title">&nbsp;</div>
									<div class="content-cell pass-con">
										<input type="hidden" id="uid" name="id" value="<?php echo $uid;?>"/>
										<input type="submit"id="subPriv" name="subPriv" value="Change Priviledge" class="greenbutton" title="Change Priviledge"/>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="field-wrapper">
						<span class="fieldTitle">Delete Account</span>
						<form id="deleteAccount">
							<div id="priviledge-wrapper">
								<div class="acct-row">
									<div class="title-cell pass-title" style="border-top: 1px solid #ccc">&nbsp;</div>
									<div class="content-cell pass-con" style="border-top: 1px solid #ccc"><input type="submit" id="delAccount" name="deleteAccount" value="Delete Account" title="Delete Account" class="redbutton"/></div>
								</div>
							</div>
						</form>
					</div>
					<div class="field-wrapper">
						<div id="priviledge-wrapper">
							<div class="acct-row">
								<div class="title-cell pass-title" style="border: none;">&nbsp;</div>
								<div class="content-cell pass-con" style="border: none; text-align: right;">
									<input type="button" value="Return" title="Return to Manage Account Page" class="whitebutton" onclick="window.location = 'accountmgmt.php?acct=manageacct'"/>
								</div>
							</div>
						</div>
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
	
	$("#subPriv").click(function(){
		$('#waiting').slideDown(500);
		$('#message').hide(0);
		$("#subPriv").removeClass().addClass("disgbutton").val("Changing..."); 
			
		$.ajax({
				type : 'POST',
				url : 'dofiles/doChangePriviledge.php',
				dataType : 'json',
				data: {
					priviledge : $("#priviledge").val(),
					uid : $("#uid").val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
						
						$("#subPriv").removeClass().addClass("greenbutton").val("Change Priviledge"); 
			
						if (data.error === true){
							$('#changePriviledge').show(500);
						}else{
							$(':input','#changePriviledge')
							.not(':button, :submit, :reset, :hidden')
							.val('');
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
						
						$("#subPriv").removeClass().addClass("greenbutton").val("Change Priviledge"); 
			
						if (data.error === true){
							$('#changePriviledge').show(500);
						
							
						}	
					}
				},

				error : function(XMLHttpRequest, textStatus, errorThrown) {
					$('#waiting').fadeOut(500);
					$('#message').removeClass().addClass('error').text('There was an error. Please try again later.').delay(500).fadeIn();
					$("#subPriv").removeClass().addClass("greenbutton").val("Change Priviledge"); 
				}
			});
			return false;
	});
	
	$("#delAccount").click(function(){
		$('#waiting').slideDown(500);
		$('#message').hide(0);
		$("#delAccount").removeClass().addClass("disgbutton").val("Deleting..."); 
			
		$.ajax({
				type : 'POST',
				url : 'dofiles/doDeleteAccount.php',
				dataType : 'json',
				data: {
					uid : $("#uid").val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
						
						$("#delAccount").removeClass().addClass("greenbutton").val("Delete Account"); 
			
						if (data.error === true){
							$('#deleteAccount').show(500);
						}else{
							window.location.href = data.msg;
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
						
						$("#delAccount").removeClass().addClass("greenbutton").val("Change Priviledge"); 
			
						if (data.error === true){
							$('#deleteAccount').show(500);
						}else{
							window.location.href = data.msg;
						}	
					}
				},

				error : function(XMLHttpRequest, textStatus, errorThrown) {
					$('#waiting').fadeOut(500);
					$('#message').removeClass().addClass('error').text('There was an error. Please try again later.').delay(500).fadeIn();
					$("#delAccount").removeClass().addClass("greenbutton").val("Delete Account"); 
				}
			});
			return false;
	});
});
</script>
</body>
</html>