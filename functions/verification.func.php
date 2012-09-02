<?php
function checkOPD($opdnum){
	$opdnum = mysql_real_escape_string($opdnum);
	$query = mysql_query("SELECT COUNT('pid') FROM tblpatients WHERE opdnum='$opdnum'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function checkPatient($firstname, $middlename, $lastname){
	$firstname = mysql_real_escape_string($firstname);
	$middlename = mysql_real_escape_string($middlename);
	$lastname = mysql_real_escape_string($lastname);
		
	$checkquery = mysql_query("SELECT COUNT(pid) as count, pid FROM tblpatients WHERE firstname = '$firstname' AND middlename = '$middlename' AND lastname='$lastname'");
	return (mysql_result($checkquery, 0) == 1) ? true : false;
}

function lastVisit($pid){
	$pid = (int)$pid;
	
	$lastVisit = array();
	
	$visitquery = mysql_query("SELECT rid, dateofvisit FROM tblpatientrecords WHERE pid='$pid' ORDER BY dateofvisit DESC LIMIT 1");
	while ($rowlast = mysql_fetch_assoc($visitquery)){
		$lastVisit[] = array(
					'rid' => $rowlast['rid'],
					'dateofvisit' => $rowlast['dateofvisit']
				);
	}
	return $lastVisit;
}

function lastOPD(){
	
	$lastOPD = array();
	
	$opdquery = mysql_query("SELECT opdnum FROM tblpatients ORDER BY opdnum DESC LIMIT 1");
	while ($rowopd = mysql_fetch_assoc($opdquery)){
		$lastOPD[] = array(
					'opdnum' => $rowopd['opdnum']
				);
	}
	return $lastOPD;
}

function incOPD($var){
	
	list($third, $second, $first) = explode('-', $var);
	
	$third = (int) $third;
    $second = (int) $second;
    $first = (int) $first;

    if($first < 99 && $second == 0 && $third == 0){

        $first = $first + 1;

    }
    elseif($first == 99 && $second == 0 && $third == 0){

        $first = 0;
        $second = $second + 1;

    }
    elseif($second < 99 && $first == 0 && $third == 0){

        $second = $second + 1;

    }
    elseif($second == 99 && $first == 0 && $third == 0){

        $second = 0;
        $third = $third + 1;

    }
	elseif($third < 99 && $second == 0 && $third == 0){

        $third = $third + 1;

    }
  	

    ($first < 10) ? $first = '0'.$first: $first;
    ($second < 10) ? $second = '0'.$second: $second;
    ($third < 10) ? $third = '0'.$third: $third;

    return $third.'-'.$second.'-'.$first;
}

function checkPriviledge($uid){
	$uid = (int)$uid;
	
	$query = mysql_query("SELECT COUNT('uid') FROM tblusers WHERE uid = $uid AND department='Administrator'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function checkPriviledgeBilling($uid){
	$uid = (int)$uid;
	
	$query = mysql_query("SELECT COUNT('uid') FROM tblusers WHERE uid = $uid AND department='Billing'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function checkPriviledgePatientCare($uid){
	$uid = (int)$uid;
	
	$query = mysql_query("SELECT COUNT('uid') FROM tblusers WHERE uid = $uid AND department='Patient Care'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function verifySearch($querysql){
	
	$query = mysql_query("SELECT COUNT('pid') FROM tblpatients WHERE $querysql");
	return (mysql_result($query, 0) >= 1) ? true : false;
}

function checkPID($pid){
	$pid = (int)$pid;
	$query = mysql_query("SELECT COUNT('pid') FROM tblpatients WHERE pid='$pid'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function checkRecord($pid, $rid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	
	$query = mysql_query("SELECT COUNT('rid') FROM tblpatientrecords WHERE rid='$rid' AND pid='$pid'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function checkForAdmit($pid, $rid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	
	$query = mysql_query("SELECT COUNT('rid') FROM tblpatientrecords WHERE rid='$rid' AND pid='$pid' AND foradmission='Yes' AND admit='Pending'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function checkRemarks($pid, $rid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	
	$query = mysql_query("SELECT COUNT('rid') FROM tblpatientrecords WHERE rid='$rid' AND pid='$pid' AND remarks = '' AND foradmission = ''");
	return (mysql_result($query, 0) == 1) ? true : false;
}
?>