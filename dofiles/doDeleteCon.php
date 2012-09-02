<?php
include '../init.php';

if($_GET['cid'])
{
$cid=$_GET['cid'];
deleteIvfConsumption($cid);
}
?>