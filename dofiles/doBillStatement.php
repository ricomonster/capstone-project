<?php
include '../init.php';

sleep(3);

$drugsandmedicine = $_POST["drugsandmedicine"];
$exdrugsandmedicines = $_POST["exdrugsandmedicines"];
$phdrugsandmedicines = $_POST["phdrugsandmedicines"];

$supplies = $_POST["supplies"];
$exsupplies = $_POST["exsupplies"];
$phsupplies = $_POST["phsupplies"];

$laboratory = $_POST["laboratory"];
$exlaboratory = $_POST["exlaboratory"];
$phlaboratory = $_POST["phlaboratory"];

$xray = $_POST["xray"];
$exxray = $_POST["exxray"];
$phxray = $_POST["phxray"];

$ultrasound = $_POST["ultrasound"];
$exultrasound = $_POST["exultrasound"];
$phultrasound = $_POST["phultrasound"];

$ecg = $_POST["ecg"];
$execg = $_POST["execg"];
$phecg = $_POST["phecg"];

$oxygen = $_POST["oxygen"];
$exoxygen = $_POST["exoxygen"];
$phoxygen = $_POST["phoxygen"];

$accomsubs = $_POST["accomsubs"];
$exaccomsubs = $_POST["exaccomsubs"];
$phaccomsubs = $_POST["phaccomsubs"];

$professionalfee = $_POST["professionalfee"];
$exprofessionalfee = $_POST["exprofessionalfee"];
$phprofessionalfee = $_POST["phprofessionalfee"];

$orfeedrfee = $_POST["orfeedrfee"];
$exorfeedrfee = $_POST["exorfeedrfee"];
$phorfeedrfee = $_POST["phorfeedrfee"];

$admissionfee = $_POST["admissionfee"];
$exadmissionfee = $_POST["exadmissionfee"];

$wardservice = $_POST["wardservice"];
$exwardservice = $_POST["exwardservice"];

$nebfee = $_POST["nebfee"];
$exnebfee = $_POST["exnebfee"];

$ambulancefee = $_POST["ambulancefee"];
$exambulancefee = $_POST["exambulancefee"];

$total = $_POST["total"];
$phtotal = $_POST["phtotal"];
$extotal = $_POST["extotal"];

$billingnumber = $_POST["billingnumber"];
$status = $_POST["status"];
$membership = $_POST["membership"];
$pid = $_POST["pid"];
$rid = $_POST["rid"];
$aid = $_POST["aid"];
$nurseonduty = $_POST["nurseonduty"];
$finaldiagnosis = $_POST["finaldiagnosis"];


addBillStat($drugsandmedicine, $exdrugsandmedicines, $supplies, $exsupplies, $laboratory, $exlaboratory, $xray, $exxray, $ultrasound, $exultrasound, $ecg, $execg, $oxygen, $exoxygen, $accomsubs, $exaccomsubs, $professionalfee, $exprofessionalfee, $orfeedrfee, $exorfeedrfee, $admissionfee, $wardservice, $nebfee, $ambulancefee, $total, $extotal, $phtotal, $phdrugsandmedicines, $phsupplies, $phlaboratory, $phxray, $phultrasound, $phecg, $phoxygen, $phaccomsubs, $phprofessionalfee, $phorfeedrfee, $status, $membership, $pid, $rid, $aid, $billingnumber, $nurseonduty, $finaldiagnosis, $exadmissionfee, $exwardservice, $exnebfee, $exambulancefee);
$return['error'] = false;
$return['msg'] = "Success";

echo json_encode($return);
?>