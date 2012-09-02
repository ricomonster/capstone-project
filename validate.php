<?php
include 'init.php';

if (!logged_in()){
	header('Location: index.php');
	exit();
}

if (!isset($_GET["type"]) || !isset($_GET["pid"]) || !isset($_GET["loc"]) || empty($_GET["type"]) || empty($_GET["pid"]) || empty($_GET["loc"]) || checkPID($_GET["pid"]) === false || checkPriviledgeBilling($_SESSION['uid'])===true){
 	header("Location: pagenotfound.php");
	exit();
}
$type = $_GET["type"];
$pid = $_GET["pid"];
$loc = $_GET["loc"];

if(isset($type) || !empty($type)){
	switch($type){
		case 'edit':
			switch($loc){
				case 'pt':
					$rid = "";
					break;
					
				case 'rec':
					if(!isset($_GET["rid"]) || empty($_GET["rid"]) || checkRecord($pid, $_GET["rid"])===false){
					header("Location: pagenotfound.php");
					exit();
				}else{
					$rid = $_GET["rid"];
				}
			}
			break;
			
		case 'delete':
			switch($loc){
				case 'pt':
					$rid = "";
					break;
					
				case 'rec':
					if(!isset($_GET["rid"]) || empty($_GET["rid"]) || checkRecord($pid, $_GET["rid"])===false){
					header("Location: pagenotfound.php");
					exit();
				}else{
					$rid = $_GET["rid"];
				}
			}
			break;
		default:
			header("Location: pagenotfound.php");
			exit();
	}
}
?>
<!DOCTYPE HTML>
<head>
	<title>Verify Account :: Bacnotan District Hospital - Patient Information System</title>
	<?php include 'templates/meta.php';?>
    <link rel="icon" href="favicon.ico" type="image/ico"/>
    <link href="css/styleMain.css" rel="stylesheet" type="text/css">
    <link href="css/styleVerify.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="ajax/ajaxVerify.js"></script>
</head>
<body>
	<div id="pageContent">
    	<div id="header"><?php include 'templates/header.php'?></div>
        
        <div id="mainContent" style="margin-top:30px;">
        	<div id="message" style="display: none;"></div>
			<div id="waiting" style="display: none;"><div class="success">Verifying...</div></div>
            
			<div id="verifyHolder">
            <span class="pageTitle">You're about to delete or edit some data in  the system.</span>		<br/>
            <div id="tips">
			<p>To continue, please provide the necessary informations below to proceed.</p><br/>
            <p>This would verify if you're the real user of this account because this functions can change the validity of the data.</p>
            </div>
            	<form id="validateForm">
                	<table class="valTbl">
                    	<tr>
                        	<td class="verTitle"><label for="username">Username:</label></td>
                        	<td class="verField">
                				<div class="single-field">
	                				<input type="text" name="username" id="username" class="verfield" title="Input your Username"/>
    	        				</div>
							</td>
						</tr>
                        <tr>
                        	<td class="verTitle"><label for="password">Password:</label></td>
                   			<td class="verField">
                            	<div class="single-field">                				
		                			<input type="password" name="password" id="password" class="verfield" title="Input your Password"/>
        		    			</div>
							</td>
						</tr>
                        <tr>
                        	<td class="verTitle"><label for="cpassword">Confirm Password:</label></td>
                   			<td class="verField">
                            	<div class="single-field">                				
		                			<input type="password" name="cpassword" id="cpassword" class="verfield" title="Repeat your password"/>
        		    			</div>
							</td>
						</tr>
                        <tr>
                        	<td colspan="2">
                			    <div class="single-field">
									<?php
									if(empty($_SERVER['HTTP_REFERER'])){
										$prevpage = "index.php";
									}else{
										$prevpage = $_SERVER['HTTP_REFERER'];
									}
									?>
                                	<input type="hidden" name="loc" id="loc" value="<?php echo $loc;?>"/>
                                    <input type="hidden" name="type" id="type" value="<?php echo $type;?>"/>
                                    <input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
                                    <input type="hidden" name="rid" id="rid" value="<?php echo $rid;?>"/>
                                    <input type="hidden" name="uid" id="uid" value="<?php echo $_SESSION["uid"];?>"/>
                					<input type="submit" name="submitVer" id="submitVer" value="Continue" class="disgbutton" disabled="disabled"/>
                                    <input type="button" name="return" value="Cancel" class="redbutton" onClick="window.location.href='<?php echo $prevpage;?>'"/>
		       					</div>
							</td>
						</tr>
					</table>
				</form>
            </div>
        </div>
        
        <div id="footer"><?php include 'templates/footer.php'?></div>
    </div>
<script type="text/javascript">
$(document).ready(function(){
	$("#username, #password, #cpassword").keyup(function (data) {              
		if ($("#username").val() != "" &&
			$("#password").val() != "" &&
			$("#cpassword").val() != ""
		){  
			$("#submitVer").removeAttr("disabled").removeClass().addClass("greenbutton"); 
		} else {  
			$("#submitVer").attr("disabled", "disabled").removeClass().addClass("disgbutton"); 
		}  
	});
	
	$("input").focus(function(){
		$(this).parent().addClass("curFocus").children("div").toggle();
	});
	$("input").blur(function() {
		$(this).parent().removeClass("curFocus").children("div").toggle();
	});
});
</script>  
</body>
</html>