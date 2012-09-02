<?php
include 'init.php';

if (!logged_in()){
	header('Location: index.php');
	exit();
}
$msg="";

if(isset($_GET["ntf"])){
	$ntf = $_GET["ntf"];
	
	switch($ntf){
		case 'success':
			$msg = '<div class="success">You have successfully admitted the patient.</div>';
			break;
		case 'somethingwrong':
			$msg = '<div class="error">There is something wrong. Please try again.</div>';
			break;
		case 'successdischarge':
			$msg = '<div class="error">Patient successfully discharged!</div>';
			break;
		default:
			break;
	}
}
?>
<!DOCTYPE HTML>
<head>
	<title>Admission :: Bacnotan District Hospital - Patient Information System</title>
	<?php include 'templates/meta.php';?>
    <link rel="icon" href="favicon.ico" type="image/ico"/>
    <link href="css/styleMain.css" rel="stylesheet" type="text/css">
    <link href="css/styleAdmission.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
</head>
<body>
	<div id="pageContent">
    	<div id="header"><?php include 'templates/header.php'?></div>
        
        <div id="menuholder"><?php include 'menuholder/admissionmenu.php';?></div>
        
        <div id="mainContent" class="clearfix">
        <div id="message" style="display: none;"></div>
		<div id="waiting" style="display: none;"><div class="success">Verifying...</div></div>
		<?php echo $msg;?>
		
		<?php 
		$page_dir = 'admission';
	
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
			include ($page_dir.'/admittedpt.inc.php');
		}
		?>
        </div>
        
        <div id="footer"><?php include 'templates/footer.php'?></div>
    </div>
</body>
</html>