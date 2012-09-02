<?php
include '../init.php';

$pid = $_GET["pid"];
$rid = $_GET["rid"];
$aid = $_GET["aid"];

echo getProgressNotes($pid, $rid, $aid);
?>
<script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'pgid=' + del_id;
if(confirm("Sure you want to delete this order? There is NO undo!"))
{

$.ajax({
type: "GET",
url: "dofiles/doDeleteProgressNotes.php",
data: info,
success: function(){
   
}
});
$(this).parents(".progRow").animate({ backgroundColor: "#fbc7c7" }, "fast").animate({opacity: "hide" }, "slow");
}
return false;
});
});
</script>