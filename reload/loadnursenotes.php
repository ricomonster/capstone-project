<?php
include '../init.php';

$pid = $_GET["pid"];
$rid = $_GET["rid"];
$aid = $_GET["aid"];

echo getNurseNotes($pid, $rid, $aid);
?>
<script type="text/javascript">
$(function() {


$(".delbutton").click(function(){
var element = $(this);
var del_id = element.attr("id");

var info = 'nid=' + del_id;
if(confirm("Sure you want to delete this order? There is NO undo!"))
{

$.ajax({
type: "GET",
url: "dofiles/doDeleteNurseNotes.php",
data: info,
success: function(){
   
}
});
$(this).parents(".notesRow").animate({ backgroundColor: "#fbc7c7" }, "fast").animate({opacity: "hide" }, "slow");
}
return false;
});
});
</script>