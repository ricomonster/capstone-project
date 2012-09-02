<?php
include 'init.php';

if (!logged_in()){
	header('Location: index.php');
	exit();
}

if($_GET["srch"] != "yes"){
	header("Location: pagenotfound.php");
	exit();
}
	
$query = array();
$getUrl = array();

$getUrl[] = "srch=yes";

$opdnum="";
$lastname="";
$firstname="";
$middlename="";
$cs="";
$address="";
if (!empty($_GET["op"])){
	$opdnum = $_GET["op"];
	
	$getUrl[] = "op=" . $opdnum;
	$query[] = "opdnum = '" . $opdnum . "'";
}
if (!empty($_GET["ln"])){
	$lastname = $_GET["ln"];
	
	$getUrl[] = "ln=" . $lastname;
	$query[] = "lastname LIKE '" . $lastname . "%'";
}
if (!empty($_GET["fn"])){
	$firstname = $_GET["fn"];
	
	$getUrl[] = "fn=" . $firstname;
	$query[] = "firstname LIKE '" . $firstname . "%'";
}
if (!empty($_GET["mn"])){
	$middlename = $_GET["mn"];
	
	$getUrl[] = "mn=" . $middlename;
	$query[] = "middlename LIKE '" . $middlename . "%'";
}
if (!empty($_GET["bd"])){
	$birthday = $_GET["bd"];
	
	$getUrl[] = "bd=" . $birthday;
	$query[] = "dateofbirth LIKE '" . $birthday . "'";
}
if (!empty($_GET["cs"])){
	$cs = $_GET["cs"];
	
	$getUrl[] = "cs=" . $cs;
	$query[] = "cs LIKE '" . $cs. "%'";
}
if (!empty($_GET["ad"])){
	$address = $_GET["ad"];
	
	$getUrl[] = "ad=" . $address;
	$query[] = "address LIKE '%" . $address . "%'";
}
	
$msgh = "";
if (empty($query)){
	$msgh = '<div class="error">No results found. Please modify your search query.</div>';
}else{
	$url = implode("&", $getUrl);
	$querysql = implode(" AND ", $query);
	$per_page = 10;
		
	$no_of_paginations = countSearchResults($querysql);
	$pages = ceil(mysql_result($no_of_paginations, 0) / $per_page);
	$page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
		
	if ($page > $pages){
		header("Location: pagenotfound.php");
		exit();
	}
		
	$start = ($page - 1) * $per_page;
	
	$results = getSearchResults($querysql, $start, $per_page);
	$msgh = '<div class="success">Showing the results of your search</div>';
}
?>
<!DOCTYPE HTML>
<head>
	<title>Out Patient Department - Emergency Room | Bacnotan District Hospital - Patient Information System</title>
	<?php include 'templates/meta.php';?>
    <link rel="icon" href="favicon.ico" type="image/ico"/>
    <link href="css/styleMain.css" rel="stylesheet" type="text/css">
    <link href="css/styleOpdEr.css" rel="stylesheet" type="text/css">
    <link type="text/css" href="jquery/css/custom/jquery.custom.css" rel="Stylesheet" />
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" src="jquery/jquery.maskedinput.js"></script>
    <script type="text/javascript" src="ajax/ajaxSearchResults.js"></script>
</head>
<body>
	<div id="pageContent">
    	<div id="header">
		<?php include 'templates/header.php'?>
        </div>
        
        <div id="menuholder"><?php include 'menuholder/searchresults.php'?></div>
        
        <div id="mainContent" class="clearfix">
        <div id="message" style="display: none;"></div>
		<div id="waiting" style="display: none;"><div class="success">Verifying...</div></div>
		<div id="msgh"><?php echo $msgh;?></div>
        <div id="opdHolder">
        	<div id="searchHold">
            	<form id="searchForm">
	        	<table class="infoTable">
    	        <tr>
        	    	<td><label for="opdnum">Hospital Number:</label></td>
            	    <td>
                		<div class="patient-field">
	                	    <input type="text" name="opdnum" id="opdnum" class="ptField" title="Please input the Hospital Number of the Patient you're looking for" value="<?php echo $opdnum;?>"/>
						</div>
	                </td>
        	    </tr>
            	<tr>
            		<td><label for="lastname">Last Name:</label></td>
	                <td>
    	            	<div class="patient-field">
	    	                <input type="text" name="lastname" id="lastname" class="ptField" title="Please input the Last Name of the Patient you're looking for" maxlength="50" value="<?php echo $lastname;?>"/>
						</div>
                	</td>
	            </tr>
        		<tr>
            		<td width="30%"><label for="firstname">First Name:</label></td>
	                <td>
    	            	<div class="patient-field">
	    	                <input type="text" name="firstname" id="firstname" class="ptField" title="Input the First Name of the Patient you're looking for" maxlength="50" value="<?php echo $firstname;?>"/>
						</div>
					</td>
    	        </tr>
        	    <tr>
            		<td><label for="middlename">Middle Name:</label></td>
                	<td>
	               		<div class="patient-field">
		                    <input type="text" name="middlename" id="middlename" class="ptField" title="Please input the Middle Name of the Patient you're looking for" maxlength="50" value="<?php echo $middlename;?>"/>
						</div>
            	    </td>
	            </tr>
				<tr>
        	    	<td><label for="dateofbirth">Birthday:</label></td>
            	    <td>
                		<div class="patient-field">
							<select name="bdMonth" id="bdMonth" class="ptBmonth">
								<option value="">Month:</option>
								<option value="1">Jan</option>
								<option value="2">Feb</option>
								<option value="3">Mar</option>
								<option value="4">Apr</option>
								<option value="5">May</option>
								<option value="6">>Jun</option>
								<option value="7">Jul</option>
								<option value="8">Aug</option>
								<option value="9">Sep</option>
								<option value="10">Oct</option>
								<option value="11">Nov</option>
								<option value="12">Dec</option>
							</select>
            			    <select name="bdDay" id="bdDay" class="ptBday">
                        	<option value="">Day</option>
							<?php
							for ($d = 1; $d <= 31; $d++) {
							?>
								<option value="<?php echo $d;?>"><?php echo $d;?></opion>
						
            	           	<?php } ?>
							</select>
							<select name="dbYear" id="bdYear" class="ptByear">
                        		<option value="">Year</option>
							<?php
							$yearTod = date("Y");
							for ($y = $yearTod; $y >= 1950; $y--) {
							?>
								<option value="<?php echo $y;?>"><?php echo $y;?></option>
							<?php } ?>
							</select>
						</div>
    	            </td>
        	    </tr>
				<tr>
            		<td><label for="cs">Civil Status:</label></td>
	                <td>
    	            	<div class="patient-field">
							<input type="text" name="cs" id="cs" class="ptField" title="Please input the Civil Statuts of the Patient you're looking for" value="<?php echo $cs;?>"/>
						</div>
                	</td>
	            </tr>
    	        <tr>
        	    	<td><label for="address">Address:</label></td>
            	    <td>
                		<div class="patient-field">
							<input type="text" name="address" id="address" class="ptField" title="Please input the address of the Patient you're looking for"  maxlength="250" value="<?php echo $address;?>"/>
						</div>
        	        </td>
            	</tr>
	            <tr>
    	        	<td colspan="2">
        	        	<div class="patient-field">
								<input type="submit" id="submitSearch" name="submitSearch" class="greenbutton" value="Search"/>
						</div>
	                </td>
    	        </tr>
		    	</table>
                <br/>
                <span class="searchLink"><input type="button" id="cancelSearch" value="Cancel your Search" class="redbutton"></span>
		        </form>
            </div>
			
				
                <div id="searchResults">
                <span class="pageTitle">Search Results</span><span class="searchLink"><input type="button" id="searchlink" class="bluebutton" value="Search Again?"></span><br/><br/>
			    <table width="100%" class="tblRecord">
		       	<thead>
        		   	<th width="10%">OPD #</th>
					<th width="16%">Last Name</th>
					<th width="16%">First Name</th>
					<th width="16%">Middle Name</th>
					<th width="13%">Birthday</th>
					<th width="12%">Civil Status</th>
					<th width="17%">&nbsp;</th>
				</thead>
<?php
if (!empty($querysql)){
	if (empty($results)){
?>
				<tr><td colspan="7"><center><i>No records found in the database.</i></center></td></tr>
<?php
	}else{
		$rowCount = 1;
		foreach ($results as $records){
			if ($rowCount == 1){
?>
				<tr class="odd">
		            <td><a href="viewpatientinfo.php?pid=<?php echo $records['pid'];?>"><?php echo $records["opdnum"];?></a></td>
				<td><?php echo $records["lastname"];?></td>
				<td><?php echo $records["firstname"];?></td>
				<td><?php echo $records["middlename"];?></td>
				<td><?php echo date('M d, Y', strtotime($records["dateofbirth"]));?></td>
				<td><?php echo $records["cs"];?></td>
				<td><a href="viewpatientinfo.php?pid=<?php echo $records['pid'];?>">View Patient Info</a></td>
			</tr>    	
<?php
		$rowCount=2;
			}else{			
?>
				<tr class="even">
					<td><a href="viewpatientinfo.php?pid=<?php echo $records['pid'];?>"><?php echo $records["opdnum"];?></a></td>
					<td><?php echo $records["lastname"];?></td>
					<td><?php echo $records["firstname"];?></td>
					<td><?php echo $records["middlename"];?></td>
					<td><?php echo date('M d, Y', strtotime($records["dateofbirth"]));?></td>
					<td><?php echo $records["cs"];?></td>
					<td><a href="viewpatientinfo.php?pid=<?php echo $records['pid'];?>">View Patient Info</a></td>
				</tr> 
<?php
		$rowCount=1;
			}
		}
	}
?>
			</table>
           
	        <?php
			$cur_page = $page;
			$page -= 1;
			$per_page = 1;
			$previous_btn = true;
			$next_btn = true;
			$first_btn = true;
			$last_btn = true;
			$msg = "";

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
		    	$msg .= "<a href='?" .$url. "&page=1' class='first'>&larr; First</a>";
			} else if ($first_btn) {
			    $msg .= "<span class='inactiveFirst class='inactiveFirst'>&larr; First</span>";
			}

			if ($previous_btn && $cur_page > 1) {
			    $pre = $cur_page - 1;
			    $msg .= "<a href='?" .$url. "&page=$pre' class='previous'>&laquo; prev</li>";
			} else if ($previous_btn) {
			    $msg .= "<span class='inactivePrev'>&laquo; prev</span>";
			}
			
			$msg .="<span class='numbering'>";
			for ($i = $start_loop; $i <= $end_loop; $i++) {
			    if ($cur_page == $i){
			        $msg .= "<a href='?" .$url. "&page=$i' class='thisPage'>{$i}</a>";
				}else{
			        $msg .= "<a href='?" .$url. "&page=$i' class='numbers'>{$i}</a>";
				}
			}
			$msg .="</span>";
	
			if ($next_btn && $cur_page < $pages) {
			    $nex = $cur_page + 1;
			    $msg .= "<a href='?" .$url. "&page=$nex' class='next'>Next &raquo;</a>";
			} else if ($next_btn) {
			    $msg .= "<span class='inactiveNext'>Next &raquo;</span>";
			}

			if ($last_btn && $cur_page < $pages) {
			    $msg .= "<a href='?" .$url. "&page=$pages' class='last'>Last &rarr;</a>";
			} else if ($last_btn) {
    			$msg .= "<span class='inactiveLast'>Last &rarr;</span>";
			}
			
			$total_string = "<br/><div class='total' a='$no_of_paginations'>Page <b>" . $cur_page . "</b> of <b>$pages</b></div>";
			$msg = $msg . $total_string;  // Content for pagination
			?>
			<?php
			if ($pages > $per_page){
			?>
				<div id="pagination"><?php echo $msg;?></div>
	        <?php
			}
		}else{
		?>
        	<tr><td colspan="7"><center><i>No records found in the database.</i></center></td></tr>
        <?php
			}
		?>
        </div>
        </div>
    	</div>
        <div id="footer"><?php include 'templates/footer.php'?></div>
    </div>
<script type="text/javascript">
$(document).ready(function(){
	$("#searchlink").click(function(){
		$("#searchHold").slideDown(800);
		$("#searchResults").slideUp(800)
		$("#msgh").slideUp(800);
	});
	
	$("#cancelSearch").click(function(){
		$("#searchHold").slideUp(800);
		$("#message").slideUp(800);
		$("#searchResults").slideDown(800)
		$("#msgh").slideDown(800);
	});
	
	
	$("#opdnum").mask("99-99-99",{placeholder:"_"});
	
	$("input").focus(function(){
		$(this).parent().addClass("curFocus").children("div").toggle();
	});
	$("input").blur(function() {
		$(this).parent().removeClass("curFocus").children("div").toggle();
	});
	
	$("select").focus(function(){
		$(this).parent().addClass("curFocus").children("div").toggle();
	});
	$("select").blur(function() {
		$(this).parent().removeClass("curFocus").children("div").toggle();
	});
});
</script>  
</body>
</html>