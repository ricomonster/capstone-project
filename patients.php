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
?>
<!DOCTYPE HTML><head>
	<title>Patients | Bacnotan District Hospital - Patient Information System</title>
	<?php include 'templates/meta.php';?>
	<link rel="icon" href="favicon.ico" type="image/ico"/>
	<link href="css/styleMain.css" rel="stylesheet" type="text/css">
	<link href="css/styleOpdEr.css" rel="stylesheet" type="text/css">
	<link type="text/css" href="jquery/css/custom/jquery.custom.css" rel="Stylesheet" />
	<script type="text/javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" src="jquery/js/jquery.custom.min.js"></script>
	<script type="text/javascript" src="jquery/jquery.maskedinput.js"></script>
	<script type="text/javascript" src="jquery/jquery.autoresize.js"></script>
	<script type="text/javascript" src="ajax/ajaxAddPt.js"></script>
	<script type="text/javascript" src="ajax/ajaxSearchResults.js"></script>
</head>
<body>
	<div id="pageContent">
		<div id="header">
		<?php include 'templates/header.php'?>
		</div>
		
		<div id="menuholder"><?php include 'menuholder/patientmenu.php';?></div>
		
		<div id="mainContent" class="clearfix">
		<div id="message" style="display: none;"></div>
		<div id="waiting" style="display: none;"><div class="success">Verifying...</div></div>
		<?php echo $msg;?>
		<?php 
		$page_dir = 'patients';
	
		if (!empty($_GET['sk'])){
		
			$pages = scandir($page_dir, 0);
			unset($pages[0], $pages[1]);
		
			$p = $_GET['sk'];
		
			if(in_array($p.'.inc.php',$pages)){
				include ($page_dir.'/'.$p.'.inc.php');
			}else{
				echo '<font size=2>Sorry, page not found.</font>';
			}
		
		}else{
			include ($page_dir.'/patientlist.inc.php');
		}
		?>
		</div>
		
		<div id="footer"><?php include 'templates/footer.php'?></div>
	</div>
</body>
</html>