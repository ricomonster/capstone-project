<div class="admittedHolder">
	<span class="pageTitle">Patient Information and Record</span>
	<div id="ptInfo">
		<div id="infoPtHolder">
			<div class="infoHolderLong">
				<div class="infoRowLong">
					<div class="titleCell long-title" style="border-top: 1px solid #ccc;">Patient ID:</div>
					<div class="contentCell long" style="border-top: 1px solid #ccc;"><?php echo $opdnum;?></div>
				</div>
			</div>
			<div class="infoHolder">
				<div class="infoRow">
					<div class="titleCell">First Name:</div>
					<div class="contentCell normal"><?php echo $firstname;?></div>
					<div class="titleCell">Middle Name:</div>
					<div class="contentCell normal"><?php echo $middlename;?></div>
					<div class="titleCell">Last Name:</div>
					<div class="contentCell normal-border-right"><?php echo $lastname;?></div>
				</div>
				<div class="infoRow">
					<div class="titleCell">Membership:</div>
					<div class="contentCell normal"><?php echo $membership;?></div>
					<div class="titleCell">Sex:</div>
					<div class="contentCell normal"><?php echo $sex;?></div>
					<div class="titleCell">Civil Status:</div>
					<div class="contentCell normal-border-right"><?php echo $cs;?></div>
				</div>
			</div>
			<div class="infoHolderLong">
				<div class="infoRowLong">
					<div class="titleCell long-title">Date of Birth:</div>
					<div class="contentCell long"><?php echo $dateofbirth;?></div>
				</div>
			</div>
		</div>
		
		<div id="recPtHolder">
			<div class="infoHolderLong">
				<div class="infoRowLong">
					<div class="titleCell long-title" style="border-top: 1px solid #ccc;">Date Admitted:</div>
					<div class="contentCell long" style="border-top: 1px solid #ccc;"><?php echo $dateadmitted;?></div>
				</div>
			</div>
			<div class="infoHolderLong">
				<div class="infoRowLong">
					<div class="titleCell long-title-doc">Doctor/s:</div>
					<div class="contentCell long-doc">
						<?php
						$doctors = getDoctorsAttend($rid, $pid);
						foreach ($doctors as $d){
							echo 'Dr. '.$d["firstname"].' '.$d["lastname"].', '.$d["title"] . '('.$d["task"].')<br/>';
						}
						?>
					</div>
				</div>
			</div>
			<div class="infoHolderLong">
				<div class="infoRowLong">
					<div class="titleCell long-title">Room No.:</div>
					<div class="contentCell long"><?php echo $roomno;?></div>
				</div>
			</div>
			<div class="infoHolder">
				<div class="infoRow">
					<div class="titleCell">Age:</div>
					<div class="contentCell normal"><?php echo $age;?></div>
					<div class="titleCell">Time In:</div>
					<div class="contentCell normal"><?php echo $timein;?></div>
					<div class="contentCell">&nbsp;</div>
					<div class="contentCell normal-border-right">&nbsp;</div>
				</div>
				<div class="infoRow">
					<div class="titleCell">BP:</div>
					<div class="contentCell normal"><?php echo $bp;?> mmHg</div>
					<div class="titleCell">CR:</div>
					<div class="contentCell normal"><?php echo $cr;?> PPM</div>
					<div class="titleCell">RR:</div>
					<div class="contentCell normal-border-right"><?php echo $rr;?> BPM</div>
				</div>
			</div>
			<div class="infoHolderLong">
				<div class="infoRowDual">
					<div class="titleCell dual-title">Temp:</div>
					<div class="contentCell dual"><?php echo $temp;?></div>
					<div class="titleCell dual-title">Weight:</div>
					<div class="contentCell dual-border-right"><?php echo $weight;?> kg</div>
				</div>
			</div>
			<div class="infoHolderLong">
				<div class="infoRowLong">
					<div class="titleCell long-title">Chief Complaint:</div>
					<div class="contentCell long"><?php echo nl2br($complaint);?></div>
				</div>
			</div>
			<div class="infoHolderLong">
				<div class="infoRowLong">
					<div class="titleCell long-title">Remarks:</div>
					<div class="contentCell long"><?php echo nl2br($remarks);?></div>
				</div>
			</div>
		</div>
	</div>
</div>