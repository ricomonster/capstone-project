<?php
function getForAdmission(){
	$ptList = array();
	
	$admitQuery = mysql_query("SELECT * FROM tblpatientrecords WHERE tblpatientrecords.foradmission='Yes' AND tblpatientrecords.admit='Pending' ORDER BY tblpatientrecords.rid ASC");
	while ($row = mysql_fetch_assoc($admitQuery)){
		$ptList[] = array(
						'rid' => $row['rid'],
						'pid' => $row['pid']
					);
	}
	return $ptList;
}

function getAdmitted(){
	$ptList = array();
	
	$admitQuery = mysql_query("SELECT * FROM tblpatients, tblpatientrecords, tbladmission WHERE tblpatientrecords.foradmission='Yes' AND tblpatients.pid = tbladmission.pid AND tblpatientrecords.rid = tbladmission.rid AND tblpatientrecords.admit='Admitted' ORDER BY tblpatients.lastname ASC");
	while ($row = mysql_fetch_assoc($admitQuery)){
		$ptList[] = array(
						'rid' => $row['rid'],
						'pid' => $row['pid']
					);
	}
	return $ptList;
}

function admitPatient($pid, $rid, $docid, $bednum, $service, $roomtype){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$docid = (int)$docid;
	$bednum = (int)$bednum;
	$service = mysql_real_escape_string($service);
	$roomtype = mysql_real_escape_string($roomtype);
	
	$roomno = "";
	$sql = mysql_query("SELECT roomno FROM tblbed WHERE bednumber='$bednum' AND roomtype='$roomtype' LIMIT 1");
	$roomCount = mysql_num_rows($sql);
	if ($roomCount > 0) {
		while ($row = mysql_fetch_array($sql)) {
			$roomno = $row["roomno"];
		}
	}
	
	mysql_query("INSERT INTO tbladmission (pid, rid, bednumber, roomno, service, status, dateadmitted) VALUES ('$pid', '$rid', '$bednum', '$roomno','$service', 'Admitted', now())");
	
	$aid = mysql_insert_id();
	
	mysql_query("UPDATE tblbed SET pid='$pid', rid='$rid', aid='$aid', status='Occupied', dateadmitted=now() WHERE bid='$bednum'");
	
	mysql_query("UPDATE tblpatientrecords SET admit='Admitted' WHERE rid='$rid'");

	mysql_query("INSERT INTO tbldoctorsattended (pid, rid, did, task, datetimeadded) VALUES ('$pid', '$rid', '$docid', 'Attending', now())");
}

function admitPatientCurDoc($pid, $rid, $docid, $bednum, $service, $roomtype){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$docid = (int)$docid;
	$bednum = (int)$bednum;
	$service = mysql_real_escape_string($service);
	$roomtype = mysql_real_escape_string($roomtype);
	
	$roomno = "";
	$sql = mysql_query("SELECT roomno FROM tblbed WHERE bednumber='$bednum' AND roomtype='$roomtype' LIMIT 1");
	$roomCount = mysql_num_rows($sql);
	if ($roomCount > 0) {
		while ($row = mysql_fetch_array($sql)) {
			$roomno = $row["roomno"];
		}
	}
	
	mysql_query("INSERT INTO tbladmission (pid, rid, bednumber, roomno, service, status, dateadmitted) VALUES ('$pid', '$rid', '$bednum', '$roomno','$service', 'Admitted', now())");
	
	$aid = mysql_insert_id();
	
	mysql_query("UPDATE tblbed SET pid='$pid', rid='$rid', aid='$aid', status='Occupied', dateadmitted=now() WHERE bid='$bednum'");
	
	mysql_query("UPDATE tblpatientrecords SET admit='Admitted' WHERE rid='$rid'");

	mysql_query("UPDATE tbldoctorsattended SET task='Attending' WHERE did='$docid' AND pid='$pid' AND rid='$rid'");
}

function getAvBed($type){
	$type = mysql_real_escape_string($type);
	$bedList = array();

	$bedQuery = mysql_query("SELECT * FROM tblbed WHERE status='Available' AND roomtype='$type'");
	while ($row = mysql_fetch_assoc($bedQuery)){
		$bedList[] = array(
						'bid' => $row['bid'],
						'bednumber' => $row['bednumber'],
						'roomno' => $row['roomno'],
						'roomtype' => $row['roomtype']
					);
	}
	return $bedList;
}

function getBedPt($rid, $pid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	
	$bedNum = array();
	
	$sql = mysql_query("SELECT * FROM tblbed WHERE rid='$rid' AND pid='$pid' LIMIT 1");
	while ($row = mysql_fetch_assoc($sql)){
		$bedNum[] = array(
						'bednumber' => $row['bednumber'],
						'dateadmitted' => $row['dateadmitted'],
						'roomno' => $row['roomno'],
						'roomtype' => $row['roomtype']
					);
	}
	
	return $bedNum;
}

function getPtRecordAdmitted($pid, $rid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	
	$ptRc = array();
	
	$ptrquery = mysql_query("SELECT * FROM tblpatientrecords WHERE pid='$pid' AND rid='$rid' AND foradmission='Yes' AND admit='Admitted' LIMIT 1");
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
					'foradmission' => $rowRc['foradmission']
				);
	}
	return $ptRc;
}

function getPtRecordAdmittedDet($pid, $rid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	
	$ptRc = array();
	
	$ptrquery = mysql_query("SELECT * FROM tblpatientrecords WHERE pid='$pid' AND rid='$rid' AND foradmission='Yes' LIMIT 1");
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
					'foradmission' => $rowRc['foradmission']
				);
	}
	return $ptRc;
}

function getAdmissionDet($pid, $rid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	
	$addt = array();
	
	$admQuery = mysql_query("SELECT * FROM tbladmission WHERE pid='$pid' AND rid='$rid' LIMIT 1");
	while($row = mysql_fetch_assoc($admQuery)){
		$addt[] = array(
			'aid' => $row['aid'],
			'bednumber' => $row['bednumber'],
			'service' => $row['service'],
			'roomno' => $row['roomno'],
			'status' => $row['status'],
			'dateadmitted' => $row['dateadmitted']
		);
	}
	return $addt;
}

function countForAdmission(){
	$result = "";
	
	$count = mysql_result(
	mysql_query("SELECT COUNT('rid') FROM tblpatientrecords WHERE foradmission='Yes' AND admit='Pending'"),0);
	
	if ($count != 0){
		$result = " (" . $count . ")";
	}
	
	return $result;
}

function referDoctor($pid, $rid, $aid, $docrefer, $doctask){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	$docrefer = (int)$docrefer;
	$doctask = mysql_real_escape_string($doctask);
	
	mysql_query("INSERT INTO tbldoctorsattended (pid, rid, did, task, datetimeadded) VALUES ('$pid', '$rid', '$docrefer', '$doctask', now())");
}
function upReferDoctor($pid, $rid, $aid, $docrefer, $doctask){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	$docrefer = (int)$docrefer;
	$doctask = mysql_real_escape_string($doctask);
	
	mysql_query("UPDATE tbldoctorsattended SET task='$doctask' WHERE pid='$pid' AND rid='$rid' AND did='$docrefer'");
}
?>