<?php
include '../init.php';

sleep(3);

$pid = $_POST["pid"];
$rid = $_POST["rid"];
$aid = $_POST["aid"];
$oid = $_POST["oid"];
$order = $_POST["order"];


updateDocOrder($oid, $pid, $rid, $aid, $order);
$return['error'] = false;
$return['msg'] = "Success";

echo json_encode($return)
?>