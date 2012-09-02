<?php
include 'init.php';

if (!logged_in()){
	header('Location: index.php');
	exit();
}
if(!isset($_GET["pid"]) || empty($_GET["pid"]) || checkPID($_GET["pid"]) === false || checkForAdmit($_GET["pid"], $_GET["rid"])===true){
	header("Location: pagenotfound.php");
	exit();
}

$pid = $_GET["pid"];
$rid = $_GET["rid"];

$adm = getAdmissionDet($pid, $rid);
if(empty($adm)){
	header("Location: pagenotfound.php");
	exit();
}else{
	foreach ($adm as $ad){
		$aid = $ad["aid"];
		$getdatead = date('Y-m-d', strtotime($ad["dateadmitted"]));
		$service = $ad["service"];
		$roomno = $ad["roomno"];
		$dayadmitted = date('d', strtotime($ad["dateadmitted"]));
		$dateadmitted = date('F d, Y', strtotime($ad["dateadmitted"]));
		$timeadmitted = date('h:m a', strtotime($ad["dateadmitted"]));
	}
}

$ptInfo = getPtInfo($pid);

if(empty($ptInfo)){
	header("Location: pagenotfound.php");
	exit();
}else{
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
		$placeofbirth = $in["placeofbirth"];
		$occupation = $in["occupation"];
		$contactno = $in["contactno"];
		$religion = $in["religion"];
		$nationality = $in["nationality"];
	}
}

$ptRec = getPtRecordAdmitted($pid, $rid);
if(empty($ptRec)){
	header("Location: pagenotfound.php");
	exit();
}else{
	foreach ($ptRec as $r){
		$rid = $r["rid"];
		$pid = $r["pid"];
		$dateofvisit = date('F d, Y', strtotime($r["dateofvisit"]));
		$age = $r["age"];
		$timein = $r["timein"];
		$timeout = $r["timeout"];
		$bp = $r["bp"];
		$cr = $r["cr"];
		$rr = $r["rr"];
		$temp = $r["temp"];
		$weight = $r["weight"];
		$complaint = $r["complaint"];
		$remarks = $r["remarks"];
		$foradmission = $r["foradmission"];
	}
}

$bedPt = getBedPt($rid, $pid);
if(empty($bedPt)){
	$bednum = 'The patient still waiting for a bed to occupy.';
}else{
	foreach($bedPt as $bd){
		$bednum = $bd["bednumber"];
		$dateoccupied = date('F d, Y', strtotime($bd["dateadmitted"]));
		$roomtype = $bd["roomtype"];
		$roomno = $bd["roomno"];
	}
}
$msg="";

if(isset($_GET["ntf"])){
	$ntf = $_GET["ntf"];
	
	switch($ntf){
		case 'uphxsuccess':
			$msg = "<div class='success'>You have successfully updated the patient's history and physical record.</div>";
			break;
		case 'successrefer':
			$msg = "<div class='success'>You have successfully referred the patient.</div>";
			break;
		case 'sthera':
			$msg = "<div class='success'>You have successfully inputted data for therapeutics.</div>";
			break;
		case 'successtrans':
			$msg = "<div class='success'>You have successfully transferred the patient.</div>";
			break;
		default:
			break;
	}
}
?>
<!DOCTYPE HTML>
<head>
	<title>Patient #<?php echo $opdnum;?> - Patient Information System</title>
	<?php include 'templates/meta.php';?>
    <link rel="icon" href="favicon.ico" type="image/ico"/>
    <link href="css/styleMain.css" rel="stylesheet" type="text/css">
	<link href="css/styleAdmitted.css" rel="stylesheet" type="text/css">
	<link type="text/css" href="jquery/css/custom/jquery.custom.css" rel="Stylesheet" />
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" src="jquery/js/jquery.custom.min.js"></script>
	<script type="text/javascript" src="ajax/ajaxAddHxPhy.js"></script>
	<script type="text/javascript" src="ajax/ajaxUpHxPhy.js"></script>
	<script type="text/javascript" src="jquery/jquery.maskedinput.js"></script>
</head>
<body>
	<div id="pageContent">
    	<div id="header"><?php include 'templates/header.php'?></div>
        
        <div id="menuholder"><?php include 'menuholder/ptadmittedmenu.php';?></div>
        
        <div id="mainContent">
		<div id="message" style="display: none;"></div>
		<div id="waiting" style="display: none;"><div class="success">Verifying...</div></div>
		<div id="waitingord" style="display: none;"><div class="success">Updating...</div></div>
		<?php echo $msg;?>
			<?php 
			$page_dir = 'admittedpt';
	
			if (!empty($_GET['tab'])){
			
				$pages = scandir($page_dir, 0);
				unset($pages[0], $pages[1]);
			
				$p = $_GET['tab'];
		
				if(in_array($p.'.inc.php',$pages)){
					include ($page_dir.'/'.$p.'.inc.php');
				}else{
					header("Location: pagenotfound.php");
					exit();
				}
		
			}else{
				include ($page_dir.'/ptinforec.inc.php');
			}
		?>
        </div>
		
        <div id="footer"><?php include 'templates/footer.php'?></div>
    </div>
</body>
</html>