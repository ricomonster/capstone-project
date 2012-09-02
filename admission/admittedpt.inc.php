<div class="admissionHolder">
	<span class="pageTitle">Patients Admitted</span>
	<div id="ptAdmittedHolder">
		<div id="ptAdHolder">
			<div class="rowHeader">
				<div id="opdHeader">OPD#</div>
				<div id="nameHeader">Patient Name</div>
				<div id="roomHeader">Bed #</div>
				<div id="drHeader">Doctor-in-Charge</div>
				<div id="actionHeader" style="border-right: 1px solid #ccc;"></div>
			</div>
			<?php
		$ptAdmitted = getAdmitted();
		if(empty($ptAdmitted)){
		?>
		</div>
		<div id="noContentHolder" style="width: 694px;">
			<div id="msgNoCnt"><i>There are no patients for admitted.</i></div>
		</div>
		<?php
		}else{
			$rowCount = 1;
			foreach ($ptAdmitted as $pt){
				$ptInfo = getPtInfo($pt["pid"]);
				foreach ($ptInfo as $pI){
				$drpt = getDocAttend($pt["rid"], $pt["pid"]);
				foreach ($drpt as $d){
					$did = $d["did"];
				}
					if($rowCount == 1){
		?>
			<div class="rowFields odd" onclick="window.location = 'viewpatientadmitted.php?pid=<?php echo $pt["pid"];?>&rid=<?php echo $pt["rid"];?>'">
				<div class="opdHolder"><?php echo $pI["opdnum"];?></div>
				<div class="nameHolder"><?php echo $pI["lastname"];?>, <?php echo $pI["firstname"];?> <?php echo $pI["middlename"];?></div>
				<div class="roomHolder">
					<?php
					$bed = getBedPt($pt["rid"], $pt["pid"]);
					if(empty($bed)){
						echo 'The patient still waiting for a bed to occupy.';
					}else{
						foreach($bed as $bd){
							echo $bd["bednumber"];
						}
					}
					?>
				</div>
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
				<div class="actionHolder border-right"><a href="viewpatientadmitted.php?pid=<?php echo $pt["pid"];?>&rid=<?php echo $pt["rid"];?>">View Patient</a></div>
			</div>
		<?php
						$rowCount = 2;
					}else{
		?>
			<div class="rowFields even" onclick="window.location = 'viewpatientadmitted.php?pid=<?php echo $pt["pid"];?>&rid=<?php echo $pt["rid"];?>'">
				<div class="opdHolder"><?php echo $pI["opdnum"];?></div>
				<div class="nameHolder"><?php echo $pI["lastname"];?>, <?php echo $pI["firstname"];?> <?php echo $pI["middlename"];?></div>
				<div class="roomHolder">
					<?php
					$bed = getBedPt($pt["rid"], $pt["pid"]);
					if(empty($bed)){
						echo 'The patient still waiting for a bed to occupy.';
					}else{
						foreach($bed as $bd){
							echo $bd["bednumber"];
						}
					}
					?>
				</div>
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
				<div class="actionHolder border-right"><a href="viewpatientadmitted.php?pid=<?php echo $pt["pid"];?>&rid=<?php echo $pt["rid"];?>">View Patient</a></div>
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