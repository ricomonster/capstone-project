<div class="admittedHolder">
	<span class="pageTitle">History and Physical Examination</span>
	<div id="hxHolder">
		<?php 
		if (checkExistingHxPt($pid, $rid, $aid) === false){
			echo "<div style='margin: auto; border: 1px solid #ccc; width: 600px; padding: 5px;'>The patient hasn't examined yet</div>";
		}else{ include 'templates/showhistoryphypt.php';} ?>
	</div>
</div>
<script>
$(document).ready(function(){
	$("#showHxPhy").click(function() {		
		$("#hxShowWrapper").slideUp(1000);
		$("#hxFormHolder").slideDown(1000);
		$('body,html').animate({scrollTop:0},800);
	});
});
</script>
<script>
$(document).ready(function(){	
	$("textarea").focus(function(){
		$(this).parent().addClass("curFocus").children("div").toggle();
	});
	$("textarea").blur(function() {
		$(this).parent().removeClass("curFocus").children("div").toggle();
	});
	
	$("#othcheck").click(function(){
		if ($(this).attr('checked')){
			$("#others").removeAttr("disabled"); 
		}else{
			$("#others").attr("disabled", "disabled");
			$("#others").val("");
		}
	});
	$("#prevcheck").click(function(){
		if ($(this).attr('checked')){
			$("#prevop").removeAttr("disabled"); 
		}else{
			$("#prevop").attr("disabled", "disabled");
			$("#prevop").val("");
		}
	});
	$("#childcheck").click(function(){
		if ($(this).attr('checked')){
			$("#children").removeAttr("disabled"); 
		}else{
			$("#children").attr("disabled", "disabled");
			$("#children").val("");
		}
	});
});
</script>