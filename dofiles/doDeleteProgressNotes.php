<?php
include '../init.php';

if($_GET['pgid'])
{
$pgid=$_GET['pgid'];
deleteProgNotes($pgid);
}
?>