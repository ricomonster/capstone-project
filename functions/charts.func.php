<?php
function addHistoPhys($pid, $rid, $aid, $docid, $complaint, $presentill, $measles, $tb, $malaria, $arthritis, $syphillis, $drugs, $mumps, $asthma, $rheumatic, $typhoid, $diarrhea, $alcoholism, $mental, $diabetes, $cancer, $hypertension, $blooddys, $allergies, $others, $prevop, $children, $fcancer, $ftb, $fhypertension, $fmental, $fblooddys, $heartdisease, $fdiabetes, $fallergies, $familyplanning, $genappearance, $skin, $headbent, $headandlymph, $chestbreast, $hrate, $hdia, $hsys, $rrate, $stomach, $liver, $gallbladder, $spleen, $kidneyblad, $genitalia, $spine, $neurological, $impression){

$pid = (int)$pid;
$rid = (int)$rid;
$aid = (int)$aid;
$docid = (int)$docid;

$complaint = mysql_real_escape_string($complaint);
$presentill = mysql_real_escape_string($presentill);

$measles = mysql_real_escape_string($measles);
$tb = mysql_real_escape_string($tb);
$malaria = mysql_real_escape_string($malaria);
$arthritis = mysql_real_escape_string($arthritis);
$syphillis = mysql_real_escape_string($syphillis);
$drugs = mysql_real_escape_string($drugs);

$mumps = mysql_real_escape_string($mumps);
$asthma = mysql_real_escape_string($asthma);
$rheumatic = mysql_real_escape_string($rheumatic);
$typhoid = mysql_real_escape_string($typhoid);
$diarrhea = mysql_real_escape_string($diarrhea);
$alcoholism = mysql_real_escape_string($alcoholism);

$mental = mysql_real_escape_string($mental);
$diabetes = mysql_real_escape_string($diabetes);
$cancer = mysql_real_escape_string($cancer);
$hypertension = mysql_real_escape_string($hypertension);
$blooddys = mysql_real_escape_string($blooddys);
$allergies = mysql_real_escape_string($allergies);

$others = mysql_real_escape_string($others);
$prevop = mysql_real_escape_string($prevop);
$children = mysql_real_escape_string($children);

$fcancer = mysql_real_escape_string($fcancer);
$ftb = mysql_real_escape_string($ftb);
$fhypertension = mysql_real_escape_string($fhypertension);
$fmental = mysql_real_escape_string($fmental);
$fblooddys = mysql_real_escape_string($fblooddys);

$heartdisease = mysql_real_escape_string($heartdisease);
$fdiabetes = mysql_real_escape_string($fdiabetes);
$fallergies = mysql_real_escape_string($fallergies);
$familyplanning = mysql_real_escape_string($familyplanning);

$genappearance = mysql_real_escape_string($genappearance);
$skin = mysql_real_escape_string($skin);
$headbent = mysql_real_escape_string($headbent);
$headandlymph = mysql_real_escape_string($headandlymph);
$chestbreast = mysql_real_escape_string($chestbreast);

$hrate = (int)$hrate;
$hdia = (int)$hdia;
$hsys = (int)$hsys;
$rrate = (int)$rrate;

$stomach = mysql_real_escape_string($stomach);
$liver = mysql_real_escape_string($liver);
$gallbladder = mysql_real_escape_string($gallbladder);
$spleen = mysql_real_escape_string($spleen);

$kidneyblad = mysql_real_escape_string($kidneyblad);
$genitalia = mysql_real_escape_string($genitalia);
$spine = mysql_real_escape_string($spine);
$neurological = mysql_real_escape_string($neurological);
$impression = mysql_real_escape_string($impression);

$bp = "$hsys/$hdia";

mysql_query("INSERT INTO tblhistoryphysical (rid, pid, aid, complaint, presentillness, fcancer, ftb, fhypertension, fmental, fblooddys, heartdisease, fdiabetes, fallergies, familyplanning, genapp, skin, headbent, necklymph, chestbreast, hrate, bp, rrate, stomach, liver, gallbladder, spleen, kidneyblad, genitalia, spine, neurological, admitimpre, doctor, dateadded)
VALUES
('$rid', '$pid', '$aid', '$complaint', '$presentill', '$fcancer', '$ftb', '$fhypertension', '$fmental', '$fblooddys', '$heartdisease', '$fdiabetes', '$fallergies', '$familyplanning', '$genappearance', '$skin', '$headbent', '$headandlymph', '$chestbreast', '$hrate', '$bp', '$rrate', '$stomach', '$liver', '$gallbladder', '$spleen', '$kidneyblad', '$genitalia', '$spine', '$neurological', '$impression', '$docid',now())");

$hid = mysql_insert_id();

mysql_query("INSERT INTO tblpastillness (pid, rid, hid, aid, measles, tb, malaria, arthritis, syphillis, drugs, mumps, asthma, rheumatic, typhoid, diarrhea, alcoholism, mental, diabetes, cancer, hypertension, blooddys, allergies, others, previousop, children, dateadded)
VALUES
('$pid', '$rid', '$hid', '$aid', '$measles', '$tb', '$malaria', '$arthritis', '$syphillis', '$drugs', '$mumps', '$asthma', '$rheumatic', '$typhoid', '$diarrhea', '$alcoholism', '$mental', '$diabetes', '$cancer', '$hypertension', '$blooddys', '$allergies', '$others', '$prevop', '$children', now())");
}

function updateHistoPhys($pid, $rid, $aid, $docid, $hid, $iid,$complaint, $presentill, $measles, $tb, $malaria, $arthritis, $syphillis, $drugs, $mumps, $asthma, $rheumatic, $typhoid, $diarrhea, $alcoholism, $mental, $diabetes, $cancer, $hypertension, $blooddys, $allergies, $others, $prevop, $children, $fcancer, $ftb, $fhypertension, $fmental, $fblooddys, $heartdisease, $fdiabetes, $fallergies, $familyplanning, $genappearance, $skin, $headbent, $headandlymph, $chestbreast, $hrate, $hdia, $hsys, $rrate, $stomach, $liver, $gallbladder, $spleen, $kidneyblad, $genitalia, $spine, $neurological, $impression){

$pid = (int)$pid;
$rid = (int)$rid;
$aid = (int)$aid;
$hid = (int)$hid;
$iid = (int)$iid;
$docid = (int)$docid;

$complaint = mysql_real_escape_string($complaint);
$presentill = mysql_real_escape_string($presentill);

$measles = mysql_real_escape_string($measles);
$tb = mysql_real_escape_string($tb);
$malaria = mysql_real_escape_string($malaria);
$arthritis = mysql_real_escape_string($arthritis);
$syphillis = mysql_real_escape_string($syphillis);
$drugs = mysql_real_escape_string($drugs);

$mumps = mysql_real_escape_string($mumps);
$asthma = mysql_real_escape_string($asthma);
$rheumatic = mysql_real_escape_string($rheumatic);
$typhoid = mysql_real_escape_string($typhoid);
$diarrhea = mysql_real_escape_string($diarrhea);
$alcoholism = mysql_real_escape_string($alcoholism);

$mental = mysql_real_escape_string($mental);
$diabetes = mysql_real_escape_string($diabetes);
$cancer = mysql_real_escape_string($cancer);
$hypertension = mysql_real_escape_string($hypertension);
$blooddys = mysql_real_escape_string($blooddys);
$allergies = mysql_real_escape_string($allergies);

$others = mysql_real_escape_string($others);
$prevop = mysql_real_escape_string($prevop);
$children = mysql_real_escape_string($children);

$fcancer = mysql_real_escape_string($fcancer);
$ftb = mysql_real_escape_string($ftb);
$fhypertension = mysql_real_escape_string($fhypertension);
$fmental = mysql_real_escape_string($fmental);
$fblooddys = mysql_real_escape_string($fblooddys);

$heartdisease = mysql_real_escape_string($heartdisease);
$fdiabetes = mysql_real_escape_string($fdiabetes);
$fallergies = mysql_real_escape_string($fallergies);
$familyplanning = mysql_real_escape_string($familyplanning);

$genappearance = mysql_real_escape_string($genappearance);
$skin = mysql_real_escape_string($skin);
$headbent = mysql_real_escape_string($headbent);
$headandlymph = mysql_real_escape_string($headandlymph);
$chestbreast = mysql_real_escape_string($chestbreast);

$hrate = (int)$hrate;
$hdia = (int)$hdia;
$hsys = (int)$hsys;
$rrate = (int)$rrate;

$stomach = mysql_real_escape_string($stomach);
$liver = mysql_real_escape_string($liver);
$gallbladder = mysql_real_escape_string($gallbladder);
$spleen = mysql_real_escape_string($spleen);

$kidneyblad = mysql_real_escape_string($kidneyblad);
$genitalia = mysql_real_escape_string($genitalia);
$spine = mysql_real_escape_string($spine);
$neurological = mysql_real_escape_string($neurological);
$impression = mysql_real_escape_string($impression);

$bp = "$hsys/$hdia";

mysql_query("UPDATE tblhistoryphysical SET complaint='$complaint', presentillness='$presentill', fcancer='$fcancer', ftb='$ftb', fhypertension='$fhypertension', fmental='$fmental', fblooddys='$fblooddys', heartdisease='$heartdisease', fdiabetes='$fdiabetes', fallergies='$fallergies', familyplanning='$familyplanning', genapp='$genappearance', skin='$skin', headbent='$headbent', necklymph='$headandlymph', chestbreast='$chestbreast', hrate='$hrate', bp='$bp', rrate='$rrate', stomach='$stomach', liver='$liver', gallbladder='$gallbladder', spleen='$spleen', kidneyblad='$kidneyblad', genitalia='$genitalia', spine='$spine', neurological='$neurological', admitimpre='$impression', doctor='$docid' WHERE rid='$rid' AND pid='$pid' AND hid='$hid' AND aid='$aid'");


mysql_query("UPDATE tblpastillness SET measles='$measles', tb='$tb', malaria='$malaria', arthritis='$arthritis', syphillis='$syphillis', drugs='$drugs', mumps='$mumps', asthma='$asthma', rheumatic='$rheumatic', typhoid='$typhoid', diarrhea='$diarrhea', alcoholism='$alcoholism', mental='$mental', diabetes='$diabetes', cancer='$cancer', hypertension='$hypertension', blooddys='$blooddys', allergies='$allergies', others='$others', previousop='$prevop', children='$children' WHERE pid='$pid' AND rid='$rid' AND hid='$hid' AND aid='$aid' AND iid='$iid'");
}

function getHxPhy($pid, $rid, $aid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	
	$hxList = array();
	
	$hxquery = mysql_query("SELECT * FROM tblhistoryphysical, tblpastillness WHERE tblhistoryphysical.pid='$pid' AND tblhistoryphysical.rid='$rid' AND tblhistoryphysical.aid='$aid' AND tblhistoryphysical.hid=tblpastillness.hid LIMIT 1");
	while ($row = mysql_fetch_assoc($hxquery)){
		$hxList[] = array(
					'hid' => $row['hid'],
					'iid' => $row['iid'],
					'complaint' => $row['complaint'],
					'presentill' => $row['presentillness'],
					'measles' => $row['measles'],
					'tb' => $row['tb'],
					'malaria' => $row['malaria'],
					'arthritis' => $row['arthritis'],
					'syphillis' => $row['syphillis'],
					'drugs' => $row['drugs'],
					'mumps' => $row['mumps'],
					'asthma' => $row['asthma'],
					'rheumatic' => $row['rheumatic'],
					'typhoid' => $row['typhoid'],
					'diarrhea' => $row['diarrhea'],
					'alcoholism' => $row['alcoholism'],
					'mental' => $row['mental'],
					'diabetes' => $row['diabetes'],
					'cancer' => $row['cancer'],
					'hypertension' => $row['hypertension'],
					'blooddys' => $row['blooddys'],
					'allergies' => $row['allergies'],
					'others' => $row['others'],
					'previousop' => $row['previousop'],
					'children' => $row['children'],
					'fcancer' => $row['fcancer'],
					'ftb' => $row['ftb'],
					'fhypertension' => $row['fhypertension'],
					'fmental' => $row['fmental'],
					'fblooddys' => $row['fblooddys'],
					'heartdisease' => $row['heartdisease'],
					'fdiabetes' => $row['fdiabetes'],
					'fallergies' => $row['fallergies'],
					'familyplanning' => $row['familyplanning'],
					'genappearance' => $row['genapp'],
					'skin' => $row['skin'],
					'headbent' => $row['headbent'],
					'headandlymph' => $row['necklymph'],
					'chestbreast' => $row['chestbreast'],
					'hrate' => $row['hrate'],
					'bp' => $row['bp'],
					'rrate' => $row['rrate'],
					'stomach' => $row['stomach'],
					'liver' => $row['liver'],
					'gallbladder' => $row['gallbladder'],
					'spleen' => $row['spleen'],
					'kidneyblad' => $row['kidneyblad'],
					'genitalia' => $row['genitalia'],
					'spine' => $row['spine'],
					'neurological' => $row['neurological'],
					'impression' => $row['admitimpre'],
					'doctor' => $row['doctor']
				);
	}
	return $hxList;
}

function getHxIll($pid, $rid, $aid, $hid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	$hid = (int)$hid;
}

function checkExistingHxPt($pid, $rid, $aid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	
	$query = mysql_query("SELECT COUNT('hid') FROM tblhistoryphysical WHERE pid='$pid' AND rid='$rid' AND aid='$aid'");
	
	return (mysql_result($query, 0) == 1) ? true : false;
}

function addProgNotes($pid, $rid, $aid, $prognotes){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	$prognotes = mysql_real_escape_string($prognotes);
	
	mysql_query("INSERT INTO tblprogressnotes (pid, rid, aid, progressnotes, datetime) VALUES ('$pid', '$rid', '$aid', '$prognotes', now())");
}

function getProgressNotes($pid, $rid, $aid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	
	$list = "";
	
	$getprog = mysql_query("SELECT * FROM tblprogressnotes WHERE pid='$pid' AND rid='$rid' AND aid='$aid' ORDER BY pgid ASC");
	while($row = mysql_fetch_array($getprog)){
		$list .= '<div class="progRow">';
		$list .= '<div class="progInfoHolder">';
		$list .= '<div class="contentCell prog-content-date">'.date("F d, Y", strtotime($row["datetime"])).'</div>';
		$list .= '<div class="contentCell prog-content-prognotes">'.$row["progressnotes"].'<span class="del-link" style="float: right; cursor: pointer;"><a class="delbutton" id="'.$row["pgid"].'">[X]</a></span></div>';
		$list .= '</div>';
		$list .= '</div>';
	}
	return $list;
}

function deleteProgNotes($pgid){
	$pgid = (int)$pgid;
	
	mysql_query("DELETE FROM tblprogressnotes WHERE pgid='$pgid'");
}

function addNurseNotes($pid, $rid, $aid, $nurse, $nursenotes){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	$nurse = mysql_real_escape_string($nurse);
	$nursenotes = mysql_real_escape_string($nursenotes);
	
	mysql_query("INSERT INTO tblnursenotes (pid, rid, aid, nurse, nursenotes, datetimeadded) VALUES ('$pid', '$rid', '$aid', '$nurse', '$nursenotes', now())");
}

function getNurseNotes($pid, $rid, $aid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	
	$notes = "";
	
	$getprog = mysql_query("SELECT * FROM tblnursenotes WHERE pid='$pid' AND rid='$rid' AND aid='$aid' ORDER BY nid ASC");
	while($row = mysql_fetch_array($getprog)){
		$notes .= '<div class="notesRow">';
		$notes .= '<div class="contentCell notes-content-date">'.date("F d, Y", strtotime($row["datetimeadded"])).'</div>';
		$notes .= '<div class="contentCell notes-content-time">'.date("h:i a", strtotime($row["datetimeadded"])).'</div>';
		$notes .= '<div class="contentCell notes-content-nurse">'.$row["nurse"].'</div>';
		$notes .= '<div class="contentCell notes-content-nursenotes">'.$row["nursenotes"].'<span class="del-link" style="float: right; cursor: pointer;"><a class="delbutton" id="'.$row["nid"].'">[X]</a></span></div>';
		$notes .= '</div>';
	}
	return $notes;
}

function deleteNurseNotes($nid){
	$nid = (int)$nid;
	
	mysql_query("DELETE FROM tblnursenotes WHERE nid='$nid'");
}

function addDocOrders($pid, $rid, $aid, $docorders){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	$docorders = mysql_real_escape_string($docorders);
	
	mysql_query("INSERT INTO tbldoctorsorder (pid, rid, aid, doctorsorder, datetimeordered) VALUES ('$pid', '$rid', '$aid', '$docorders', now())");
}

function getDocOrders($pid, $rid, $aid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	
	$orders = "";
	
	$getord = mysql_query("SELECT * FROM tbldoctorsorder WHERE pid='$pid' AND rid='$rid' AND aid='$aid' ORDER BY oid ASC");
	while($row = mysql_fetch_array($getord)){
		$orders .= '<div class="doc-row">';
		//$orders .= '<input type="hidden" name="oid" id="oid" value=""/>';
		$orders .= '<div class="contentCell doc-content-dt">'.date("F d, Y @ h:m a", strtotime($row["datetimeordered"])).'</div>';
		$orders .= '<div class="contentCell doc-content-order">'.$row["doctorsorder"].'<span class="del-link" style="float: right; cursor: pointer;"><a class="delbutton" id="'.$row["oid"].'">[X]</a></span></div>';
		
		if($row["ordercarried"]=="C"){
			$orders .= '<div class="contentCell doc-content-opt"><input type="radio" id="'.$row["oid"].'" name="order'.$row["oid"].'" value="C" checked="checked" class="uporder"/></div>';
		}else{
			$orders .= '<div class="contentCell doc-content-opt"><input type="radio" id="'.$row["oid"].'" name="order'.$row["oid"].'" value="C" class="uporder"/></div>';
		}
		
		if($row["ordercarried"]=="A"){
			$orders .= '<div class="contentCell doc-content-opt"><input type="radio" id="'.$row["oid"].'" name="order'.$row["oid"].'" value="A" checked="checked" class="uporder"/></div>';
		}else{
			$orders .= '<div class="contentCell doc-content-opt"><input type="radio" id="'.$row["oid"].'" name="order'.$row["oid"].'" value="A" class="uporder"/></div>';
		}
		
		if($row["ordercarried"]=="R"){
			$orders .= '<div class="contentCell doc-content-opt"><input type="radio" id="'.$row["oid"].'" name="order'.$row["oid"].'" value="R" checked="checked" class="uporder"/></div>';
		}else{
			$orders .= '<div class="contentCell doc-content-opt"><input type="radio" id="'.$row["oid"].'" name="order'.$row["oid"].'" value="R" class="uporder"/></div>';
		}
		
		if($row["ordercarried"]=="E"){
			$orders .= '<div class="contentCell doc-content-opt"><input type="radio" id="'.$row["oid"].'" name="order'.$row["oid"].'" value="E" checked="checked" class="uporder"/></div>';
		}else{
			$orders .= '<div class="contentCell doc-content-opt"><input type="radio" id="'.$row["oid"].'" name="order'.$row["oid"].'" value="E" class="uporder"/></div>';
		}
		
		if($row["ordercarried"]=="D"){
			$orders .= '<div class="contentCell doc-content-opt" style="border-right: 1px solid #ccc;"><input type="radio" id="'.$row["oid"].'" name="order'.$row["oid"].'" value="D" checked="checked" class="uporder"/></div>';
		}else{
			$orders .= '<div class="contentCell doc-content-opt" style="border-right: 1px solid #ccc;"><input type="radio" id="'.$row["oid"].'" name="order'.$row["oid"].'" value="D" class="uporder"/></div>';
		}
		$orders .= '<input type="hidden" name="pid" id="pid" value="'.$row["pid"].'"/>';
		$orders .= '<input type="hidden" name="rid" id="rid" value="'.$row["rid"].'"/>';
		$orders .= '<input type="hidden" name="aid" id="aid" value="'.$row["aid"].'"/>';
		$orders .= '</div>';
	}
	return $orders;
}

function updateDocOrder($oid, $pid, $rid, $aid, $order){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	$oid = (int)$oid;
	$order = mysql_real_escape_string($order);
	
	mysql_query("UPDATE tbldoctorsorder SET ordercarried='$order' WHERE oid='$oid' AND pid='$pid' AND rid='$rid' AND aid='$aid'");
}

function deleteDocOrder($oid){
	$oid = (int)$oid;
	
	mysql_query("DELETE FROM tbldoctorsorder WHERE oid='$oid'");
}


function addIvfConsumption($pid, $rid, $aid, $datestarted, $shift, $timestarted, $ampmsel, $ivfbt, $dateconsumed, $timeconsumed, $ampmselcon){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	$datestarted = mysql_real_escape_string($datestarted);
	$shift = mysql_real_escape_string($shift);
	$timestarted = mysql_real_escape_string($timestarted);
	$ampmsel = mysql_real_escape_string($ampmsel);
	$ivfbt = mysql_real_escape_string($ivfbt);
	$dateconsumed = mysql_real_escape_string($dateconsumed);
	$timeconsumed = mysql_real_escape_string($timeconsumed);
	$ampmselcon = mysql_real_escape_string($ampmselcon);
	
	$tstart = "$timestarted $ampmsel";
	$tcon = "$timeconsumed $ampmselcon";
	
	mysql_query("INSERT INTO tblivfconsumption (pid, rid, aid, datestarted, shift, timestarted, ivfbt, dateconsumed, timeconsumed) VALUES ('$pid', '$rid', '$aid', '$datestarted', '$shift', '$tstart', '$ivfbt', '$dateconsumed', '$tcon')");
}

function getIvfConsumption($pid, $rid, $aid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	
	$con = "";
	
	$getcon = mysql_query("SELECT * FROM tblivfconsumption WHERE pid='$pid' AND rid='$rid' AND aid='$aid' ORDER BY cid ASC");
	while($row = mysql_fetch_array($getcon)){
		$con .= '<div class="ivf-row">';
		$con .= '<div class="contentCell ivf-cont-dt">'.date("M d, Y", strtotime($row["datestarted"])).'</div>';
		$con .= '<div class="contentCell ivf-cont-sh">'.$row["shift"].'</div>';
		$con .= '<div class="contentCell ivf-cont-ts">'.$row["timestarted"].'</div>';
		$con .= '<div class="contentCell ivf-cont-ivfbt">'.$row["ivfbt"].'</div>';
		$con .= '<div class="contentCell contentCell ivf-cont-dtc">'.date("F d, Y", strtotime($row["dateconsumed"])).' '.$row["timeconsumed"].'<span class="del-link" style="float: right; cursor: pointer;"><a class="delbutton" id="'.$row["cid"].'">[X]</a></span></div>';
		$con .= '</div>';
	}
	return $con;
}

function deleteIvfConsumption($cid){
	$cid = (int)$cid;
	mysql_query("DELETE FROM tblivfconsumption WHERE cid='$cid'");
}

function addTherapeutic($pid, $rid, $aid, $theraname, $shift, $given, $type, $givendate){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	$theraname = mysql_real_escape_string($theraname);
	$shift = mysql_real_escape_string($shift);
	$given = mysql_real_escape_string($given);
	$type = mysql_real_escape_string($type);
	$givendate = mysql_real_escape_string($givendate);
	
	mysql_query("INSERT INTO tbltherapeutic (pid, rid, aid, theraname, type) VALUES ('$pid', '$rid', '$aid', '$theraname', '$type')");
	
	$tid = mysql_insert_id();
	
	mysql_query("INSERT INTO tbltheraconsumed (pid, rid, aid, tid, shift, given, givendate) VALUES ('$pid', '$rid', '$aid', '$tid', '$shift', '$given', '$givendate')");
}

function checkTheraName($pid, $rid, $aid, $theraname, $type) {
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	$theraname = mysql_real_escape_string($theraname);
	$type = mysql_real_escape_string($type);
	
	$query = mysql_query("SELECT COUNT('tid') FROM tbltherapeutic WHERE pid='$pid' AND rid='$rid' AND aid='$aid' AND theraname='$theraname' AND type='$type'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function getTheraDates($pid, $rid, $aid, $start, $per_page){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	$start = (int)$start;
	$per_page = (int)$per_page;

	$dateList = array();
	
	$dateQuery = mysql_query("SELECT givendate FROM tbltheraconsumed WHERE pid='$pid' AND rid='$rid' AND aid='$aid' GROUP BY givendate ORDER BY givendate DESC LIMIT $start, $per_page");
	while ($row = mysql_fetch_assoc($dateQuery)){
		$dateList[] = array(
						'givendate' => $row["givendate"]
					);
	}
	return $dateList;
}

function getTheraInjectionData($givendate, $pid, $rid, $aid){
	$givendate = mysql_real_escape_string($givendate);
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;

	$thList = array();
	
	$thQuery = mysql_query("SELECT * FROM tbltheraconsumed, tbltherapeutic WHERE tbltheraconsumed.pid='$pid' AND tbltheraconsumed.rid='$rid' AND tbltheraconsumed.aid='$aid' AND tbltherapeutic.type='Injection' AND tbltheraconsumed.tid = tbltherapeutic.tid AND tbltheraconsumed.givendate='$givendate' GROUP BY tbltheraconsumed.tid");
	while ($row = mysql_fetch_assoc($thQuery)){
		$thList[] = array(
						'tcid' => $row['tcid'],
						'tid' => $row['tid'],
						'shift' => $row['shift'],
						'given' => $row['given']
					);
	}
	return $thList;
}

function getTheraTreatmentData($givendate, $pid, $rid, $aid){
	$givendate = mysql_real_escape_string($givendate);
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;

	$thList = array();
	
	$thQuery = mysql_query("SELECT * FROM tbltheraconsumed, tbltherapeutic WHERE tbltheraconsumed.pid='$pid' AND tbltheraconsumed.rid='$rid' AND tbltheraconsumed.aid='$aid' AND tbltherapeutic.type='Treatment' AND tbltheraconsumed.tid = tbltherapeutic.tid AND tbltheraconsumed.givendate='$givendate' GROUP BY tbltheraconsumed.tid");
	while ($row = mysql_fetch_assoc($thQuery)){
		$thList[] = array(
						'tcid' => $row['tcid'],
						'tid' => $row['tid'],
						'shift' => $row['shift'],
						'given' => $row['given']
					);
	}
	return $thList;
}

function getTheraData($tid, $givendate){
	$tid = (int)$tid;
	$givendate = mysql_real_escape_string($givendate);

	$thList = array();
	
	$thQuery = mysql_query("SELECT * FROM tbltheraconsumed WHERE tid='$tid' AND givendate='$givendate'");
	while ($row = mysql_fetch_assoc($thQuery)){
		$thList[] = array(
						'tcid' => $row['tcid'],
						'tid' => $row['tid'],
						'shift' => $row['shift'],
						'given' => $row['given']
					);
	}
	return $thList;
}

function getTheraOralData($givendate, $pid, $rid, $aid){
	$givendate = mysql_real_escape_string($givendate);
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;

	$thList = array();
	
	$thQuery = mysql_query("SELECT * FROM tbltheraconsumed, tbltherapeutic WHERE tbltheraconsumed.pid='$pid' AND tbltheraconsumed.rid='$rid' AND tbltheraconsumed.aid='$aid' AND tbltherapeutic.type='Oral' AND tbltheraconsumed.tid = tbltherapeutic.tid AND tbltheraconsumed.givendate='$givendate' GROUP BY tbltheraconsumed.tid");
	while ($row = mysql_fetch_assoc($thQuery)){
		$thList[] = array(
						'tcid' => $row['tcid'],
						'tid' => $row['tid'],
						'shift' => $row['shift'],
						'given' => $row['given']
					);
	}
	return $thList;
}

function getTheraName($tid){
	$tid = (int)$tid;
	
	$theraname = "";
	
	$sql = mysql_query("SELECT theraname FROM tbltherapeutic WHERE tid='$tid' LIMIT 1");
	$nameCount = mysql_num_rows($sql);
	if ($nameCount > 0) {
		while ($row = mysql_fetch_array($sql)) {
			$theraname = $row["theraname"];
		}
	}
	return $theraname;
}

function addTheraConsumed($pid, $rid, $aid, $tid, $shift, $given, $givendate){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	$tid = (int)$tid;
	$shift = mysql_real_escape_string($shift);
	$given = mysql_real_escape_string($given);
	$givendate = mysql_real_escape_string($givendate);
	
	mysql_query("INSERT INTO tbltheraconsumed (pid, rid, aid, tid, shift, given, givendate) VALUES ('$pid', '$rid', '$aid', '$tid', '$shift', '$given', '$givendate')");
}

function checkThera($tid, $givendate){
	$tid = (int)$tid;
	$givendate = mysql_real_escape_string($givendate);

	$query = mysql_query("SELECT COUNT('tcid') FROM tbltheraconsumed WHERE tid='$tid' AND shift='11 PM - 7 AM' AND givendate='$givendate'");
	return (mysql_result($query, 0) == 1) ? true : false;
}

function countTheraRecords($pid, $rid, $aid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	
	$count= mysql_query("SELECT COUNT(*) FROM (SELECT COUNT('tcid') FROM tbltheraconsumed WHERE pid='$pid' AND rid='$rid' AND aid='$aid' GROUP BY givendate) AS temp");
	return $count;
}

function getTherapeuticsInject($pid, $rid, $aid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	
	$thList = array();
	
	$thQuery = mysql_query("SELECT * FROM tbltherapeutic WHERE pid='$pid' AND rid='$rid' AND aid='$aid' AND type='Injection' ORDER BY theraname ASC");
	while ($row = mysql_fetch_assoc($thQuery)){
		$thList[] = array(
						'tid' => $row['tid'],
						'theraname' => $row['theraname']
					);
	}
	return $thList;
}

function getTherapeuticsOral($pid, $rid, $aid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	
	$thList = array();
	
	$thQuery = mysql_query("SELECT * FROM tbltherapeutic WHERE pid='$pid' AND rid='$rid' AND aid='$aid' AND type='Oral' ORDER BY theraname ASC");
	while ($row = mysql_fetch_assoc($thQuery)){
		$thList[] = array(
						'tid' => $row['tid'],
						'theraname' => $row['theraname']
					);
	}
	return $thList;
}

function getTherapeuticsTrt($pid, $rid, $aid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	
	$thList = array();
	
	$thQuery = mysql_query("SELECT * FROM tbltherapeutic WHERE pid='$pid' AND rid='$rid' AND aid='$aid' AND type='Treatment' ORDER BY theraname ASC");
	while ($row = mysql_fetch_assoc($thQuery)){
		$thList[] = array(
						'tid' => $row['tid'],
						'theraname' => $row['theraname']
					);
	}
	return $thList;
}

function checkEntered($tid, $db_date){
	$tid = (int)$tid;
	$db_date = mysql_real_escape_string($db_date);

	$query = mysql_query("SELECT COUNT('tcid') FROM tbltheraconsumed WHERE tid='$tid' AND givendate = '$db_date'");
	return (mysql_result($query, 0) >= 1) ? true : false;
}

function checkDataTheraPerDay($pid, $rid, $aid, $db_date){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	$db_date = mysql_real_escape_string($db_date);
	
	/*$countthera= mysql_query("SELECT COUNT(tid) FROM tbltherapeutic WHERE pid='$pid' AND rid='$rid' AND aid='$aid'");
	$countft = mysql_result($countthera, 0);*/
	
	$count= mysql_query("SELECT COUNT('tcid') FROM (SELECT COUNT('tcid') FROM tbltheraconsumed WHERE pid='$pid' AND rid='$rid' AND aid='$aid' AND givendate='$db_date' GROUP BY givendate) AS temp");
	return (mysql_result($count, 0) >= 1) ? true : false;
}

function checkExistingThera($pid, $rid, $aid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	
	$query = mysql_query("SELECT COUNT('tid') FROM tbltherapeutic WHERE pid='$pid' AND rid='$rid' AND aid='$aid'");
	
	return (mysql_result($query, 0) >= 1) ? true : false;
}

function getTheraInjection(){
	$tjList = array();
	
	$tjQuery = mysql_query("SELECT * FROM tbltheranames WHERE type='Injection' ORDER by therapeutic ASC");
	while ($row = mysql_fetch_assoc($tjQuery)){
		$tjList[] = array(
						'tnid' => $row['tnid'],
						'therapeutic' => $row['therapeutic']
					);
	}
	return $tjList;
}

function getTheraOral(){
	$toList = array();
	
	$toQuery = mysql_query("SELECT * FROM tbltheranames WHERE type='Oral' ORDER by therapeutic ASC");
	while ($row = mysql_fetch_assoc($toQuery)){
		$toList[] = array(
						'tnid' => $row['tnid'],
						'therapeutic' => $row['therapeutic']
					);
	}
	return $toList;
}

function getTheraTreatment(){
	$ttList = array();
	
	$ttQuery = mysql_query("SELECT * FROM tbltheranames WHERE type='Treatment' ORDER by therapeutic ASC");
	while ($row = mysql_fetch_assoc($ttQuery)){
		$ttList[] = array(
						'tnid' => $row['tnid'],
						'therapeutic' => $row['therapeutic']
					);
	}
	return $ttList;
}

function transferBed($pid, $rid, $aid, $prevbed, $bednum, $roomtype,$dateadmitted){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	$prevbed = (int)$prevbed;
	$bednum = (int)$bednum;
	$dateadmitted = (int)$dateadmitted;
	$roomtype = mysql_real_escape_string($roomtype);
	
	$roomno = "";
	$sql = mysql_query("SELECT roomno FROM tblbed WHERE bednumber='$bednum' AND roomtype='$roomtype' LIMIT 1");
	$roomCount = mysql_num_rows($sql);
	if ($roomCount > 0) {
		while ($row = mysql_fetch_array($sql)) {
			$roomno = $row["roomno"];
		}
	}
	
	mysql_query("UPDATE tbladmission SET bednumber='$bednum', roomno='$roomno' WHERE aid='$aid'");
	
	mysql_query("UPDATE tblbed SET pid='$pid', rid='$rid', aid='$aid', status='Occupied', dateadmitted='$dateadmitted' WHERE bid='$bednum'");
	
	mysql_query("UPDATE tblbed SET pid='0', rid='0', aid='0', status='Available' WHERE bid='$prevbed' AND bednumber='$prevbed'");
}

function addClinicalFace($category, $nameofnextkin, $relationshipkin, $addresskin, $dateadmitted, $timeadmitted, $datedischarge, $timedischarge, $ampmdis, $noofhosdays, $servicedept, $ward, $serdeptat, $admittingdiagnosis, $wb, $imp, $unmp, $exp, $ref, $trans, $hama, $abs, $others, $admittingphysician, $admittingclerk, $disposition, $finaldiagnosis, $complications, $surgicaldone, $pathologicalreport, $residentincharge, $medicalspecialist, $seniorresidenthead, $pid, $rid, $aid, $did){

$category = mysql_real_escape_string($category);
$nameofnextkin = mysql_real_escape_string($nameofnextkin);
$relationshipkin = mysql_real_escape_string($relationshipkin);
$addresskin = mysql_real_escape_string($addresskin);
$dateadmitted = mysql_real_escape_string($dateadmitted);
$timeadmitted = mysql_real_escape_string($timeadmitted);
$datedischarge = mysql_real_escape_string($datedischarge);
$timedischarge = mysql_real_escape_string($timedischarge);
$ampmdis = mysql_real_escape_string($ampmdis);
$noofhosdays = mysql_real_escape_string($noofhosdays);
$servicedept = mysql_real_escape_string($servicedept);
$ward = mysql_real_escape_string($ward);
$serdeptat = mysql_real_escape_string($serdeptat);
$admittingdiagnosis = mysql_real_escape_string($admittingdiagnosis);
$wb = mysql_real_escape_string($wb);
$imp = mysql_real_escape_string($imp);
$unmp = mysql_real_escape_string($unmp);
$exp = mysql_real_escape_string($exp);
$ref = mysql_real_escape_string($ref);
$trans = mysql_real_escape_string($trans);
$hama = mysql_real_escape_string($hama);
$abs = mysql_real_escape_string($abs);
$others = mysql_real_escape_string($others);
$admittingphysician = mysql_real_escape_string($admittingphysician);
$admittingclerk = mysql_real_escape_string($admittingclerk);
$disposition = mysql_real_escape_string($disposition);
$finaldiagnosis = mysql_real_escape_string($finaldiagnosis);
$complications = mysql_real_escape_string($complications);
$surgicaldone = mysql_real_escape_string($surgicaldone);
$pathologicalreport = mysql_real_escape_string($pathologicalreport);
$residentincharge = mysql_real_escape_string($residentincharge);
$medicalspecialist = mysql_real_escape_string($medicalspecialist);
$seniorresidenthead = mysql_real_escape_string($seniorresidenthead);
$pid = (int)$pid;
$rid = (int)$rid;
$aid = (int)$aid;
$did = (int)$did;

$ftimedischarged = "$timedischarge $ampmdis";

mysql_query("INSERT INTO tblclinicalface
(pid, aid, rid, category, nameofnextkin, relationshipkin, addresskin, dateadmitted, timeadmitted, datedischarged, timedischarged, noofhosdays, servicedept, ward, servicedept2, did, admittingdiagnosis, wb, imp, unmp, exp, ref, trans, hama, abs, others, admittingphysician, admittingclerk, disposition, finaldiagnosis, complications, surgicaldone, pathologicalreport, residentincharge, medicalspecialist, seniorresidenthead, dateaddedform)
VALUES
('$pid', '$aid', '$rid', '$category', '$nameofnextkin', '$relationshipkin', '$addresskin', '$dateadmitted', '$timeadmitted', '$datedischarge', '$ftimedischarged', '$noofhosdays', '$servicedept', '$ward', '$serdeptat', '$did', '$admittingdiagnosis', '$wb', '$imp', '$unmp', '$exp', '$ref', '$trans', '$hama', '$abs', '$others', '$admittingphysician', '$admittingclerk', '$disposition', '$finaldiagnosis', '$complications', '$surgicaldone', '$pathologicalreport', '$residentincharge', '$medicalspecialist', '$seniorresidenthead', now())");
}

function checkClinicalFace($pid, $rid, $aid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	
	$query = mysql_query("SELECT COUNT('cfid') FROM tblclinicalface WHERE pid='$pid' AND rid='$rid' AND aid='$aid'");
	
	return (mysql_result($query, 0) == 1) ? true : false;
}

function getClinicalFace($pid, $rid, $aid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	
	$cfList = array();
	
	$cfquery = mysql_query("SELECT * FROM tblclinicalface WHERE pid='$pid' AND rid='$rid' AND aid='$aid' LIMIT 1");
	while ($row = mysql_fetch_assoc($cfquery)){
		$cfList[] = array(
			'cfid' => $row["cfid"],
			'category' => $row["category"],
			'nameofnextkin' => $row["nameofnextkin"],
			'relationshipkin' => $row["relationshipkin"],
			'addresskin' => $row["addresskin"],
			'dateadmitted' => $row["dateadmitted"],
			'timeadmitted' => $row["timeadmitted"],
			'datedischarged' => $row["datedischarged"],
			'timedischarged' => $row["timedischarged"],
			'noofhosdays' => $row["noofhosdays"],
			'servicedept' => $row["servicedept"],
			'ward' => $row["ward"],
			'servicedept2' => $row["servicedept2"],
			'did' => $row["did"],
			'admittingdiagnosis' => $row["admittingdiagnosis"],
			'wb' => $row["wb"],
			'imp' => $row["imp"],
			'unmp' => $row["unmp"],
			'exp' => $row["exp"],
			'ref' => $row["ref"],
			'trans' => $row["trans"],
			'hama' => $row["hama"],
			'abs' => $row["abs"],
			'others' => $row["others"],
			'admittingphysician' => $row["admittingphysician"],
			'admittingclerk' => $row["admittingclerk"],
			'disposition' => $row["disposition"],
			'finaldiagnosis' => $row["finaldiagnosis"],
			'complications' => $row["complications"],
			'surgicaldone' => $row["surgicaldone"],
			'pathologicalreport' => $row["pathologicalreport"],
			'residentincharge' => $row["residentincharge"],
			'medicalspecialist' => $row["medicalspecialist"],
			'seniorresidenthead' => $row["seniorresidenthead"],
			'dateaddedform' => $row["dateaddedform"],
			'persondischarged' => $row["persondischarged"]
		);
	}
	return $cfList;
}

function checkDocOrders($pid, $rid, $aid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;

	$query = mysql_query("SELECT COUNT('did') FROM tbldoctorsorder WHERE pid='$pid' AND rid='$rid' AND aid='$aid'");
	
	return (mysql_result($query, 0) == 1) ? true : false;
}

function checkProgNotes($pid, $rid, $aid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	
	$query = mysql_query("SELECT COUNT('pgid') FROM tblprogressnotes WHERE pid='$pid' AND rid='$rid' AND aid='$aid'");
	
	return (mysql_result($query, 0) == 1) ? true : false;

}

function checkNurseNotes($pid, $rid, $aid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	
	$query = mysql_query("SELECT COUNT('nid') FROM tblnursenotes WHERE pid='$pid' AND rid='$rid' AND aid='$aid'");
	
	return (mysql_result($query, 0) == 1) ? true : false;

}

function checkIvf($pid, $rid, $aid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	
	$query = mysql_query("SELECT COUNT('iid') FROM tblivfconsumption WHERE pid='$pid' AND rid='$rid' AND aid='$aid'");
	
	return (mysql_result($query, 0) == 1) ? true : false;

}

function dischargePatient($pid, $rid, $aid, $bednum,$persondischarging){
	$pid = (int)$pid;
	$rid = (int)$rid;
	$aid = (int)$aid;
	$bednum = (int)$bednum;
	$persondischarging = mysql_real_escape_string($persondischarging);
	
	mysql_query("UPDATE tblpatientrecords SET admit='Pending Discharge' WHERE rid='$rid' AND pid='$pid'");
	mysql_query("UPDATE tblclinicalface SET persondischarged='$persondischarging' WHERE rid='$rid' AND pid='$pid' AND aid='$aid'");
	mysql_query("UPDATE tbladmission SET status='Pending Discharge' WHERE rid='$rid' AND pid='$pid' AND aid='$aid'");
	mysql_query("UPDATE tblbed SET pid='0', rid='0', aid='0', status='Available' WHERE bid='$bednum' AND bednumber='$bednum'");
}

function checkPatientForDischarge($pid, $rid){
	$pid = (int)$pid;
	$rid = (int)$rid;
	
	$query = mysql_query("SELECT COUNT('daid') FROM tbldoctorsattended WHERE pid='$pid' AND rid='$rid' AND task='Cleared Patient for Discharge'");
	
	return (mysql_result($query, 0) == 1) ? true : false;
}
?>