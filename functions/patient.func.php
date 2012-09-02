<?php
function addPatient($firstname, $middlename, $lastname, $membership, $sex, $cs, $birthday, $opdnum, $address, $placeofbirth, $occupation, $contactno, $religion, $nationality,$dateofvisit, $age, $timein, $inampm, $sys, $dia, $cr, $rr, $temp, $weight, $complaint){

	$firstname = mysql_real_escape_string($firstname);
	$middlename = mysql_real_escape_string($middlename);
	$lastname = mysql_real_escape_string($lastname);
	$membership = mysql_real_escape_string($membership);
	$sex = mysql_real_escape_string($sex);
	$cs = mysql_real_escape_string($cs);
	$birthday = mysql_real_escape_string($birthday);
	$opdnum = mysql_real_escape_string($opdnum);
	$address = mysql_real_escape_string($address);
	$placeofbirth = mysql_real_escape_string($placeofbirth);
	$contactno = mysql_real_escape_string($contactno);
	$occupation = mysql_real_escape_string($occupation);
	$religion = mysql_real_escape_string($religion);
	$nationality = mysql_real_escape_string($nationality);
	$dateofvisit = mysql_real_escape_string($dateofvisit);
	$age = mysql_real_escape_string($age);
	$timein = mysql_real_escape_string($timein);
	$inampm = mysql_real_escape_string($inampm);
	$sys = (int)$sys;
	$dia = (int)$dia;
	$cr = (int)$cr;
	$rr = (int)$rr;
	$temp = (int)$temp;
	$weight = (int)$weight;
	$complaint = mysql_real_escape_string($complaint);

	$intime = $timein . " " . $inampm;
	$bp = "$sys/$dia";

	mysql_query("INSERT INTO tblpatients (firstname, middlename, lastname, membership, sex, cs, dateofbirth, opdnum, address, placeofbirth, occupation, contactno, religion, nationality, dateregistered) VALUES ('$firstname', '$middlename', '$lastname', '$membership', '$sex', '$cs', '$birthday', '$opdnum', '$address', '$placeofbirth', '$occupation', '$contactno', '$religion', '$nationality',now())");

	$pid = mysql_insert_id();

	mysql_query("INSERT INTO tblpatientrecords (pid, dateofvisit, age, timein, bp, cr, rr, temp, weight, complaint, dateregistered) VALUES ('$pid','$dateofvisit', '$age', '$intime', '$bp', '$cr', '$rr', '$temp', '$weight', '$complaint', now())");
}

function editPatient($pid, $firstname, $middlename, $lastname, $membership, $sex, $cs, $bdMonth, $bdDay, $bdYear, $opdnum, $address, $placeofbirth, $occupation, $contactno, $religion, $nationality){
	$pid = (int)$pid;
	$firstname = mysql_real_escape_string($firstname);
	$middlename = mysql_real_escape_string($middlename);
	$lastname = mysql_real_escape_string($lastname);
	$membership = mysql_real_escape_string($membership);
	$sex = mysql_real_escape_string($sex);
	$cs = mysql_real_escape_string($cs);
	$bdMonth = (int)$bdMonth;
	$bdDay = (int)$bdDay;
	$bdYear = (int)$bdYear;
	$opdnum = mysql_real_escape_string($opdnum);
	$address = mysql_real_escape_string($address);
	$placeofbirth = mysql_real_escape_string($placeofbirth);
	$contactno = mysql_real_escape_string($contactno);
	$occupation = mysql_real_escape_string($occupation);
	$religion = mysql_real_escape_string($religion);
	$nationality = mysql_real_escape_string($nationality);

	$birthday = "$bdYear-$bdMonth-$bdDay";

	mysql_query("UPDATE tblpatients SET firstname='$firstname', middlename='$middlename', lastname='$lastname', membership='$membership', sex='$sex', cs='$cs', dateofbirth='$birthday', opdnum='$opdnum', address='$address', placeofbirth='$placeofbirth', contactno='$contactno', occupation='$occupation', religion='$religion', nationality='$nationality' WHERE pid='$pid'");
}

function getAllPatients($start, $per_page){
	$ptInfo = array();
	
	$ptquery = mysql_query("SELECT * FROM tblpatients ORDER BY lastname ASC LIMIT $start, $per_page");
	while ($row = mysql_fetch_assoc($ptquery)){
		$ptInfo[] = array(
					'pid' => $row['pid'],
					'firstname' => $row['firstname'],
					'middlename' => $row['middlename'],
					'lastname' => $row['lastname'],
					'opdnum' => $row['opdnum'],
					'dateofbirth' => $row['dateofbirth'],
					'cs' => $row['cs']
				);
	}
	return $ptInfo;
}

function getPatientsTod($start, $per_page, $curr_date){
	$curr_date = mysql_real_escape_string($curr_date);
	$ptInfo = array();
	
	$ptquery = mysql_query("SELECT * FROM tblpatientrecords WHERE dateregistered = '$curr_date' AND timeout='' AND foradmission!='Yes' ORDER BY timein DESC LIMIT $start, $per_page");
	while ($row = mysql_fetch_assoc($ptquery)){
		$ptInfo[] = array(
					'pid' => $row['pid'],
					'rid' => $row['rid']
				);
	}
	return $ptInfo;
}

function getPtInfo($pid){
	$pid = (int)$pid;
	
	$ptInfo = array();
	
	$ptquery = mysql_query("SELECT * FROM tblpatients WHERE pid='$pid' LIMIT 1");
	while ($rowInfo = mysql_fetch_assoc($ptquery)){
		$ptInfo[] = array(
					'pid' => $rowInfo['pid'],
					'firstname' => $rowInfo['firstname'],
					'middlename' => $rowInfo['middlename'],
					'lastname' => $rowInfo['lastname'],
					'membership' => $rowInfo['membership'],
					'sex' => $rowInfo['sex'],
					'opdnum' => $rowInfo['opdnum'],
					'dateofbirth' => $rowInfo['dateofbirth'],
					'cs' => $rowInfo['cs'],
					'address' => $rowInfo['address'],
					'placeofbirth' => $rowInfo['placeofbirth'],
					'occupation' => $rowInfo['occupation'],
					'contactno' => $rowInfo['contactno'],
					'religion' => $rowInfo['religion'],
					'nationality' => $rowInfo['nationality']
				);
	}
	return $ptInfo;
}

function deletePatient($pid){
	$pid = (int)$pid;
	
	mysql_query("DELETE FROM tblpatients WHERE pid='$pid'");
	mysql_query("DELETE FROM tblpatientrecords WHERE pid='$pid'");
}

function countAllPt(){
	
	$count= mysql_query("SELECT COUNT('pid') FROM tblpatients");
	
	return $count;
}

function countAllPtTod($curr_date){
	$curr_date = mysql_real_escape_string($curr_date);
	
	$count= mysql_query("SELECT COUNT('rid') FROM tblpatients WHERE dateregistered='$curr_date'");
	
	return $count;
}

function getSearchResults($query, $start, $per_page){
	$ptInfo = array();
	
	$ptquery = mysql_query("SELECT * FROM tblpatients WHERE $query ORDER BY opdnum DESC LIMIT $start, $per_page");
	while ($row = mysql_fetch_assoc($ptquery)){
		$ptInfo[] = array(
					'pid' => $row['pid'],
					'firstname' => $row['firstname'],
					'middlename' => $row['middlename'],
					'lastname' => $row['lastname'],
					'opdnum' => $row['opdnum'],
					'dateofbirth' => $row['dateofbirth'],
					'cs' => $row['cs']
				);
	}
	return $ptInfo;
}

function countSearchResults($query){
	
	$count= mysql_query("SELECT COUNT('pid') FROM tblpatients WHERE $query");
	
	return $count;
}
?>