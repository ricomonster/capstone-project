<div id="menu" style="width: 900px;">
<span class="titleMenu">Patient #<?php echo $opdnum;?></span>
<?php
if (!empty($_GET['tab'])){
	$selected = $_GET["tab"];
	if ($selected == "ptinforec"){
?>
<a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=ptinforec" class="selected" title="Patient Information and Record">Patient Info</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=docorders" class="menu" title="Doctor's Orders">Doc Orders</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=historyphysical" class="menu" title="History and Physical Examination">History and Physical</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=therapeutic" class="menu" title="Therapeutic Sheet">Therapeutic</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=progress" class="menu" title="Progress Notes">Progress</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=nurses" class="menu" title="Nurse's Notes">Nurse's Notes</a><?php if($sex=="Female"){?><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=ivf" class="menu" title="IVF Consumption">IVF</a><?php } ?><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=clinical" class="menu" title="Clinical Face Sheet">Clinical</a>
<a href="admission.php" class="menu" title="Return to Admission Page">Back</a>
<?php
	}
	if ($selected == "therapeutic"){
?>
<a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=ptinforec" class="menu" title="Patient Information and Record">Patient Info</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=docorders" class="menu" title="Doctor's Orders">Doc Orders</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=historyphysical" class="menu" title="History and Physical Examination">History and Physical</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=therapeutic" class="selected" title="Therapeutic Sheet">Therapeutic</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=progress" class="menu" title="Progress Notes">Progress</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=nurses" class="menu" title="Nurse's Notes">Nurse's Notes</a><?php if($sex=="Female"){?><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=ivf" class="menu" title="IVF Consumption">IVF</a><?php } ?><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=clinical" class="menu" title="Clinical Face Sheet">Clinical</a>
<a href="admission.php" class="menu" title="Return to Admission Page">Back</a>
<?php
	}
	if ($selected == "clinical"){
?>
<a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=ptinforec" class="menu" title="Patient Information and Record">Patient Info</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=docorders" class="menu" title="Doctor's Orders">Doc Orders</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=historyphysical" class="menu" title="History and Physical Examination">History and Physical</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=therapeutic" class="menu" title="Therapeutic Sheet">Therapeutic</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=progress" class="menu" title="Progress Notes">Progress</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=nurses" class="menu" title="Nurse's Notes">Nurse's Notes</a><?php if($sex=="Female"){?><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=ivf" class="menu" title="IVF Consumption">IVF</a><?php } ?><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=clinical" class="selected" title="Clinical Face Sheet">Clinical</a>
<a href="admission.php" class="menu" title="Return to Admission Page">Back</a>
<?php
	}
	if ($selected == "historyphysical"){
?>
<a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=ptinforec" class="menu" title="Patient Information and Record">Patient Info</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=docorders" class="menu" title="Doctor's Orders">Doc Orders</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=historyphysical" class="selected" title="History and Physical Examination">History and Physical</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=therapeutic" class="menu" title="Therapeutic Sheet">Therapeutic</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=progress" class="menu" title="Progress Notes">Progress</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=nurses" class="menu" title="Nurse's Notes">Nurse's Notes</a><?php if($sex=="Female"){?><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=ivf" class="menu" title="IVF Consumption">IVF</a><?php } ?><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=clinical" class="menu" title="Clinical Face Sheet">Clinical</a>
<a href="admission.php" class="menu" title="Return to Admission Page">Back</a>
<?php
	}
	if ($selected == "docorders"){
?>
<a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=ptinforec" class="menu" title="Patient Information and Record">Patient Info</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=docorders" class="selected" title="Doctor's Orders">Doc Orders</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=historyphysical" class="menu" title="History and Physical Examination">History and Physical</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=therapeutic" class="menu" title="Therapeutic Sheet">Therapeutic</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=progress" class="menu" title="Progress Notes">Progress</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=nurses" class="menu" title="Nurse's Notes">Nurse's Notes</a><?php if($sex=="Female"){?><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=ivf" class="menu" title="IVF Consumption">IVF</a><?php } ?><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=clinical" class="menu" title="Clinical Face Sheet">Clinical</a>
<a href="admission.php" class="menu" title="Return to Admission Page">Back</a>
<?php
	}
	if ($selected == "progress"){
?>
<a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=ptinforec" class="menu" title="Patient Information and Record">Patient Info</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=docorders" class="menu" title="Doctor's Orders">Doc Orders</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=historyphysical" class="menu" title="History and Physical Examination">History and Physical</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=therapeutic" class="menu" title="Therapeutic Sheet">Therapeutic</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=progress" class="selected" title="Progress Notes">Progress</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=nurses" class="menu" title="Nurse's Notes">Nurse's Notes</a><?php if($sex=="Female"){?><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=ivf" class="menu" title="IVF Consumption">IVF</a><?php } ?><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=clinical" class="menu" title="Clinical Face Sheet">Clinical</a>
<a href="admission.php" class="menu" title="Return to Admission Page">Back</a>
<?php
	}
	if ($selected == "nurses"){
?>
<a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=ptinforec" class="menu" title="Patient Information and Record">Patient Info</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=docorders" class="menu" title="Doctor's Orders">Doc Orders</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=historyphysical" class="menu" title="History and Physical Examination">History and Physical</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=therapeutic" class="menu" title="Therapeutic Sheet">Therapeutic</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=progress" class="menu" title="Progress Notes">Progress</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=nurses" class="selected" title="Nurse's Notes">Nurse's Notes</a><?php if($sex=="Female"){?><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=ivf" class="menu" title="IVF Consumption">IVF</a><?php } ?><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=clinical" class="menu" title="Clinical Face Sheet">Clinical</a>
<a href="admission.php" class="menu" title="Return to Admission Page">Back</a>
<?php
	}
	if ($selected == "ivf"){
?>
<a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=ptinforec" class="menu" title="Patient Information and Record">Patient Info</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=docorders" class="menu" title="Doctor's Orders">Doc Orders</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=historyphysical" class="menu" title="History and Physical Examination">History and Physical</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=therapeutic" class="menu" title="Therapeutic Sheet">Therapeutic</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=progress" class="menu" title="Progress Notes">Progress</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=nurses" class="menu" title="Nurse's Notes">Nurse's Notes</a><?php if($sex=="Female"){?><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=ivf" class="selected" title="IVF Consumption">IVF</a><?php } ?><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=clinical" class="menu" title="Clinical Face Sheet">Clinical</a>
<a href="admission.php" class="menu" title="Return to Admission Page">Back</a>
<?php
	}
}else{
?>
<a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=ptinforec" class="selected" title="Patient Information and Record">Patient Info</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=docorders" class="menu" title="Doctor's Orders">Doc Orders</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=historyphysical" class="menu" title="History and Physical Examination">History and Physical</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=therapeutic" class="menu" title="Therapeutic Sheet">Therapeutic</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=progress" class="menu" title="Progress Notes">Progress</a><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=nurses" class="menu" title="Nurse's Notes">Nurse's Notes</a><?php if($sex=="Female"){?><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=ivf" class="menu" title="IVF Consumption">IVF</a><?php } ?><a href="?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&tab=clinical" class="menu" title="Clinical Face Sheet">Clinical</a>
<a href="admission.php" class="menu" title="Return to Admission Page">Back</a>
<?php } ?>
</div>