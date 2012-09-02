<div class="billingHolder">
	<span class="pageTitle">List of Patient's with Billing Statements</span>
    <div id="fordischarge-wrapper">
		<div id="discharge-list-holder">
			<div class="dis-row">
				<div class="dis-cell dis-header-hosno">Hos. No.</div>
				<div class="dis-cell dis-header-name">Patient Name</div>
				<div class="dis-cell dis-header-service">Service</div>
				<div class="dis-cell dis-header-date">Date Admitted</div>
				<div class="dis-cell dis-header-action"></div>
			</div>
			<?php
		$ptlist = getPatientsDischarged();
		foreach ($ptlist as $pt){
			$ptInfo = getPtInfo($pt["pid"]);
				foreach ($ptInfo as $p){
		?>
			<div class="dis-row">
				<div class="dis-cell dis-content-hosno"><?php echo $p["opdnum"];?></div>
				<div class="dis-cell dis-content-name"><?php echo $p["lastname"];?>, <?php echo $p["firstname"];?> <?php echo $p["middlename"];?></div>
				<div class="dis-cell dis-content-service">
					<?php
					$adm = getAdmissionDet($pt["pid"], $pt["rid"]);

					foreach ($adm as $ad){
						$aid = $ad["aid"];
						$service = $ad["service"];
						$dateadmitted = date('F d, Y', strtotime($ad["dateadmitted"]));
						}
					echo $service;
					?>
				</div>
				<div class="dis-cell dis-content-date">
					<?php echo $dateadmitted;?>
				</div>
				<div class="dis-cell dis-content-action"><a href="viewpatientbill.php?pid=<?php echo $pt["pid"];?>&rid=<?php echo $pt["rid"];?>&aid=<?php echo $aid;?>">View Billing Statement</a></div>
			</div>
		<?php }
		} ?>
		</div>
	</div>
</div>