<?php
include '../init.php';

$pid = $_GET["pid"];
$rid = $_GET["rid"];
$aid = $_GET["aid"];

echo getDocOrders($pid, $rid, $aid);
?>
<script type="text/javascript">
$("document").ready(function(){
$("input:radio[class=uporder]").click(function() {
    var order = $(this).val();
	var oid = $(this).attr("id");
	var pid = $('#pid').val();
	var rid = $('#rid').val();
	var aid = $('#aid').val();
	
	$('#waitingord').slideDown(500);
		$('#message').hide(0);
			
		$.ajax({
				type : 'POST',
				url : 'dofiles/doUpDocOrder.php',
				dataType : 'json',
				data: {
					oid : oid,
					pid : pid,
					rid : rid,
					aid : aid,
					order : order
				},
		
				success : function(data){
					$('#waitingord').slideUp(500);
					if (data.error === true){
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg.join('<br />')).delay(550).slideDown(500);
						$('#message').append(data);
			
						if (data.error === true){
							$('#doc-form').show(500);
						}
					}else{
						$('#message').removeClass().addClass((data.error === true) ? 'error' : 'success').html(data.msg).delay(500).slideDown(500);
			
						if (data.error === true){
							$('#doc-form').show(500);
						}else{
							
							$("#row-holder").load("reload/loaddocorders.php?pid=<?php echo $pid;?>&rid=<?php echo $rid;?>&aid=<?php echo $aid;?>").fadeIn(500);
						}	
					}
				},

				error : function(XMLHttpRequest, textStatus, errorThrown) {
					$('#waitingord').fadeOut(500);
					$('#message').removeClass().addClass('error').text('There was an error. Please try again later.').delay(500).fadeIn();
				}
			});
			return false;
		});
	});
</script>
<script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'oid=' + del_id;
if(confirm("Sure you want to delete this order? There is NO undo!"))
{

$.ajax({
type: "GET",
url: "dofiles/doDeleteOrder.php",
data: info,
success: function(){
   
}
});
$(this).parents(".doc-row").animate({ backgroundColor: "#fbc7c7" }, "fast").animate({opacity: "hide" }, "slow");
}
return false;
});
});
</script>
