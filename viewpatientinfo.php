<?php
include 'init.php';
if (!logged_in()){
	header('Location: index.php');
	exit();
}

$msg = "";
if (isset($_SESSION['msg']) && !empty($_SESSION['msg'])){
	$msg = $_SESSION['msg'];
}
unset($_SESSION['msg']);

if(!isset($_GET["pid"]) || empty($_GET["pid"]) || checkPID($_GET["pid"]) === false){
	header("Location: pagenotfound.php");
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
		$placeofbirth = $in["placeofbirth"];
		$occupation = $in["occupation"];
		$contactno = $in["contactno"];
		$religion = $in["religion"];
		$nationality = $in["nationality"];
	}
}
?>
<!DOCTYPE HTML>
<head>
	<title>Patient #<?php echo $opdnum;?> :: Bacnotan District Hospital - Patient Information System</title>
	<?php include 'templates/meta.php';?>
    <link rel="icon" href="favicon.ico" type="image/ico"/>
    <link href="css/styleMain.css" rel="stylesheet" type="text/css">
    <link href="css/stylePatientRecord.css" rel="stylesheet" type="text/css">
    <link type="text/css" href="jquery/css/custom/jquery.custom.css" rel="Stylesheet" />
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" src="jquery/js/jquery.custom.min.js"></script>
    <script type="text/javascript" src="jquery/jquery.autoresize.js"></script>
    <script type="text/javascript" src="jquery/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="ajax/ajaxAddRecord.js"></script>
</head>
<body>
	<div id="pageContent">
    	<div id="header"><?php include 'templates/header.php'?></div>
        
        <div id="menuholder"><?php include 'menuholder/recordmenu.php'?></div>
        
        <div id="mainContent" class="clearfix">
        
        <div id="message" style="display: none;"></div>
		<div id="waiting" style="display: none;"><div class="success">Verifying...</div></div>
        <?php echo $msg;?>
        
        <?php 
		$page_dir = 'ptinfo';
	
		if (!empty($_GET['ref'])){
		
			$pages = scandir($page_dir, 0);
			unset($pages[0], $pages[1]);
		
			$p = $_GET['ref'];
		
			if(in_array($p.'.inc.php',$pages)){
				include ($page_dir.'/'.$p.'.inc.php');
			}else{
				echo '<font size=2>Sorry, page not found.</font>';
			}
		
		}else{
			include ($page_dir.'/ptinfo.inc.php');
		}
		?>
        </div>
        
        <div id="footer"><?php include 'templates/footer.php'?></div>
    </div>
</body>
</html>