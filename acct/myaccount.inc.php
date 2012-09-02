<?php
$getInfo = getUserInfo($_SESSION["uid"]);
$getLastLog = getLastLogin($_SESSION["uid"]);

foreach ($getInfo as $info){
	$firstname = $info["firstname"];
	$lastname = $info["lastname"];
	$username = $info["username"];
	$datereg = date('F j, Y', strtotime($info['dateregistered']));
	$timereg = date('h:i A T', strtotime($info['dateregistered']));
	$datecurr = date('F j, Y', strtotime($info['lastlogin']));
	$timecurr = date('h:i A T', strtotime($info['lastlogin']));
}
$log = "";
foreach ($getLastLog as $log){
	$datelog = date('F j, Y', strtotime($log['login']));
	$timelog = date('h:i A T', strtotime($log['login']));
}
if (!empty($getLastLog)){
	$log = $datelog . " at " . $timelog;
}else{
	$log = "No data about your previous login.";
	}
?>
<div id="accountHolder">
	<span class="pageTitle">My Account</span>
    <div id="acctHolder">
    	<div class="info-field">
        	<label for="firstname">Name:</label>
            <span class="infofield"><?php echo $firstname;?> <?php echo $lastname;?></span>
		</div>
		<div class="info-field">
			<label for="username">Username:</label>
			<span class="infofield"><?php echo $username;?></span>
		</div>
		<div class="info-field">
			<label for="dateregistered">Date Registered:</label>
			<span class="infofield"><?php echo $datereg;?> at <?php echo $timereg;?></span>
		</div>
		<div class="info-field">
			<label for="current">Current Session:</label>
			<span class="infofield"><?php echo $datecurr;?> at <?php echo $timecurr;?></span>
		</div>
        <div class="info-field">
			<label for="lastlogin">Last Login:</label>
			<span class="infofield"><?php echo $log;?></span>
		</div>
    </div>
</div>
