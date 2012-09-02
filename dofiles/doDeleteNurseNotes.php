<?php
include '../init.php';

if($_GET['nid'])
{
$nid=$_GET['nid'];
deleteNurseNotes($nid);
}
?>