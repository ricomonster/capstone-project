<?php
function checkDocName($firstname, $middlename, $lastname){
	$firstname = mysql_real_escape_string($firstname);
	$middlename = mysql_real_escape_string($middlename);
	$lastname = mysql_real_escape_string($lastname);
	
		
	$checkquery = mysql_query("SELECT COUNT(did) as count, did FROM tbldoctors WHERE firstname = '$firstname' AND middlename = '$middlename' AND lastname='$lastname'");
	return (mysql_result($checkquery, 0) == 1) ? true : false;
}

function addDoctor($firstname, $middlename, $lastname, $title, $specialization, $position, $contact, $address, $duty){
	$firstname = mysql_real_escape_string($firstname);
	$middlename = mysql_real_escape_string($middlename);
	$lastname = mysql_real_escape_string($lastname);
	$title = mysql_real_escape_string($title);
	$specialization = mysql_real_escape_string($specialization);
	$position = mysql_real_escape_string($position);
	$contact = mysql_real_escape_string($contact);
	$address = mysql_real_escape_string($address);
	$duty = mysql_real_escape_string($duty);
	
	mysql_query("INSERT INTO tbldoctors (firstname, middlename, lastname, title, specialization, position, contact, address, duty, dateregistered) VALUES ('$firstname', '$middlename', '$lastname', '$title', '$specialization', '$position','$contact', '$address', '$duty',now())");
}

function getDoctors(){
	$drList = array();
	
	$drquery = mysql_query("SELECT * FROM tbldoctors ORDER BY lastname ASC");
	while ($row = mysql_fetch_assoc($drquery)){
		$drList[] = array(
					'did' => $row['did'],
					'firstname' => $row['firstname'],
					'lastname' => $row['lastname'],
					'title' => $row['title'],
					'specialization' => $row['specialization'],
					'position' => $row['position']
				);
	}
	return $drList;
}

function getAllDoctors(){
	$drAllList = array();
	
	$drquery = mysql_query("SELECT * FROM tbldoctors ORDER BY lastname ASC");
	while ($row = mysql_fetch_assoc($drquery)){
		$drAllList[] = array(
					'did' => $row['did'],
					'firstname' => $row['firstname'],
					'lastname' => $row['lastname'],
					'title' => $row['title'],
					'specialization' => $row['specialization'],
					'position' => $row['position'],
					'duty'=> $row['duty'],
					'contact'=> $row['contact']
				);
	}
	return $drAllList;
}

function getAllAvDoctors(){
	$drAllList = array();
	
	$drquery = mysql_query("SELECT * FROM tbldoctors WHERE duty='On-Duty' OR duty='On-Call' ORDER BY lastname ASC");
	while ($row = mysql_fetch_assoc($drquery)){
		$drAllList[] = array(
					'did' => $row['did'],
					'firstname' => $row['firstname'],
					'lastname' => $row['lastname'],
					'title' => $row['title'],
					'specialization' => $row['specialization'],
					'position' => $row['position'],
					'duty'=> $row['duty'],
					'contact'=> $row['contact']
				);
	}
	return $drAllList;
}

function getDocAttend($rid, $pid){
	$rid = (int)$rid;
	$pid = (int)$pid;
	
	$doctors = array();
	$sql = mysql_query("SELECT * FROM tbldoctors, tbldoctorsattended WHERE tbldoctorsattended.pid='$pid' AND tbldoctorsattended.rid='$rid' AND tbldoctorsattended.did = tbldoctors.did LIMIT 1");
	while ($row = mysql_fetch_assoc($sql)){
		$doctors[] = array(
			'did' => $row['did'],
			'firstname' => $row["firstname"],
			'lastname' => $row["lastname"],
			'title' => $row["title"],
			'task' => $row["task"],
			'specialization' => $row['specialization']
		);
	}
	return $doctors;
}

function getDoctorsTask($rid, $pid, $task){
	$rid = (int)$rid;
	$pid = (int)$pid;
	$task = mysql_real_escape_string($task);
	
	$doctors = array();
	$sql = mysql_query("SELECT * FROM tbldoctors, tbldoctorsattended WHERE tbldoctorsattended.pid='$pid' AND tbldoctorsattended.rid='$rid' AND tbldoctorsattended.did = tbldoctors.did AND tbldoctorsattended.task='$task' LIMIT 1");
	while ($row = mysql_fetch_assoc($sql)){
		$doctors[] = array(
			'did' => $row['did'],
			'firstname' => $row["firstname"],
			'lastname' => $row["lastname"],
			'title' => $row["title"],
			'task' => $row["task"],
			'specialization' => $row['specialization']
		);
	}
	return $doctors;
}

function getDoctorsAttend($rid, $pid){
	$rid = (int)$rid;
	$pid = (int)$pid;
	
	$doctors = array();
	$sql = mysql_query("SELECT * FROM tbldoctors, tbldoctorsattended WHERE tbldoctorsattended.pid='$pid' AND tbldoctorsattended.rid='$rid' AND tbldoctorsattended.did = tbldoctors.did");
	while ($row = mysql_fetch_assoc($sql)){
		$doctors[] = array(
			'did' => $row['did'],
			'firstname' => $row["firstname"],
			'lastname' => $row["lastname"],
			'title' => $row["title"],
			'task' => $row["task"],
			'professionalfee' => $row["professionalfee"]
		);
	}
	return $doctors;
}

function getDocProf($did){
	$did = (int)$did;

	$drProf = array();
	
	$drquery = mysql_query("SELECT * FROM tbldoctors WHERE did='$did' LIMIT 1");
	while ($row = mysql_fetch_assoc($drquery)){
		$drProf[] = array(
					'did' => $row['did'],
					'firstname' => $row['firstname'],
					'middlename' => $row['middlename'],
					'lastname' => $row['lastname'],
					'title' => $row['title'],
					'specialization' => $row['specialization'],
					'position' => $row['position'],
					'professionalfee' => $row['professionalfee'],
					'contact' => $row['contact'],
					'address' => $row['address'],
					'duty' => $row['duty']
				);
	}
	return $drProf;
}

function getDocPatients($did){
	$did = (int)$did;
	
	$drPt = array();
	
	$drptquery = mysql_query("SELECT * FROM tblpatientrecords, tblpatients, tbldoctorsattended WHERE tbldoctorsattended.did='$did' AND tblpatientrecords.rid=tbldoctorsattended.rid AND tbldoctorsattended.pid=tblpatients.pid AND tblpatientrecords.foradmission='Yes' AND tblpatientrecords.admit !='Walk-in' GROUP BY tblpatientrecords.pid ORDER BY tblpatients.lastname ASC");
	while ($row = mysql_fetch_assoc($drptquery)){
		$drPt[] = array(
					'rid' => $row["rid"],
					'pid' => $row["pid"],
					'firstname' => $row["firstname"],
					'middlename' => $row["middlename"],
					'lastname' => $row["lastname"],
					'opdnum' => $row["opdnum"]
				);
	}
	return $drPt;
}

function getDocPrevPatients($did){
	$did = (int)$did;
	
	$drPt = array();
	
	$drptquery = mysql_query("SELECT * FROM tblpatientrecords, tblpatients, tbldoctorsattended WHERE tbldoctorsattended.did = '$did' AND tbldoctorsattended.pid=tblpatients.pid AND tblpatientrecords.pid = tblpatients.pid AND tblpatientrecords.admit != 'Admitted' AND tblpatientrecords.admit != 'Pending Discharge' AND tblpatientrecords.foradmission = 'No' GROUP BY tblpatientrecords.pid ORDER BY tblpatients.lastname ASC");
	while ($row = mysql_fetch_assoc($drptquery)){
		$drPt[] = array(
					'rid' => $row["rid"],
					'pid' => $row["pid"],
					'firstname' => $row["firstname"],
					'middlename' => $row["middlename"],
					'lastname' => $row["lastname"],
					'opdnum' => $row["opdnum"]
				);
	}
	return $drPt;
}

function checkDocExists($did){
	$did = (int)$did;
	
	$query = mysql_query("SELECT COUNT('did') FROM tbldoctors WHERE did='$did'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function docDutyLeave($did, $upDuty, $dutyLeave){
	$did = (int)$did;
	$upDuty = mysql_real_escape_string($upDuty);
	$dutyLeave = mysql_real_escape_string($dutyLeave);
	
	mysql_query("UPDATE tbldoctors SET duty='$upDuty', dateleave='$dutyLeave' WHERE did='$did'");
}

function updateDuty($did, $upDuty){
	$did = (int)$did;
	$upDuty = mysql_real_escape_string($upDuty);
	
	mysql_query("UPDATE tbldoctors SET duty='$upDuty' WHERE did='$did'");
}

function updateProfFee($did, $proffee){
	$did = $did;
	$proffee = mysql_real_escape_string($proffee);
	
	mysql_query("UPDATE tbldoctors SET professionalfee='$proffee' WHERE did='$did'");
}

function checkDocExistAtPatient($pid,$rid,$did){
	$did = (int)$did;
	$pid = (int)$pid;
	$rid = (int)$rid;
	
	$query = mysql_query("SELECT COUNT('daid') FROM tbldoctorsattended WHERE did='$did' AND pid='$pid' AND rid='$rid'");
	return (mysql_result($query, 0) == 1) ? true : false;
}
?>