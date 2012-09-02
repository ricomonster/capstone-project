<?php
if (logged_in()){
	header('Location: index.php');
	exit();
}
?>
<!DOCTYPE HTML>
<head>
	<title>Login Page :: Bacnotan District Hospital Information System</title>
	<?php include 'templates/meta.php';?>
    <link rel="icon" href="favicon.ico" type="image/ico"/>
    <link href="css/styleMain.css" rel="stylesheet" type="text/css">
    <link href="css/styleLogin.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="ajax/ajaxLogin.js"></script>
</head>
<body>
	<div id="pageContent">
    	<div id="header"><?php include 'templates/header.php'?></div>
        
        <div id="menuholder"><?php include 'menuholder/loginmenu.php'?></div>
  
        <div id="logContent">
        	<div id="loginHolder">
            	<div id="rightForm">
                	<div id="message" style="display: none;"></div>
					<div id="waiting" style="display: none;"><div class="successlog">Verifying...</div></div>
                	
                    <div id="holder">
                		<span class="logTitle">Please provide your username and password to continue.</span>
                		
                        <form id="loginForm">
                			<div class="single-field">
                				<label for="username">Username:</label>
                				<input type="text" name="username" id="username" class="logfield" title="Input your Username"/>
            				</div>
                   			<div class="single-field">
                				<label for="password">Password:</label>
		                		<input type="password" name="password" id="password" class="logfield" title="Input your Password"/>
        		    		</div>
                		    <div class="submit-field">
                				<input type="submit" name="submitLogin" id="submitLogin" value="Login" class="greenbutton"/>
		       				</div>
        		        </form>
                		
                        <span class="tips">No account? Please contact the administrator of the page and ask for an access in the system.</span>
                	</div>
                </div>
                
                <div id="leftForm">
                	<span class="welTitle">Welcome to the<br/>Bacnotan District Hospital<br/>Information System</span>
                    <br/>
                    <br/>
                    <span class="welSubtitle">For fast, easy and quality service for the patients.</span>
                </div>
            </div>
        </div>
        
        <div id="footer"><?php include 'templates/footer.php'?></div>
    </div>
</body>
</html>