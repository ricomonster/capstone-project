<div id="doctorHolder">
	<span class="pageTitle">List of Available Doctors</span>
    <div id="drHolder">
		<div id="drListHolder">
			<div id="rowHeader">
				<div class="leftHeader">Doctor's Name</div>
				<div class="middleHeader" style="width: 100px;">Specialization</div>
				<div class="middleHeader">Position</div>
				<div class="middleHeader">Contact Number</div>
				<div class="rightHeader">Duty</div>
				<div class="optHeader right-border">&nbsp;</div>
			</div>
			<?php
			$drList = getAllAvDoctors();
			$rowCount = 1;
			
			if(empty($drList)){
			?>
			</div>
		</div>
		<div id="noContentHd">
			<div id="msgNoCnt"><i>There are no doctors available.</i></div>
		</div>
			<?php
			}else{
				foreach ($drList as $dr){
					if ($rowCount == 1){
			?>
			<div class="odd" onclick="window.location = 'viewdoctorprofile.php?did=<?php echo $dr["did"];?>';" title="Click to View Dr. <?php echo $dr["firstname"];?> <?php echo $dr["lastname"];?>'s Profile">
				<div class="leftContent">Dr. <?php echo $dr["firstname"];?> <?php echo $dr["lastname"];?>, <?php echo $dr["title"];?></div>
				<div class="middleContent"><?php echo $dr["specialization"];?></div>
				<div class="middleContent"><?php echo $dr["position"];?></div>
				<div class="middleContent"><?php echo $dr["contact"];?></div>
				<div class="rightContent"><?php echo $dr["duty"];?></div>
				<div class="optContent right-border"><a href="viewdoctorprofile.php?did=<?php echo $dr["did"];?>">View Doc's Profile</a></div>
			</div>
			<?php
				$rowCount=2;
				}else{
			?>
			<div class="even" onclick="window.location = 'viewdoctorprofile.php?did=<?php echo $dr["did"];?>';" title="Click to View Dr. <?php echo $dr["firstname"];?> <?php echo $dr["lastname"];?>'s Profile">
				<div class="leftContent">Dr. <?php echo $dr["firstname"];?> <?php echo $dr["lastname"];?>, <?php echo $dr["title"];?></div>
				<div class="middleContent"><?php echo $dr["specialization"];?></div>
				<div class="middleContent"><?php echo $dr["position"];?></div>
				<div class="middleContent"><?php echo $dr["contact"];?></div>
				<div class="rightContent"><?php echo $dr["duty"];?></div>
				<div class="optContent right-border"><a href="viewdoctorprofile.php?did=<?php echo $dr["did"];?>">View Doc's Profile</a></div>
			</div>
			<?php
					$rowCount=1;
					}
				}	
			}
			?>
		</div>
	</div>
</div>