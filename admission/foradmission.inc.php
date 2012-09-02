<div class="admissionHolder">
	<span class="pageTitle">Patients for Admission</span>
	<div id="ptAdmissionHolder">
		<div id="ptAdHolder">
			<div class="rowHeader">
				<div id="opdHeader">Patient ID</div>
				<div id="nameHeader">Patient Name</div>
				<div id="drHeader">Doctor-in-Charge</div>
				<div id="actionHeader" style="border-right: 1px solid #ccc;"></div>
			</div>
		<?php
		$ptAdmit = getForAdmission();
		if(empty($ptAdmit)){
		?>
		</div>
		<div id="noContentHolder" style="width: 623px;">
			<div id="msgNoCnt"><i>There are no patients for admission.</i></div>
		</div>
		<?php
		}else{
			$rowCount = 1;
			foreach ($ptAdmit as $pt){
				$ptInfo = getPtInfo($pt["pid"]);
				foreach ($ptInfo as $pI){
				$drpt = getDocAttend($pt["rid"], $pt["pid"]);
				foreach ($drpt as $d){
					$did = $d["did"];
				}
					if($rowCount == 1){
		?>
			<div class="rowFields odd">
				<div class="opdHolder"><?php echo $pI["opdnum"];?></div>
				<div class="nameHolder"><?php echo $pI["lastname"];?>, <?php echo $pI["firstname"];?> <?php echo $pI["middlename"];?></div>
		<?php
				$drName = getDocProf($did);
				
				if(empty($drName)){
		?>
				<div class="drHolder">Still waiting for a doctor</div>
		<?php
				}else{
					foreach ($drName as $dr){
		?>
				<div class="drHolder">Dr. <?php echo $dr["firstname"];?> <?php echo $dr["lastname"];?>, <?php echo $dr["title"];?></div>
		<?php		
					}
				}
		?>
				<div class="actionHolder border-right"><?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?><a href="verifyadmission.php?pid=<?php echo $pt["pid"];?>&rid=<?php echo $pt["rid"];?>">Admit</a><?php } ?></div>
			</div>
		<?php
						$rowCount = 2;
					}else{
		?>
			<div class="rowFields even">
				<div class="opdHolder"><?php echo $pI["opdnum"];?></div>
				<div class="nameHolder"><?php echo $pI["lastname"];?>, <?php echo $pI["firstname"];?> <?php echo $pI["middlename"];?></div>
		<?php
				$drName = getDocProf($did);
				
				if(empty($drName)){
		?>
				<div class="drHolder">Still waiting for a doctor</div>
		<?php
				}else{
					foreach ($drName as $dr){
		?>
				<div class="drHolder">Dr. <?php echo $dr["firstname"];?> <?php echo $dr["lastname"];?>, <?php echo $dr["title"];?></div>
		<?php		
					}
				}
		?>
				<div class="actionHolder border-right"><?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?><a href="verifyadmission.php?pid=<?php echo $pt["pid"];?>&rid=<?php echo $pt["rid"];?>">Admit</a><?php } ?></div>
			</div>
		<?php
						$rowCount = 1;
					}
				}
			}
		}
		?>
		</div>
	</div>
</div>
<script>
var auto_refresh = setInterval(
function()
{
$('#ptAdmissionHolder').load('reload/loadadmission.php').fadeIn("slow");
}, 5000);
</script>