<?php
include 'init.php';

if (!logged_in()){
	header('Location: index.php');
	exit();
}
?>
<!DOCTYPE HTML>
<head>
	<title>Account Management :: Bacnotan District Hospital - Patient Information System</title>
	<?php include 'templates/meta.php';?>
    <link rel="icon" href="favicon.ico" type="image/ico"/>
    <link href="css/styleMain.css" rel="stylesheet" type="text/css">
    <link href="css/styleAccount.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" src="jquery/js/jquery.custom.min.js"></script>
    <script type="text/javascript" src="jquery/jquery.autoresize.js"></script>
    <script type="text/javascript" src="jquery/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="ajax/ajaxRegisterAccount.js"></script>
</head>
<body>
	<div id="pageContent">
    	<div id="header"><?php include 'templates/header.php'?></div>
        
        <div id="menuholder"><?php include 'menuholder/accountmenu.php';?></div>
        
        <div id="mainContent" class="clearfix">
        <div id="message" style="display: none;"></div>
		<div id="waiting" style="display: none;"><div class="success">Verifying...</div></div>
        <?php 
		$page_dir = 'acct';
	
		if (!empty($_GET['acct'])){
		
			$pages = scandir($page_dir, 0);
			unset($pages[0], $pages[1]);
		
			$p = $_GET['acct'];
		
			if(in_array($p.'.inc.php',$pages)){
				include ($page_dir.'/'.$p.'.inc.php');
			}else{
				echo '<font size=2>Sorry, page not found.</font>';
			}
		
		}else{
			include ($page_dir.'/myaccount.inc.php');
		}
		?>
        </div>
        
        <div id="footer"><?php include 'templates/footer.php'?></div>
    </div>
</body>
</html>