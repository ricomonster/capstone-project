<?php
include 'init.php';
$pid = $_GET["pid"];
$rid = $_GET["rid"];
$aid = $_GET["aid"];

$ptInfo = getPtInfo($pid);

foreach ($ptInfo as $in){
	$pid = $in["pid"];
	$firstname = $in["firstname"];
	$middlename = $in["middlename"];
	$lastname = $in["lastname"];
	$membership = $in["membership"];
	$sex = $in["sex"];
	$cs = $in["cs"];
	$dob = $in["dateofbirth"];
	$dateofbirth = date('F d, Y', strtotime($in["dateofbirth"]));
	$opdnum = $in["opdnum"];
	$address = $in["address"];
}

$ptRec = getRecords($pid);
foreach ($ptRec as $r){
	$dateofvisit = date('F d, Y', strtotime($r["dateofvisit"]));
	$age = $r["age"];
}

$adm = getAdmissionDet($pid, $rid);

foreach ($adm as $ad){
	$aid = $ad["aid"];
	$getdatead = $ad["dateadmitted"];
	$service = $ad["service"];
	$roomno = $ad["roomno"];
	$bednumber = $ad["bednumber"];
	$dayadmitted = date('d', strtotime($ad["dateadmitted"]));
	$undateadmitted = $ad["dateadmitted"];
	$dateadmitted = date('F d, Y', strtotime($ad["dateadmitted"]));
	$timeadmitted = date('h:m a', strtotime($ad["dateadmitted"]));
}

$cif = getClinicalFace($pid, $rid, $aid);
foreach ($cif as $c){
	$datedischarged = date('F d, Y', strtotime($c["datedischarged"]));
	$timedischarged = $c["timedischarged"];
	$persondischarged = $c["persondischarged"];
	$finaldiagnosis = $c["finaldiagnosis"];
	$noofhosdays = $c["noofhosdays"];
}

$room = getRoomType($roomno, $bednumber);
foreach ($room as $r){
	$roomtype = $r["roomtype"];
	$priceperday = $r["priceperday"];
}

$accomtot = $priceperday * $noofhosdays;
$accom = number_format((float)$accomtot, 2, '.', '');

$pricing = getPriceList($membership);
foreach ($pricing as $p){
	$phdrugsandmedicines = $p["drugsandmedicines"];
	$phsupplies = $p["supplies"];
	$phlaboratory = $p["laboratory"];
	$phxray = $p["xray"];
	$phultrasound = $p["ultrasound"];
	$phecg = $p["ecg"];
	$phoxygen = $p["oxygen"];
	$phaccom = $p["accomsubs"];
	$phprofessionalfee = $p["professionalfee"];
	$phorfeedrfee = $p["orfeedrfee"];
}
?>
<!DOCTYPE HTML>
<head>
	<title>Bill Information :: Bacnotan District Hospital - Patient Information System</title>
	<?php include 'templates/meta.php';?>
    <link rel="icon" href="favicon.ico" type="image/ico"/>
    <link href="css/styleMain.css" rel="stylesheet" type="text/css">
    <link href="css/stylePatientBill.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" src="jquery/jquery.maskMoney.js"></script>
</head>
<body>
	<div id="pageContent">
    	<div id="header"><?php include 'templates/header.php'?></div>
        
        <div id="mainContent" class="clearfix" style="margin-top:30px;">
        <div id="message" style="display: none;"></div>
		<div id="waiting" style="display: none;"><div class="success">Verifying...</div></div>
		
		<div id="billHolder">
		<!-- seperate forms for the new record and a page to show the bills -->
		<?php
		if(checkPatientBill($pid, $rid, $aid)===false){
			include 'templates/billingform.php';
		}else{
			include 'templates/billingstatement.php';
		}	
		?>
		</div>
        </div>
        <div id="footer"><?php include 'templates/footer.php'?></div>
    </div>
</body>
</html>