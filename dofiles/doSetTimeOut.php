<?php
include '../init.php';
date_default_timezone_set("Asia/Manila");
$curr_time = date('h:m A', time());
if($_GET['rid'])
{
$rid=$_GET['rid'];
$timeout = $curr_time;
setTimeOut($rid, $curr_time);
}
?>