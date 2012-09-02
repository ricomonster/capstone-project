<?php
include 'init.php';
if(!isset($_GET["phid"]) || !isset($_GET["membershiptype"]) || empty($_GET["phid"]) || empty($_GET["membershiptype"])){
	header("Location: pagenotfound.php");
	exit();
}
$phid = $_GET["phid"];
$membershiptype = $_GET["membershiptype"];
$pricelist = getEditPriceList($phid, $membershiptype);
foreach ($pricelist as $p){
	$phid = $p["phid"];
	$membership = $p["membership"];
	$drugsandmedicines = $p["drugsandmedicines"];
	$supplies = $p["supplies"];
	$laboratory = $p["laboratory"];
	$xray = $p["xray"];
	$ultrasound = $p["ultrasound"];
	$ecg = $p["ecg"];
	$oxygen = $p["oxygen"];
	$accomsubs = $p["accomsubs"];
	$professionalfee = $p["professionalfee"];
	$orfeedrfee = $p["orfeedrfee"];
}
?>
<!DOCTYPE HTML>
<head>
	<title>Adding PhilHealth Pricing List - Patient Information System</title>
	<link rel="icon" href="favicon.ico" type="image/ico"/>
	<link href="css/styleMainMini.css" rel="stylesheet" type="text/css">
	<?php include 'templates/meta.php';?>
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
		<span class="pageTitle">Edit PhilHealth Pricing List</span>
			<form id="add-price-form">
			<div id="info-holder" style="margin-top: 10px;">
				<div class="info-row">
					<div class="info-cell title-cell-membership">Membership:</div>
					<div class="info-cell cont-cell-membership">
						<input type="text" name="membership" id="membership" class="fields" required="required" value="<?php echo $membership;?>"/>
					</div>
				</div>
				<div class="info-row">
					<div class="info-cell title-cell-drugsandmedicines">Drugs and Medicines:</div>
					<div class="info-cell cont-cell-drugsandmedicines">
						Php <input type="text" name="drugsandmedicines" id="drugsandmedicines" class="fields" required="required" value="<?php echo $drugsandmedicines;?>" style="width: 120px;"/>
					</div>
				</div>
				<div class="info-row">
					<div class="info-cell title-cell-supplies">Supplies:</div>
					<div class="info-cell cont-cell-supplies">
						Php <input type="text" name="supplies" id="supplies" class="fields" required="required" value="<?php echo $supplies;?>" style="width: 120px;"/>
					</div>
				</div>
				<div class="info-row">
					<div class="info-cell title-cell-laboratory">Laboratory:</div>
					<div class="info-cell cont-cell-laboratory">
						Php <input type="text" name="laboratory" id="laboratory" class="fields" required="required" value="<?php echo $laboratory;?>" style="width: 120px;"/>
					</div>
				</div>
				<div class="info-row">
					<div class="info-cell title-cell-xray">X-Ray:</div>
					<div class="info-cell cont-cell-xray">
						Php <input type="text" name="xray" id="xray" class="fields" required="required" value="<?php echo $xray;?>" style="width: 120px;"/>
					</div>
				</div>
				<div class="info-row">
					<div class="info-cell title-cell-ultrasound">Ultrasound:</div>
					<div class="info-cell cont-cell-ultrasound">
						Php <input type="text" name="ultrasound" id="ultrasound" class="fields" required="required" value="<?php echo $ultrasound;?>" style="width: 120px;"/>
					</div>
				</div>
				<div class="info-row">
					<div class="info-cell title-cell-ecg">ECG:</div>
					<div class="info-cell cont-cell-ecg">
						Php <input type="text" name="ecg" id="ecg" class="fields" required="required" value="<?php echo $ecg;?>" style="width: 120px;"/>
					</div>
				</div>
				<div class="info-row">
					<div class="info-cell title-cell-oxygen">Oxygen:</div>
					<div class="info-cell cont-cell-oxygen">
						Php <input type="text" name="oxygen" id="oxygen" class="fields" required="required" value="<?php echo $oxygen;?>" style="width: 120px;"/>
					</div>
				</div>
				<div class="info-row">
					<div class="info-cell title-cell-accomsubs">Accom/Subs:</div>
					<div class="info-cell cont-cell-accomsubs">
						Php <input type="text" name="accomsubs" id="accomsubs" class="fields" required="required" value="<?php echo $accomsubs;?>" style="width: 120px;"/>
					</div>
				</div>
				<div class="info-row">
					<div class="info-cell title-cell-professionalfee">Professional Fee:</div>
					<div class="info-cell cont-cell-professionalfee">
						Php <input type="text" name="professionalfee" id="professionalfee" class="fields" required="required" value="<?php echo $professionalfee;?>" style="width: 120px;"/>
					</div>
				</div>
				<div class="info-row">
					<div class="info-cell title-cell-orfeedrfee">OR Fee / DR Fee:</div>
					<div class="info-cell cont-cell-orfeedrfee">
						Php <input type="text" name="orfeedrfee" id="orfeedrfee" class="fields" required="required" value="<?php echo $orfeedrfee;?>" style="width: 120px;"/>
					</div>
				</div>
			</div>
			<div id="info-holder">
				<div class="info-row">
					<div class="info-cell cont-phil-buttons">
						<input type="hidden" name="phid" id="phid" value="<?php echo $phid;?>"/>
						<input type="submit" id="editPricing" name="editPricing" class="greenbutton" value="Update Price List"/>
						<input type="button"  onclick="parent.window.opener.location='accountmgmt.php?acct=systemsettings'; window.close(); return false;" class="redbutton" value="Cancel" title="Cancel"/>
					</div>
				</div>
			</div>
			</form>
		</div>
		<div id="footer"><?php include 'templates/footer.php'?></div>
	</div>
<script type="text/javascript">
$(function() {
	$('input#drugsandmedicines').blur(function() {
		var amt = parseFloat(this.value);
		$(this).val(amt.toFixed(2));
	});
	$('input#supplies').blur(function() {
		var amt = parseFloat(this.value);
		$(this).val(amt.toFixed(2));
	});
	$('input#laboratory').blur(function() {
		var amt = parseFloat(this.value);
		$(this).val(amt.toFixed(2));
	});
	$('input#xray').blur(function() {
		var amt = parseFloat(this.value);
		$(this).val(amt.toFixed(2));
	});
	$('input#ultrasound').blur(function() {
		var amt = parseFloat(this.value);
		$(this).val(amt.toFixed(2));
	});
	$('input#ecg').blur(function() {
		var amt = parseFloat(this.value);
		$(this).val(amt.toFixed(2));
	});
	$('input#oxygen').blur(function() {
		var amt = parseFloat(this.value);
		$(this).val(amt.toFixed(2));
	});
	$('input#accomsubs').blur(function() {
		var amt = parseFloat(this.value);
		$(this).val(amt.toFixed(2));
	});
	$('input#professionalfee').blur(function() {
		var amt = parseFloat(this.value);
		$(this).val(amt.toFixed(2));
	});
	$('input#orfeedrfee').blur(function() {
		var amt = parseFloat(this.value);
		$(this).val(amt.toFixed(2));
	});
});
</script>
<script type="text/javascript">
$('document').ready(function(){
	$("#membership, #drugsandmedicines, #supplies, #laboratory, #xray, #ultrasound, #ecg, #oxygen, #accomsubs, #professionalfee, #orfeedrfee").keyup(function (data) {              
		if ($("#membership").val() != "" &&
			$("#drugsandmedicines").val() != "" &&
			$("#supplies").val() != "" &&
			$("#laboratory").val() != "" &&
			$("#xray").val() != "" &&
			$("#ultrasound").val() != "" &&
			$("#ecg").val() != "" &&
			$("#oxygen").val() != "" &&
			$("#accomsubs").val() != "" &&
			$("#professionalfee").val() != "" &&
			$("#orfeedrfee").val() != ""
		){  
			$("#subAddPricing").removeAttr("disabled").removeClass().addClass("greenbutton"); 
		} else {  
			$("#subAddPricing").attr("disabled", "disabled").removeClass().addClass("disgbutton"); 
		}  
	});
	$("#editPricing").click(function(){
			$('body,html').animate({scrollTop:0},800);
			$('#waiting').slideDown(500);
			$('#message').hide(0);
		
			$.ajax({
				type : 'POST',
				url : 'dofiles/doEditPriceList.php',
				dataType : 'json',
				data: {
					membership : $("#membership").val(),
					drugsandmedicines : $("#drugsandmedicines").val(),
					supplies : $("#supplies").val(),
					laboratory : $("#laboratory").val(),
					xray : $("#xray").val(),
					ultrasound : $("#ultrasound").val(),
					ecg : $("#ecg").val(),
					oxygen : $("#oxygen").val(),
					accomsubs : $("#accomsubs").val(),
					professionalfee : $("#professionalfee").val(),
					orfeedrfee : $("#orfeedrfee").val(),
					phid : $("#phid").val()
					
				},
		
				success : function(data){
					$('#waiting').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#add-price-form').show(500);
						}else{
							$(':input','#add-price-form').not(':button, :submit, :reset, :hidden').val('');
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#add-price-form').show(500);
						}else{
							parent.window.opener.location='accountmgmt.php?acct=systemsettings'; setTimeout('self.close();',5000); return false;
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