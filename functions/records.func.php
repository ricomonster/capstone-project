<?php
function addPatientRecord($pid, $dateofvisit, $age, $timein, $inampm, $sys, $dia, $cr, $rr, $temp, $weight, $complaint){

	$pid = (int)$pid;
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
	$complaint = mysql_real_escape_string(htmlentities($complaint));

	$intime = $timein . " " . $inampm;

	$bp = "$sys/$dia";

	mysql_query("INSERT INTO tblpatientrecords (pid, dateofvisit, age, timein, bp, cr, rr, temp, weight, complaint, dateregistered) VALUES ('$pid', '$dateofvisit', '$age', '$intime', '$bp', '$cr', '$rr', '$temp', '$weight', '$complaint',now())");
}

function editRecord($rid, $pid, $dateofvisit, $age, $timein, $inampm, $timeout, $outampm, $sys, $dia, $cr, $rr, $temp, $weight, $complaint, $remarks, $foradmission){

	$rid = (int)$rid;
	$pid = (int)$pid;
	$dateofvisit = mysql_real_escape_string($dateofvisit);
	$age = mysql_real_escape_string($age);
	$timein = mysql_real_escape_string($timein);
	$inampm = mysql_real_escape_string($inampm);
	$timeout = mysql_real_escape_string($timeout);
	$outamp = mysql_real_escape_string($outampm);
	$sys = (int)$sys;
	$dia = (int)$dia;
	$cr = (int)$cr;
	$rr = (int)$rr;
	$temp = (int)$temp;
	$weight = (int)$weight;
	$complaint = mysql_real_escape_string(htmlentities($complaint));
	$remarks = mysql_real_escape_string(htmlentities($remarks));
	$foradmission = mysql_real_escape_string($foradmission);

	$intime = $timein . " " . $inampm;
	$outtime = $timeout. " " .$outampm;
	$bp = "$sys/$dia";

	mysql_query("UPDATE tblpatientrecords SET dateofvisit='$dateofvisit', age='$age', timein='$intime', timeout='$outtime', bp='$bp', cr='$cr', rr='$rr', temp='$temp', weight='$weight', complaint='$complaint', remarks='$remarks', foradmission='$foradmission' WHERE rid='$rid' AND pid='$pid'");
}

function getRecords($pid){
	$pid = (int)$pid;
	
	$ptRec = array();
	
	$ptquery = mysql_query("SELECT * FROM tblpatientrecords WHERE pid='$pid' ORDER BY dateofvisit ASC");
	while ($rowRec = mysql_fetch_assoc($ptquery)){
		$ptRec[] = array(
					'rid' => $rowRec['rid'],
					'pid' => $rowRec['pid'],
					'dateofvisit' => $rowRec['dateofvisit'],
					'age' => $rowRec['age'],
					'timein' => $rowRec['timein'],
					'timeout' => $rowRec['timeout'],
					'bp' => $rowRec['bp'],
					'cr' => $rowRec['cr'],
					'rr' => $rowRec['rr'],
					'temp' => $rowRec['temp'],
					'weight' => $rowRec['weight'],
					'complaint' => $rowRec['complaint'],
					'remarks' => $rowRec['remarks'],
					'admit' => $rowRec['admit'],
					'foradmission' => $rowRec['foradmission']
				);
	}
	return $ptRec;
}

function getRecordsForMedHx($pid){
	$pid = (int)$pid;
	
	$ptRec = array();
	
	$ptquery = mysql_query("SELECT * FROM tblpatientrecords WHERE pid='$pid' AND remarks !='' AND foradmission !='' ORDER BY dateofvisit ASC");
	while ($rowRec = mysql_fetch_assoc($ptquery)){
		$ptRec[] = array(
					'rid' => $rowRec['rid'],
					'pid' => $rowRec['pid'],
					'dateofvisit' => $rowRec['dateofvisit'],
					'age' => $rowRec['age'],
					'timein' => $rowRec['timein'],
					'timeout' => $rowRec['timeout'],
					'bp' => $rowRec['bp'],
					'cr' => $rowRec['cr'],
					'rr' => $rowRec['rr'],
					'temp' => $rowRec['temp'],
					'weight' => $rowRec['weight'],
					'complaint' => $rowRec['complaint'],
					'remarks' => $rowRec['remarks'],
					'admit' => $rowRec['admit'],
					'foradmission' => $rowRec['foradmission']
				);
	}
	return $ptRec;
}

function getLastRecord($pid){
	$pid = (int)$pid;
	
	$ptRec = array();
	
	$ptquery = mysql_query("SELECT * FROM tblpatientrecords WHERE pid='$pid' AND remarks ='' AND foradmission ='' ORDER BY rid DESC LIMIT 1");
	while ($rowRec = mysql_fetch_assoc($ptquery)){
		$ptRec[] = array(
					'rid' => $rowRec['rid'],
					'pid' => $rowRec['pid'],
					'dateofvisit' => $rowRec['dateofvisit'],
					'age' => $rowRec['age'],
					'timein' => $rowRec['timein'],
					'timeout' => $rowRec['timeout'],
					'bp' => $rowRec['bp'],
					'cr' => $rowRec['cr'],
					'rr' => $rowRec['rr'],
					'temp' => $rowRec['temp'],
					'weight' => $rowRec['weight'],
					'complaint' => $rowRec['complaint'],
					'remarks' => $rowRec['remarks'],
					'admit' => $rowRec['admit'],
					'foradmission' => $rowRec['foradmission']
				);
	}
	return $ptRec;
}

function getPtRecord($pid, $rid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	
	$ptRc = array();
	
	$ptrquery = mysql_query("SELECT * FROM tblpatientrecords WHERE pid='$pid' AND rid='$rid' LIMIT 1");
	while ($rowRc = mysql_fetch_assoc($ptrquery)){
		$ptRc[] = array(
					'rid' => $rowRc['rid'],
					'pid' => $rowRc['pid'],
					'dateofvisit' => $rowRc['dateofvisit'],
					'age' => $rowRc['age'],
					'timein' => $rowRc['timein'],
					'timeout' => $rowRc['timeout'],
					'bp' => $rowRc['bp'],
					'cr' => $rowRc['cr'],
					'rr' => $rowRc['rr'],
					'temp' => $rowRc['temp'],
					'weight' => $rowRc['weight'],
					'complaint' => $rowRc['complaint'],
					'remarks' => $rowRc['remarks'],
					'admit' => $rowRc['admit'],
					'foradmission' => $rowRc['foradmission']
				);
	}
	return $ptRc;
}

function countRecords($pid){
	$pid = (int)$pid;
	
	$count= mysql_query("SELECT * FROM tblpatientrecords WHERE pid = '$pid'");
	$countrecords = mysql_num_rows($count);
	
	return $countrecords;
}

function deleteRecord($pid, $rid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	
	mysql_query("DELETE FROM tblpatientrecords WHERE pid='$pid' AND rid='$rid'");
}

function getPtDocRecords($pid, $did){
	$pid = (int)$pid;
	
	$ptRec = array();
	
	$ptquery = mysql_query("SELECT * FROM tblpatientrecords, tbldoctorsattended WHERE tbldoctorsattended.did='$did' AND tblpatientrecords.pid='$pid' AND tbldoctorsattended.pid='$pid' AND tbldoctorsattended.pid=tblpatientrecords.pid ORDER BY tblpatientrecords.dateofvisit DESC");
	while ($rowRec = mysql_fetch_assoc($ptquery)){
		$ptRec[] = array(
					'rid' => $rowRec['rid'],
					'pid' => $rowRec['pid'],
					'dateofvisit' => $rowRec['dateofvisit'],
					'age' => $rowRec['age'],
					'timein' => $rowRec['timein'],
					'timeout' => $rowRec['timeout'],
					'bp' => $rowRec['bp'],
					'cr' => $rowRec['cr'],
					'rr' => $rowRec['rr'],
					'temp' => $rowRec['temp'],
					'weight' => $rowRec['weight'],
					'complaint' => $rowRec['complaint'],
					'remarks' => $rowRec['remarks'],
					'admit' => $rowRec['admit'],
					'foradmission' => $rowRec['foradmission']
				);
	}
	return $ptRec;
}

function getPrevPtRecords($pid, $did){
	$pid = (int)$pid;
	
	$ptRec = array();
	
	$ptquery = mysql_query("SELECT * FROM tblpatientrecords, tbldoctorsattended WHERE tblpatientrecords.pid='$pid' AND tbldoctorsattended.did='$did' AND tblpatientrecords.admit != 'Admitted' AND tblpatientrecords.admit != 'Pending Discharged' AND tblpatientrecords.rid=tbldoctorsattended.rid ORDER BY tblpatientrecords.dateofvisit DESC");
	while ($rowRec = mysql_fetch_assoc($ptquery)){
		$ptRec[] = array(
					'rid' => $rowRec['rid'],
					'pid' => $rowRec['pid'],
					'dateofvisit' => $rowRec['dateofvisit'],
					'age' => $rowRec['age'],
					'timein' => $rowRec['timein'],
					'timeout' => $rowRec['timeout'],
					'bp' => $rowRec['bp'],
					'cr' => $rowRec['cr'],
					'rr' => $rowRec['rr'],
					'temp' => $rowRec['temp'],
					'weight' => $rowRec['weight'],
					'complaint' => $rowRec['complaint'],
					'remarks' => $rowRec['remarks'],
					'admit' => $rowRec['admit'],
					'foradmission' => $rowRec['foradmission']
				);
	}
	return $ptRec;
}

function addRemarks($remarks, $foradmission, $doctor, $pid, $rid, $admit){
	$remarks = mysql_real_escape_string($remarks);
	$foradmission = mysql_real_escape_string($foradmission);
	$doctor = (int)$doctor;
	$pid = (int)$pid;
	$rid = (int)$rid;
	$admit = mysql_real_escape_string($admit);
	
	mysql_query("UPDATE tblpatientrecords SET remarks='$remarks', foradmission='$foradmission', admit='$admit' WHERE pid='$pid' AND rid='$rid'");
	
	mysql_query("INSERT INTO tbldoctorsattended (pid, rid, did, task, datetimeadded) VALUES ('$pid', '$rid', '$doctor', 'Examined', now())");
}

function setTimeOut($rid, $curr_time){
	$rid = (int)$rid;
	$curr_time = mysql_real_escape_string($curr_time);
	
	mysql_query("UPDATE tblpatientrecords SET timeout = '$curr_time' WHERE rid='$rid'");
}
?>