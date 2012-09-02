<div id="opdHolder">
	<?php
		$per_page = 10;
		
		$no_of_paginations = countAllPt();
		$pages = ceil(mysql_result($no_of_paginations, 0) / $per_page);
		$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		
		if (!empty($pages)){
			if ($page > $pages){
				header("Location: pagenotfound.php");
				exit();
			}
		}
		
		$start = ($page - 1) * $per_page;
	
		$ptRecords = getAllPatients($start, $per_page);
	?>
	<span class="pageTitle">List of all Patients</span>
	<div id="ptViewHolder">
		<table width="100%" class="tblRecord">
			<thead>
				<th width="12%">Patient ID</th>
				<th width="16%">Last Name</th>
				<th width="16%">First Name</th>
				<th width="16%">Middle Name</th>
				<th width="13%">Birthday</th>
				<th width="12%">Civil Status</th>
				<th width="17%">&nbsp;</th>
			</thead>
	<?php
		if (empty($ptRecords)){
	?>
			<tr><td colspan="7"><center><i>No records found in the database.</i></center></td></tr>
	<?php
		}else{
			$rowCount = 1;
			foreach ($ptRecords as $records){
				if ($rowCount == 1){
	?>
			<tr class="odd" onclick="window.location = 'viewpatientinfo.php?pid=<?php echo $records['pid'];?>';">
				<td><a href="viewpatientinfo.php?pid=<?php echo $records['pid'];?>"><?php echo $records["opdnum"];?></a></td>
				<td><?php echo $records["lastname"];?></td>
				<td><?php echo $records["firstname"];?></td>
				<td><?php echo $records["middlename"];?></td>
				<td><?php echo date('M d, Y', strtotime($records["dateofbirth"]));?></td>
				<td><?php echo $records["cs"];?></td>
				<td><a href="viewpatientinfo.php?pid=<?php echo $records['pid'];?>">View</a><?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?>-<a href="validate.php?type=edit&loc=pt&pid=<?php echo $records['pid'];?>">Edit</a>-<a href="validate.php?type=delete&loc=pt&pid=<?php echo $records['pid'];?>">Delete</a><?php } ?></td>
			</tr>    	
	<?php
				$rowCount=2;
				}else{			
	?>
			<tr class="even" onclick="window.location = 'viewpatientinfo.php?pid=<?php echo $records['pid'];?>';">
				<td><a href="viewpatientinfo.php?pid=<?php echo $records['pid'];?>"><?php echo $records["opdnum"];?></a></td>
				<td><?php echo $records["lastname"];?></td>
				<td><?php echo $records["firstname"];?></td>
				<td><?php echo $records["middlename"];?></td>
				<td><?php echo date('M d, Y', strtotime($records["dateofbirth"]));?></td>
				<td><?php echo $records["cs"];?></td>
				<td><a href="viewpatientinfo.php?pid=<?php echo $records['pid'];?>">View</a><?php if(checkPriviledgeBilling($_SESSION['uid'])===false){?>-<a href="validate.php?type=edit&loc=pt&pid=<?php echo $records['pid'];?>">Edit</a>-<a href="validate.php?type=delete&loc=pt&pid=<?php echo $records['pid'];?>">Delete</a><?php } ?></td>
			</tr> 
	<?php
				$rowCount=1;
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