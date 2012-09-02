<?php
include 'init.php';
$rid = $_GET["rid"];
$pid = $_GET["pid"];

$ptInfo = getPtInfo($pid);

if(empty($ptInfo)){
	header("Location: pagenotfound.php");
	exit();
}else{
	foreach ($ptInfo as $in){
		$pid = $in["pid"];
		$firstname = $in["firstname"];
		$middlename = $in["middlename"];
		$lastname = $in["lastname"];
		$membership = $in["membership"];
		$sex = $in["sex"];
		$cs = $in["cs"];
		$dob = $in["dateofbirth"];
		$dateofbirth = date('F d, Y', strtotime($in["dateofbirth"]));
		$opdnum = $in["opdnum"];
		$address = $in["address"];
	}
}
$ptRec = getRecords($pid);
foreach ($ptRec as $r){
	$datein = date('F d, Y', strtotime($r["dateofvisit"]));
	$age = $r["age"];
	$timein = $r["timein"];
	$bp = $r["bp"];
	$cr = $r["cr"];
	$rr = $r["rr"];
	$temp = $r["temp"];
	$weight = $r["weight"];
	$complaint = $r["complaint"];
}
?>
<!DOCTYPE HTML>
<head>
	<title>Patient # <?php echo $opdnum;?> - Patient Information System</title>
	<?php include 'templates/meta.php';?>
    <link rel="icon" href="favicon.ico" type="image/ico"/>
    <link href="css/styleMainMini.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
	<script type="text/javascript" src="jquery/jquery.autoresize.js"></script>
</head>
<body>
	<div id="pageContent">
    	<div id="header"><?php include 'templates/headermini.php'?></div>
        
        <div id="menuholder"></div>
        
        <div id="mainContent">
		<div id="message" style="display: none;"></div>
		<div id="waiting" style="display: none;"><div class="success">Verifying...</div></div>
		<span class="pageTitle">Patient # <?php echo $opdnum;?></span>
			<div id="info-holder" style="margin-top: 10px;">
				<div class="info-row">
					<div class="info-cell title-cell-ptid">Patient ID:</div>
					<div class="info-cell cont-cell-ptid"><?php echo $opdnum;?></div>
					<div class="info-cell title-cell-name">Patient Name:</div>
					<div class="info-cell cont-cell-name"><?php echo $lastname;?>, <?php echo $firstname;?> <?php echo $middlename;?></div>
				</div>
			</div>
			<div id="info-holder">
				<div class="info-row">
					<div class="info-cell title-cell-date">Date:</div>
					<div class="info-cell cont-cell-date"><?php echo $datein;?></div>
					<div class="info-cell title-cell-timein">Time In:</div>
					<div class="info-cell cont-cell-timein"><?php echo $timein;?></div>
					<div class="info-cell title-cell-age">Age:</div>
					<div class="info-cell cont-cell-age"><?php echo $age;?></div>
				</div>
			</div>
			<div id="info-holder">
				<div class="info-row">
					<div class="info-cell title-cell-bp">BP:</div>
					<div class="info-cell cont-cell-bp"><?php echo $bp;?> mmHg</div>
					<div class="info-cell title-cell-cr">CR:</div>
					<div class="info-cell cont-cell-cr"><?php echo $cr;?> p/m</div>
					<div class="info-cell title-cell-rr">RR:</div>
					<div class="info-cell cont-cell-rr"><?php echo $rr;?> b/m</div>
					<div class="info-cell title-cell-temp">Temp:</div>
					<div class="info-cell cont-cell-temp"><?php echo $temp;?> &deg;C</div>
					<div class="info-cell title-cell-weight">Weight:</div>
					<div class="info-cell cont-cell-weight"><?php echo $weight;?> kg</div>
				</div>
			</div>
			<div id="info-holder">
				<div class="info-row">
					<div class="info-cell title-cell-complaint">Patient's Chief Complaint:</div>
					<div class="info-cell cont-cell-complaint"><?php echo $complaint;?></div>
				</div>
			</div>
			<br/>
			<form id="remarks-form">
			<div id="info-holder">
				<div class="info-row">
					<div class="info-cell title-cell-remarks">Doctor's Remarks:</div>
					<div class="info-cell cont-cell-remarks">
						<textarea name="remarks" id="remarks" class="fields" style="width: 100%;"required="required"></textarea>
					</div>
				</div>
			</div>
			<div id="info-holder">
				<div class="info-row">
					<div class="info-cell title-cell-foradmit">For Admission:</div>
					<div class="info-cell cont-cell-foradmit">
						<select name="foradmission" id="foradmission" class="fields" style="width: 60px;">
							<option value="Yes">Yes</option>
							<option value="No" selected="selected">No</option>
						</select>
					</div>
					<div class="info-cell title-cell-doctor">Who Examined the Patient?</div>
					<div class="info-cell cont-cell-doctor">
						<select name="doctor" id="doctor" class="fields" style="width: 100%;">
			                	<option value="">Select:</option>
            			        <?php
								$drList = getDoctors();
								
								foreach ($drList as $dr){
								?>
								<option value="<?php echo $dr["did"];?>">Dr. <?php echo $dr["firstname"];?> <?php echo $dr["lastname"];?>, <?php echo $dr["title"];?></option>
								<?php
								}
								?>
            			</select>
					</div>
				</div>
			</div>
			<div id="info-holder">
				<div class="info-row">
					<div class="info-cell cont-cell-buttons">
						<input type="hidden" id="pid" name="pid" value="<?php echo $pid;?>"/>
						<input type="hidden" id="rid" name="rid" value="<?php echo $rid;?>"/>
						<input type="submit" id="subRemarks" name="subRemarks" class="disgbutton" disabled="disabled" value="Add Remarks"/>
						<input type="button"  onclick="parent.window.opener.location='opd-er.php'; window.close(); return false;" class="redbutton" value="Cancel" title="Cancel"/>
					</div>
				</div>
			</div>
			</form>
        </div>
        <div id="footer"><?php include 'templates/footer.php'?></div>
    </div>
<script>
$('textarea#remarks').autoResize({
    onResize : function() {
        $(this).css({opacity:0.8});
    },
    animateCallback : function() {
        $(this).css({opacity:1});
    },
    animateDuration : 300,
    extraSpace : 40
});
</script>
<script type="text/javascript">
$('document').ready(function(){
	$("#remarks, #doctor, #foradmission").blur(function (data) {              
		if ($("#remarks").val() != "" &&
			$("#doctor").val() != "" &&
			$("#foradmission").val() != ""
		){  
			$("#subRemarks").removeAttr("disabled").removeClass().addClass("greenbutton"); 
		} else {  
			$("#subRemarks").attr("disabled", "disabled").removeClass().addClass("disgbutton"); 
		}  
	});
	$("#subRemarks").click(function(){
			$('body,html').animate({scrollTop:0},800);
			$('#waiting').slideDown(500);
			$('#message').hide(0);
		
			$.ajax({
				type : 'POST',
				url : 'dofiles/doAddRemarks.php',
				dataType : 'json',
				data: {
					remarks : $('#remarks').val(),
					doctor : $('#doctor').val(),
					foradmission : $('#foradmission').val(),
					pid : $('#pid').val(),
					rid : $('#rid').val(),
					
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#remarks-form').show(500);
						}else{
							$(':input','#remarks-form').not(':button, :submit, :reset, :hidden').val('');
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#remarks-form').show(500);
						}else{
							$(':input','#remarks-form').not(':button, :submit, :reset, :hidden').val('').removeAttr('required');
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
</body>
</html>