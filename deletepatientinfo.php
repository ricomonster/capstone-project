<?php
include 'init.php';
if (!logged_in()){
	header('Location: index.php');
	exit();
}

if(!isset($_GET['pid']) || !isset($_GET["scid"]) || empty($_GET['pid']) || empty($_GET["scid"]) || checkPID($_GET['pid']) === false || $_SESSION["scid"] != $_GET["scid"]){
	header ('Location: pagenotfound.php');
	exit();
}

$pid = $_GET["pid"];
$ptInfo = getPtInfo($pid);

if(empty($ptInfo)){
	header("Location: pagenotfound.php");
	exit();
}else{
	foreach ($ptInfo as $in){
		$pid = $in["pid"];
		$firstname = $in["firstname"];
		$middlename = $in["middlename"];
		$lastname = $in["lastname"];
		$membership = $in["membership"];
		$sex = $in["sex"];
		$cs = $in["cs"];
		$dob = $in["dateofbirth"];
		$dateofbirth = date('F d, Y', strtotime($in["dateofbirth"]));
		$opdnum = $in["opdnum"];
		$address = $in["address"];
	}
}
?>
<!DOCTYPE HTML>
<head>
	<title>Edit Patient Record | Bacnotan District Hospital - Patient Information System</title>
	<?php include 'templates/meta.php';?>
    <link rel="icon" href="favicon.ico" type="image/ico"/>
    <link href="css/styleMain.css" rel="stylesheet" type="text/css">
    <link href="css/styleDelete.css" rel="stylesheet" type="text/css">
    <link type="text/css" href="jquery/css/custom/jquery.custom.css" rel="Stylesheet" />
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" src="jquery/js/jquery.custom.min.js"></script>
    <script type="text/javascript" src="ajax/ajaxDeleteInfo.js"></script>
</head>
<body>
	<div id="pageContent">
    	<div id="header"><?php include 'templates/header.php'?></div>
        
        <div id="mainContent" class="clearfix" style="margin-top:30px;">
        
        <div id="message" style="display: none;"></div>
		<div id="waiting" style="display: none;"><div class="success">Deleting...</div></div>
			<div id="deleteHolder">
				<span class="pageTitle">Deleting Patient Information and Records of OPD# <?php echo $opdnum;?></span>
    				<div id="deleteformHolder">
    					<table class="infoTable">
                        <tr>
            				<td colspan=2>
                            	<form id="deleteInfo">
			                		You are about to delete the information and records of this patient.<br/>
                                	Do you want to proceed?
                                    <input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
                                	<input type="submit" name="subDelete" id="subDelete" class="redbutton" value="Yes" title="Delete Patient's Information"/>
    	        					<input type="button" name="edit" class="bluebutton" value="No" onClick="window.location.href='viewpatientinfo.php?pid=<?php echo $pid;?>'" title="Cancel in Deleting the Patient's Info"/>
                                </form>
                			</td>
            			</tr>
        				<tr>
            				<td width="30%"><label for="firstname">First Name:</label></td>
							<td><span class="info"><?php echo $firstname;?></span></td>
			            </tr>
            			<tr>
			            	<td><label for="middlename">Middle Name:</label></td>
            			    <td><span class="info"><?php echo $middlename;?></span></td>
			            </tr>
            			<tr>
			            	<td><label for="lastname">Last Name:</label></td>
            			    <td><span class="info"><?php echo $lastname;?></span></td>
			            </tr>
            			<tr>
			            	<td><label for="membership">Membership:</label></td>
            			    <td><span class="info"><?php echo $membership;?></span></td>
			            </tr>
						<tr>
			            	<td><label for="sex">Sex:</label></td>
            			    <td><span class="info"><?php echo $sex;?></span></td>
			            </tr>
						<tr>
			            	<td><label for="cs">Civil Status:</label></td>
            			    <td><span class="info"><?php echo $cs;?></span></td>
			            </tr>
						<tr>
			            	<td><label for="dateofbirth">Date of Birth:</label></td>
            			    <td><span class="info"><?php echo $dateofbirth;?></span></td>
			            </tr>
            			<tr>
			            	<td><label for="opdnum">OPD Number:</label></td>
            			    <td><span class="info"><?php echo $opdnum;?></span></td>
			            </tr>
            			<tr>
			            	<td valign="top"><label for="address">Address:</label></td>
            			    <td><span class="info"><?php echo $address;?></span></td>
			            </tr>
            			<tr>
			            	<td><label for="lastvisit">Last Visit:</label></td>
            		    	<td>
							<?php
							$last = lastVisit($pid);
							if(empty($last)){
							?>
								<span class="info">No Records Found.</span>
							<?php
							}else{
								foreach ($last as $lst){	
							?>
            					<span class="info"><?php echo date('F d, Y', strtotime($lst["dateofvisit"]));?></span>
			        	    <?php
								}
							}
							?>        
			                </td>
    			        </tr>
				    </table>
					</div>
				</div>
			</div>                
        <div id="footer"><?php include 'templates/footer.php'?></div>
    </div>
<script>
	$(window).unload( function () { '<?php unset($_SESSION['scid']);?>' } );
</script> 
</body>
</html>