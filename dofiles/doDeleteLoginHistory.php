<?php
include '../init.php';

if($_GET['uid'])
{
$uid=$_GET['uid'];
deleteLoginHistory($uid);
}
?>