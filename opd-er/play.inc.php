<select name="test" id="test">
	<option value="Hi">Hi</option>
	<option value="Amf">Amf</option>
</select>
<div id="box" style="display:none;">
	hello!
</div>
<script>
$('document').ready(function(){
	$("#test").blur(function(){
		var get = $("#test").val();
	
		if (get == "Amf"){
			$("#box").fadeIn(500);
		}else{
			$("#box").fadeOut(500);
		}
	});
});
</script>