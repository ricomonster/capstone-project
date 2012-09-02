<?php
session_start();

unset($_SESSION['securedid']);
unset($_SESSION['uid']);

header('Location: index.php');
exit();
?>
