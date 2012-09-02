<?php
include '../init.php';

sleep(3);

$auid = $_POST["uid"];

deleteAccount($auid);

$return['error'] = false;
$return['msg'] = "accountmgmt.php?acct=manageacct";

echo json_encode($return);
?>