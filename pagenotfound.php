<?php
include 'init.php';

if (!logged_in()){
	header('Location: index.php');
	exit();
}
?>
<!DOCTYPE HTML>
<head>
	<title>Page Not Found | Bacnotan District Hospital - Patient Information System</title>
	<?php include 'templates/meta.php';?>
    <link rel="icon" href="favicon.ico" type="image/ico"/>
    <link href="css/styleMain.css" rel="stylesheet" type="text/css">
	<link href="css/stylePnf.css" rel="stylesheet" type="text/css">
</head>
<body>
	<div id="pageContent">
    	<div id="header"><?php include 'templates/header.php'?></div>
        
        <div id="mainContent" class="clearfix" style="margin-top:30px;">
        
        <div id="message" style="display: none;"></div>
		<div id="waiting" style="display: none;"><div class="success">Verifying...</div></div>
        	
			<div id="pagenotfound">
				<span class="pageTitle">Page Not Found!</span>
				<div id="pnfContent">
					<span class="why">Why this page shows up?</span><br/>
					<div style="padding: 20px; margin: auto; width: 400px;">
						<strong>Reasons:</strong><br/>
						1. The page you are trying to access is not available or it does not exist.<br/>
						2. The page you are trying to access is lacking of accessibility due to privilidges.<br/>
						3. The page that you are looking expires.<br/>
						<br/>
						You can resume navigating the system by:
						<br/><br/>
						<center>
						&bull; <a href="javascript: history.go(-1)" title="Return to the previous page">Returning to the Previous Page</a><br/>
						&bull; <a href="index.php" title="Go to the systems main page">Going to the main page.</a>
						</center>
						<br/>
						If you believe this is an error, you can contact the administrator or the developer.
					</div>
				</div>
			</div>     
		</div>
        <div id="footer"><?php include 'templates/footer.php'?></div>
    </div>  
</body>
</html>