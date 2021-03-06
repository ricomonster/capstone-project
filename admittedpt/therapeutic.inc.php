<?php
date_default_timezone_set("Asia/Manila");
$curr_date = date('F d, Y', time());
$curr_time = date('h:i a', time());

$ctime = strtotime($curr_time);

$mshift = strtotime("7:00 am");
$mlshift = strtotime("3:00 pm");

$ashift = strtotime("3:00 pm");
$alshift = strtotime("11:00 pm");

$nshift = strtotime("11:00 pm");
$nlshift = strtotime("7:00 am");
$mnshift = strtotime("12:00 am");

$curr_shift = "";
if($mshift < $ctime && $mlshift > $ctime){$cdate = strtotime(date('F d, Y')); $db_date = date('Y-m-d', time());}
if($ashift < $ctime && $alshift > $ctime){$cdate = strtotime(date('F d, Y')); $db_date = date('Y-m-d', time());}
if($nshift < $ctime){$cdate = strtotime(date('F d, Y')); $db_date = date('Y-m-d', time());}
if($mnshift < $ctime && $nlshift > $ctime ){$cdate = strtotime('-1 day',strtotime ($curr_date)); $db_date = date ('Y-m-d', strtotime ('-1 day' . date('Y-m-d', time())));}
?>
<div class="admittedHolder">
	<span class="pageTitle">Therapeutic Page</span>
	<div id="thera-holder">
		<div id="info-holder" style="margin-top: 5px;">
			<div class="thera-row">
				<div class="titleCell thera-header-cell-name" style="border-top:1px solid #ccc;">Name:</div>
				<div class="contentCell thera-content-cell-name" style="border-top:1px solid #ccc;"><?php echo $lastname;?>, <?php echo $firstname;?> <?php echo $middlename;?></div>
				<div class="titleCell thera-header-cell-room" style="border-top:1px solid #ccc;">Room No.:</div>
				<div class="contentCell thera-content-cell-room" style="border-top:1px solid #ccc;"><?php echo $roomno;?></div>
				<div class="titleCell thera-header-cell-hosno" style="border-top:1px solid #ccc;">Hosp. No.:</div>
				<div class="contentCell thera-content-cell-hosno" style="border-top:1px solid #ccc;"><?php echo $opdnum;?></div>
			</div>
		</div>
		<?php if(checkDataTheraPerDay($pid, $rid, $aid, $db_date)===true){?><input type="button" id="show_add_form" class="bluebutton" value="+Add Therapeutics" style="margin-top: 5px;"><?php } ?>
		<div id="thera-form-holder" <?php if(checkDataTheraPerDay($pid, $rid, $aid, $db_date)===false){ echo 'style="margin-top:5px;"';}else{ echo 'style="display: none; margin-top:5px;"';}?>>
			<div id="thera-injection">
				<form id="inject-form">
				<div id="injection-wrapper">
					<div class="thera-row">
						<div class="titleCell form-header-inj" style="border-top:1px solid #ccc;">Input Injection</div>
						<div class="contentCell" style="border-top:1px solid #ccc;">
							<select name="injection" id="injection" class="treatField">
								<option value="">Select Injection:</option>
								<?php
								$inj = getTheraInjection();
								foreach ($inj as $i){
									echo '<option value="'.$i["therapeutic"].'">'.$i["therapeutic"].'</option>';
								}
								?>
							</select>
						</div>
						<div class="contentCell" style="border-top:1px solid #ccc;">
							<select name="shift" id="shift" class="shiftField">
								<option value="7 AM - 3 PM" <?php if($mshift < $ctime && $mlshift > $ctime){echo 'selected="selected"';}?>>7 AM - 3 PM</option>
								<option value="3 PM - 11 PM" <?php if($ashift < $ctime && $alshift > $ctime){echo 'selected="selected"';}?>>3 PM - 11 PM</option>
								<option value="11 PM - 7 AM" <?php if($nshift < $ctime || $nlshift > $ctime){echo 'selected="selected"';}?>>11 PM - 7 AM</option>
							</select>
						</div>
						<div class="contentCell" style="border-top:1px solid #ccc;">
							<select name="given_inj" id="given_inj" class="giveField">
								<option value="Given">Given</option>
								<option value="Not Given">Not Given</option>
							</select>
						</div>
						<div class="contentCell" style="border-right: 1px solid #ccc;border-top:1px solid #ccc;">
							<input type="hidden" name="type" id="type" value="Injection"/>
							<input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
							<input type="hidden" name="rid" id="rid" value="<?php echo $rid;?>"/>
							<input type="hidden" name="aid" id="aid" value="<?php echo $aid;?>"/>
							<?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?>
							<input type="submit" name="subInjection" id="subInjection" class="disgbutton" value="Submit" disabled="disabled"/>
							<?php } ?>
						</div>
					</div>
				</div>
				</form>
			</div>
			

			<div id="thera-oral">
				<form id="oral-form">
				<div id="oral-wrapper">
					<div class="thera-row">
						<div class="titleCell form-header-inj">Input Oral</div>
						<div class="contentCell">
							<select name="oral" id="oral" class="treatField"/>
								<option value="">Select Oral:</option>
								<?php
								$oral = getTheraOral();
								foreach ($oral as $o){
									echo '<option value="'.$o["therapeutic"].'">'.$o["therapeutic"].'</option>';
								}
								?>
							</select>
						</div>
						<div class="contentCell">
							<select name="shift" id="shift" class="shiftField">
								<option value="7 AM - 3 PM" <?php if($mshift < $ctime && $mlshift > $ctime){echo 'selected="selected"';}?>>7 AM - 3 PM</option>
								<option value="3 PM - 11 PM" <?php if($ashift < $ctime && $alshift > $ctime){echo 'selected="selected"';}?>>3 PM - 11 PM</option>
								<option value="11 PM - 7 AM" <?php if($nshift < $ctime || $nlshift > $ctime){echo 'selected="selected"';}?>>11 PM - 7 AM</option>
							</select>
						</div>
						<div class="contentCell">
							<select name="given_oral" id="given_oral" class="giveField">
								<option value="Given">Given</option>
								<option value="Not Given">Not Given</option>
							</select>
						</div>
						<div class="contentCell" style="border-right: 1px solid #ccc;">
							<input type="hidden" name="type_oral" id="type_oral" value="Oral"/>
							<input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
							<input type="hidden" name="rid" id="rid" value="<?php echo $rid;?>"/>
							<input type="hidden" name="aid" id="aid" value="<?php echo $aid;?>"/>
							<?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?>
							<input type="submit" name="subOral" id="subOral" class="disgbutton" value="Submit" disabled="disabled"/>
							<?php } ?>
						</div>
					</div>
				</div>
				</form>
			</div>

			<div id="thera-treatment">
				<form id="treatment-form">
				<div id="treatment-wrapper">
					<div class="thera-row">
						<div class="titleCell form-header-inj">Input Treatment</div>
						<div class="contentCell">
							<select name="treatment" id="treatment" class="treatField"/>
								<option value="">Select Treatment:</option>
								<?php
								$treat = getTheraTreatment();
								foreach ($treat as $t){
									echo '<option value="'.$t["therapeutic"].'">'.$t["therapeutic"].'</option>';
								}
								?>
							</select>
						</div>
						<div class="contentCell">
							<select name="shift" id="shift" class="shiftField">
								<option value="7 AM - 3 PM" <?php if($mshift < $ctime && $mlshift > $ctime){echo 'selected="selected"';}?>>7 AM - 3 PM</option>
								<option value="3 PM - 11 PM" <?php if($ashift < $ctime && $alshift > $ctime){echo 'selected="selected"';}?>>3 PM - 11 PM</option>
								<option value="11 PM - 7 AM" <?php if($nshift < $ctime || $nlshift > $ctime){echo 'selected="selected"';}?>>11 PM - 7 AM</option>
							</select>
						</div>
						<div class="contentCell"> 
							<select name="given_treat" id="given_treat" class="giveField">
								<option value="Given">Given</option>
								<option value="Not Given">Not Given</option>
							</select>
						</div>
						<div class="contentCell" style="border-right: 1px solid #ccc;">
							<input type="hidden" name="type_treatment" id="type_treatment" value="Treatment"/>
							<input type="hidden" name="pid" id="pid" value="<?php echo $pid;?>"/>
							<input type="hidden" name="rid" id="rid" value="<?php echo $rid;?>"/>
							<input type="hidden" name="aid" id="aid" value="<?php echo $aid;?>"/>
							<?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?>
							<input type="submit" name="subTreatment" id="subTreatment" class="disgbutton" value="Submit" disabled="disabled"/>
							<?php } ?>
						</div>
					</div>
				</div>
				</form>
			</div>
		</div>
		<?php
		$per_page = 2;
		
		$no_of_paginations = countTheraRecords($pid, $rid, $aid);
		
		$pages = ceil(mysql_result($no_of_paginations, 0) / $per_page);
		$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		
		if (!empty($pages)){
			if ($page > $pages){
				//header("Location: pagenotfound.php");
				exit();
			}
		}
		$start = ($page - 1) * $per_page;
		?>
		<br/>
		<div id="thera-sheet-holder" style="margin-top: 10px;">
			<?php
			$dates = getTheraDates($pid, $rid, $aid, $start, $per_page);
			if(!empty($dates)){
			foreach ($dates as $dt){
				$dtg = strtotime($dt["givendate"]);
			?>
			<div id="data-holder-<?php echo $dt["givendate"];?>">
				<div class="titleCell thera-date-title">Date: <?php echo date('F d, Y', strtotime($dt["givendate"]));?></div>
				<?php
				$inject = getTheraInjectionData($dt["givendate"], $pid, $rid, $aid);
				if(!empty($inject)){
				?>
				<div id="data-injection-holder">
					<div class="inj-row">
						<div class="titleCell thera-inj-header-name">Injection</div>
						<div class="titleCell thera-inj-header-shift">Shift</div>
						<div class="titleCell thera-inj-header-given" style="border-right: 1px solid #ccc;">Status</div>
					</div>
					<?php
					foreach ($inject as $ij){
					?>
					<div class="inj-row">
						<div class="contentCell thera-inj-content-name">
							<?php echo getTheraName($ij["tid"])?>
							<?php if(checkThera($ij["tid"], $dt["givendate"])===false && $cdate <= $dtg){?><span style="float: right"><a id="<?php echo $ij["tcid"];?>" class="upThera" style="cursor: pointer">[Update]</a></span><?php } ?>
						</div>
						<div class="contentCell thera-inj-content-shift">
							<?php
							$ijdata = getTheraData($ij["tid"], $dt["givendate"]);
							foreach ($ijdata as $i){
								echo '<div class="thera-cont-shift">'.$i["shift"].'</div>';
							}
							?>
						</div>
						<div class="contentCell thera-inj-content-given" style="border-right: 1px solid #ccc;">
							<?php
							foreach ($ijdata as $g){
								echo '<div class="thera-cont-given">'.$g["given"].'</div>';
							}
							?>
						</div>
					</div>
					
					<form id="form-inj-<?php echo $ij["tcid"];?>" class="inj-row" name="<?php echo $ij["tid"];?>"style="display: none;">
						<div class="contentCell thera-inj-content-name">
							&nbsp;<?php echo $ij["tid"];?>
						</div>
						<div class="contentCell thera-inj-content-shift" style="padding: 5px; border-bottom: 1px solid #ccc;">
							<select name="shift_inj_up_<?php echo $ij["tcid"];?>" id="shift_inj_up_<?php echo $ij["tid"];?>" class="shiftField">
								<option value="7 AM - 3 PM" <?php if($mshift < $ctime && $mlshift > $ctime){echo 'selected="selected"';}?>>7 AM - 3 PM</option>
								<option value="3 PM - 11 PM" <?php if($ashift < $ctime && $alshift > $ctime){echo 'selected="selected"';}?>>3 PM - 11 PM</option>
								<option value="11 PM - 7 AM" <?php if($nshift < $ctime || $nlshift > $ctime){echo 'selected="selected"';}?>>11 PM - 7 AM</option>
							</select>
						</div>
						<div class="contentCell thera-inj-content-given" style="border-right: 1px solid #ccc; padding: 5px; border-bottom: 1px solid #ccc;">
							<input type="hidden" name="pid" id="pid<?php echo $ij["tid"];?>" value="<?php echo $pid;?>"/>
							<input type="hidden" name="rid" id="rid<?php echo $ij["tid"];?>" value="<?php echo $rid;?>"/>
							<input type="hidden" name="aid" id="aid<?php echo $ij["tid"];?>" value="<?php echo $aid;?>"/>
							<input type="hidden" name="tcid" id="tcid<?php echo $ij["tid"];?>" value="<?php echo $ij["tcid"];?>"/>
							<input type="submit" name="givenInject" id="<?php echo $ij["tid"];?>" class="greenbutton-inj" value="Given!"/>
						</div>
					</form>
					<?php } ?>
				</div>
				<?php } ?>
				<!-- Oral Data Existing -->
				<?php
				$oral = getTheraOralData($dt["givendate"], $pid, $rid, $aid);
				if(!empty($oral)){
				?>
				<div id="data-oral-holder">
					<div class="or-row">
						<div class="titleCell thera-inj-header-name">Oral</div>
						<div class="titleCell thera-inj-header-shift">Shift</div>
						<div class="titleCell thera-inj-header-given" style="border-right: 1px solid #ccc;">Status</div>
					</div>
					<?php
					foreach ($oral as $or){
					?>
					<div class="or-row">
						<div class="contentCell thera-inj-content-name">
							<?php echo getTheraName($or["tid"])?>
							<?php if(checkThera($or["tid"], $dt["givendate"])===false && $cdate <= $dtg){?><span style="float: right"><a id="<?php echo $or["tcid"];?>" class="upor" style="cursor: pointer">[Update]</a></span><?php } ?>
						</div>
						<div class="contentCell thera-inj-content-shift">
							<?php
							$ordata = getTheraData($or["tid"], $dt["givendate"]);
							foreach ($ordata as $i){
								echo '<div class="thera-cont-shift">'.$i["shift"].'</div>';
							}
							?>
						</div>
						<div class="contentCell thera-inj-content-given" style="border-right: 1px solid #ccc;">
							<?php
							foreach ($ordata as $g){
								echo '<div class="thera-cont-given">'.$g["given"].'</div>';
							}
							?>
						</div>
					</div>
					
					<form id="form-or-<?php echo $or["tcid"];?>" class="or-row" name="<?php echo $or["tid"];?>"style="display: none;">
						<div class="contentCell thera-inj-content-name">
							&nbsp;<?php echo $or["tid"];?>
						</div>
						<div class="contentCell thera-inj-content-shift" style="padding: 5px; border-bottom: 1px solid #ccc;">
							<select name="shift_or_up_<?php echo $or["tcid"];?>" id="shift_or_up_<?php echo $or["tid"];?>" class="shiftField">
								<option value="7 AM - 3 PM" <?php if($mshift < $ctime && $mlshift > $ctime){echo 'selected="selected"';}?>>7 AM - 3 PM</option>
								<option value="3 PM - 11 PM" <?php if($ashift < $ctime && $alshift > $ctime){echo 'selected="selected"';}?>>3 PM - 11 PM</option>
								<option value="11 PM - 7 AM" <?php if($nshift < $ctime || $nlshift > $ctime){echo 'selected="selected"';}?>>11 PM - 7 AM</option>
							</select>
						</div>
						<div class="contentCell thera-inj-content-given" style="border-right: 1px solid #ccc; padding: 5px; border-bottom: 1px solid #ccc;">
							<input type="hidden" name="pid" id="pid<?php echo $or["tid"];?>" value="<?php echo $pid;?>"/>
							<input type="hidden" name="rid" id="rid<?php echo $or["tid"];?>" value="<?php echo $rid;?>"/>
							<input type="hidden" name="aid" id="aid<?php echo $or["tid"];?>" value="<?php echo $aid;?>"/>
							<input type="hidden" name="tcid" id="tcid<?php echo $or["tid"];?>" value="<?php echo $or["tcid"];?>"/>
							<input type="submit" name="givenInject" id="<?php echo $or["tid"];?>" class="greenbutton-or" value="Given!"/>
						</div>
					</form>
					<?php } ?>
				</div>
				<?php } ?>
				
				<!-- Treatment Data Existing -->
				<?php
				$trt = getTheraTreatmentData($dt["givendate"], $pid, $rid, $aid);
				if(!empty($inject)){
				?>
				<div id="data-treatment-holder">
					<div class="trt-row">
						<div class="titleCell thera-inj-header-name">Treatment</div>
						<div class="titleCell thera-inj-header-shift">Shift</div>
						<div class="titleCell thera-inj-header-given" style="border-right: 1px solid #ccc;">Status</div>
					</div>
					<?php
					foreach ($trt as $it){
					?>
					<div class="trt-row">
						<div class="contentCell thera-inj-content-name">
							<?php echo getTheraName($it["tid"])?>
							<?php if(checkThera($it["tid"], $dt["givendate"])===false && $cdate <= $dtg){?><span style="float: right"><a id="<?php echo $it["tcid"];?>" class="uptrt" style="cursor: pointer">[Update]</a></span><?php } ?>
						</div>
						<div class="contentCell thera-inj-content-shift">
							<?php
							$itdata = getTheraData($it["tid"], $dt["givendate"]);
							foreach ($itdata as $t){
								echo '<div class="thera-cont-shift">'.$t["shift"].'</div>';
							}
							?>
						</div>
						<div class="contentCell thera-inj-content-given" style="border-right: 1px solid #ccc;">
							<?php
							foreach ($itdata as $g){
								echo '<div class="thera-cont-given">'.$g["given"].'</div>';
							}
							?>
						</div>
					</div>
					
					<form id="form-trt-<?php echo $it["tcid"];?>" class="trt-row" name="<?php echo $it["tid"];?>"style="display: none;">
						<div class="contentCell thera-inj-content-name">
							&nbsp;<?php echo $it["tid"];?>
						</div>
						<div class="contentCell thera-inj-content-shift" style="padding: 5px; border-bottom: 1px solid #ccc;">
							<select name="shift_trt_up_<?php echo $it["tcid"];?>" id="shift_trt_up_<?php echo $it["tid"];?>" class="shiftField">
								<option value="7 AM - 3 PM" <?php if($mshift < $ctime && $mlshift > $ctime){echo 'selected="selected"';}?>>7 AM - 3 PM</option>
								<option value="3 PM - 11 PM" <?php if($ashift < $ctime && $alshift > $ctime){echo 'selected="selected"';}?>>3 PM - 11 PM</option>
								<option value="11 PM - 7 AM" <?php if($nshift < $ctime || $nlshift > $ctime){echo 'selected="selected"';}?>>11 PM - 7 AM</option>
							</select>
						</div>
						<div class="contentCell thera-inj-content-given" style="border-right: 1px solid #ccc; padding: 5px; border-bottom: 1px solid #ccc;">
							<input type="hidden" name="pid" id="pid<?php echo $it["tid"];?>" value="<?php echo $pid;?>"/>
							<input type="hidden" name="rid" id="rid<?php echo $it["tid"];?>" value="<?php echo $rid;?>"/>
							<input type="hidden" name="aid" id="aid<?php echo $it["tid"];?>" value="<?php echo $aid;?>"/>
							<input type="hidden" name="tcid" id="tcid<?php echo $it["tid"];?>" value="<?php echo $it["tcid"];?>"/>
							<input type="submit" name="givenTreatment" id="<?php echo $it["tid"];?>" class="greenbutton-trt" value="Given!"/>
						</div>
					</form>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
			<br/>
			<?php }
			} ?>
		</div>
        <?php
		$pag = "";
		$cur_page = $page;
		$page -= 1;
		$per_page = 1;
		$previous_btn = true;
		$next_btn = true;
		$first_btn = true;
		$last_btn = true;

		if ($cur_page >= 7) {
		    $start_loop = $cur_page - 3;
			    if ($pages > $cur_page + 3){
			        $end_loop = $cur_page + 3;
				}else if ($cur_page <= $pages && $cur_page > $pages - 6) {
			        $start_loop = $pages - 6;
    			    $end_loop = $pages;
			    } else {
    		    	$end_loop = $pages;
		    	}
		} else {
    		$start_loop = 1;
			    if ($pages > 7){
			        $end_loop = 7;
				}else{
					$end_loop = $pages;
				}
		}
				
		if ($first_btn && $cur_page > 1) {
		    $pag .= "<a href='?pid=".$pid."&rid=".$rid."&aid=".$aid."&tab=therapeutic&page=1' class='first'>&larr; First</a>";
		} else if ($first_btn) {
		    $pag .= "<span class='inactiveFirst'>&larr; First</span>";
		}

		if ($previous_btn && $cur_page > 1) {
		    $pre = $cur_page - 1;
		    $pag .= "<a href='?pid=".$pid."&rid=".$rid."&aid=".$aid."&tab=therapeutic&page=$pre' class='previous'>&laquo; prev</li>";
		} else if ($previous_btn) {
		    $pag .= "<span class='inactivePrev'>&laquo; prev</span>";
		}
			$pag .="<span class='numbering'>";
			for ($i = $start_loop; $i <= $end_loop; $i++) {

			    if ($cur_page == $i){
			        $pag .= "<a href='?pid=".$pid."&rid=".$rid."&aid=".$aid."&tab=therapeutic&page=$i' class='thisPage'>{$i}</a>";
				}else{
			        $pag .= "<a href='?pid=".$pid."&rid=".$rid."&aid=".$aid."&tab=therapeutic&page=$i' class='numbers'>{$i}</a>";
				}
			}
			$pag .="</span>";
	
			if ($next_btn && $cur_page < $pages) {
			    $nex = $cur_page + 1;
			    $pag .= "<a href='?pid=".$pid."&rid=".$rid."&aid=".$aid."&tab=therapeutic&page=$nex' class='next'>Next &raquo;</a>";
			} else if ($next_btn) {
			    $pag .= "<span class='inactiveNext'>Next &raquo;</span>";
			}

			if ($last_btn && $cur_page < $pages) {
			    $pag .= "<a href='?pid=".$pid."&rid=".$rid."&aid=".$aid."&tab=therapeutic&page=$pages' class='last'>Last &rarr;</a>";
			} else if ($last_btn) {
    			$pag .= "<span class='inactiveLast'>Last &rarr;</span>";
			}
			
			$total_string = "<br/><div class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$pages</b></div>";
			$pag = $pag . $total_string;  // Content for pagination
		?>
		<?php if (!empty($pages)){ if ($page < $pages){ ?> <div id="pagination"><?php echo $pag;?></div> <?php }} ?>
	</div>
</div>
<?php
if (!empty($_GET['page'])){
	$cpage = $_GET["page"];
}else{
	$cpage = "1";
}
?>
<script>
$(document).ready(function(){
	$("#show_add_form").click(function() {
		$("#thera-form-holder").slideToggle(500);
	});
});
</script>
<script>
$(document).ready(function(){
$(".upThera").click(function() {
		var ID = $(this).attr("id")	
		$("#form-inj-"+ID).slideToggle(500);
	});
});
</script>
<script>
$(document).ready(function(){
$(".upor").click(function() {
		var ID = $(this).attr("id")	
		$("#form-or-"+ID).slideToggle(500);
	});
});
</script>
<script>
$(document).ready(function(){
$(".uptrt").click(function() {
		var ID = $(this).attr("id")	
		$("#form-trt-"+ID).slideToggle(500);
	});
});
</script>
<!--Inserts New Therapeutics-->
<!-- Injection -->
<script type="text/javascript">
$("document").ready(function(){
	$("#injection, #shift, #given_inj").click(function (data) {              
	if ($("#injection").val() != "" && $("#shift").val() != "" && $("#given_inj").val() != ""){  
			$("#subInjection").removeAttr("disabled").removeClass().addClass("greenbutton"); 
		} else {  
			$("#subInjection").attr("disabled", "disabled").removeClass().addClass("disgbutton"); 
		}  
	});
	
	$("#subInjection").click(function(){
		$('#waiting').slideDown(500);
		$('#message').hide(0);
			
		$.ajax({
				type : 'POST',
				url : 'dofiles/doAddTherapeutics.php',
				dataType : 'json',
				data: {
					pid : $('#pid').val(),
					rid : $('#rid').val(),
					aid : $('#aid').val(),
					theraname : $('#injection').val(),
					shift : $('#shift').val(),
					given : $('#given_inj').val(),
					type : $('#type').val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#inject-form').show(500);
						}else{
							$(':input','#inject-form')
							.not(':button, :submit, :reset, :hidden')
							.val('');
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#inject-form').show(500);
						}else{
							window.location.href = data.msg;
						}	
					}
				},

				error : function(XMLHttpRequest, textStatus, errorThrown) {
					$('#waiting').fadeOut(500);
					$('#message').removeClass().addClass('error').text('There was an error. Please try again later.').delay(500).fadeIn();
				}
			});
			return false;
	});
});
</script>
<!-- Oral -->
<script type="text/javascript">
$("document").ready(function(){
	$("#oral, #shift, #given_oral").click(function (data) {              
	if ($("#oral").val() != "" && $("#shift").val() != "" && $("#given_oral").val() != ""){  
			$("#subOral").removeAttr("disabled").removeClass().addClass("greenbutton"); 
		} else {  
			$("#subOral").attr("disabled", "disabled").removeClass().addClass("disgbutton"); 
		}  
	});
	
	$("#subOral").click(function(){
		$('#waiting').slideDown(500);
		$('#message').hide(0);
			
		$.ajax({
				type : 'POST',
				url : 'dofiles/doAddTherapeutics.php',
				dataType : 'json',
				data: {
					pid : $('#pid').val(),
					rid : $('#rid').val(),
					aid : $('#aid').val(),
					theraname : $('#oral').val(),
					shift : $('#shift').val(),
					given : $('#given_oral').val(),
					type : $('#type_oral').val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#oral-form').show(500);
						}else{
							$(':input','#oral-form')
							.not(':button, :submit, :reset, :hidden')
							.val('');
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#oral-form').show(500);
						}else{
							window.location.href = data.msg;
						}	
					}
				},

				error : function(XMLHttpRequest, textStatus, errorThrown) {
					$('#waiting').fadeOut(500);
					$('#message').removeClass().addClass('error').text('There was an error. Please try again later.').delay(500).fadeIn();
				}
			});
			return false;
	});
});
</script>
<!-- Treatment -->
<script type="text/javascript">
$("document").ready(function(){
	$("#treatment, #shift, #given_treat").click(function (data) {              
	if ($("#treatment").val() != "" && $("#shift").val() != "" && $("#given_treatment").val() != ""){  
			$("#subTreatment").removeAttr("disabled").removeClass().addClass("greenbutton"); 
		} else {  
			$("#subTreatment").attr("disabled", "disabled").removeClass().addClass("disgbutton"); 
		}  
	});
	
	$("#subTreatment").click(function(){
		$('#waiting').slideDown(500);
		$('#message').hide(0);
			
		$.ajax({
				type : 'POST',
				url : 'dofiles/doAddTherapeutics.php',
				dataType : 'json',
				data: {
					pid : $('#pid').val(),
					rid : $('#rid').val(),
					aid : $('#aid').val(),
					theraname : $('#treatment').val(),
					shift : $('#shift').val(),
					given : $('#given_treat').val(),
					type : $('#type_treatment').val()
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#treatment-form').show(500);
						}else{
							$(':input','#treatment-form')
							.not(':button, :submit, :reset, :hidden')
							.val('');
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#oral-form').show(500);
						}else{
							window.location.href = data.msg;
						}	
					}
				},

				error : function(XMLHttpRequest, textStatus, errorThrown) {
					$('#waiting').fadeOut(500);
					$('#message').removeClass().addClass('error').text('There was an error. Please try again later.').delay(500).fadeIn();
				}
			});
			return false;
	});
});
</script>


<!--Insert if Therapeutics were Given per shift-->
<!-- Injection -->
<script type="text/javascript">
$("document").ready(function(){
	$(".greenbutton-inj").click(function(){
		$('.success').slideUp(500);
		$('#waiting').slideDown(500);
		$('#message').hide(0);
		
		var element = $(this);
		var Id = element.attr("id");
		var pid = $("#pid"+Id).val();
		var rid = $("#rid"+Id).val();
		var aid = $("#aid"+Id).val();
		var tcid = $("#tcid"+Id).val();
		
		var shift_inj = $('#shift_inj_up_'+Id).val();
		var given = "Given";
		var ref = "<?php echo $_GET["tab"];?>";
		var currpage = <?php echo $cpage;?>;
		
		var dataString = 'pid='+ pid + '&rid=' + rid + '&aid=' + aid + '&tid=' + Id + '&shift=' + shift_inj + '&given=' + given + '&ref=' + ref + '&currpage=' + currpage;
		
		$.ajax({
				type : 'POST',
				url : 'dofiles/doUpdateConsumedThera.php',
				dataType : 'json',
				data: dataString,
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#form-inj-'+tcid).show(500);
						}else{
							window.location.href = data.msg;
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#form-inj-'+tcid).show(500);
						}else{
							window.location.href = data.msg;
						}	
					}
				},

				error : function(XMLHttpRequest, textStatus, errorThrown) {
					$('#waiting').fadeOut(500);
					$('#message').removeClass().addClass('error').text('There was an error. Please try again later.').delay(500).fadeIn();
				}
			});
			return false;
	});
});
</script>

<!-- Oral -->
<script type="text/javascript">
$("document").ready(function(){
	$(".greenbutton-or").click(function(){
		$('.success').slideUp(500);
		$('#waiting').slideDown(500);
		$('#message').hide(0);
		
		var element = $(this);
		var Id = element.attr("id");
		var pid = $("#pid"+Id).val();
		var rid = $("#rid"+Id).val();
		var aid = $("#aid"+Id).val();
		var tcid = $("#tcid"+Id).val();
		
		var shift_inj = $('#shift_or_up_'+Id).val();
		var given = "Given";
		var ref = "<?php echo $_GET["tab"];?>";
		var currpage = <?php echo $cpage;?>;
		
		var dataString = 'pid='+ pid + '&rid=' + rid + '&aid=' + aid + '&tid=' + Id + '&shift=' + shift_inj + '&given=' + given + '&ref=' + ref + '&currpage=' + currpage;
		
		$.ajax({
				type : 'POST',
				url : 'dofiles/doUpdateConsumedThera.php',
				dataType : 'json',
				data: dataString,
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#form-inj-'+tcid).show(500);
						}else{
							window.location.href = data.msg;
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#form-inj-'+tcid).show(500);
						}else{
							window.location.href = data.msg;
						}	
					}
				},

				error : function(XMLHttpRequest, textStatus, errorThrown) {
					$('#waiting').fadeOut(500);
					$('#message').removeClass().addClass('error').text('There was an error. Please try again later.').delay(500).fadeIn();
				}
			});
			return false;
	});
});
</script>

<!-- Treatment -->
<script type="text/javascript">
$("document").ready(function(){
	$(".greenbutton-trt").click(function(){
		$('.success').slideUp(500);
		$('#waiting').slideDown(500);
		$('#message').hide(0);
		
		var element = $(this);
		var Id = element.attr("id");
		var pid = $("#pid"+Id).val();
		var rid = $("#rid"+Id).val();
		var aid = $("#aid"+Id).val();
		var tcid = $("#tcid"+Id).val();
		
		var shift_inj = $('#shift_trt_up_'+Id).val();
		var given = "Given";
		var ref = "<?php echo $_GET["tab"];?>";
		var currpage = <?php echo $cpage;?>;
		
		var dataString = 'pid='+ pid + '&rid=' + rid + '&aid=' + aid + '&tid=' + Id + '&shift=' + shift_inj + '&given=' + given + '&ref=' + ref + '&currpage=' + currpage;
		
		$.ajax({
				type : 'POST',
				url : 'dofiles/doUpdateConsumedThera.php',
				dataType : 'json',
				data: dataString,
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#form-trt-'+tcid).show(500);
						}else{
							window.location.href = data.msg;
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#form-trt-'+tcid).show(500);
						}else{
							window.location.href = data.msg;
						}	
					}
				},

				error : function(XMLHttpRequest, textStatus, errorThrown) {
					$('#waiting').fadeOut(500);
					$('#message').removeClass().addClass('error').text('There was an error. Please try again later.').delay(500).fadeIn();
				}
			});
			return false;
	});
});
</script>