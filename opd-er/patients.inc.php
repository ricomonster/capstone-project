<div id="opdHolder">
	<?php
		date_default_timezone_set("Asia/Manila");
		$curr_date = date('Y-m-d', time());
		$curr_time = date('h:m A', time());
		$per_page = 10;
		
		$no_of_paginations = countAllPtTod($curr_date);
		$pages = ceil(mysql_result($no_of_paginations, 0) / $per_page);
		$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		
		if (!empty($pages)){
			if ($page > $pages){
				header("Location: pagenotfound.php");
				exit();
			}
		}
		
		$start = ($page - 1) * $per_page;
	
		$ptTod = getPatientsTod($start, $per_page, $curr_date);
	?>
	<span class="pageTitle">Patients</span>
    <div id="ptViewHolder">
    	<table width="100%" class="tblRecord">
        	<thead>
            	<th width="13%">Patient ID</th>
                <th width="15%">Last Name</th>
                <th width="15%">First Name</th>
                <th width="15%">Middle Name</th>
                <th width="13%">Birthday</th>
                <th width="12%">Civil Status</th>
                <th width="17%">&nbsp;</th>
            </thead>
	<?php
		if (empty($ptTod)){
	?>
        	<tr><td colspan="7"><center><i>No patients for this day.</i></center></td></tr>
	<?php
		}else{
			$rowCount = 1;
			foreach ($ptTod as $p){
			$ptinfo = getPtInfo($p["pid"]);
			foreach ($ptinfo as $records){
				if ($rowCount == 1){
	?>
    		<tr class="odd" id="pt-row">
            	<td onclick="window.location = 'viewpatientinfo.php?pid=<?php echo $records['pid'];?>';"><a href="viewpatientinfo.php?pid=<?php echo $records['pid'];?>"><?php echo $records["opdnum"];?></a></td>
                <td onclick="window.location = 'viewpatientinfo.php?pid=<?php echo $records['pid'];?>';"><?php echo $records["lastname"];?></td>
                <td onclick="window.location = 'viewpatientinfo.php?pid=<?php echo $records['pid'];?>';"><?php echo $records["firstname"];?></td>
                <td onclick="window.location = 'viewpatientinfo.php?pid=<?php echo $records['pid'];?>';"><?php echo $records["middlename"];?></td>
                <td onclick="window.location = 'viewpatientinfo.php?pid=<?php echo $records['pid'];?>';"><?php echo date('M d, Y', strtotime($records["dateofbirth"]));?></td>
                <td onclick="window.location = 'viewpatientinfo.php?pid=<?php echo $records['pid'];?>';"><?php echo $records["cs"];?></td>
                <td><a href="viewpatientinfo.php?pid=<?php echo $records['pid'];?>">View</a> - <?php if(checkRemarks($records["pid"], $p["rid"])===true){?><a onClick='window.open( "addremarks.php?pid=<?php echo $records['pid'];?>&rid=<?php echo $p['rid'];?>", "myWindow", 
			"status = 1, height = 500, width = 700, resizable = 1" )'>Add Remarks</a><?php }else{ ?><a id="<?php echo $p["rid"];?>" class="timeoutbutton">Set Time Out</a><?php } ?></td>
            </tr>    	
	<?php
				$rowCount=2;
				}else{			
	?>
    		<tr class="even" id="pt-row">
            	<td onclick="window.location = 'viewpatientinfo.php?pid=<?php echo $records['pid'];?>';"><a href="viewpatientinfo.php?pid=<?php echo $records['pid'];?>"><?php echo $records["opdnum"];?></a></td>
                <td onclick="window.location = 'viewpatientinfo.php?pid=<?php echo $records['pid'];?>';"><?php echo $records["lastname"];?></td>
                <td onclick="window.location = 'viewpatientinfo.php?pid=<?php echo $records['pid'];?>';"><?php echo $records["firstname"];?></td>
                <td onclick="window.location = 'viewpatientinfo.php?pid=<?php echo $records['pid'];?>';"><?php echo $records["middlename"];?></td>
                <td onclick="window.location = 'viewpatientinfo.php?pid=<?php echo $records['pid'];?>';"><?php echo date('M d, Y', strtotime($records["dateofbirth"]));?></td>
                <td onclick="window.location = 'viewpatientinfo.php?pid=<?php echo $records['pid'];?>';"><?php echo $records["cs"];?></td>
                <td><a href="viewpatientinfo.php?pid=<?php echo $records['pid'];?>">View</a> - <?php if(checkRemarks($records["pid"], $p["rid"])===true){?><a onClick='window.open( "addremarks.php?pid=<?php echo $records['pid'];?>&rid=<?php echo $p['rid'];?>", "myWindow", 
			"status = 1, height = 500, width = 700, resizable = 1" )'>Add Remarks</a><?php }else{ ?><a id="<?php echo $p["rid"];?>" class="timeoutbutton">Set Time Out</a><?php } ?></td>
            </tr> 
	<?php
				$rowCount=1;
				}
				}
			}
		}
	?>
        </table>
        <div id="pagination">
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
		    $pag .= "<a href='?page=1' class='first'>&larr; First</a>";
		} else if ($first_btn) {
		    $pag .= "<a href='?page=1' class='inactiveFirst'>&larr; First</a>";
		}

		if ($previous_btn && $cur_page > 1) {
		    $pre = $cur_page - 1;
		    $pag .= "<a href='?page=$pre' class='previous'>&laquo; prev</li>";
		} else if ($previous_btn) {
		    $pag .= "<span class='inactivePrev'>&laquo; prev</span>";
		}
			$pag .="<span class='numbering'>";
			for ($i = $start_loop; $i <= $end_loop; $i++) {

			    if ($cur_page == $i){
			        $pag .= "<a href='?page=$i' class='thisPage'>{$i}</a>";
				}else{
			        $pag .= "<a href='?page=$i' class='numbers'>{$i}</a>";
				}
			}
			$pag .="</span>";
	
			if ($next_btn && $cur_page < $pages) {
			    $nex = $cur_page + 1;
			    $pag .= "<a href='?page=$nex' class='next'>Next &raquo;</a>";
			} else if ($next_btn) {
			    $pag .= "<span class='inactiveNext'>Next &raquo;</span>";
			}

			if ($last_btn && $cur_page < $pages) {
			    $pag .= "<a href='?page=$pages' class='last'>Last &rarr;</a>";
			} else if ($last_btn) {
    			$pag .= "<span class='inactiveLast'>Last &rarr;</span>";
			}
			
			$total_string = "<br/><div class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$pages</b></div>";
			$pag = $pag . $total_string;  // Content for pagination
		?>
		<?php
		if ($pages > $per_page){
		?>
		<div id="pagination"><?php echo $pag;?></div>
        <?php
		}
		?>
        </div>
    </div>
</div>
<script type="text/javascript">
$(function() {
	$(".timeoutbutton").click(function(){
		var element = $(this);
		var del_id = element.attr("id");
		var url = 'rid=' + del_id;
			if(confirm("Are you sure that the patient went out?"))
		{
			$.ajax({
				type: "GET",
				url: "dofiles/doSetTimeOut.php",
				data: url,
				success: function(){
   
				}
			});
			$(this).parents("#pt-row").animate({ backgroundColor: "#fbc7c7" }, "fast").animate({opacity: "hide" }, "slow");
		}
	return false;
	});
});
</script>