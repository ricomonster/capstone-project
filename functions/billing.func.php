<?php
function membershipCheck($membership){
	$membership = mysql_real_escape_string($membership);
		
	$checkquery = mysql_query("SELECT COUNT(phid) as count, phid FROM tblphilhealthpricing WHERE membershiptype='$membership'");
	return (mysql_result($checkquery, 0) == 1) ? true : false;
}
function addPriceList($membership, $drugsandmedicines, $supplies, $laboratory, $xray, $ultrasound, $ecg, $oxygen, $accomsubs, $professionalfee, $orfeedrfee){
	$membership = mysql_real_escape_string($membership);
	
	mysql_query("INSERT INTO tblphilhealthpricing (membershiptype, drugsandmedicines, supplies, laboratory, xray, ultrasound, ecg, oxygen, accomsubs, professionalfee, orfeedrfee) VALUES ('$membership', '$drugsandmedicines', '$supplies', '$laboratory', '$xray', '$ultrasound', '$ecg', '$oxygen', '$accomsubs', '$professionalfee', '$orfeedrfee')");
}

function getAllPriceList(){
	$pricelist = array();
	
	$priceQuery = mysql_query("SELECT * FROM tblphilhealthpricing ORDER BY phid ASC");
	while ($row = mysql_fetch_assoc($priceQuery)){
		$pricelist[] = array(
					'phid' => $row['phid'],
					'membership' => $row['membershiptype'],
					'drugsandmedicines' => $row['drugsandmedicines'],
					'supplies' => $row['supplies'],
					'laboratory' => $row['laboratory'],
					'xray' => $row['xray'],
					'ultrasound' => $row['ultrasound'],
					'ecg' => $row['ecg'],
					'oxygen' => $row['oxygen'],
					'accomsubs' => $row['accomsubs'],
					'professionalfee' => $row['professionalfee'],
					'orfeedrfee' => $row['orfeedrfee']
					);
	}
	return $pricelist;
}

function getPriceList($membershiptype){
	$membershiptype = mysql_real_escape_string($membershiptype);
	$pricelist = array();
	
	$priceQuery = mysql_query("SELECT * FROM tblphilhealthpricing WHERE membershiptype='$membershiptype' LIMIT 1");
	while ($row = mysql_fetch_assoc($priceQuery)){
		$pricelist[] = array(
					'membership' => $row['membershiptype'],
					'drugsandmedicines' => $row['drugsandmedicines'],
					'supplies' => $row['supplies'],
					'laboratory' => $row['laboratory'],
					'xray' => $row['xray'],
					'ultrasound' => $row['ultrasound'],
					'ecg' => $row['ecg'],
					'oxygen' => $row['oxygen'],
					'accomsubs' => $row['accomsubs'],
					'professionalfee' => $row['professionalfee'],
					'orfeedrfee' => $row['orfeedrfee']
					);
	}
	return $pricelist;
}

function getEditPriceList($phid, $membershiptype){
	$phid = (int)$phid;
	$membershiptype = mysql_real_escape_string($membershiptype);
	$pricelist = array();
	
	$priceQuery = mysql_query("SELECT * FROM tblphilhealthpricing WHERE membershiptype='$membershiptype' AND phid='$phid' LIMIT 1");
	while ($row = mysql_fetch_assoc($priceQuery)){
		$pricelist[] = array(
					'phid' => $row['phid'],
					'membership' => $row['membershiptype'],
					'drugsandmedicines' => $row['drugsandmedicines'],
					'supplies' => $row['supplies'],
					'laboratory' => $row['laboratory'],
					'xray' => $row['xray'],
					'ultrasound' => $row['ultrasound'],
					'ecg' => $row['ecg'],
					'oxygen' => $row['oxygen'],
					'accomsubs' => $row['accomsubs'],
					'professionalfee' => $row['professionalfee'],
					'orfeedrfee' => $row['orfeedrfee']
					);
	}
	return $pricelist;
}

function updatePriceList($phid, $membership, $drugsandmedicines, $supplies, $laboratory, $xray, $ultrasound, $ecg, $oxygen, $accomsubs, $professionalfee, $orfeedrfee){
	$phid = (int)$phid;
	$membership = mysql_real_escape_string($membership);
	
	mysql_query("UPDATE tblphilhealthpricing SET membershiptype='$membership', drugsandmedicines='$drugsandmedicines', supplies='$supplies', laboratory='$laboratory', xray='$xray', ultrasound='$ultrasound', ecg='$ecg', oxygen='$oxygen', accomsubs='$accomsubs', professionalfee='$professionalfee', orfeedrfee='$orfeedrfee' WHERE phid='$phid'");
}

function getPatientForDischarge(){
	$ptlist = array();
	
	$listQuery = mysql_query("SELECT * FROM tblpatients, tblpatientrecords WHERE foradmission='Yes' AND admit='Pending Discharge' AND tblpatientrecords.pid = tblpatients.pid ORDER BY tblpatients.lastname ASC");
	while ($row = mysql_fetch_assoc($listQuery)){
		$ptlist[] = array(
					'pid' => $row['pid'],
					'rid' => $row['rid']
					);
	}
	return $ptlist;
}

function getPatientsDischarged(){
	$ptlist = array();
	
	$listQuery = mysql_query("SELECT * FROM tblpatients, tblpatientrecords WHERE foradmission='Yes' AND admit='Discharged' AND tblpatientrecords.pid = tblpatients.pid ORDER BY tblpatients.lastname ASC");
	while ($row = mysql_fetch_assoc($listQuery)){
		$ptlist[] = array(
					'pid' => $row['pid'],
					'rid' => $row['rid']
					);
	}
	return $ptlist;
}

function getRoomType($roomno, $bednumber){
	$roomno = (int)$roomno;
	$bednumber = (int)$bednumber;
	
	$room = array();
	$sql = mysql_query("SELECT * FROM tblbed WHERE bednumber='$bednumber' AND roomno='$roomno' LIMIT 1");
	while ($row = mysql_fetch_assoc($sql)){
		$room[] = array(
					'roomtype' => $row['roomtype'],
					'priceperday' => $row['priceperday']
				);
	}
	return $room;
}

function lastBillNum(){
	
	$lastbill = array();
	
	$billquery = mysql_query("SELECT billingnumber FROM tblpatientbills ORDER BY billingnumber DESC LIMIT 1");
	while ($row = mysql_fetch_assoc($billquery)){
		$lastbill[] = array(
					'billingnumber' => $row['billingnumber']
				);
	}
	return $lastbill;
}

function addBillStat($drugsandmedicine, $exdrugsandmedicines, $supplies, $exsupplies, $laboratory, $exlaboratory, $xray, $exxray, $ultrasound, $exultrasound, $ecg, $execg, $oxygen, $exoxygen, $accomsubs, $exaccomsubs, $professionalfee, $exprofessionalfee, $orfeedrfee, $exorfeedrfee, $admissionfee, $wardservice, $nebfee, $ambulancefee, $total, $extotal, $phtotal, $phdrugsandmedicines, $phsupplies, $phlaboratory, $phxray, $phultrasound, $phecg, $phoxygen, $phaccomsubs, $phprofessionalfee, $phorfeedrfee, $status, $membership, $pid, $rid, $aid, $billingnumber, $nurseonduty, $finaldiagnosis, $exadmissionfee, $exwardservice, $exnebfee, $exambulancefee){

$drugsandmedicine = $drugsandmedicine;
$exdrugsandmedicines = $exdrugsandmedicines;
$phdrugsandmedicines = $phdrugsandmedicines;

$supplies = $supplies;
$exsupplies = $exsupplies;
$phdrugsandmedicines = $phdrugsandmedicines;

$laboratory = $laboratory;
$exlaboratory = $exlaboratory;
$phlaboratory = $phlaboratory;

$xray = $xray;
$exxray = $exxray;
$phxray = $phxray;

$ultrasound = $ultrasound;
$exultrasound = $exultrasound;
$phultrasound = $phultrasound;

$ecg = $ecg;
$execg = $execg;
$phecg = $phecg;

$oxygen = $oxygen;
$exoxygen = $exoxygen;
$phoxygen = $phoxygen;

$accomsubs = $accomsubs;
$exaccomsubs = $exaccomsubs;
$phaccomsubs = $phaccomsubs;

$professionalfee = $professionalfee;
$exprofessionalfee = $exprofessionalfee;
$phprofessionalfee = $phprofessionalfee;

$orfeedrfee = $orfeedrfee;
$exorfeedrfee = $exorfeedrfee;
$phorfeedrfee = $phorfeedrfee;

$admissionfee = $admissionfee;
$exadmissionfee = $exadmissionfee;

$wardservice = $wardservice;
$exwardservice = $exwardservice;

$nebfee = $nebfee;
$exnebfee = $exnebfee;

$ambulancefee = $ambulancefee;
$exambulancefee = $exambulancefee;

$total = $total;
$phtotal = $phtotal;
$extotal = $extotal;

$billingnumber = $billingnumber;
$status = mysql_real_escape_string($status);
$membership = mysql_real_escape_string($membership);
$nurseonduty = mysql_real_escape_string($nurseonduty);
$finaldiagnosis = mysql_real_escape_string($finaldiagnosis);
$pid = (int)$pid;
$rid = (int)$rid;
$aid = (int)$aid;


mysql_query("INSERT INTO tblpatientbills
(pid, rid, aid, membership, billingnumber, nurseonduty, finaldiagnosis, drugsandmedicines, supplies, laboratory, xray, ultrasound, ecg, oxygen, accomsubs, professionalfee, orfeedrfee, admissionfee, wardservice, nebfee, ambulancefee, exdrugsandmedicines, exsupplies, exlaboratory, exxray, exultrasound, execg, exoxygen, exaccomsubs, exprofessionalfees, exorfeedrfee, total, extotal, phtotal, status, datetimerecorded, phdrugsandmedicines, phsupplies, phlaboratory, phxray, phultrasound, phecg, phoxygen, phaccomsubs, phprofessionalfee, phorfeedrfee, exadmissionfee, exwardservice, exnebfee, exambulancefee)
VALUES
('$pid', '$rid', '$aid', '$membership', '$billingnumber', '$nurseonduty', '$finaldiagnosis', '$drugsandmedicine', '$supplies', '$laboratory', '$xray', '$ultrasound', '$ecg', '$oxygen', '$accomsubs', '$professionalfee', '$orfeedrfee', '$admissionfee', '$wardservice', '$nebfee', '$ambulancefee', '$exdrugsandmedicines', '$exsupplies', '$exlaboratory', '$exxray', '$exultrasound', '$execg', '$exoxygen', '$exaccomsubs', '$exprofessionalfee', '$exorfeedrfee', '$total', '$extotal', '$phtotal', '$status', now(), '$phdrugsandmedicines','$phsupplies','$phlaboratory','$phxray','$phultrasound','$phecg','$phoxygen','$phaccomsubs','$phprofessionalfee','$phorfeedrfee', '$exadmissionfee', '$exwardservice', '$exnebfee', '$exambulancefee')");

mysql_query("UPDATE tblpatientrecords SET admit='Discharged' WHERE rid='$rid' AND pid='$pid'");
mysql_query("UPDATE tbladmission SET status='Discharged' WHERE rid='$rid' AND pid='$pid' AND aid='$aid'");
}

function checkPatientBill($pid, $rid, $aid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	
	$query = mysql_query("SELECT COUNT('pbid') FROM tblpatientbills WHERE pid='$pid' AND rid='$rid' AND aid='$aid'");
	
	return (mysql_result($query, 0) == 1) ? true : false;
}
function getBillStatement($pid, $rid, $aid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;

	$billstat = array();
	
	$billquery = mysql_query("SELECT * FROM tblpatientbills WHERE pid='$pid' AND rid='$rid' AND aid='$aid' LIMIT 1");
	while ($row = mysql_fetch_assoc($billquery)){
		$billstat[] = array(
			'pbid' => $row['pbid'],
			'pid' => $row['pid'],
			'rid' => $row['rid'],
			'aid' => $row['aid'],
			'membership' => $row['membership'],
			'billingnumber' => $row['billingnumber'],
			'nurseonduty' => $row['nurseonduty'],
			'finaldiagnosis' => $row['finaldiagnosis'],
			'drugsandmedicines' => $row['drugsandmedicines'],
			'supplies' => $row['supplies'],
			'laboratory' => $row['laboratory'],
			'xray' => $row['xray'],
			'ultrasound' => $row['ultrasound'],
			'ecg' => $row['ecg'],
			'oxygen' => $row['oxygen'],
			'accomsubs' => $row['accomsubs'],
			'professionalfee' => $row['professionalfee'],
			'orfeedrfee' => $row['orfeedrfee'],
			'admissionfee' => $row['admissionfee'],
			'wardservice' => $row['wardservice'],
			'nebfee' => $row['nebfee'],
			'ambulancefee' => $row['ambulancefee'],
			'exdrugsandmedicines' => $row['exdrugsandmedicines'],
			'exsupplies' => $row['exsupplies'],
			'exlaboratory' => $row['exlaboratory'],
			'exxray' => $row['exxray'],
			'exultrasound' => $row['exultrasound'],
			'execg' => $row['execg'],
			'exoxygen' => $row['exoxygen'],
			'exaccomsubs' => $row['exaccomsubs'],
			'exprofessionalfee' => $row['exprofessionalfees'],
			'exorfeedrfee' => $row['exorfeedrfee'],
			'exadmissionfee' => $row['exadmissionfee'],
			'exwardservice' => $row['exwardservice'],
			'exnebfee' => $row['exnebfee'],
			'exambulancefee' => $row['exambulancefee'],
			'phdrugsandmedicines' => $row['phdrugsandmedicines'],
			'phsupplies' => $row['phsupplies'],
			'phlaboratory' => $row['phlaboratory'],
			'phxray' => $row['phxray'],
			'phultrasound' => $row['ultrasound'],
			'phecg' => $row['phecg'],
			'phoxygen' => $row['phoxygen'],
			'phaccomsubs' => $row['phaccomsubs'],
			'phprofessionalfee' => $row['phprofessionalfee'],
			'phorfeedrfee' => $row['phorfeedrfee'],
			'phtotal' => $row['phtotal'],
			'total' => $row['total'],
			'extotal' => $row['extotal'],
			'status' => $row['status'],
			'datetimerecorded' => $row['datetimerecorded']
		);
		}
	return $billstat;
}

function getTheraConsumed($rid, $pid){
	$rid = (int)$rid;
	$pid = (int)$pid;
	
	$thera = array();
	$sql = mysql_query("SELECT * FROM tbltheraconsumed, tbltheranames, tbltherapeutic WHERE tbltheraconsumed.pid='$pid' AND tbltheraconsumed.rid='$rid' AND tbltheraconsumed.tid=tbltherapeutic.tid AND tbltheranames.therapeutic=tbltherapeutic.theraname");
	while ($row = mysql_fetch_assoc($sql)){
		$thera[] = array(
			'theraname'=>$row['theraname'],
			'price'=> $row['price'],
			'givendate' => $row['givendate']
		);
	}
	return $thera;
}
?>