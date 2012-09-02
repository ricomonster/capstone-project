<?php
function logged_in(){
	return isset($_SESSION['securedid']);
}

function addUser($firstname, $lastname, $username, $password, $priviledge){
	$firstname = mysql_real_escape_string($firstname);
	$lastname = mysql_real_escape_string($lastname);
	$username = mysql_real_escape_string($username);
	$password = mysql_real_escape_string($password);
	$priviledge = mysql_real_escape_string($priviledge);
	
	$passwordDb = sha1($password);
	
	mysql_query("INSERT INTO tblusers (firstname, lastname, username, password, department,dateregistered)
	VALUES('$firstname', '$lastname', '$username', '$passwordDb', '$priviledge',now())");
}

function checkUser($username){
	$username = mysql_real_escape_string($username);
	
	$query = mysql_query("SELECT COUNT('uid') FROM tblusers WHERE username='$username'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function checkPassword($username, $password){
	$username = mysql_real_escape_string($username);
		
	$login_query = mysql_query("SELECT COUNT(uid) as count, uid FROM tblusers WHERE username = '$username' AND password = '" . sha1($password) . "'");
	return (mysql_result($login_query, 0) == 1) ? mysql_result($login_query, 0, 'uid') : false;
}

function loginCheck($username){
	$username = mysql_real_escape_string($username);
	mysql_query("UPDATE tblusers SET lastlogin = now() WHERE username='$username'");
}

function loginLog($uid ,$browser, $os){
	$uid = (int)$uid;
	$browser = mysql_real_escape_string($browser);
	$os = mysql_real_escape_string($os);
	
	mysql_query("INSERT INTO tbllogins (uid, browser, os, login)
	VALUES('$uid', '$browser', '$os', now())");
}

function getUserInfo($uid){
	$uid = (int)$uid;
	
	$info = array();
	
	$query = mysql_query("SELECT * FROM tblusers WHERE uid = '$uid' LIMIT 1");
	while ($row = mysql_fetch_assoc($query)){
		$info[] = array(
					'firstname' => $row['firstname'],
					'lastname' => $row['lastname'],
					'username' => $row['username'],
					'priviledge' => $row['department'],
					'dateregistered' => $row['dateregistered'],
					'lastlogin' => $row['lastlogin']
				);
	}
	return $info;
}

function getLastLogin($uid){
	$uid = (int)$uid;
	
	$lastLog = array();
	
	$queryLog = mysql_query("SELECT login FROM tbllogins WHERE uid = '$uid' ORDER BY lid DESC LIMIT 1,1");
	while ($rowLog = mysql_fetch_assoc($queryLog)){
		$lastLog[] = array(
					'login' => $rowLog['login']
				);
	}
	return $lastLog;
}

function getLoginHistory($uid){
	$uid = (int)$uid;
	
	$lastLog = array();
	
	$queryLog = mysql_query("SELECT * FROM tbllogins WHERE uid = '$uid' ORDER BY lid DESC LIMIT 5");
	while ($rowLog = mysql_fetch_assoc($queryLog)){
		$lastLog[] = array(
					'login' => $rowLog['login'],
					'browser' => $rowLog['browser'],
					'os' => $rowLog['os']
				);
	}
	return $lastLog;
}

function checkUserReal($username, $uid){
	$username = mysql_real_escape_string($username);
	$uid = (int)$uid;
	
	$query = mysql_query("SELECT COUNT('uid') FROM tblusers WHERE username='$username' AND uid='$uid'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function checkPasswordTrue($username, $password, $uid){
	$uid = (int)$uid;
	$username = mysql_real_escape_string($username);
		
	$checkquery = mysql_query("SELECT COUNT(uid) FROM tblusers WHERE uid = '$uid' AND username = '$username' AND password = '" . sha1($password) . "'");
	return (mysql_result($checkquery, 0) == 1) ? true : false;
}

function getAllUsers(){
	$uid = $_SESSION["uid"];
	$users = "";
	
	$getusers = mysql_query("SELECT * FROM tblusers WHERE uid != '$uid' ORDER BY uid DESC");
	while($row = mysql_fetch_array($getusers)){
		if ($row["lastlogin"] != "0000-00-00 00:00:00"){
			$time = date("F d, Y h:m a", strtotime($row["lastlogin"]));
		}else{
			$time = "No last login found";
		}
	
		$users .= '<div class="acct-row-content" onclick="window.location = \'viewaccount.php?uid='.$row["uid"].'\'" title="Manage Account of '.$row["firstname"].' '.$row["lastname"].'">';
		$users .= '<div class="content-cell">'.$row["firstname"].' '.$row["lastname"].'</div>';
		$users .= '<div class="content-cell">'.$row["username"].'</div>';
		$users .= '<div class="content-cell">'.$row["department"].'</div>';
		$users .= '<div class="content-cell">'.$time.'</div>';
		$users .= '<div class="content-cell acct-cont-opt"><a href="viewaccount.php?uid='.$row["uid"].'" title="Manage Account of '.$row["firstname"].' '.$row["lastname"].'">Manage Account</a></div>';
		$users .= '</div>';
	}
	return $users;
}

function checkUserExists($uid){
	$uid = (int)$uid;
	
	$query = mysql_query("SELECT COUNT('uid') FROM tblusers WHERE uid='$uid'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function changePass($newpass, $uid){
	$uid = (int)$uid;
	$newpass = mysql_real_escape_string($newpass);
	
	mysql_query("UPDATE tblusers SET password = '" . sha1($newpass) . "' WHERE uid='$uid'");
}

function changePriv($priviledge, $uid){
	$uid = (int)$uid;
	$priviledge = mysql_real_escape_string($priviledge);
	
	mysql_query("UPDATE tblusers SET department = '$priviledge' WHERE uid='$uid'");
}

function deleteAccount($uid){
	$uid = (int)$uid;
	
	mysql_query("DELETE FROM tblusers WHERE uid='$uid'");
	mysql_query("DELETE FROM tbllogins WHERE uid='$uid'");
}

function addTheraName($theraname, $type, $price){
	$theraname = mysql_real_escape_string($theraname);
	$type = mysql_real_escape_string($type);
	$price = $price;
	
	mysql_query("INSERT INTO tbltheranames (therapeutic, type, price, datetimeadded) VALUES ('$theraname', '$type', '$price', now())");
}

function getTherapeutics(){
	$thera = "";
	
	$getthera = mysql_query("SELECT * FROM tbltheranames ORDER BY tnid ASC");
	while($row = mysql_fetch_array($getthera)){
		$thera .= '<div class="thera-row">';
		$thera .= '<div class="thera-cell-cont" style="width: 208px;">'.$row["therapeutic"].'</div>';
		$thera .= '<div class="thera-cell-cont" style="width: 104px;">'.$row["type"].'</div>';
		$thera .= '<div class="thera-cell-cont" style="width: 223px; border-right: 1px solid #ccc;">Php '.$row["price"].'</div>';
		$thera .= '</div>';
	}
	return $thera;
}

function getBrowser(){ 
	$u_agent = $_SERVER['HTTP_USER_AGENT']; 
	$bname = 'Unknown';
	$platform = 'Unknown';
	$version= "";

	//First get the platform?
	if (preg_match('/linux/i', $u_agent)) {
		$platform = 'Linux';
	}
	elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
		$platform = 'Mac';
	}
	elseif (preg_match('/windows|win32/i', $u_agent)) {
		$platform = 'Windows';
	}
	
	// Next get the name of the useragent yes seperately and for good reason
	if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
	{ 
		$bname = 'Internet Explorer'; 
		$ub = "MSIE"; 
	} 
	elseif(preg_match('/Firefox/i',$u_agent)) 
	{ 
		$bname = 'Mozilla Firefox'; 
		$ub = "Firefox"; 
	} 
	elseif(preg_match('/Chrome/i',$u_agent)) 
	{ 
		$bname = 'Google Chrome'; 
		$ub = "Chrome"; 
	} 
	elseif(preg_match('/Safari/i',$u_agent)) 
	{ 
		$bname = 'Apple Safari'; 
		$ub = "Safari"; 
	} 
	elseif(preg_match('/Opera/i',$u_agent)) 
	{ 
		$bname = 'Opera'; 
		$ub = "Opera"; 
	} 
	elseif(preg_match('/Netscape/i',$u_agent)) 
	{ 
		$bname = 'Netscape'; 
		$ub = "Netscape"; 
	} 
	
	// finally get the correct version number
	$known = array('Version', $ub, 'other');
	$pattern = '#(?<browser>' . join('|', $known) .
	')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
	if (!preg_match_all($pattern, $u_agent, $matches)) {
		// we have no matching number just continue
	}
	
	// see how many we have
	$i = count($matches['browser']);
	if ($i != 1) {
		//we will have two since we are not using 'other' argument yet
		//see if version is before or after the name
		if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
			$version= $matches['version'][0];
		}
		else {
			$version= $matches['version'][1];
		}
	}
	else {
		$version= $matches['version'][0];
	}
	
	// check if we have a number
	if ($version==null || $version=="") {$version="?";}
	
	return array(
		'userAgent' => $u_agent,
		'name'      => $bname,
		'version'   => $version,
		'platform'  => $platform,
		'pattern'    => $pattern
	);
}
function deleteLoginHistory($uid){
	$uid = (int)$uid;
	
	mysql_query("DELETE FROM tbllogins WHERE uid='$uid'");
}
?>