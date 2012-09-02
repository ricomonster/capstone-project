<?php
include '../init.php';

if($_GET['oid'])
{
$oid=$_GET['oid'];
deleteDocOrder($oid);
}
?>