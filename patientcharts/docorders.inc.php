<div class="admittedHolder">
	<span class="pageTitle">Doctor's Orders</span>
	
	<div id="progWrapper">
			<div class="progInfoHolder">
				<div class="progRow">
					<div class="titleCell prog-title-name">Name:</div>
					<div class="contentCell prog-content-name"><?php echo $lastname;?>, <?php echo $firstname;?> <?php echo $middlename;?></div>
					<div class="titleCell prog-title-age">Age:</div>
					<div class="contentCell prog-content-age"><?php echo $age;?></div>
					<div class="titleCell prog-title-sex">Sex:</div>
					<div class="contentCell prog-content-sex"><?php echo $sex;?></div>
					<div class="titleCell prog-title-cs">Civil Status:</div>
					<div class="contentCell prog-content-cs"><?php echo $cs;?></div>
				</div>
			</div>
		</div>
		<div id="progWrappered">
			<div class="progInfoHolder">
				<div class="progRow">
					<div class="titleCell prog-title-ward">Ward:</div>
					<div class="contentCell prog-content-ward"><?php echo $service;?></div>
					<div class="titleCell prog-title-bn">Bed No.:</div>
					<div class="contentCell prog-content-bn"><?php echo $bednum;?></div>
					<div class="titleCell prog-title-opd">Hospital No.:</div>
					<div class="contentCell prog-content-opd">#<?php echo $opdnum;?></div>
				</div>
			</div>
		</div>
	</div>
	<?php
	date_default_timezone_set("Asia/Manila");
	$curr_date = date('F d, Y', time());
	$curr_time = date('h:i a', time());
	?>
	<div id="doc-holder">
		<div id="guide-order-holder">
			<div class="doc-row">
				<div class="titleCell doc-guide-opt">C - Carried</div>
				<div class="titleCell doc-guide-opt">A - Administered</div>
				<div class="titleCell doc-guide-opt">R - Request Made</div>
				<div class="titleCell doc-guide-opt">E - Endorsed</div>
				<div class="titleCell doc-guide-opt" style="border-right: 1px solid #ccc;">D - Discontinued</div>
			</div>
		</div>
		<div id="doc-order-holder">
			<div class="doc-row">
				<div class="titleCell doc-header-dt">Date/Time</div>
				<div class="titleCell doc-header-order">Order</div>
				<div class="titleCell doc-header-opt">C</div>
				<div class="titleCell doc-header-opt">A</div>
				<div class="titleCell doc-header-opt">R</div>
				<div class="titleCell doc-header-opt">E</div>
				<div class="titleCell doc-header-opt" style="border-right: 1px solid #ccc;">D</div>
			</div>
		</div>
		<div id="row-holder"></div>
	</div>
</div>
<script type="text/javascript">
$("document").ready(function(){
	$("#row-holder").load("reload/loaddocorders.php?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&aid=<?php echo $aid;?>").fadeIn(500);
});
</script>