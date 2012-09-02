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

if(!isset($_GET["did"]) || empty($_GET["did"]) || checkDocExists($_GET["did"]) === false){
	header("Location: pagenotfound.php");
	exit();
}
$did = $_GET["did"];

if(isset($_GET["ntf"])){
	$ntf = $_GET["ntf"];
	
	switch($ntf){
		case 'missing':
			$msg = '<div class="error">There are one or more fields empty.</div>';
			break;
		case 'missdate':
			$msg = '<div class="error">Please provide a date of the leave.</div>';
			break;
		case 'success':
			$msg = '<div class="success">You have successfully updated the duty.</div>';
			break;
		case 'somethingwrong':
			$msg = '<div class="success">There is something wrong. Please try again.</div>';
			break;
		default:
			break;
	}
}

$drProf = getDocProf($did);
foreach ($drProf as $dp){
	$firstname = $dp["firstname"];
	$middlename = $dp["middlename"];
	$lastname = $dp["lastname"]	;
	$title = $dp["title"];
	$specialty = $dp["specialization"];
	$contact = $dp["contact"];
	$address = $dp["address"];
	$duty = $dp["duty"];
	$professionalfee = $dp["professionalfee"];
}
?>
<!DOCTYPE HTML>
<head>
	<title>Dr. <?php echo $firstname;?> <?php echo $lastname;?>, <?php echo $title;?> :: Bacnotan District Hospital - Patient Information System</title>
	<?php include 'templates/meta.php';?>
    <link rel="icon" href="favicon.ico" type="image/ico"/>
    <link href="css/styleMain.css" rel="stylesheet" type="text/css">
    <link href="css/styleDocProf.css" rel="stylesheet" type="text/css">
    <link type="text/css" href="jquery/css/custom/jquery.custom.css" rel="Stylesheet" />
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" src="jquery/js/jquery.custom.min.js"></script>
</head>
<body>
	<div id="pageContent">
    	<div id="header"><?php include 'templates/header.php'?></div>
        
        <div id="menuholder"><?php include 'menuholder/docpagemenu.php'?></div>
        
        <div id="mainContent" class="clearfix">
        
        <div id="message" style="display: none;"></div>
		<div id="waiting" style="display: none;"><div class="success">Verifying...</div></div>
        <?php echo $msg;?>
        
        <?php 
		$page_dir = 'drprof';
	
		if (!empty($_GET['tab'])){
		
			$pages = scandir($page_dir, 0);
			unset($pages[0], $pages[1]);
		
			$p = $_GET['tab'];
		
			if(in_array($p.'.inc.php',$pages)){
				include ($page_dir.'/'.$p.'.inc.php');
			}else{
				header("Location: pagenotfound.php");
				exit();
			}
		
		}else{
			include ($page_dir.'/docprof.inc.php');
		}
		?>
        </div>
        
        <div id="footer"><?php include 'templates/footer.php'?></div>
    </div>
</body>
</html>